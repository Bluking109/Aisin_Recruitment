@extends('admin.layouts.master')
@section('title', 'About Us')
@section('pages')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Job Seeker</h1>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="subtitle-panel">A. Personal Identity</h3>
                        </div>
                        <div class="col-sm-6">
                            <table class="table">
                                <tr>
                                    <td colspan="2">
                                        <img src="{{ route('admin.job-seekers.photo', ['job_seeker' => $jobSeeker->id]) }}" class="img-fluid img-thumbnail" style="width: 180px; height: 180px">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Name</b></td>
                                    <td>: {{ $jobSeeker->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><b>KTP</b></td>
                                    <td>: {{ $jobSeeker->identity_number ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td>: {{ $jobSeeker->email ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><b>HP</b></td>
                                    <td>: {{ $jobSeeker->handphone_number ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Telephone 1</b></td>
                                    <td>: {{ $jobSeeker->address_telephone_number ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Telephone 2</b></td>
                                    <td>: {{ $jobSeeker->domicile_telephone_number ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Parent's Telephone</b></td>
                                    <td>: {{ $jobSeeker->parent_telephone_number ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Place Of Birth</b></td>
                                    <td>: {{ $jobSeeker->place_of_birth ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Date Of Birth</b></td>
                                    <td>: {{ date('d F Y', strtotime($jobSeeker->date_of_birth)) ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Birth Order</b></td>
                                    <td>: {{ $jobSeeker->birth_order ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Gender</b></td>
                                    <td>: {{ $jobSeeker->gender_label ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table">
                                <tr>
                                    <td><b>Birth Order</b></td>
                                    <td>: {{ $jobSeeker->birth_order ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Address</b></td>
                                    <td>: {{ $jobSeeker->address ?? '-' }},
                                    @if($jobSeeker->addressVillage)
                                     {{ ucwords(strtolower($jobSeeker->addressVillage->name)) }},
                                     {{ ucwords(strtolower($jobSeeker->addressVillage->subDistrict->name)) }},
                                     {{ ucwords(strtolower($jobSeeker->addressVillage->subDistrict->district->name)) }},
                                     {{ ucwords(strtolower($jobSeeker->addressVillage->subDistrict->district->province->name)) }}
                                     @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Domicile</b></td>
                                    <td>: {{ $jobSeeker->domicile ?? '-' }},
                                    @if($jobSeeker->domicileVillage)
                                     {{ ucwords(strtolower($jobSeeker->domicileVillage->name)) }},
                                     {{ ucwords(strtolower($jobSeeker->domicileVillage->subDistrict->name)) }},
                                     {{ ucwords(strtolower($jobSeeker->domicileVillage->subDistrict->district->name)) }},
                                     {{ ucwords(strtolower($jobSeeker->domicileVillage->subDistrict->district->province->name)) }}
                                     @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Education Level</b></td>
                                    <td>: {{ $jobSeeker->educationLevel->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Blood Type</b></td>
                                    <td>: {{ $jobSeeker->blood_type ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Religion</b></td>
                                    <td>: {{ $jobSeeker->religion_label ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Height</b></td>
                                    <td>: {{ $jobSeeker->height ?? '-' }} cm</td>
                                </tr>
                                <tr>
                                    <td><b>Weight</b></td>
                                    <td>: {{ $jobSeeker->weight ?? '-' }} kg</td>
                                </tr>
                                <tr>
                                    <td><b>Clothes Size</b></td>
                                    <td>: {{ $jobSeeker->clothes_size ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Pants Size</b></td>
                                    <td>: {{ $jobSeeker->pants_size ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Shoe Size</b></td>
                                    <td>: {{ $jobSeeker->shoe_size ?? '-' }}</td>
                                </tr>
                                @php
                                $drivingLicences = null;

                                if ($jobSeeker) {
                                    $drivingLicences = $jobSeeker->driving_licences;
                                }
                                @endphp
                                @if(!$drivingLicences)
                                <tr>
                                    <td><b>SIM</b></td>
                                    <td>: -</td>
                                </tr>
                                @else
                                @foreach($drivingLicences as $key => $value)
                                <tr>
                                    <td><b>SIM {{ $key }}</b></td>
                                    <td>: {{ $value }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <h3 class="subtitle-panel">B. Education</h3>
                        </div>
                        <div class="col-sm-12">
                            <h4 class="subtitle-panel">1. Formal Education</h4>
                        </div>
                        <div class="col-sm-12">
                            @if($jobSeeker->formalEducations->count())
                            @php
                            $education = collect($jobSeeker->formalEducations->toArray());
                            $sma = array_values($education->where('class', App\Models\FormalEducation::EDU_SENIOR_HIGH_SCHOOL)->toArray())[0];
                            @endphp
                            @if($jobSeeker->educationLevel->isDiplomaForm())
                            @php
                            $d3 = array_values($education->where('class', App\Models\FormalEducation::EDU_DIPLOMA)->toArray());
                            $d3 = isset($d3[0]) ? $d3[0] : null;
                            $s1 = array_values($education->where('class', App\Models\FormalEducation::EDU_BACHELOR)->toArray());
                            $s1 = isset($s1[0]) ? $s1[0] : null;
                            $s2 = array_values($education->where('class', App\Models\FormalEducation::EDU_MASTER)->toArray());
                            $s2 = isset($s2[0]) ? $s2[0] : null;
                            @endphp
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Name Of Institution</th>
                                            <th>Faculty</th>
                                            <th>Major</th>
                                            <th>Study Program</th>
                                            <th>City</th>
                                            <th>Join s/d Graduate</th>
                                            <th>NEM/IPK</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>SMA</td>
                                            <td>{{ $sma['name_of_institution'] ?? '-' }}</td>
                                            <td>{{ $sma['faculty'] ?? '-' }}</td>
                                            <td>{{ $sma['major'] ?? '-' }}</td>
                                            <td>{{ $sma['study_program'] ?? '-' }}</td>
                                            <td>{{ $sma['city'] ?? '-' }}</td>
                                            <td>{{ $sma['start_year'] . ' - ' . $sma['end_year'] }}</td>
                                            <td>{{ $sma['grade_point'] ?? '-' }}</td>
                                            <td>{{ $sma['note'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>D3</td>
                                            <td>{{ $d3['name_of_institution'] ?? '-' }}</td>
                                            <td>{{ $d3['faculty'] ?? '-' }}</td>
                                            <td>{{ $d3['major'] ?? '-' }}</td>
                                            <td>{{ $d3['study_program'] ?? '-' }}</td>
                                            <td>{{ $d3['city'] ?? '-' }}</td>
                                            <td>{{ $d3['start_year'] . ' - ' . $d3['end_year'] }}</td>
                                            <td>{{ $d3['grade_point'] ?? '-' }}</td>
                                            <td>{{ $d3['note'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>S1</td>
                                            <td>{{ $s1['name_of_institution'] ?? '-' }}</td>
                                            <td>{{ $s1['faculty'] ?? '-' }}</td>
                                            <td>{{ $s1['major'] ?? '-' }}</td>
                                            <td>{{ $s1['study_program'] ?? '-' }}</td>
                                            <td>{{ $s1['city'] ?? '-' }}</td>
                                            <td>{{ $s1['start_year'] . ' - ' . $s1['end_year'] }}</td>
                                            <td>{{ $s1['grade_point'] ?? '-' }}</td>
                                            <td>{{ $s1['note'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>S2</td>
                                            <td>{{ $s2['name_of_institution'] ?? '-' }}</td>
                                            <td>{{ $s2['faculty'] ?? '-' }}</td>
                                            <td>{{ $s2['major'] ?? '-' }}</td>
                                            <td>{{ $s2['study_program'] ?? '-' }}</td>
                                            <td>{{ $s2['city'] ?? '-' }}</td>
                                            <td>{{ $s2['start_year'] . ' - ' . $s2['end_year'] }}</td>
                                            <td>{{ $s2['grade_point'] ?? '-' }}</td>
                                            <td>{{ $s2['note'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-12 mt-3">
                                <p><b>1. The reason for choosing a major : </b></p>
                                <p>{{ $jobSeeker->educationDetail->reason_choose_institute }}</p>
                                <br>
                                <p><b>2. Essay / Thesis : </b></p>
                                <p>{{ $jobSeeker->educationDetail->essay }}</p>
                            </div>
                            @elseif($jobSeeker->educationLevel->isHighSchoolForm())
                            @php
                            $sd = array_values($education->where('class', App\Models\FormalEducation::EDU_PRIMARY_SCHOOL)->toArray());
                            $sd = isset($sd[0]) ? $sd[0] : null;
                            $smp = array_values($education->where('class', App\Models\FormalEducation::EDU_JUNIOR_HIGH_SCHOOL)->toArray());
                            $smp = isset($smp[0]) ? $smp[0] : null;
                            @endphp
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Institution Name</th>
                                            <th>Major</th>
                                            <th>Graduation Year</th>
                                            <th>City</th>
                                            <th>MTK SMT. 1-6</th>
                                            <th>MTK UN</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>SD</td>
                                            <td>{{ $sd['name_of_institution'] ?? '-' }}</td>
                                            <td>{{ $sd['major'] ?? '-' }}</td>
                                            <td>{{ $sd['end_year'] ?? '-' }}</td>
                                            <td>{{ $sd['city'] ?? '-' }}</td>
                                            <td>{{ $sd['average_math_score'] ?? '-' }}</td>
                                            <td>{{ $sd['un_math_score'] ?? '-' }}</td>
                                            <td>{{ $sd['note'] ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>SMP</td>
                                            <td>{{ $smp['name_of_institution'] ?? '-' }}</td>
                                            <td>{{ $smp['major'] ?? '-' }}</td>
                                            <td>{{ $smp['end_year'] ?? '-' }}</td>
                                            <td>{{ $smp['city'] ?? '-' }}</td>
                                            <td>{{ $smp['average_math_score'] ?? '-' }}</td>
                                            <td>{{ $smp['un_math_score'] ?? '-' }}</td>
                                            <td>{{ $smp['note'] ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>SMA</td>
                                            <td>{{ $sma['name_of_institution'] ?? '-' }}</td>
                                            <td>{{ $sma['major'] ?? '-' }}</td>
                                            <td>{{ $sma['end_year'] ?? '-' }}</td>
                                            <td>{{ $sma['city'] ?? '-' }}</td>
                                            <td>{{ $sma['average_math_score'] ?? '-' }}</td>
                                            <td>{{ $sma['un_math_score'] ?? '-' }}</td>
                                            <td>{{ $sma['note'] ?? '-' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @else
                            <p class="text-center">No Data Available</p>
                            @endif
                        </div>
                        <div class="col-sm-12">
                            <br>
                            <h4 class="subtitle-panel">2. Non Formal Education</h4>
                        </div>
                        <div class="col-sm-12">
                            @if($jobSeeker->nonFormalEducations->count())
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Course Name</th>
                                            <th>Place</th>
                                            <th>Start s/d End</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jobSeeker->nonFormalEducations as $i => $v)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $v->training_name }}</td>
                                            <td>{{ $v->place }}</td>
                                            <td>{{ $v->start_date . ' - ' . $v->end_date }}</td>
                                            <td>{{ $v->note ?? '-' }}</td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <p class="text-center">No Data Available</p>
                            @endif
                        </div>
                        <div class="col-sm-12">
                            <br>
                            <h4 class="subtitle-panel">3. Language</h4>
                        </div>
                        <div class="col-sm-12">
                            @if($jobSeeker->foreignLanguages->count())
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Language</th>
                                            <th>Writing</th>
                                            <th>Reading</th>
                                            <th>Grammar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jobSeeker->foreignLanguages as $i => $v)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $v->language }}</td>
                                            <td>{{ ucwords($v->writing) }}</td>
                                            <td>{{ ucwords($v->reading) }}</td>
                                            <td>{{ ucwords($v->grammar) }}</td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <p class="text-center">No Data Available</p>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <h3 class="subtitle-panel">C. Parent Family</h3>
                        </div>
                        <div class="col-sm-12">
                            <h4 class="subtitle-panel">1. Marital Status</h4>
                        </div>
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>Since Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>KTP</td>
                                            <td>{{ $jobSeeker->maritalStatus->marital_ktp_label ?? '-' }}</td>
                                            <td>{{ $jobSeeker->maritalStatus->date_ktp ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Actual</td>
                                            <td>{{ $jobSeeker->maritalStatus->marital_actual_label ?? '-' }}</td>
                                            <td>{{ $jobSeeker->maritalStatus->date_actual ?? '-' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <h4 class="subtitle-panel">2. Family</h4>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="col-sm-12">
                                        <p><b>A. Partner</b></p>
                                    </div>
                                    <table class="table">
                                        @if(!$jobSeeker->partner)
                                        <tr>
                                            <td colspan="2" class="text-center"><b>No Data</b></td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td><b>Name</b></td>
                                            <td>: {{ $jobSeeker->partner->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Date Of Birth</b></td>
                                            <td>: {{ $jobSeeker->partner->place_of_birth . ', ' . $jobSeeker->partner->date_of_birth }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Gender</b></td>
                                            <td>: {{ $jobSeeker->partner->gender_label }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Last Education</b></td>
                                            <td>: {{ $jobSeeker->partner->last_education }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Job</b></td>
                                            <td>: {{ $jobSeeker->partner->job }}</td>
                                        </tr>
                                        @endif
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm-12">
                                        <p><b>B. Children</b></p>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Date Of Birth</th>
                                                    <th>Gender</th>
                                                    <th>Edu.</th>
                                                    <th>Job</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($jobSeeker->children->count())
                                                @foreach($jobSeeker->children as $key => $v)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $v->name }}</td>
                                                    <td>{{ $v->place_of_birth . ', ' . $v->date_of_birth }}</td>
                                                    <td>{{ $v->gender_label }}</td>
                                                    <td>{{ $v->last_education ?? '-' }}</td>
                                                    <td>{{ $v->job ?? '-' }}</td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="6" class="text-center">No Data</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="col-sm-12">
                                        <p><b>C. Father</b></p>
                                    </div>
                                    <table class="table">
                                        @if(!$father = $jobSeeker->father)
                                        <tr>
                                            <td colspan="2" class="text-center"><b>No Data</b></td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td><b>Name</b></td>
                                            <td>: {{ $father->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Date Of Birth</b></td>
                                            <td>: {{ $father->place_of_birth . ', ' . $father->date_of_birth }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Last Education</b></td>
                                            <td>: {{ $father->last_education }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Job</b></td>
                                            <td>: {{ $father->job }}</td>
                                        </tr>
                                        @endif
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm-12">
                                        <p><b>D. Mother</b></p>
                                    </div>
                                    <table class="table">
                                        @if(!$mother = $jobSeeker->mother)
                                        <tr>
                                            <td colspan="2" class="text-center"><b>No Data</b></td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td><b>Name</b></td>
                                            <td>: {{ $mother->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Date Of Birth</b></td>
                                            <td>: {{ $mother->place_of_birth . ', ' . $mother->date_of_birth }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Last Education</b></td>
                                            <td>: {{ $mother->last_education }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Job</b></td>
                                            <td>: {{ $mother->job }}</td>
                                        </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <div class="col-sm-12">
                                        <p><b>E. Siblings</b></p>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Name</th>
                                                        <th>Date Of Birth</th>
                                                        <th>Gender</th>
                                                        <th>Education</th>
                                                        <th>Job</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($jobSeeker->siblings->count())
                                                    @foreach($jobSeeker->siblings as $key => $v)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $v->name }}</td>
                                                        <td>{{ $v->place_of_birth . ', ' . $v->date_of_birth }}</td>
                                                        <td>{{ $v->gender_label }}</td>
                                                        <td>{{ $v->last_education ?? '-' }}</td>
                                                        <td>{{ $v->job ?? '-' }}</td>
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <tr>
                                                        <td colspan="6" class="text-center">No Data</td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <h3 class="subtitle-panel">D. Work Experience</h3>
                        </div>
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Company</th>
                                            <th>Position</th>
                                            <th>Salary</th>
                                            <th>Join Date</th>
                                            <th>End Date</th>
                                            @if($jobSeeker->educationLevel->isDiplomaForm())
                                            <th>Boss Name</th>
                                            <th>Boss Position</th>
                                            <th>Subordinates</th>
                                            @endif
                                            <th>Reason to Move</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($jobSeeker->workExperiences->count())
                                        @foreach($jobSeeker->workExperiences as $key => $v)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $v->company ?? '-' }}</td>
                                            <td>{{ $v->position ?? '-' }}</td>
                                            <td>{{ $v->salary ?? '0' }}</td>
                                            <td>{{ $v->join_date ?? '-' }}</td>
                                            <td>{{ $v->end_date ?? '-' }}</td>
                                            @if($jobSeeker->educationLevel->isDiplomaForm())
                                            <td>{{ $v->boss_name ?? '-' }}</td>
                                            <td>{{ $v->boss_position ?? '-' }}</td>
                                            <td>{{ $v->number_of_subordinates ?? '-' }}</td>
                                            @endif
                                            <td>{{ $v->reason_to_move ?? '-' }}</td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="@if($jobSeeker->educationLevel->isDiplomaForm()) 10 @else 7 @endif" class="text-center">No Data</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="col-sm-12 mt-3">
                                    @php
                                    $workDetail = $jobSeeker->workExperienceDetail;
                                    @endphp
                                    <p><b>1. A brief description of the positions that have been held : </b></p>
                                    <p>{{ $workDetail->position_description ?? '-' }}</p>
                                    <br>
                                    <p><b>2. Problems that have been faced and how to overcome them : </b></p>
                                    <p>{{ $workDetail->problems_and_solutions ?? '-' }}</p>
                                    <br>
                                    <p><b>3. Impressions on the company : </b></p>
                                    <p>{{ $workDetail->impression_on_company ?? '-' }}</p>
                                    <br>
                                    <p><b>4. Motivating person : </b></p>
                                    <p>{{ $workDetail->who_pushed ?? '-' }}</p>
                                    <br>
                                    <p><b>5. How to deal with problems and make decisions : </b></p>
                                    <p>{{ $workDetail->how_make_decisions ?? '-' }}</p>
                                    <br>
                                    <p><b>6. Improvement on company : </b></p>
                                    <p>{{ $workDetail->improvement_on_company ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <h3 class="subtitle-panel">E. Personal Interests And Concepts</h3>
                        </div>
                        <div class="col-sm-6" style="padding-left: 30px;">
                            @php
                            $interest = $jobSeeker->interestConcept;
                            if($interest) {
                                $fields = json_decode($interest->field_of_works, true);
                            }
                            @endphp
                            @if($interest)
                            <p><b>1. Goal : </b></p>
                            <p>{{ $interest->future_goals ?? '-' }}</p>
                            <br>
                            <p><b>2. Expertise : </b></p>
                            <p>{{ $interest->expertise ?? '-' }}</p>
                            <br>
                            <p><b>3. Work motivation : </b></p>
                            <p>{{ $interest->working_motivation ?? '-' }}</p>
                            <br>
                            <p><b>4. Reasons for wanting to work at AIIA : </b></p>
                            <p>{{ $interest->working_reason ?? '-' }}</p>
                            <br>
                            <p><b>5. Facilities expected : </b></p>
                            <p>{{ $interest->expected_facility ?? '-' }}</p>
                            <br>
                            <p><b>6. Can start working at : </b></p>
                            <p>{{ $interest->join_date ?? '-' }}</p>
                            <br>
                            <p><b>7. Expected Salary : </b></p>
                            <p>Rp. {{ $interest->expected_salary ?? '-' }}</p>
                            @else
                            <p class="text-center"><b>No Data</b></p>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            @if($interest)
                            <p><b>8. Placement outside the city : </b></p>
                            <p>{{ $interest->placeOutsideLabel ?? '-' }}</p>
                            <br>
                            <p><b>9. Preferred work environment : </b></p>
                            <p>{{ $interest->favored_environment ?? '-' }}</p>
                            <br>
                            <p><b>10. Undesirable work environment : </b></p>
                            <p>{{ $interest->unfavored_environment ?? '-' }}</p>
                            <br>
                            <p><b>11. Type of person who is preferred : </b></p>
                            <p>{{ $interest->like_people ?? '-' }}</p>
                            <br>
                            <p><b>12. Things that make it difficult to make decisions : </b></p>
                            <p>{{ $interest->dificult_decisions ?? '-' }}</p>
                            <br>
                            <p><b>13. Priority field of work : </b></p>
                            <ol>
                                @foreach ($fields as $item)
                                 <li>{{ $item }}</li>
                                @endforeach
                            </ol>
                            @else
                            <p class="text-center"><b>No Data</b></p>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <h3 class="subtitle-panel">F. Dokumen Pribadi</h3>
                        </div>
                        <div class="col-sm-12" style="padding-left: 30px;">
                            @php
                            $document = $jobSeeker->document;
                            @endphp
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>File</th>
                                            <th>Nama File</th>
                                            <th class="text-center">Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $files = config('aiia.document_types');
                                        @endphp
                                        @foreach ($files as $item)
                                        <tr>
                                            <td>{{ $item['display_name'] }}</td>
                                            <td>{{ $document->{$item['name']} ?? '-' }}</td>
                                            <td class="text-center">
                                                @if(isset($document->{$item['name']}))
                                                <a href="{{ route('admin.job-seekers.getdocument', ['job_seeker' => $jobSeeker->id, 'type' => $item['name']]) }}"><i class="mdi mdi-cloud-download"></i></a>
                                                @else
                                                No Data Uploaded
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <h3 class="subtitle-panel">G. Social Activity</h3>
                        </div>
                        <div class="col-sm-12">
                            <h4 class="subtitle-panel">1. Friend at AIIA</h4>
                        </div>
                        <div class="col-sm-12" style="padding-left: 30px;">
                            @php
                            $friends = $jobSeeker->friends;
                            @endphp
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Telephone Number</th>
                                            <th>Relationship</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($friends->count())
                                        @foreach ($friends as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->position }}</td>
                                            <td>{{ $item->telephone_number }}</td>
                                            <td>{{ $item->relationship }}</td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center">No Data</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h4 class="subtitle-panel">2. Organizational Experience</h4>
                        </div>
                        <div class="col-sm-12" style="padding-left: 30px;">
                            @php
                            $organizations = $jobSeeker->organizations;
                            @endphp
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Place</th>
                                            <th>Position</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($organizations->count())
                                        @foreach ($organizations as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->place }}</td>
                                            <td>{{ $item->position }}</td>
                                            <td>{{ $item->start_date }}</td>
                                            <td>{{ $item->end_date }}</td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6" class="text-center">No Data</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <h3 class="subtitle-panel">H. Others</h3>
                        </div>
                        <div class="col-sm-6" style="padding-left: 30px;">
                            @php
                            $other = $jobSeeker->other;
                            @endphp
                            <p><b>1. Hobby : </b></p>
                            <p>{{ $other->hobby ?? '-' }}</p>
                            <br>
                            <p><b>2. How to fill spare time : </b></p>
                            <p>{{ $other->fill_spare_time ?? '-' }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p><b>3. Strong point : </b></p>
                            <p>{{ $other->strong_point ?? '-' }}</p>
                            <br>
                            <p><b>4. Weak point : </b></p>
                            <p>{{ $other->weak_point ?? '-' }}</p>
                        </div>
                        <div class="col-sm-4" style="padding-left: 30px;">
                            <br>
                            <p><b>5. Wearing glasses</b></p>
                            @if (isset($other->use_glasses))
                            <p>{{ $other->use_glasses == 0 ? 'No' : 'Yes' }}</p>
                            @else
                            <p>No</p>
                            @endif
                        </div>
                        @if(isset($other->use_glasses))
                        @if ($other->use_glasses == 1)
                        @php
                        $rightEye = json_decode($other->right_eye, true);
                        $leftEye = json_decode($other->left_eye, true);
                        @endphp
                        <div class="col-sm-4">
                            <br>
                            <p><b>A. Rigth Eye</b></p>
                            <p>{{ $rightEye['type'] . ' ' . $rightEye['size'] }}</p>
                        </div>
                        <div class="col-sm-4">
                            <br>
                            <p><b>B. Left Eye</b></p>
                            <p>{{ $leftEye['type'] . ' ' . $leftEye['size'] }}</p>
                        </div>
                        @endif
                        @endif
                        <div class="col-sm-12 mt-3">
                            <h4 class="subtitle-panel">1. Another recruitment process</h4>
                        </div>
                        <div class="col-sm-12" style="padding-left: 30px;">
                            @php
                            $otherRecruitments = $jobSeeker->otherRecruitments;
                            @endphp
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Organizer</th>
                                            <th>Astra Group</th>
                                            <th>Process</th>
                                            <th>Place</th>
                                            <th>Date</th>
                                            <th>Position</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($otherRecruitments->count())
                                        @foreach ($otherRecruitments as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->organizer }}</td>
                                            <td>{{ $item->is_astra == 1 ? 'Ya' : 'Bukan' }}</td>
                                            <td>{{ $item->process_label }}</td>
                                            <td>{{ $item->place }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->position }}</td>
                                            <td>{{ $item->status_label }}</td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="8" class="text-center">No Data</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <h4 class="subtitle-panel">2. Disease History</h4>
                        </div>
                        <div class="col-sm-12" style="padding-left: 30px;">
                            @php
                            $diseases = $jobSeeker->diseases;
                            @endphp
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>From</th>
                                            <th>Until</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($diseases->count())
                                        @foreach ($diseases as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->from_date }}</td>
                                            <td>{{ $item->end_date }}</td>
                                            <td>{{ $item->note }}</td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center">No Data</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.pages.about.modal')

@endsection

@push('bottom_scripts')

<script src="{{ asset('admin/vendors/datatables/datatable.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-datepicker.js') }}"></script>
<script>
    $(document).ready(function() {
        const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary ml-1 mr-1',
                    cancelButton: 'btn btn-danger ml-1 mr-1'
                },
                buttonsStyling: false,
            })

        let table =  $('#job-seeker-table').DataTable( {
            responsive : true,
            processing : true,
            serverSide : true,
            ajax : "{{ route('admin.job-seekers.index') }}",
            columns : [
                { data: null, name: 'no', orderable: false, searchable: false, render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;} },
                {
                    data : null,
                    orderable : false,
                    searchable : false,
                    render : function(data) {
                        return `<img src="job-seekers/${data.id}/photo" class="img-fluid">`
                    }
                },
                {
                    data : 'name',
                    name : 'name'
                },
                {
                    data : 'email',
                    name : 'email'
                },
                {
                    data : 'handphone_number',
                    name : 'handphone_number'
                },
                {
                    data : 'education_level.name',
                    name : 'educationLevel.name'
                },
                {
                    data: null,
                    className: "center",
                    orderable: false,
                    searchable: false,
                    render: function(data){
                        return `<div class="text-center">
                                    <button type="button" data-id="${data.id}" data-about='${JSON.stringify(data)}' class="btn btn-outline-primary btn-fw btn-show btn-sm">
                                        <i class="mdi mdi-eye"></i>
                                    </button>
                                    <button type="button" data-id="${data.id}" class="btn btn-outline-warning btn-fw btn-blacklist btn-sm">
                                        <i class="mdi mdi-account-off"></i>
                                    </button>
                                    <button type="button" data-id="${data.id}" class="btn btn-outline-danger btn-fw btn-delete btn-sm">
                                        <i class="mdi mdi-delete-forever"></i>
                                    </button>
                                </div>`
                    }
                }
            ]
        });

        $('#job-seeker-table').on('click', '.btn-blacklist', function(){
            let id = $(this).data('id');

            swalWithBootstrapButtons.fire({
                title: 'This data will be blacklisted!',
                html: '<input type="text" class="datepicker form-control" placeholder="Blacklist Until" value="{{ date("Y-m-d", strtotime(date("Y-m-d") . " + 730 day")) }}" id="blacklist-until"><br><p>The default will be blacklisted for 2 years</p>',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No, cancel!',
                confirmButtonText: 'Yes, I am sure!',
                showConfirmButton: true,
                onOpen: function() {
                    $('.datepicker').blur();
                    $('.datepicker').datepicker({
                        orientation : 'bottom',
                        format : 'yyyy-mm-dd'
                    });
                }
            }).then(function(result) {
                if ( result.value ) {
                    $.ajax({
                        data: {
                            _token: "{{ csrf_token() }}",
                            blacklist_until : $('#blacklist-until').val()
                        },
                        url: "{{ url(AIIASetting::getValue('admin_base_route').'/job-seekers') }}/"+id+"/black-list",
                        type: "put",
                        dataType: "json",
                        success: function (data) {
                            swalWithBootstrapButtons.fire(
                                data.title,
                                data.message,
                                'success'
                            )
                            table.ajax.reload()
                        },
                        statusCode: {
                            400 : function (data) {
                                swalWithBootstrapButtons.fire(
                                    'Cancelled',
                                    data.responseJSON.message,
                                    'error'
                                )
                            },
                            404 : function (data) {
                                swalWithBootstrapButtons.fire(
                                    'Cancelled',
                                    'Error, Id Not Found',
                                    'error'
                                )
                            }
                        }
                    });
                }
            });
        });

        $('#job-seeker-table').on('click', '.btn-delete', function(){
            let id = $(this).data('id');

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if ( result.value ) {
                    $.ajax({
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        url: "{{ url(AIIASetting::getValue('admin_base_route').'/job-seekers') }}/"+id,
                        type: "delete",
                        dataType: "json",
                        success: function (data) {
                            swalWithBootstrapButtons.fire(
                                data.title,
                                data.message,
                                'success'
                            )
                            table.ajax.reload()
                        },
                        statusCode: {
                            400 : function (data) {
                                swalWithBootstrapButtons.fire(
                                    'Cancelled',
                                    data.responseJSON.message,
                                    'error'
                                )
                            },
                            404 : function (data) {
                                swalWithBootstrapButtons.fire(
                                    'Cancelled',
                                    'Error, Id Not Found',
                                    'error'
                                )
                            }
                        }
                    });
                } else if ( result.dismiss === Swal.DismissReason.cancel ) {
                }
            })
        });

    } );
</script>
@endpush

@push('optional_vendor_css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/datatables/datatable.min.css') }}">
@endpush