@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('pages')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-sm-center">
                        <div class="col-sm-8 col-md-6">
                            <h3 class="card-title text-center">Setting</h3>
                            <br>
                            <form action="{{ route('admin.settings.store') }}" method="post" id="form-setting">
                                {{-- Jangan menggunakan ajax karena mengubah base uri admin --}}
                                @csrf
                                <div id="item-wrapper">

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="button" class="btn btn-primary" id="btn-save">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('bottom_scripts')
<script>
    const settingInit = function () {
        $.ajax({
            url: "{{ route('admin.settings.index') }}",
            type: 'GET',
            success: function(result) {
                let data = result.data;

                let elem = '';

                data.forEach(function(v, i) {
                    let action = '';

                    if (v.type === 'boolean') {

                        let checked = '';

                        if (v.value == '1') {
                            checked = 'checked';
                        }

                        action = `<label class="toggle-switch toggle-switch-info">
                                    <input type="checkbox" name="settings[${i}][value]" value="1" ${checked}>
                                    <span class="toggle-slider round"></span>
                                </label>`;
                    } else if (v.type === 'text') {
                        action = `<input type="text" class="form-control" value="${v.value}" name="settings[${i}][value]" placeholder="Value">`
                    }

                    elem += `<div class="row">
                                <div class="col-sm-7">
                                    <h5><strong>${v.display_name}</strong></h5>
                                    <small>${v.description}</small>
                                </div>
                                <div class="col-sm-5 text-center">
                                    <input type="hidden" value="${v.id}" name="settings[${i}][id]">
                                    ${action}
                                </div>
                            </div>
                            <hr>`;
                });

                $('#item-wrapper').empty().append(elem);
            },
            statusCode : {
                500 : function(responseObject) {
                    console.log('Error bro !!')
                }
            }
        });
    }

    $(document).ready(function() {
        @if(session()->has('message'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })

        Toast.fire({
            type: 'success',
            title: "{{ session()->get('message') }}"
        })
        @endif

        settingInit();

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary ml-1 mr-1',
                cancelButton: 'btn btn-danger ml-1 mr-1'
            },
            buttonsStyling: false,
        });

        $('#btn-save').on('click', function(e) {
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: 'You will change the settings of this application',
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if ( result.value ) {
                    $('#form-setting').submit();
                }
            });
        });
    });
</script>
@endpush