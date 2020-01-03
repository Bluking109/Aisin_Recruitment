@extends('admin.layouts.master')
@section('title', 'Roles')
@section('pages')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Roles</h1>
                    <button type="button" class="btn btn-primary btn-white-text mb-3 mt-3" id="btn-add">Add</button>
                    <div class="table-responsive">
                        <table id="roles-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Guard Name</th>
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

@include('admin.pages.roles.modal')

@endsection

@push('bottom_scripts')
<script src="{{ asset('admin/vendors/datatables/datatable.min.js') }}"></script>
<script>
    const autoCheckParent = function () {
        $('.parent-check').each(function () {
            let lenChild = $(this).data('child');
            let classRef = $(this).data('ref');
            let lenChildChecked = $('.'+classRef+':checked').length;
            if (lenChild === lenChildChecked) {
                $(this).prop('checked', true);
            }else{
                $(this).prop('checked', false);
            }

        });
    }

    const permissionInit = function () {
        $.ajax({
            url: "{{ route('admin.permissions.getandgroup') }}",
            type: "get",
            dataType: "json",
            success: function (result) {
                let data = result.data;
                let element = '';
                for ( datum in data ) {
                    element += `<div class="col-sm-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input permissions-checkbox primay-checkbox parent-check" id="${datum}" data-ref="${datum}" data-child="${data[datum].length}">
                                    <label class="custom-control-label" for="${datum}">${datum}</label>
                                </div>`;

                    data[datum].forEach((v, k) => {
                        element += `<div class="col-sm-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input primay-checkbox permissions-checkbox child-check ${datum}" id="${v.name}" value="${v.name}" name="permissions[]">
                                            <label class="custom-control-label" for="${v.name}">${v.display_name}</label>
                                        </div>
                                    </div>`;
                    })
                    element += `</div>`;
                };

                $('#permission-wrapper').append($(element))
            },
            statusCode: {
                404 : function (result) {

                }
            }
        });
    }

    $(document).ready(function() {
        permissionInit()

        $('#permission-wrapper').on('change', '.child-check', function() {
            autoCheckParent();
        });

        $('#permission-wrapper').on('change', '.parent-check', function() {
            let classRef = $(this).data('ref');
            let checkStat = $(this).prop('checked');
            if (checkStat) {
                $('.'+classRef).prop('checked', true);
            } else {
                $('.'+classRef).prop('checked', false);
            }
        });

        const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary ml-1 mr-1',
                    cancelButton: 'btn btn-danger ml-1 mr-1'
                },
                buttonsStyling: false,
            })

        let table =  $('#roles-table').DataTable( {
            responsive : true,
            processing : true,
            serverSide : true,
            ajax : "{{ route('admin.roles.index') }}",
            columns : [
                { data: null, name: 'no', orderable: false, searchable: false, render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;} },
                { data : 'name', name : 'name' },
                { data : 'display_name', name : 'display_name' },
                { data : 'guard_name', name : 'guard_name' },
                { data : 'created_at', name : 'created_at' },
                {
                    data: null,
                    className: "center",
                    render: function(data){
                        return `<div class="text-center">
                                    <button type="button" data-id="${data.id}" data-role='${JSON.stringify(data)}' class="btn btn-outline-primary btn-fw btn-update btn-sm">
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

        $('#roles-table').on('click', '.btn-delete', function(){
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
                        url: "{{ url(AIIASetting::getValue('admin_base_route').'/roles') }}/"+id,
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

        $('#roles-table').on('click', '.btn-update', function(){
            $('.permissions-checkbox').prop('checked', false);
            $('#frm-insert').find('.text-error').remove();
            let id = $(this).data('id');
            $('#frm-insert').attr('action', "{{ url(AIIASetting::getValue('admin_base_route').'/roles') }}/"+id).attr('method', 'PUT');
            $('#title-modal').text('Update Roles');
            let role = $(this).data('role');
            $('#name').val(role.name);
            $('#display_name').val(role.display_name);
            $('#guard_name').val(role.guard_name);
            $('#mdl-insert-update').modal('show');
            $('.child-check').each(function(){
                role.permissions.forEach((v, k ) => {
                    if ($(this).val() === v.name ) {
                        $(this).prop('checked', true);
                    }
                } );
            });
            autoCheckParent();
        } );

        $('#btn-add').on('click', function() {
            $('.permissions-checkbox').prop('checked', false);
            $('#frm-insert').find('.text-error').remove();
            $('#frm-insert').attr('action', "{{ route('admin.roles.store') }}").attr('method', 'POST');
            $('#title-modal').text('Add role');
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
                    },
                    422 : function (data) {
                        let response = data.responseJSON;
                        if (response.error === 'no changes') {
                            $('#mdl-insert-update').modal('hide');
                            return ;
                        }
                        let errors = response.errors
                        for (error in errors){
                            let element = $("#frm-insert").find('[name="'+error+'"]');
                            element.next('span').remove();
                            element.after('<span class="text-danger text-error">'+errors[error].join('. ')+'</span>');

                        }
                    }
                }
            });
        } );

    } );
</script>
@endpush

@push('optional_vendor_css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/datatables/datatable.min.css') }}">
@endpush