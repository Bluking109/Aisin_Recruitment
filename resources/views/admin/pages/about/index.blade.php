@extends('admin.layouts.master')
@section('title', 'About Us')
@section('pages')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">About</h1>
                    @can('store_about')
                    <button type="button" class="btn btn-primary btn-white-text mb-3 mt-3" id="btn-add">Add</button>
                    @endcan
                    <div class="table-responsive">
                        <table id="about-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Images</th>
                                    <th>Status</th>
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
<script src="{{ asset('admin/vendors/ckeditor/ckeditor.js') }}"></script>
<script>
    const initCKEditor = function() {
        CKEDITOR.replace('content');
    }

    $(document).ready(function() {
        initCKEditor();

        const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary ml-1 mr-1',
                    cancelButton: 'btn btn-danger ml-1 mr-1'
                },
                buttonsStyling: false,
            })

        let table =  $('#about-table').DataTable( {
            responsive : true,
            processing : true,
            serverSide : true,
            ajax : "{{ route('admin.about-us.index') }}",
            columns : [
                { data: null, name: 'no', orderable: false, searchable: false, render: function (data, type, row, meta) {
                 return meta.row + meta.AIIASettings._iDisplayStart + 1;} },
                { data : 'title', name : 'title' },
                {
                    data : null,
                    orderable : false,
                    searchable : false,
                    render : function(data) {
                        let images = data.images;
                        let element = `<div class="text-center">`;

                        images.forEach(v => {
                            element += `<img src="/storage/pages/${v}" class="img-fluid">&nbsp;`;
                        });

                        element += `<div>`;

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
                    data: null,
                    className: "center",
                    orderable: false,
                    searchable: false,
                    render: function(data){
                        return `<div class="text-center">
                                    <button type="button" data-id="${data.id}" data-about='${JSON.stringify(data)}' class="btn btn-outline-primary btn-fw btn-update btn-sm">
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

        $('#about-table').on('click', '.btn-delete', function(){
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
                        url: "{{ url(AIIASetting::getValue('admin_base_route').'/about-us') }}/"+id,
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

        $('#about-table').on('click', '.btn-update', function(){
            $('#frm-insert').find('.text-error').remove();
            $('#frm-insert')[0].reset();
            let id = $(this).data('id');

            $('#frm-insert').attr('action', "{{ url(AIIASetting::getValue('admin_base_route').'/about-us') }}/"+id).attr('method', 'POST');
            $('#frm-insert').append('<input name="_method" type="hidden" value="PUT">');
            $('#title-modal').html("Update <i>'About'</i>");
            let about = $(this).data('about');
            $('#title').val(about.title);
            CKEDITOR.instances['content'].setData(about.content);
            if (about.is_active == '1') {
                $('#radioActive').prop('checked', true);
                $('#radioInactive').prop('checked', false);
            } else {
                $('#radioActive').prop('checked', false);
                $('#radioInactive').prop('checked', true);
            }
            $('#mdl-insert-update').modal('show');
        } );

        $('#btn-add').on('click', function() {
            $('#frm-insert').find('.text-error').remove();
            $('#frm-insert').find('option').remove();
            $('#frm-insert').attr('action', "{{ route('admin.about-us.store') }}").attr('method', 'POST');
            $('#title-modal').html("Add <i>'About'</i>");
            $('#frm-insert')[0].reset();
            CKEDITOR.instances['content'].setData('');
            $('#mdl-insert-update').modal('show');
        });

        // DRY : Don't repeat yourself
        $("#frm-insert").submit(function(e){
            e.preventDefault()
            let formData = new FormData($(this)[0]);
            formData.append('content', CKEDITOR.instances.content.getData());

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