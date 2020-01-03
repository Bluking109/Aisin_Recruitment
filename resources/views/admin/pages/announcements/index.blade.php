@extends('admin.layouts.master')
@section('title', 'Announcement')
@section('pages')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Announcement</h1>
                    @can('store_announcement')
                    <button type="button" class="btn btn-primary btn-white-text mb-3 mt-3" id="btn-add">Add</button>
                    @endcan
                    <div class="table-responsive">
                        <table id="announcement-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Banner</th>
                                    <th>Status</th>
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

@include('admin.pages.announcements.modal')

@endsection

@push('bottom_scripts')

<script src="{{ asset('admin/vendors/datatables/datatable.min.js') }}"></script>
<script>
    $(document).ready(function() {

        const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary ml-1 mr-1',
                    cancelButton: 'btn btn-danger ml-1 mr-1'
                },
                buttonsStyling: false,
            })

        let table =  $('#announcement-table').DataTable( {
            responsive : true,
            processing : true,
            serverSide : true,
            ajax : "{{ route('admin.announcements.index') }}",
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
                        let image = data.banner;
                        element = `<img src="/storage/pages/${image}" class="img-fluid">&nbsp;`;
                        return element;
                    }
                },
                {
                    data : null,
                    orderable : false,
                    searchable : false,
                    render : function(data) {
                        let label = '';
                        if (data.is_active == '1') {
                            label = `<span class="badge badge-success">Active</span>`;
                        } else {
                            label = `<span class="badge badge-danger">Inactive</span>`;
                        }

                        return label;
                    }
                },
                {
                    data : 'created_at',
                    name : 'created_at'
                },
                {
                    data: null,
                    className: "center",
                    orderable: false,
                    searchable: false,
                    render: function(data){
                        return `<div class="text-center">
                                    <button type="button" data-id="${data.id}" data-announcement='${JSON.stringify(data)}' class="btn btn-outline-primary btn-fw btn-update btn-sm">
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

        $('#announcement-table').on('click', '.btn-delete', function(){
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
                        url: "{{ url(AIIASetting::getValue('admin_base_route').'/announcements') }}/"+id,
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

        $('#announcement-table').on('click', '.btn-update', function(){
            $('#frm-insert').find('.text-error').remove();
            $('#frm-insert')[0].reset();
            let id = $(this).data('id');

            $('#frm-insert').attr('action', "{{ url(AIIASetting::getValue('admin_base_route').'/announcements') }}/"+id).attr('method', 'POST');
            $('#frm-insert').append('<input name="_method" type="hidden" id="method-field" value="PUT">');
            $('#title-modal').html("Update <i>'Announcement'</i>");
            let announcement = $(this).data('announcement');
            if (announcement.is_active == '1') {
                $('#radioActive').prop('checked', true);
                $('#radioInactive').prop('checked', false);
            } else {
                $('#radioActive').prop('checked', false);
                $('#radioInactive').prop('checked', true);
            }

            $('#mdl-insert-update').modal('show');
        });

        $('#btn-add').on('click', function() {
            $('#frm-insert').find('.text-error').remove();
            $('#method-field').remove();
            $('#frm-insert').attr('action', "{{ route('admin.announcements.store') }}").attr('method', 'POST');
            $('#title-modal').html("Add <i>'Announcement'</i>");
            $('#frm-insert')[0].reset();
            $('#mdl-insert-update').modal('show');
        });

        // DRY : Don't repeat yourself
        $("#frm-insert").submit(function(e){
            e.preventDefault()
            let formData = new FormData($(this)[0]);

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
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
                            let errorSplt = error.split('.');

                            let elemName = errorSplt[0];

                            if (errorSplt.length > 1) {
                                elemName += '[]';
                            }

                            let element = $("#frm-insert").find('[name="'+elemName+'"]');
                            element.closest('.input-wrapper').find('span.text-error').remove();
                            element.closest('.input-wrapper').append('<span class="text-danger text-error">'+errors[error].join(' ')+'</span>');

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