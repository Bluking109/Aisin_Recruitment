@extends('admin.layouts.master')
@section('title', 'About Us')
@section('pages')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Job Applications</h1>
                    <div class="row mb-3 mt-3 pt-2 pb-2">
                        <div class="col-sm-3 col-md-2 mb-2">
                            <select class="form-control" id="filter-job" style="width: 100%; height: auto;">
                                @if(request()->query('job') && request()->query('job_label'))
                                <option value="{{ request()->query('job') }}">{{ request()->query('job_label') }}</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-3 col-md-2 mb-2">
                            <select class="form-control" id="filter-stage" style="width: 100%; height: auto;">
                                @if(request()->query('stage') && request()->query('stage_label'))
                                <option value="{{ request()->query('stage') }}">{{ request()->query('stage_label') }}</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-3 col-md-2 mb-2">
                            <select class="form-control" id="filter-confirm" style="width: 100%; height: auto;">
                                <option></option>
                                <option value="0" @if(request()->query('confirm') == '0') selected @endif>Not Confirmed</option>
                                <option value="1" @if(request()->query('confirm') == '1') selected @endif>Confirmed</option>
                                <option value="2" @if(request()->query('confirm') == '2') selected @endif>Rejected</option>
                            </select>
                        </div>
                        <div class="col-sm-3 col-md-2 mb-2">
                            <input type="text" name="exam_at" id="filter-date" class="form-control datepicker" placeholder="Exam Date" value="{{ request()->query('exam_date') }}">
                        </div>
                        {{-- <div class="col-sm-3 col-md-2 mb-2">
                            <select class="form-control" id="filter-status" style="width: 100%; height: auto;">
                                <option>In Process</option>
                                <option>Accepted</option>
                                <option>Reject</option>
                            </select>
                        </div> --}}
                        <div class="col-sm-3 col-md-4">
                            <button class="btn btn-primary" id="apply-filter"><i class="mdi mdi-filter"></i> Apply Filter</button>
                            <button class="btn btn-danger" id="remove-filter"><i class="mdi mdi-filter-remove"></i> Reset Filter</button>
                            <button class="btn btn-success" id="export-excel"><i class="mdi mdi-printer"></i> Export Excel</button>
                        </div>
                    </form>
                    </div>
                    <div class="table-responsive">
                        <table id="application-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>HP</th>
                                    <th>Job Vacancy</th>
                                    <th>Stage</th>
                                    <th>Confirm</th>
                                    <th>Exam Date</th>
                                    <th>Exam Time</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.pages.about.modal')

@endsection

@push('bottom_scripts')
<script src="{{ asset('admin/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables/datatable.min.js') }}"></script>
<script>
    let httpBuildQuery = function(params) {
        if (typeof params === 'undefined' || typeof params !== 'object') {
            params = {};
            return params;
        }
        let query = '?';
        let index = 0;

        for (let i in params) {
            index++;
            let param = i;
            let value = params[i];
            if (index == 1) {
                query += param + '=' + value;
            } else {
                query += '&' + param + '=' + value;
            }
        }

        return query;
    };

    let generateQueryStringParam = function() {
        let job = $('#filter-job').select2('data')[0];
        let stage = $('#filter-stage').select2('data')[0];
        let confirm = $('#filter-confirm').select2('data')[0];
        let dateFilter = $('#filter-date').val();

        let params = {};

        if (job != null && job != undefined && job != '') {
            params['job'] = job.id;
            params['job_label'] = job.text;
        }

        if (stage != null && stage != undefined && stage != '') {
            params['stage'] = stage.id;
            params['stage_label'] = stage.text;
        }

        if (confirm != null && confirm != undefined && confirm != '') {
            params['confirm'] = confirm.id;
        }

        if (dateFilter != null && dateFilter != undefined && dateFilter != '') {
            params['exam_date'] = dateFilter;
        }

        return httpBuildQuery(params);
    }

    $(document).ready(function() {
        $('#filter-confirm').select2({
            placeholder : 'Confirmation Status'
        });

        $('.datepicker').datepicker({
            orientation : 'bottom',
            format : 'yyyy-mm-dd',
            autoclose: true,
        });

        $('#filter-stage').select2({
            placeholder: 'Filter Stage',
            width: 'resolve',
            ajax: {
                url: "{{ route('admin.recruitment-stages.getstage') }}",
                dataType: "json",
                data: function (params) {
                    return {
                        search : $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    data.unshift({
                        id : 'none',
                        text : 'Document Selection'
                    });

                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

        $('#remove-filter').on('click', function() {
            let url = window.location.href.split('?')[0];

            window.location.href = url;
        });

        $('#apply-filter').on('click', function() {
            let url = window.location.href.split('?')[0];
            window.location.href = url + generateQueryStringParam();
        });

        $('#export-excel').on('click', function() {
            let url = "{{ route('admin.job-applications.export') }}";

            window.location.href = url + generateQueryStringParam();
        });

        $('#filter-job').select2({
            placeholder: 'Filter Job Vacancy',
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
                        dataReturn.push({
                            id : e.id,
                            text : e.position.name + ' - ' + e.section.name
                        })
                    });
                    return {
                        results: dataReturn
                    };
                },
                cache: true
            }
        });

        $('#application-table').on('click', '.btn-show-detail', function() {
            let id = $(this).data('id');

            window.location.href = "{{ url(AIIASetting::getValue('admin_base_route').'/job-applications') }}/"+id;
        });

        // $('#filter-status').select2({
        //     placeholder: 'Filter Status',
        //     width: 'resolve',
        // });

        const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary ml-1 mr-1',
                    cancelButton: 'btn btn-danger ml-1 mr-1'
                },
                buttonsStyling: false,
            });

        let url = window.location.href;

        let table =  $('#application-table').DataTable( {
            responsive : true,
            processing : true,
            serverSide : true,
            ajax : url,
            columns : [
                {
                    data: null,
                    name: 'no',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data : null,
                    orderable : false,
                    searchable : false,
                    render : function(data) {
                        return `<img src="{{ url(AIIASetting::getValue('admin_base_route')) }}/job-seekers/${data.job_seeker.id}/photo" class="img-fluid">`
                    }
                },
                {
                    data : 'job_seeker.name',
                    name : 'job_seeker.name'
                },
                {
                    data : 'job_seeker.email',
                    name : 'job_seeker.email'
                },
                {
                    data : 'job_seeker.handphone_number',
                    name : 'job_seeker.handphone_number'
                },
                {
                    data: null,
                    className: "center",
                    orderable: false,
                    searchable: false,
                    render: function(data){
                        return data.job_vacancy.position.name + ' - ' + data.job_vacancy.section.name
                    }
                },
                {
                    data: null,
                    className: "center",
                    orderable: false,
                    searchable: false,
                    render: function(data){
                        let stages = data.job_application_stages;

                        if (stages.length < 1) {
                            return 'Document Selection';
                        } else {
                            return stages[stages.length - 1].stage.name;
                        }
                    }
                },
                {
                    data: null,
                    className: "center",
                    orderable: false,
                    searchable: false,
                    render: function(data){
                        let stages = data.job_application_stages;
                        let lastStage = null;

                        if (stages.length > 0) {
                            lastStage = stages[stages.length - 1];
                        }

                        if (!lastStage) {
                            return '-';
                        }

                        if (lastStage.status == '0') {
                            return 'Not confirmed';
                        } else if (lastStage.status == '1') {
                            return '<span class="text-success">Confirmed</span>';
                        } else {
                            return '<span class="text-danger">Rejected</span>';
                        }
                    }
                },
                {
                    data: null,
                    className: "center",
                    orderable: false,
                    searchable: false,
                    render: function(data){
                        let stages = data.job_application_stages;
                        if (stages.length > 0) {
                            lastStage = stages[stages.length - 1]

                            return lastStage.exam_at.split(' ')[0];
                        }

                        return '-';
                    }
                },
                {
                    data: null,
                    className: "center",
                    orderable: false,
                    searchable: false,
                    render: function(data){
                        let stages = data.job_application_stages;
                        if (stages.length > 0) {
                            lastStage = stages[stages.length - 1]

                            return lastStage.exam_at.split(' ')[1];
                        }

                        return '-';
                    }
                },
                {
                    data: null,
                    className: "center",
                    orderable: false,
                    searchable: false,
                    render: function(data){
                        let stages = data.job_application_stages;
                        let vacancyStages = data.job_vacancy.stages;

                        let canSwitch = 0;
                        let lastStageName = "";

                        let lastStageId = null;
                        let lastStage = null;
                        if (stages.length > 0) {
                            lastStage = stages[stages.length - 1].stage;
                            canSwitch = lastStage.switch_vacancy;
                            lastStageName = lastStage.name;
                            lastStageId = lastStage.id;
                        }

                        let recruitmentStages = data.job_vacancy.stages;
                        let nextStage = recruitmentStages[0];

                        if (lastStageId) {
                            let nextIndex = 0;
                            recruitmentStages.forEach((v, i) => {
                                if (v.id == lastStageId) {
                                    if (i < recruitmentStages.length - 1) {
                                        nextIndex = i + 1;
                                    }
                                }
                            });

                            nextStage = recruitmentStages[nextIndex];
                        }

                        let nextButton = `<button type="button" data-by-vendor="${nextStage.by_vendor}" data-next-stage="${nextStage.name}" data-id="${data.id}" class="btn btn-outline-success btn-fw btn-next-stage btn-sm" data-toggle="tooltip" title="Proceed to the next stage">
                                <i class="mdi mdi-send"></i>
                            </button>`;

                        if (lastStageId == vacancyStages[vacancyStages.length -1].id) {
                            if (data.status == 1) {
                                nextButton = `<button type="button" data-id="${data.id}" class="btn btn-outline-success btn-fw btn-accept-stage btn-sm" data-toggle="tooltip" title="Accept this jobseeker">
                                    <i class="mdi mdi-check-all"></i>
                                </button>`
                            }
                        }

                        if (data.status != 1) {
                            nextButton = '';
                        }

                        if (stages.length > 0) {
                            if (stages[stages.length - 1].status == 0 || stages[stages.length - 1].status == 2) {
                                nextButton = '';
                            }
                        }

                        let btnReject = `<button type="button" data-id="${data.id}" data-switch="${canSwitch}" data-stage="${lastStageName}" data-vacancy="${data.job_vacancy.id}" class="btn btn-outline-warning btn-fw btn-reject btn-sm" data-toggle="tooltip" title="Reject">
                            <i class="mdi mdi-block-helper"></i>
                        </button>`;

                        if (data.status != 1) {
                            btnReject = '';
                        }

                        return `<div class="text-center">
                            ${nextButton}
                            <button type="button" data-id="${data.id}" class="btn btn-outline-primary btn-fw btn-show-detail btn-sm" data-toggle="tooltip" title="Detail">
                                <i class="mdi mdi-eye"></i>
                            </button>
                            ${btnReject}
                        </div>`
                    }
                }
            ]
        });

        $('body').on('change', '#switch-select', function() {
            if($(this).is(":checked")) {
                $('#select-vacancy, #date-switch, #time-switch').prop('disabled', false);
            } else {
                $('#select-vacancy, #date-switch, #time-switch').prop('disabled', true);
            }
        });

        $('#application-table').on('click', '.btn-accept-stage', function() {
            let id = $(this).data('id');

            swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You will complete this job application",
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
                            url: "{{ url(AIIASetting::getValue('admin_base_route').'/job-applications') }}/"+id+"/accept",
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
                            }
                        });
                    }
                })
        });

        $('#application-table').on('click', '.btn-next-stage', function() {
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
                showLoaderOnConfirm: true,
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

        $('#application-table').on('click', '.btn-reject', function() {
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
                    } else if ( result.dismiss === Swal.DismissReason.cancel ) {
                    }
                })
            }
        })
    } );
</script>
@endpush

@push('optional_vendor_css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/datatables/datatable.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap-datetimepicker.min.css') }}">
<style type="text/css">
    .select2-container--open {
        z-index: 9999999 !important
    }
</style>
@endpush