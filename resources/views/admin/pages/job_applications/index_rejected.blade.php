@extends('admin.layouts.master')
@section('title', 'About Us')
@section('pages')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Job Applications (Rejected)</h1>
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
                            <input type="text" name="finish_at" id="filter-date" class="form-control datepicker" placeholder="Reject At" value="{{ request()->query('finish_at') }}">
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
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Domicile</th>
                                    <th>Religion</th>
                                    <th>Univ</th>
                                    <th>Major</th>
                                    <th>Job Vacancy</th>
                                    <th>Reject On Stage</th>
                                    <th>Rejected At</th>
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
        let dateFilter = $('#filter-date').val();
        let status = "{{ App\Models\JobApplication::STATUS_REJECT }}";

        let params = {
            status : status
        };

        if (job != null && job != undefined && job != '') {
            params['job'] = job.id;
            params['job_label'] = job.text;
        }

        if (stage != null && stage != undefined && stage != '') {
            params['stage'] = stage.id;
            params['stage_label'] = stage.text;
        }

        if (dateFilter != null && dateFilter != undefined && dateFilter != '') {
            params['finish_at'] = dateFilter;
        }

        return httpBuildQuery(params);
    }

    $(document).ready(function() {
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

        $('#application-table').on('click', '.btn-delete', function() {
            let id = $(this).data('id');

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "This data will be deleted and cannot be restored",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Sure!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if ( result.value ) {
                    $.ajax({
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        url: "{{ url(AIIASetting::getValue('admin_base_route').'/job-applications') }}/"+id,
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
                            },
                            422 : function (data) {
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
        });

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
                    data : 'job_seeker.name',
                    name : 'jobSeeker.name'
                },
                {
                    data : 'job_seeker.age',
                    name : 'jobSeeker.age',
                    searchable : false,
                    orderable : false
                },
                {
                    data : 'job_seeker.gender_label',
                    name : 'jobSeeker.gender_label',
                    searchable : false,
                    orderable : false
                },
                {
                    data : 'job_seeker.domicile_label',
                    name : 'jobSeeker.domicile_label',
                    searchable : false,
                    orderable : false
                },
                {
                    data : 'job_seeker.religion_label',
                    name : 'jobSeeker.religion_label',
                    searchable : false,
                    orderable : false
                },
                {
                    data : 'job_seeker.last_education.name_of_institution',
                    name : 'jobSeeker.lastEducation.name_of_institution',
                    searchable : false,
                    orderable : false
                },
                {
                    data : 'job_seeker.last_education.major.name',
                    name : 'jobSeeker.lastEducation.major.name',
                    searchable : false,
                    orderable : false
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
                        let status = data.status;

                        if (status == 2) {
                            return 'Complete';
                        }

                        if (stages.length < 1) {
                            return 'Document Selection';
                        } else {
                            return stages[stages.length - 1].stage.name;
                        }
                    }
                },
                {
                    data: 'finished_at',
                    name: 'finished_at'
                },
                {
                    data: null,
                    className: "center",
                    orderable: false,
                    searchable: false,
                    render: function(data){
                        return `<div class="text-center">
                            <button type="button" data-id="${data.id}" class="btn btn-outline-primary btn-fw btn-show-detail btn-sm" data-toggle="tooltip" title="Detail">
                                <i class="mdi mdi-eye"></i>
                            </button>
                            <button type="button" data-id="${data.id}" class="btn btn-outline-danger btn-fw btn-delete btn-sm" data-toggle="tooltip" title="Delete">
                                <i class="mdi mdi-delete-forever"></i>
                            </button>
                        </div>`;
                    }
                }
            ]
        });

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