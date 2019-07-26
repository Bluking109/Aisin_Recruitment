@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('pages')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Users</h1>
                    <button type="button" class="btn btn-success btn-white-text mb-3 mt-3" id="btn-add">Add</button>
                    <div class="table-responsive">
                        <table id="users-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
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

@include('admin.pages.users.modal')

@endsection

@push('bottom_scripts')
<script src="{{ asset('vendors/datatables/datatable.min.js') }}"></script>
<script>
    $(document).ready(function() {
        const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary ml-1 mr-1',
                    cancelButton: 'btn btn-danger ml-1 mr-1'
                },
                buttonsStyling: false,
            })

        let table =  $('#users-table').DataTable( {
            responsive : true,
            processing : true,
            serverSide : true,
            ajax : "{{ route('admin.users.index') }}",
            columns : [
                { data: null, name: 'no', orderable: false, searchable: false, render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;} },
                { data : 'name', name : 'name' },
                { data : 'email', name : 'email' },
                { data : 'created_at', name : 'created_at' },
                {
                    data: null,
                    className: "center",
                    render: function(data){
                        return `<div class="text-center">
                                    <button type="button" data-id="${data.id}" data-user='${JSON.stringify(data)}' class="btn btn-outline-info btn-fw btn-update btn-sm">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </button>
                                    <button type="button" data-id="${data.id}" class="btn btn-outline-danger btn-fw btn-delete btn-sm">
                                        <i class="mdi mdi-delete-forever"></i>
                                    </button>
                                </div>`
                    }
                }
            ]
        });

        $('#users-table').on('click', '.btn-delete', function(){
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
                        url: "{{ url(AIIASetting::getValue('admin_base_route').'/users') }}/"+id,
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
                            404 : function (data) {
                                swalWithBootstrapButtons.fire(
                                    'Cancelled',
                                    'Error Cuk, Id ra nemu',
                                    'error'
                                )
                            }
                        }
                    });
                } else if ( result.dismiss === Swal.DismissReason.cancel ) {
                }
            })
        });

        $('#users-table').on('click', '.btn-update', function(){
            let id = $(this).data('id');
            $('#frm-insert').attr('action', "{{ url(AIIASetting::getValue('admin_base_route').'/users') }}/"+id).attr('method', 'PUT');
            $('#title-modal').text('Update User');
            let user = $(this).data('user');
            $('#name').val(user.name);
            $('#email').val(user.email);
            $('#mdl-insert-update').modal('show');
        } );

        $('#btn-add').on('click', function() {
            $('#frm-insert').attr('action', "{{ route('admin.users.store') }}").attr('method', 'POST');
            $('#title-modal').text('Add User');
            $('#frm-insert')[0].reset();
            $('#mdl-insert-update').modal('show');
        });

        // DRY : Don't repeat yourself
        $("#frm-insert").submit(function(e){
            e.preventDefault()
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: "json",
                success: function (data) {
                    $('#mdl-insert-update').modal('hide');
                    swalWithBootstrapButtons.fire(
                        data.title,
                        data.message,
                        'success'
                    )
                    table.ajax.reload()
                },
                statusCode: {
                    404 : function (data) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Error, data not found',
                            'error'
                        )
                    }
                }
            });
        } );

    } );
</script>
@endpush

@push('optional_vendor_css')
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/datatable.min.css') }}">
@endpush