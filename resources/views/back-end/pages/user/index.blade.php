<!doctype html>
<html lang="en">
<head>
    <base href="{{ url('') }}">
    <meta charset="utf-8" />
    <title> Skote - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="backend/images/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="backend/css/bootstrap-dark.min.css" id="bootstrap-dark" rel="stylesheet" type="text/css" />
    <link href="backend/css/bootstrap.min.css" id="bootstrap-light" rel="stylesheet" type="text/css" />
    <link href="backend/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="backend/css/app-rtl.min.css" id="app-rtl" rel="stylesheet" type="text/css" />
    <link href="backend/css/app-dark.min.css" id="app-dark" rel="stylesheet" type="text/css" />
    <link href="backend/css/app.min.css" id="app-light" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="backend/libs/datatables/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="backend/libs/toastr/toastr.min.css">
    <link href="backend/css/custom.css" id="app-light" rel="stylesheet" type="text/css" />
    @if(@$css)
        @foreach($css as $css)
            <link href="{{$css}}" rel="stylesheet">
        @endforeach
    @endif
</head>
<body data-sidebar="dark">
    <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div>
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include("$prefix.layout.header")
        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <!--- Sidemenu -->
                @include("$prefix.layout.menu")
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @include("$prefix.pages.$folder.page-$page")
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include("$prefix.layout.footer")
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    <!-- Right Sidebar -->
    @include("$prefix.layout.right-sidebar")
    <!-- END Right Sidebar -->
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <!-- JAVASCRIPT -->
    <script src="backend/libs/jquery/jquery.min.js"></script>
    <script src="backend/libs/bootstrap/bootstrap.min.js"></script>
    <script src="backend/libs/metismenu/metismenu.min.js"></script>
    <script src="backend/libs/simplebar/simplebar.min.js"></script>
    <script src="backend/libs/node-waves/node-waves.min.js"></script>
    <script type="text/javascript">$(function() { $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}}); });</script>

    <!-- Plugins DataTables js -->
    <script src="backend/libs/datatables/datatables.min.js"></script>
    <script src="backend/libs/jszip/jszip.min.js"></script>
    <script src="backend/libs/pdfmake/pdfmake.min.js"></script>
    <!-- Magnific Popup -->
    <script src="backend/libs/toastr/toastr.min.js"></script>
    <!-- App js -->
    <script src="backend/js/app.min.js"></script>
    <!-- Script Others -->
    @if(@$js)
    @foreach($js as $key => $val)
    <script @foreach($js[$key] as $k => $v){{$k}}="{{$v}}" @endforeach ></script>
    @endforeach
    @endif
</body>
</html>
