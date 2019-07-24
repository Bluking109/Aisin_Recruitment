<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Recruitment - @yield('title')</title>
        <!-- base:css -->
        <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/base/vendor.bundle.base.css') }}">
        @stack('optional_vendor_css')
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    </head>
    <body>
        <div class="container-scroller">
            <!-- partial:partials/_horizontal-navbar.html -->
            <div class="horizontal-menu">
                @include('admin.includes.header')
                @include('admin.includes.navbar')
            </div>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
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
      <script src="{{ asset('vendors/base/vendor.bundle.base.js') }}"></script>
      <!-- endinject -->
      <!-- Plugin js for this page-->
      <!-- End plugin js for this page-->
      <!-- inject:js -->
      <script src="{{ asset('js/template.js') }}"></script>
      <!-- endinject -->
      <!-- js for this page -->
      @stack('bottom_scripts')
    </body>
</html>