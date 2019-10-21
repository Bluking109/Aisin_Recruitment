@extends('admin.layouts.master')
@section('title', 'About Us')
@section('pages')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Job Seekers @if(request()->query('blacklist')) (Blacklist) @endif</h1>
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
            ajax : @if(request()->query('blacklist')) "{{ route('admin.job-seekers.index', ['blacklist' => 1]) }}" @else "{{ route('admin.job-seekers.index') }}" @endif,
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
                        @if (request()->query('blacklist'))
                        let btnBlackList = `<button type="button" data-id="${data.id}" class="btn btn-outline-success btn-fw btn-unblacklist btn-sm" data-toggle="tooltip" title="Unblacklist">
                            <i class="mdi mdi-account"></i>
                        </button>`;
                        @else
                        let btnBlackList = `<button type="button" data-id="${data.id}" class="btn btn-outline-warning btn-fw btn-blacklist btn-sm" data-toggle="tooltip" title="Blacklist">
                            <i class="mdi mdi-account-off"></i>
                        </button>`;
                        @endif
                        return `<div class="text-center">
                                    <button type="button" data-id="${data.id}" data-about='${JSON.stringify(data)}' class="btn btn-outline-primary btn-fw btn-show btn-sm" data-toggle="tooltip" title="Detail">
                                        <i class="mdi mdi-eye"></i>
                                    </button>
                                    ${btnBlackList}
                                    <button type="button" data-id="${data.id}" class="btn btn-outline-danger btn-fw btn-delete btn-sm" data-toggle="tooltip" title="Delete">
                                        <i class="mdi mdi-delete-forever"></i>
                                    </button>
                                    <button type="button" data-id="${data.id}" class="btn btn-outline-success btn-fw btn-print btn-sm" data-toggle="tooltip" title="Print Data">
                                        <i class="mdi mdi-printer"></i>
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

        $('#job-seeker-table').on('click', '.btn-unblacklist', function(){
            let id = $(this).data('id');

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "This data will be entered into the whitelist!",
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
                        url: "{{ url(AIIASetting::getValue('admin_base_route').'/job-seekers') }}/"+id+"/unblack-list",
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
                } else if ( result.dismiss === Swal.DismissReason.cancel ) {
                }
            })
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

        $('#job-seeker-table').on('click', '.btn-show', function(){
            let id = $(this).data('id');
            window.location = "{{ url(AIIASetting::getValue('admin_base_route').'/job-seekers') }}/"+id;
        });

    } );
</script>
@endpush

@push('optional_vendor_css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/datatables/datatable.min.css') }}">
@endpush