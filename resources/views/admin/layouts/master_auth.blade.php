<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AISIN - Recruitment</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="brand-logo">
                                <img src="{{ asset('website/images/logo/satu-aisin-final.png') }}">

                            </div>
                            <h4>{{ $title ?? 'Welcome back!' }}</h4>
                            <h6 class="font-weight-light">{{ $subtitle ?? 'Happy to see you again!' }}</h6>
                            <form class="pt-3" method="POST" action="{{ $url }}">
                                @csrf
                                @yield('pages')
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                      <p class="text-white font-weight-medium text-center flex-grow align-self-end"></p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!--Modal Insert-->
    <div id="modal-reset" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mdl-reset-password" aria-hidden="true" id="mdl-insert-update">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><span id="title-modal">Ganti Password</span></h4>
                        <form class="forms-sample" id="frm-reset-password" action="{{ route('admin.password.email') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email-reset" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary btn-white-text" id="add-new-btn">Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Insert-->
    <!-- base:js -->
    <script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/vendors/sweet-alert/sweetalert2.all.min.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('admin/js/template.js') }}"></script>
    <script>
        $(function() {
            $('#frm-reset-password').on('submit', function(e) {
                e.preventDefault();
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-primary ml-1 mr-1',
                        cancelButton: 'btn btn-danger ml-1 mr-1'
                    },
                    buttonsStyling: false,
                })

                $.ajax({
                    data: $(this).serialize(),
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    dataType: "json",
                    success: function (data) {
                        swalWithBootstrapButtons.fire(
                            'Success',
                            data.message,
                            'success'
                        )

                        $('#email-reset').val('');
                        $('#email-reset-error').remove();
                        $('#modal-reset').modal('hide');
                    },
                    statusCode: {
                        422 : function (data) {
                            $('#email-reset-error').remove();
                            $('#email-reset').after(`<span class="text-danger" id="email-reset-error">${data.responseJSON.message}</span>`)
                        }
                    }
                });
            })
        });
    </script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>
