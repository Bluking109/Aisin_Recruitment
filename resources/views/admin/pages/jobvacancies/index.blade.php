@extends('admin.layouts.master')
@section('title', 'Job Vacancies')
@push('optional_vendor_css')
<link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
@section('pages')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Job Vacancies</h1>
                    <button type="button" class="btn btn-primary btn-white-text mb-3 mt-3" id="btn-add">Add</button>
                    <div class="table-responsive">
                        <table id="jobvacancies-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Position</th>
                                    <th>Education Level</th>
                                    <th>Open Date</th>
                                    <th>Close Date</th>
                                    <th>Gender</th>
                                    <th>Min GPA</th>
                                    <th>Description</th>
                                    <th>Requirements</th>
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

@include('admin.pages.jobvacancies.modal')

@endsection

@push('bottom_scripts')

<script src="{{ asset('vendors/datatables/datatable.min.js') }}"></script>
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary ml-1 mr-1',
                    cancelButton: 'btn btn-danger ml-1 mr-1'
                },
                buttonsStyling: false,
            })

        let table =  $('#jobvacancies-table').DataTable( {
            responsive : true,
            processing : true,
            serverSide : true,
            ajax : "{{ route('admin.jobvacancies.index') }}",
            columns : [
                { data: null, name: 'no', orderable: false, searchable: false, render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;} },
                { data : 'position.name', name : 'position.name' },
                { data : 'education_level.name', name : 'education_level.name' },
                { data : 'open_date', name : 'open_date' },
                { data : 'close_date', name : 'close_date' },
                { data : 'gender', name : 'gender' },
                { data : 'min_gpa', name : 'min_gpa' },
                { data : 'descriptions', name : 'description' },
                { data : 'requirements', name : 'requirements' },
                { data : 'created_at', name : 'created_at' },
                {
                    data: null,
                    className: "center",
                    orderable: false,
                    searchable: false,
                    render: function(data){
                        return `<div class="text-center">
                                    <button type="button" data-id="${data.id}" data-jobvacancy='${JSON.stringify(data)}' class="btn btn-outline-primary btn-fw btn-update btn-sm">
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

        $('#jobvacancies-table').on('click', '.btn-delete', function(){
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
                        url: "{{ url(AIIASetting::getValue('admin_base_route').'/jobvacancies') }}/"+id,
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

        $('#jobvacancies-table').on('click', '.btn-update', function(){
            $('#frm-insert').find('.text-error').remove();
            let id = $(this).data('id');
            $('#frm-insert').attr('action', "{{ url(AIIASetting::getValue('admin_base_route').'/jobvacancies') }}/"+id).attr('method', 'PUT');
            $('#title-modal').text('Update Section');
            let jobvacancies = $(this).data('section');
            $('#code').val(jobvacancies.code);
            $('#name').val(jobvacancies.name);
            $('#pic').val(jobvacancies.pic);
            $('#pic_email').val(jobvacancies.pic_email);
            $('#department_id').append('<option value="'+jobvacancies.department.id+'" selected="selected">'+jobvacancies.department.name+'</option>');
            $('#mdl-insert-update').modal('show');
        } );

        $('#btn-add').on('click', function() {
            $('#frm-insert').find('.text-error').remove();
            $('#frm-insert').find('option').remove();
            $('#frm-insert').attr('action', "{{ route('admin.jobvacancies.store') }}").attr('method', 'POST');
            $('#title-modal').text('Add Section');
            $('#frm-insert')[0].reset();
            $('#mdl-insert-update').modal('show');
        });

        $('.department-ajax').select2({
            placeholder: 'Select Department',
            minimumInputLength: 2,
            width: 'resolve',
            ajax: {
                url: "{{ route('admin.departments.getdepartments') }}",
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
                            element.closest('.input-wrapper').find('span.text-error').remove();
                            element.closest('.input-wrapper').append('<span class="text-danger text-error">'+errors[error].join('. ')+'</span>');

                        }
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