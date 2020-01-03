@extends('admin.layouts.master')
@section('title', 'Assign Job Applications')
@section('pages')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Assign Job Application</h1>
                    <div class="table-responsive">
                        <table id="job-seeker-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>HP</th>
                                    <th>Education Level</th>
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

@endsection

@push('bottom_scripts')
<script src="{{ asset('admin/vendors/select2/select2.min.js') }}"></script>
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
            ajax : "{{ route('admin.job-applications.assign') }}",
            columns : [
                { data: null, name: 'no', orderable: false, searchable: false, render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;} },
                {
                    data : null,
                    orderable : false,
                    searchable : false,
                    render : function(data) {
                        return `<img src="{{ url(AIIASetting::getValue('admin_base_route').'/job-seekers') }}/${data.id}/photo" class="img-fluid">`
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
                                    <button type="button" data-id="${data.id}" data-about='${JSON.stringify(data)}' class="btn btn-outline-primary btn-fw btn-show btn-sm" data-toggle="tooltip" title="Detail">
                                        <i class="mdi mdi-eye"></i>
                                    </button>
                                    <button type="button" data-id="${data.id}" class="btn btn-outline-success btn-fw btn-assign btn-sm" data-toggle="tooltip" title="Assign To Job Vacancy">
                                        <i class="mdi mdi-checkbox-multiple-marked-circle-outline"></i>
                                    </button>
                                </div>`
                    }
                }
            ]
        });

        $('#job-seeker-table').on('click', '.btn-show', function(){
            let id = $(this).data('id');
            window.location = "{{ url(AIIASetting::getValue('admin_base_route').'/job-seekers') }}/"+id;
        });

        $('#job-seeker-table').on('click', '.btn-assign', function() {
            let id = $(this).data('id');

            swalWithBootstrapButtons.fire({
                title: 'Assign to job vacancy !',
                html: `<p class="text-left">Job Vacancy</p>
                        <div class="text-left">
                            <select class="form-control" id="select-vacancy">
                            </select>
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
                }
            }).then(function(result) {
                if ( result.value ) {
                    $('#loading').show();
                    $.ajax({
                        data: {
                            _token : "{{ csrf_token() }}",
                            job_seeker_id : id,
                        },
                        url: "{{ url(AIIASetting::getValue('admin_base_route').'/job-applications') }}/"+$('#select-vacancy').val()+"/assign",
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
    });
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