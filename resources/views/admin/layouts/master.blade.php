<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Recruitment - @yield('title')</title>
        <!-- base:css -->
        <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css') }}">
        @stack('optional_vendor_css')
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400|Quicksand:700">
        <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('website/css/style.css') }}" />
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico') }}" />
    </head>
    <body>
        <div class="loading" id="loading">
            <img src="{{ asset('admin/images/loading.gif') }}" alt="placeholder+image">
        </div>
        <div class="home" id="home">
            <!-- partial:partials/_horizontal-navbar.html -->
                 {{-- @include('admin.includes.responsiveheader') --}}
                @include('admin.includes.header')
                {{-- @include('admin.includes.navbar') --}}

            <!-- partial -->
            <div class="container-fluid page-body-wrapper" style="padding-top: 110px;">
                <div class="main-panel">
                    @yield('pages')
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    @include('admin.includes.footer')
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
      <!-- container-scroller -->
      <!-- base:js -->
      <script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}"></script>
      <!-- endinject -->
      <!-- Plugin js for this page-->
      <!-- End plugin js for this page-->
      <!-- inject:js -->
      <script src="{{ asset('admin/js/template.js') }}"></script>
      <script src="{{ asset('admin/vendors/sweet-alert/sweetalert2.all.min.js') }}"></script>
      <!-- endinject -->
      <!-- js for this page -->
      @stack('bottom_scripts')
    </body>
</html>
