@extends('admin.layouts.master')
@section('title', 'Job Vacancies')
@section('pages')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Job Vacancies</h1>
                        <a href="{{ route('admin.job-vacancies.create') }}" class="btn btn-primary btn-white-text mb-3 mt-3"
                            id="btn-add">Add</a>
                        <div class="table-responsive">
                            <table id="job-vacancies-table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Position</th>
                                        <th>Section</th>
                                        <th>Education Level</th>
                                        <th>Open Date</th>
                                        <th>Close Date</th>
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
@endsection

@push('bottom_scripts')
    <script src="{{ asset('admin/vendors/datatables/datatable.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            @if (session('success'))
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })

                Toast.fire({
                    type: 'success',
                    title: "{{ session('message') }}"
                })
            @endif

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary ml-1 mr-1',
                    cancelButton: 'btn btn-danger ml-1 mr-1'
                },
                buttonsStyling: false,
            })

            let table = $('#job-vacancies-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.job-vacancies.index') }}",
                columns: [{
                        data: null,
                        name: 'no',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.start + 1;
                        }
                    },
                    {
                        data: 'position.name',
                        name: 'position.name'
                    },
                    {
                        data: 'section.name',
                        name: 'section.name'
                    },
                    {
                        data: 'education_level.name',
                        name: 'education_level.name'
                    },
                    {
                        data: 'open_date',
                        name: 'open_date'
                    },
                    {
                        data: 'close_date',
                        name: 'close_date'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: null,
                        className: "center",
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            let urlUpdate =
                                "{{ url(AIIASetting::getValue('admin_base_route') . '/job-vacancies') }}/";

                            return `<div class="text-center">
                                    <a href="${urlUpdate + data.id + '/edit'}" class="btn btn-outline-primary btn-fw btn-update btn-sm">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </a>
                                    <button type="button" data-id="${data.id}" class="btn btn-outline-danger btn-fw btn-delete btn-sm">
                                        <i class="mdi mdi-delete-forever"></i>
                                    </button>
                                </div>`
                        }
                    }
                ]
            });

            $('#job-vacancies-table').on('click', '.btn-delete', function() {
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
                    if (result.value) {
                        $.ajax({
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            url: "{{ url(AIIASetting::getValue('admin_base_route') . '/job-vacancies') }}/" +
                                id,
                            type: "delete",
                            dataType: "json",
                            success: function(data) {
                                swalWithBootstrapButtons.fire(
                                    data.title,
                                    data.message,
                                    'success'
                                )
                                table.ajax.reload()
                            },
                            statusCode: {
                                404: function(data) {
                                    swalWithBootstrapButtons.fire(
                                        'Cancelled',
                                        'Error, Id Not Found',
                                        'error'
                                    )
                                }
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {}
                })
            });
        });
    </script>
@endpush

@push('optional_vendor_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/datatables/datatable.min.css') }}">
@endpush
