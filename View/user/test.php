<?php
$new_pass = rand(10000,100000);
$otp = rand(10000,100000);
?>



<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/auth-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Jul 2023 09:19:12 GMT -->

<head>
    <meta charSet="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title>Stroyka Admin - eCommerce Dashboard Template</title><!-- icon -->
    <link rel="icon" type="./../template/admim_t/image/png" href="./../template/admim_t/images/favicon.png" /><!-- fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href="./../template/admin_t/vendor/bootstrap/css/bootstrap.ltr.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/highlight.js/styles/github.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/simplebar/simplebar.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/quill/quill.snow.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/air-datepicker/css/datepicker.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/select2/css/select2.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/datatables/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/fullcalendar/main.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/css/style.css" />
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-8"></script>
  

</head>

<body>
    <style>
        form{
            padding-top: 150px;
        }
    </style>
<form action="index.php?act=check" method="post">
    <div class="min-h-100 p-0 p-sm-6 d-flex align-items-stretch">
        <div class="card w-25x flex-grow-1 flex-sm-grow-0 m-sm-auto">
            <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                <h1 class="mb-0 fs-3">Quên mật khẩu</h1>
                <div class="fs-exact-14 text-muted mt-2 pt-1 mb-5 pb-2"></div>
                <div class="mb-4"><label class="form-label">Email của bạn</label><input placeholder="Email dùng để đăng ký tài khoản"
                 type="email" required name="email" value=""  class="form-control form-control-lg" /></div>
                        <input hidden type="number" name="new_pass" value="<?=$new_pass?>">
                <div><button type="submit" class="btn btn-primary btn-lg w-100">Đổi Mật Khẩu</button></div>
                <div class="form-group mb-0 mt-4 pt-2 text-center text-muted">Tôi đã có tài khoản và <a
                        href="index.php?act=dangnhap">Đăng Nhập</a></div>
            </div>
        </div>
</form>
    </div><!-- scripts -->
    <script src="./../t/admin_t/vendor/jquery/jquery.min.js"></script>
    <script src="./../t/admin_t/vendor/feather-icons/feather.min.js"></script>
    <script src="./../t/admin_t/vendor/simplebar/simplebar.min.js"></script>
    <script src="./../t/admin_t/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./../t/admin_t/vendor/highlight.js/highlight.pack.js"></script>
    <script src="./../t/admin_t/vendor/quill/quill.min.js"></script>
    <script src="./../t/admin_t/vendor/air-datepicker/js/datepicker.min.js"></script>
    <script src="./../t/admin_t/vendor/air-datepicker/js/i18n/datepicker.en.js"></script>
    <script src="./../t/admin_t/vendor/select2/js/select2.min.js"></script>
    <script src="./../t/admin_t/vendor/fontawesome/js/all.min.js" data-auto-replace-svg="" async=""></script>
    <script src="./../t/admin_t/vendor/chart.js/chart.min.js"></script>
    <script src="./../t/admin_t/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./../t/admin_t/vendor/datatables/js/dataTables.bootstrap5.min.js"></script>
    <script src="./../t/admin_t/vendor/nouislider/nouislider.min.js"></script>
    <script src="./../t/admin_t/vendor/fullcalendar/main.min.js"></script>
    <script src="./../t/admin_t/js/stroyka.js"></script>
    <script src="./../t/admin_t/js/custom.js"></script>
    <script src="./../t/admin_t/js/calendar.js"></script>
    <script src="./../t/admin_t/js/demo.js"></script>
    <script src="./../t/admin_t/js/demo-chart-js.js"></script>
</body>
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/auth-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Jul 2023 09:19:12 GMT -->

</html>