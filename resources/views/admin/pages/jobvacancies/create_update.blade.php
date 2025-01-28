@extends('admin.layouts.master')
@section('title', 'Job Vacancies')
@section('pages')
@php
$jobVacancy = isset($jobVacancy) ? $jobVacancy : null;
$stages = App\Models\RecruitmentStage::all();

if ($jobVacancy) {
    // untuk ordering
    $stages = $jobVacancy->stages->merge($stages);
}

@endphp
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">@if($jobVacancy) Update @else Create @endif Job Vacancy</h1>
                    <br>
                    <form class="forms-sample" id="frm-insert" action="{{ $jobVacancy ? route('admin.job-vacancies.update', ['job_vacancy' => $jobVacancy->id]) : route('admin.job-vacancies.store') }}" method="POST">
                        @csrf
                        @if($jobVacancy)
                        @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="position_id" class="col-sm-3 col-form-label">Position</label>
                                    <div class="col-sm-9 input-wrapper">
                                        <select class="position-ajax form-control" id="position_id" name="position_id" style="width: 100%; height: auto;">
                                            @if($jobVacancy)
                                            <option value="{{ $jobVacancy->position->id }}" selected>{{ $jobVacancy->position->name }}</option>
                                            @endif
                                        </select>
                                        @error('position_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="position_id" class="col-sm-3 col-form-label">Department / Section</label>
                                    <div class="col-sm-9 input-wrapper">
                                        <select class="section-ajax form-control" id="section" name="section" style="width: 100%; height: auto;">
                                            @if($jobVacancy)
                                            <option value="{{ $jobVacancy->section_type . '_' .$jobVacancy->section->id }}" selected>{{ $jobVacancy->section->name }}</option>
                                            @endif
                                        </select>
                                        @error('section')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="educationlevel_id" class="col-sm-3 col-form-label">Education Level</label>
                                    <div class="col-sm-9 input-wrapper">
                                        <select class="educationlevel-ajax form-control" id="education_level_id" name="education_level_id" style="width: 100%; height: auto;">
                                            @if($jobVacancy)
                                            <option value="{{ $jobVacancy->educationLevel->id }}" selected>{{ $jobVacancy->educationLevel->name }}</option>
                                            @endif
                                        </select>
                                        @error('education_level_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="open_date" class="col-sm-3 col-form-label">Open Date</label>
                                    <div class="col-sm-9 input-wrapper date" >
                                        <input type="text" class="form-control" id="open-date" name="open_date" placeholder="Open Date" value="{{ $jobVacancy->open_date ?? old('open_date') }}">
                                        @error('open_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="close_date" class="col-sm-3 col-form-label">Close Date</label>
                                    <div class="col-sm-9 input-wrapper">
                                        <input type="text" class="form-control" id="close-date" name="close_date" placeholder="Close Date" value="{{ $jobVacancy->close_date ?? old('close_date') }}">
                                        @error('close_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Gender</label>
                                    <div class="col-sm-9 input-wrapper">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                              <input type="radio" class="form-check-input" name="gender" id="radioActive" value="1" @if($jobVacancy) @if($jobVacancy->gender == App\Models\JobVacancy::GENDER_MALE) checked @endif @endif> Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gender" id="radioInactive" value="2" @if($jobVacancy) @if($jobVacancy->gender == App\Models\JobVacancy::GENDER_FEMALE) checked @endif @endif> Female
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gender" id="radioInactive" value="3" @if($jobVacancy) @if($jobVacancy->gender == App\Models\JobVacancy::GENDER_MALE_FEMALE) checked @endif @else checked @endif> Male Or Female
                                            </label>
                                        </div>
                                        @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="close_date" class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9 input-wrapper">
                                        <button type="button" class="btn btn-success" id="show-modal">Choose</button> <span class="ml-3" id="image-choosed-label">{{ $jobVacancy ? $jobVacancy->image : (old('image') ? old('image') : 'No Image Selected') }}</span>
                                        <input type="hidden" name="image" value="{{ $jobVacancy->image ?? old('image') }}" id="image-choosed-input">
                                        @error('image')
                                            <br>
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="close_date" class="col-sm-3 col-form-label">Stages (sequence)</label>
                                    <div class="col-sm-9 input-wrapper">
                                        <select class="stages-select w-100" multiple="multiple" name="stages[]">
                                            @php
                                            $jobStages = [];

                                            if ($jobVacancy) {
                                                foreach ($jobVacancy->stages as $value) {
                                                    $jobStages[] = $value->id;
                                                }
                                            }
                                            @endphp
                                            @foreach($stages as $value)
                                            <option value="{{ $value->id }}" @if(in_array($value->id, $jobStages)) selected @endif>{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('stages')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="min_gpa" class="col-sm-3 col-form-label">Max Age</label>
                                    <div class="col-sm-9 input-wrapper">
                                        <input type="number" class="form-control" id="max_age" name="max_age" placeholder="Max Age" value="{{ $jobVacancy->max_age ?? old('max_age') }}">
                                        @error('max_age')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="min_gpa" class="col-sm-3 col-form-label">Min Math Score (0-100)</label>
                                    <div class="col-sm-9 input-wrapper">
                                        <input type="number" class="form-control" id="min_math_score" name="min_math_score" placeholder="Min Math Score" value="{{ $jobVacancy->min_math_score ?? old('min_math_score') }}">
                                        @error('min_math_score')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="min_gpa" class="col-sm-3 col-form-label">Min GPA (0-4)</label>
                                    <div class="col-sm-9 input-wrapper">
                                        <input type="number" class="form-control" id="min_gpa" name="min_gpa" placeholder="Min GPA" value="{{ $jobVacancy->min_gpa ?? old('min_gpa') }}">
                                        @error('min_gpa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="position_id" class="col-sm-3 col-form-label">Majors Allowed</label>
                                    <div class="col-sm-9 input-wrapper">
                                        <select class="majors-ajax form-control" @if(!$jobVacancy) disabled @endif id="majors" name="majors[]" style="width: 100%; height: auto;" @if($jobVacancy) multiple @endif>
                                            @if($jobVacancy)
                                            @foreach($jobVacancy->majors as $value)
                                            <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @error('majors[]')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="descriptions" class="col-sm-3 col-form-label">Descriptions</label>
                                    <div class="col-sm-9 input-wrapper">
                                        <textarea id="descriptions" name="descriptions">{{ $jobVacancy->descriptions ?? old('descriptions') }}</textarea>
                                        @error('descriptions')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="requirements" class="col-sm-3 col-form-label">Requirements</label>
                                    <div class="col-sm-9 input-wrapper">
                                        <textarea id="requirements" name="requirements">{{ $jobVacancy->requirements ?? old('requirements') }}</textarea>
                                        @error('requirements')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 text-right">
                                        <button type="button" class="btn btn-primary btn-white-text" id="add-new-btn">Submit</button>
                                        <a href="{{ route('admin.job-vacancies.index') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mdl-insert-update" aria-hidden="true" id="modalImage">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><span id="title-modal">Choose an Image</span></h4>
                    <hr>
                    <div class="row">
                        @foreach(config('aiia.vacancy_images') as $image)
                        <div class="col-sm-4">
                            <img src="{{ asset('admin/images/vacancies/' . $image) }}" data-image="{{ $image }}" class="img-fluid mb-3 img-thumbnail image-choosen">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('bottom_scripts')
<script src="{{ asset('admin/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('admin/vendors/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/vendors/chosen/chosen.js') }}"></script>
<script src="{{ asset('admin/vendors/chosen/order.min.js') }}"></script>
<script>
    const initRangeMonthDatePicker = function() {
        const rangeDatePickerClasses = [
            {
                firstDatePicker : "#open-date",
                lastDatePicker : "#close-date",
                format : "yyyy-mm-dd",
                viewMode : "dates"
            }
        ];

        rangeDatePickerClasses.forEach(v => {
            $(v.lastDatePicker).datepicker({
                format: v.format,
                viewMode: v.viewMode,
                minViewMode: v.viewMode,
                autoclose: true,
                orientation: "bottom"
            }).on('changeDate',function(e){
                $(v.firstDatePicker).datepicker('setEndDate',e.date)
            });

            $(v.firstDatePicker).datepicker({
                format: v.format,
                viewMode: v.viewMode,
                minViewMode: v.viewMode,
                autoclose: true,
                orientation: "bottom"
            }).on('changeDate',function(e){
                $(v.lastDatePicker).datepicker('setStartDate',e.date)
            });
        });
    }


    const initCKEditor = function() {
        CKEDITOR.replace( 'descriptions' );
        CKEDITOR.replace( 'requirements' );
    }

    const majorInit = function(val) {
        if (val != null && val != '' && val != undefined) {
            $('#majors').prop('disabled', false);

            $('#majors').prop('multiple', 'multiple');

            $('#majors').select2({
                placeholder: 'Select Majors',
                width: 'resolve',
                ajax: {
                    url: "{{ route('ajax.majors.get') }}?" + "education_level=" + val,
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
        } else {
            $('#majors').prop('disabled', true);
        }
    }

    $(document).ready(function() {
        initRangeMonthDatePicker();

        initCKEditor();

        @if($jobVacancy)
        let majorId = $('.educationlevel-ajax').val();
        majorInit(majorId);
        @endif
        const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary ml-1 mr-1',
                    cancelButton: 'btn btn-danger ml-1 mr-1'
                },
                buttonsStyling: false,
            });

        $('#show-modal').on('click', function() {
            let valueImage = $('#image-choosed-input').val();
            if (valueImage != null && valueImage != undefined && valueImage != '') {
                $('.image-choosen[data-image="'+valueImage+'"]').addClass('selected');
            }

            $('#modalImage').modal('show');
        });

        $('.position-ajax').select2({
            placeholder: 'Select Position',
            width: 'resolve',
            ajax: {
                url: "{{ route('admin.positions.getposition') }}",
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

        $('.stages-select').chosen();

        $('#add-new-btn').on('click', function() {
            let order = $('.stages-select').getSelectionOrder();

            let options = $('.stages-select').find('option:selected');
             $('.stages-select').find('option:selected').remove();

            let arrOpt = [];

            options.each(function(e) {
                arrOpt.push({
                    id : $(this).val(),
                    text : $(this).text()
                })
            });

            let newOpt = [];

            order.forEach(key => {
                var found = false;
                arrOpt = arrOpt.filter(function(item) {
                    if(!found && item.id == key) {
                        newOpt.push(item);
                        found = true;
                        return false;
                    } else
                        return true;
                });
            })

            let finalOpt = '';
            newOpt.forEach(v => {
                finalOpt += `<option value="${v.id}" selected>${v.name}</option>`
            });

            $('.stages-select').append(finalOpt);

            $('#frm-insert').trigger('submit');
        });

        $('#section').select2({
            placeholder: 'Select Section',
            width: 'resolve',
            ajax: {
                url: "{{ route('admin.sections.getsections', ['with_dept' => '1']) }}",
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

        $('.image-choosen').on('click', function() {
            let filename = $(this).data('image');

            $('.image-choosen').removeClass('selected');
            $(this).addClass('selected');

            $('#image-choosed-label').text(filename);
            $('#image-choosed-input').val(filename);

            $('#modalImage').modal('hide');
        });

        $('.educationlevel-ajax').select2({
            placeholder: 'Select Education Level',
            width: 'resolve',
            ajax: {
                url: "{{ route('admin.education-levels.geteducationlevel') }}",
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

        $('.educationlevel-ajax').on('change', function() {
            let val = $(this).val();
            majorInit(val);
        });
    });
</script>
@endpush

@push('optional_vendor_css')
<link rel="stylesheet" href="{{ asset('admin/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/chosen/chosen.css') }}">
@endpush