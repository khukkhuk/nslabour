<!DOCTYPE html>
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

</head>

<body class="c-app flex-row align-items-center">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <div class="text-center"><img src="backend/images/logo.png"></div>
                            <form action="" method="post">
                                @csrf
                                <h1>เข้าสู่ระบบ</h1>
                                <p class="text-muted">กรอกข้อมูลเพื่อเข้าสู่ระบบ</p>
                                @if (Session('error'))
                                    <div class="alert alert-danger">
                                        {{ Session('error') }}
                                    </div>
                                @endif
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span></div>
                                    <input class="form-control" type="text" name="username" placeholder="ชื่อผู้ใช้งาน">
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-lock"></i></span></div>
                                    <input class="form-control" type="password" name="password" placeholder="รหัสผ่าน">
                                </div>
                                <div class="form-group">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" type="submit">ยืนยัน</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="backend/libs/jquery/jquery.min.js"></script>
    <script src="backend/libs/bootstrap/bootstrap.min.js"></script>
    <script src="backend/libs/metismenu/metismenu.min.js"></script>
    <script src="backend/libs/simplebar/simplebar.min.js"></script>
    <script src="backend/libs/node-waves/node-waves.min.js"></script>

    <!-- Plugins DataTables js -->
    <script src="backend/libs/datatables/datatables.min.js"></script>
    <script src="backend/libs/jszip/jszip.min.js"></script>
    <script src="backend/libs/pdfmake/pdfmake.min.js"></script>

    <!-- Magnific Popup -->
    <script src="backend/libs/toastr/toastr.min.js"></script>

    <!-- App js -->
    <script src="backend/js/app.min.js"></script>

</body>

</html>
