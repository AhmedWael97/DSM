<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
    data-theme="theme-default" data-assets-path="{{url('/')}}/" data-template="vertical-menu-template">


<!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Oct 2023 20:30:58 GMT -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('page-title')</title>



    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{url('/')}}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{url('/')}}/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{url('/')}}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{url('/')}}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{url('/')}}/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{url('/')}}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{url('/')}}/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{url('/')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{url('/')}}/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{url('/')}}/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="{{url('/')}}/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="{{url('/')}}/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="{{url('/')}}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="{{url('/')}}/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" >

    @yield('css')
    <!-- Helpers -->
    <script src="{{url('/')}}/vendor/js/helpers.js"></script>
    <script src="{{url('/')}}/js/config.js"></script>

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            @include('admin.partial.sidemenu')


            <!-- Layout container -->
            <div class="layout-page">
                @include('admin.partial.navbar')
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                        @include('admin.partial.footer')
                        <div class="content-backdrop fade"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>


        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{url('/')}}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{url('/')}}/vendor/libs/popper/popper.js"></script>
    <script src="{{url('/')}}/vendor/js/bootstrap.js"></script>
    <script src="{{url('/')}}/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{url('/')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{url('/')}}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{url('/')}}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{url('/')}}/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{url('/')}}/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{url('/')}}/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="{{url('/')}}/vendor/libs/swiper/swiper.js"></script>
    <script src="{{url('/')}}/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
    <!-- Main JS -->
    <script src="{{url('/')}}/js/main.js"></script>


    @yield('script')
</body>

</html>
