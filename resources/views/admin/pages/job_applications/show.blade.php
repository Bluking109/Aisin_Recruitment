@extends('admin.layouts.master')
@section('title', 'Job Application')
@section('pages')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Job Application ({{ $jobApplication->jobVacancy->position->name }} - {{ $jobApplication->jobVacancy->section->name }})</h1>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" data-id="{{ $jobApplication->jobSeeker->id }}" class="btn btn-outline-success btn-fw btn-print btn-sm" data-toggle="tooltip" title="Print Data">
                                <i class="mdi mdi-printer"></i>
                            </button>
                            @php
                            $lastStage = $jobApplication->jobApplicationStages->last();
                            // last akan mengembalikan null apabila
                            $canSwitch = 0;
                            $lastStageName = 'Seleksi Dokumen';
                            $vacancyId = $jobApplication->jobVacancy->id;
                            $vacancyStages = $jobApplication->jobVacancy->stages;
                            $firstVacancyStage = $vacancyStages->first();
                            $lastVacancyStage = $vacancyStages->last();
                            $nextStage = $vacancyStages[0];

                            if ($lastStage) {
                                $lastStageName = $lastStage->stage->name;
                                $canSwitch = $lastStage->stage->switch_vacancy;
                            }
                            @endphp
                            @if($jobApplication->status == 1 || $jobApplication->status == 0)
                            @if($lastStage)
                            @if($lastStage->stage_id == $lastVacancyStage->id)
                            @if($lastStage->status == 1)
                            <button type="button" data-id="{{ $jobApplication->id }}" class="btn btn-outline-primary btn-fw btn-accept-stage btn-sm" data-toggle="tooltip" title="Accept this jobseeker">
                                <i class="mdi mdi-check-all"></i>
                            </button>
                            @endif
                            @else
                            @php
                            $keyNextStage = 0;
                            foreach ($vacancyStages as $key => $value) {
                                if ($lastStage->stage_id == $value->id) {
                                    $keyNextStage = $key + 1;
                                    break;
                                }
                            }

                            $nextStage = $vacancyStages[$keyNextStage];
                            @endphp
                            @if($lastStage->status == 1)
                            <button type="button" data-by-vendor="{{ $nextStage->by_vendor }}" data-next-stage="{{ $nextStage->name }}" data-id="{{ $jobApplication->id }}" class="btn btn-outline-primary btn-fw btn-next-stage btn-sm" data-toggle="tooltip" title="Proceed to the next stage" id="btn-next-stage">
                                <i class="mdi mdi-send"></i>
                            </button>
                            @endif
                            @endif
                            @else
                            {{-- Seleksi Dokumen --}}
                            <button type="button" data-by-vendor="{{ $nextStage->by_vendor }}" data-next-stage="{{ $nextStage->name }}" data-id="{{ $jobApplication->id }}" class="btn btn-outline-primary btn-fw btn-next-stage btn-sm" data-toggle="tooltip" title="Proceed to the next stage" id="btn-next-stage">
                                <i class="mdi mdi-send"></i>
                            </button>
                            @endif
                            @endif
                            @if($jobApplication->status != 2 && $jobApplication->status != 3)
                            <button type="button" id="btn-reject" data-id="{{ $jobApplication->id }}" data-switch="{{ $canSwitch }}" data-stage="${lastStageName}" data-vacancy="{{ $vacancyId }}" class="btn btn-outline-warning btn-fw btn-reject btn-sm" data-toggle="tooltip" title="Reject">
                                <i class="mdi mdi-block-helper"></i>
                            </button>
                            @endif
                            <button type="button" data-status="{{ $jobApplication->status }}" data-stages="{{ json_encode($jobApplication->jobApplicationStages()->with('stage')->get()->toArray()) }}" class="btn btn-outline-danger btn-fw btn-sm" data-toggle="tooltip" id="btn-history" title="History Application">
                                <i class="mdi mdi-format-list-bulleted"></i>
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="subtitle-panel">A. Profile Jobseeker</h3>
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
                            $education = collect($jobSeeker->formalEducations()->with('major')->get()->toArray());
                            $sma = array_values($education->where('class', App\Models\FormalEducation::EDU_SENIOR_HIGH_SCHOOL)->toArray())[0];
                            @endphp
                            @if($jobSeeker->educationLevel->isDiplomaForm() || $jobSeeker->educationLevel->isBachelorForm())
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
                                            {{-- <th>Faculty</th> --}}
                                            <th>Major</th>
                                            {{-- <th>Study Program</th> --}}
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
                                            {{-- <td>{{ $sma['faculty'] ?? '-' }}</td> --}}
                                            <td>{{ $sma['major']['name'] ?? '-' }}</td>
                                            {{-- <td>{{ $sma['study_program'] ?? '-' }}</td> --}}
                                            <td>{{ $sma['city'] ?? '-' }}</td>
                                            <td>{{ $sma['start_year'] . ' - ' . $sma['end_year'] }}</td>
                                            <td>{{ $sma['grade_point'] ?? '-' }}</td>
                                            <td>{{ $sma['note'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>D3</td>
                                            <td>{{ $d3['name_of_institution'] ?? '-' }}</td>
                                            {{-- <td>{{ $d3['faculty'] ?? '-' }}</td> --}}
                                            <td>{{ $d3['major']['name'] ?? '-' }}</td>
                                            {{-- <td>{{ $d3['study_program'] ?? '-' }}</td> --}}
                                            <td>{{ $d3['city'] ?? '-' }}</td>
                                            <td>{{ $d3['start_year'] . ' - ' . $d3['end_year'] }}</td>
                                            <td>{{ $d3['grade_point'] ?? '-' }}</td>
                                            <td>{{ $d3['note'] }}</td>
                                        </tr>
                                        @if($jobSeeker->educationLevel->isBachelorForm())
                                        <tr>
                                            <td>S1</td>
                                            <td>{{ $s1['name_of_institution'] ?? '-' }}</td>
                                            {{-- <td>{{ $s1['faculty'] ?? '-' }}</td> --}}
                                            <td>{{ $s1['major']['name'] ?? '-' }}</td>
                                            {{-- <td>{{ $s1['study_program'] ?? '-' }}</td> --}}
                                            <td>{{ $s1['city'] ?? '-' }}</td>
                                            <td>{{ $s1['start_year'] . ' - ' . $s1['end_year'] }}</td>
                                            <td>{{ $s1['grade_point'] ?? '-' }}</td>
                                            <td>{{ $s1['note'] }}</td>
                                        </tr>
                                        @endif
                                        {{-- <tr>
                                            <td>S2</td>
                                            <td>{{ $s2['name_of_institution'] ?? '-' }}</td>
                                            <td>{{ $s2['faculty'] ?? '-' }}</td>
                                            <td>{{ $s2['major'] ?? '-' }}</td>
                                            <td>{{ $s2['study_program'] ?? '-' }}</td>
                                            <td>{{ $s2['city'] ?? '-' }}</td>
                                            <td>{{ $s2['start_year'] . ' - ' . $s2['end_year'] }}</td>
                                            <td>{{ $s2['grade_point'] ?? '-' }}</td>
                                            <td>{{ $s2['note'] }}</td>
                                        </tr> --}}
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
                            <h3 class="subtitle-panel">C. Family Environment</h3>
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
                                            @if($jobSeeker->educationLevel->isDiplomaForm() || $jobSeeker->educationLevel->isBachelorForm())
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
                                            @if($jobSeeker->educationLevel->isDiplomaForm() || $jobSeeker->educationLevel->isBachelorForm())
                                            <td>{{ $v->boss_name ?? '-' }}</td>
                                            <td>{{ $v->boss_position ?? '-' }}</td>
                                            <td>{{ $v->number_of_subordinates ?? '-' }}</td>
                                            @endif
                                            <td>{{ $v->reason_to_move ?? '-' }}</td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="@if($jobSeeker->educationLevel->isDiplomaForm() || $jobSeeker->educationLevel->isBachelorForm()) 10 @else 7 @endif" class="text-center">No Data</td>
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
                            <p><b>2. Work motivation : </b></p>
                            <p>{{ $interest->working_motivation ?? '-' }}</p>
                            <br>
                            <p><b>3. Reasons for wanting to work at AIIA : </b></p>
                            <p>{{ $interest->working_reason ?? '-' }}</p>
                            <br>
                            <p><b>4. Facilities expected : </b></p>
                            <p>{{ $interest->expected_facility ?? '-' }}</p>
                            <br>
                            <p><b>5. Can start working at : </b></p>
                            <p>{{ $interest->join_date ?? '-' }}</p>
                            <br>
                            <p><b>6. Expected Salary : </b></p>
                            <p>Rp. {{ $interest->expected_salary ?? '-' }}</p>
                            @else
                            <p class="text-center"><b>No Data</b></p>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            @if($interest)
                            <p><b>7. Placement outside the city : </b></p>
                            <p>{{ $interest->placeOutsideLabel ?? '-' }}</p>
                            <br>
                            <p><b>8. Preferred work environment : </b></p>
                            <p>{{ $interest->favored_environment ?? '-' }}</p>
                            <br>
                            <p><b>9. Undesirable work environment : </b></p>
                            <p>{{ $interest->unfavored_environment ?? '-' }}</p>
                            <br>
                            <p><b>10. Type of person who is preferred : </b></p>
                            <p>{{ $interest->like_people ?? '-' }}</p>
                            <br>
                            <p><b>11. Things that make it difficult to make decisions : </b></p>
                            <p>{{ $interest->dificult_decisions ?? '-' }}</p>
                            <br>
                            <p><b>12. Priority field of work : </b></p>
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
                                                @if($document->{$item['name']})
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
                            <p>{{ $other->use_glasses == 0 ? 'No' : 'Yes' }}</p>
                        </div>
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

<div class="modal fade modal-history" tabindex="-1" role="dialog" aria-labelledby="modal-history" aria-hidden="true" id="modal-history">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><span id="title-modal">History Exam</span></h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Stage</th>
                                        <th>Exam Date</th>
                                        <th>Exam Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="body-history">

                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-12 text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('bottom_scripts')
<script src="{{ asset('admin/vendors/datatables/datatable.min.js') }}"></script>
<script src="{{ asset('admin/vendors/select2/select2.min.js') }}"></script>
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

        $('body').on('change', '#switch-select', function() {
            if($(this).is(":checked")) {
                $('#select-vacancy, #date-switch, #time-switch').prop('disabled', false);
            } else {
                $('#select-vacancy, #date-switch, #time-switch').prop('disabled', true);
            }
        });

        $('.btn-accept-stage').on('click', function() {
            let id = $(this).data('id');
            $.ajax({
                data: {
                    _token: "{{ csrf_token() }}"
                },
                url: "{{ url(AIIASetting::getValue('admin_base_route').'/job-applications') }}/"+id+"/accept",
                type: "put",
                dataType: "json",
                success: function (data) {
                    swalWithBootstrapButtons.fire(
                        data.title,
                        data.message,
                        'success'
                    )
                    window.location.href = "{{ route('admin.job-applications.in-process') }}";
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
                    },
                }
            });
        });

        $('.btn-print').on('click', function() {
            let id = $(this).data('id');
            window.location = "{{ url(AIIASetting::getValue('admin_base_route').'/job-seekers/getpdf') }}/"+id;
        });

        $('#btn-next-stage').on('click', function() {
            let id = $(this).data('id');
            let byVendor = $(this).data('by-vendor');
            let nextStage = $(this).data('next-stage');

            let vendor = '';

            if (byVendor == 1) {
                vendor = `<p class="text-left">Vendor</p>
                        <div class="text-left">
                            <select class="form-control" id="select-vendor">
                            </select>
                        </div>
                    <br>`
            }

            let html = `<br>
                <p>Next Stage : <b>${nextStage}</b></p>
                ${vendor}
                <p class="text-left">${nextStage} Test</p>
                <div>
                    <input type="text" class="datepicker form-control" placeholder="{{ date('Y-m-d') }}" id="date-exam" style="width:calc(75% - 3px); margin-right:3px; float:left">
                    <input type="text" class="form-control" style="width:calc(25% - 3px); margin-right:3px;  float:left" id="time-exam" placeholder="{{ date('H:i') }}" maxlength="5">
                </div>
                <br>`;

            swalWithBootstrapButtons.fire({
                title: 'You will continue this application to the next process !',
                html: html,
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No, cancel!',
                confirmButtonText: 'Yes, I am sure!',
                showConfirmButton: true,
                onOpen: function() {
                    $('#select-vendor').select2({
                        placeholder: 'Select Job Vacancy',
                        width: 'resolve',
                        ajax: {
                            url: "{{ route('admin.vendors.getvendor') }}",
                            dataType: "json",
                            data: function (params) {
                                return {
                                    search : $.trim(params.term)
                                };
                            },
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            },
                            cache: true
                        }
                    });
                    $('.select2-container--open').css({"z-index": 9999999});
                    $('.datepicker').blur();
                    $('.datepicker').datepicker({
                        orientation : 'bottom',
                        format : 'yyyy-mm-dd',
                        autoclose: true,
                    });
                }
            }).then(function(result) {
                if ( result.value ) {
                    $('#loading').show();
                    $.ajax({
                        data: {
                            _token : "{{ csrf_token() }}",
                            vendor : $('#select-vendor').val(),
                            date_exam : $('#date-exam').val(),
                            time_exam : $('#time-exam').val(),
                        },
                        url: "{{ url(AIIASetting::getValue('admin_base_route').'/job-applications') }}/"+id+"/next-stage",
                        type: "put",
                        dataType: "json",
                        success: function (data) {
                            $('#loading').hide();
                            swalWithBootstrapButtons.fire(
                                data.title,
                                data.message,
                                'success'
                            )
                            window.location.href = "{{ route('admin.job-applications.in-process') }}";
                        },
                        statusCode: {
                            400 : function (data) {
                                $('#loading').hide();
                                swalWithBootstrapButtons.fire(
                                    'Cancelled',
                                    data.responseJSON.message,
                                    'error'
                                )
                            },
                            422 : function (data) {
                                $('#loading').hide();
                                swalWithBootstrapButtons.fire(
                                    'Cancelled',
                                    'Data invalid',
                                    'error'
                                )
                            },
                            404 : function (data) {
                                $('#loading').hide();
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

        $('#btn-reject').on('click', function() {
            let canSwitch = $(this).data('switch');
            let id = $(this).data('id');
            let stageName = $(this).data('stage');
            let vacancyId = $(this).data('vacancy');

            if (canSwitch == 1) {
                swalWithBootstrapButtons.fire({
                    title: 'Reject this application ?',
                    html: `<br><div class="text-left">
                            <div class="checkbox">
                                <label><input type="checkbox" value="1" id="switch-select"> Switch to other vacancy</label>
                            </div>
                        </div>
                        <p class="text-left">Switch To</p>
                        <div class="text-left">
                            <select class="form-control" disabled id="select-vacancy">
                            </select>
                        </div>
                        <br>
                        <p class="text-left">${stageName} Test</p>
                        <div>
                            <input type="text" class="datepicker form-control" placeholder="{{ date('Y-m-d') }}" id="date-switch" style="width:calc(75% - 3px); margin-right:3px; float:left" disabled>
                            <input type="text" class="form-control" style="width:calc(25% - 3px); margin-right:3px;  float:left" id="time-switch" placeholder="{{ date('H:i') }}" disabled maxlength="5">
                        </div>
                        <br>`,
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No, cancel!',
                    confirmButtonText: 'Yes, I am sure!',
                    showConfirmButton: true,
                    onOpen: function() {
                        $('#select-vacancy').select2({
                            placeholder: 'Select Job Vacancy',
                            width: 'resolve',
                            ajax: {
                                url: "{{ route('admin.job-vacancies.getjobvacancies') }}",
                                dataType: "json",
                                data: function (params) {
                                    return {
                                        search : $.trim(params.term)
                                    };
                                },
                                processResults: function (data) {
                                    let dataReturn = [];
                                    data.forEach(e => {
                                        if (vacancyId != e.id) {
                                            dataReturn.push({
                                                id : e.id,
                                                text : e.position.name + ' - ' + e.section.name
                                            })
                                        }
                                    });
                                    return {
                                        results: dataReturn
                                    };
                                },
                                cache: true
                            }
                        });
                        $('.select2-container--open').css({"z-index": 9999999});
                        $('.datepicker').blur();
                        $('.datepicker').datepicker({
                            orientation : 'bottom',
                            format : 'yyyy-mm-dd',
                            autoclose: true,
                        });
                    }
                }).then(function(result) {
                    if ( result.value ) {
                        $('#loading').show();
                        $.ajax({
                            data: {
                                _token : "{{ csrf_token() }}",
                                job_vacancy : $('#select-vacancy').val(),
                                date_test : $('#date-switch').val(),
                                time_test : $('#time-switch').val(),
                            },
                            url: "{{ url(AIIASetting::getValue('admin_base_route').'/job-applications') }}/"+id+"/reject",
                            type: "put",
                            dataType: "json",
                            success: function (data) {
                                $('#loading').hide();
                                swalWithBootstrapButtons.fire(
                                    data.title,
                                    data.message,
                                    'success'
                                )
                                window.location.href = "{{ route('admin.job-applications.in-process') }}"
                            },
                            statusCode: {
                                400 : function (data) {
                                    $('#loading').hide();
                                    swalWithBootstrapButtons.fire(
                                        'Cancelled',
                                        data.responseJSON.message,
                                        'error'
                                    )
                                },
                                422 : function (data) {
                                    $('#loading').hide();
                                    swalWithBootstrapButtons.fire(
                                        'Cancelled',
                                        'Data invalid',
                                        'error'
                                    )
                                },
                                404 : function (data) {
                                    $('#loading').hide();
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
            } else {
                // ini langsung konfirmasi aja
                let id = $(this).data('id');

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "This application will be reject and jobseeker will be blacklist for 1 year",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Sure!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if ( result.value ) {
                        $('#loading').show();
                        $.ajax({
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            url: "{{ url(AIIASetting::getValue('admin_base_route').'/job-applications') }}/"+id+"/reject",
                            type: "put",
                            dataType: "json",
                            success: function (data) {
                                $('#loading').hide();
                                swalWithBootstrapButtons.fire(
                                    data.title,
                                    data.message,
                                    'success'
                                )
                                table.ajax.reload()
                            },
                            statusCode: {
                                400 : function (data) {
                                    $('#loading').hide();
                                    swalWithBootstrapButtons.fire(
                                        'Cancelled',
                                        data.responseJSON.message,
                                        'error'
                                    )
                                },
                                404 : function (data) {
                                    $('#loading').hide();
                                    swalWithBootstrapButtons.fire(
                                        'Cancelled',
                                        'Error, Id Not Found',
                                        'error'
                                    )
                                },
                                422 : function (data) {
                                    $('#loading').hide();
                                    swalWithBootstrapButtons.fire(
                                        'Cancelled',
                                        'Data invalid',
                                        'error'
                                    )
                                },
                            }
                        });
                    }
                })
            }
        })

        $('#btn-history').on('click', function() {
            let stages = $(this).data('stages');
            let tr = '';
            stages.forEach((v, i) => {
                let status = 'Accepted';

                if (i == stages.length - 1) {
                    if (status == 2) {
                        status = 'Accepted';
                    } else if (status == 3) {
                        status = 'Rejected';
                    } else {
                        status = 'In Process';
                    }
                }

                if ($(this).data('status') == 2) {
                    status = 'Accepted';
                }

                if ($(this).data('status') == 3 && i == stages.length - 1) {
                    status = 'Rejected';
                }

                tr += `<tr>
                    <td>${v.stage.name}</td>
                    <td>${v.exam_at.split(' ')[0]}</td>
                    <td>${v.exam_at.split(' ')[1]}</td>
                    <td>${status}</td>
                </tr>`
            });
            if (tr == '') {
                tr = '<tr><td colspan="3" class="text-center">No Data</td></tr>'
            }
            $('#body-history').empty().append(tr);
            $('#modal-history').modal('show');
        });

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
                }
            })
        });

    } );
</script>
@endpush

@push('optional_vendor_css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/datatables/datatable.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/select2/select2.min.css') }}">
<style type="text/css">
    .select2-container--open {
        z-index: 9999999 !important
    }
</style>
@endpush