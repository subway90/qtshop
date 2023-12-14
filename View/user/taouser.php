<?php
if(isset($_REQUEST['success']))
{
    $_SESSION['alert'] = '
    <div class="alert alert-success text-center d-flex justify-content-center direction-column" role="alert">
        <span class="h5">Đăng kí tài khoản thành công</span><br>
    </div>
    ';
    $bool_display = "none";
}else
{
    $_SESSION['alert'] = "";
}
    include "./../Model/xl_user.php";
    $username = "";
    $password = "";
    $password_confirm = "";
    $fullname = "";
    $email = "";
    $phone = 0;
    $address = "";
    $position = "";
    $test_user = "";
    $valid_up_name = "";
    $_SESSION['valid_up_name'] = "";
    $valid_up_phone = "";
    $_SESSION['valid_up_phone'] = "";
    $valid_up_email = "";
    $_SESSION['valid_up_email'] = "";
    $valid_up_address = "";
    $_SESSION['valid_up_address'] = "";
    $valid_up_user = "";
    $_SESSION['valid_up_user'] = "";
    $valid_up_password = "";
    $_SESSION['valid_up_password'] = "";
    $valid_up_password_confirm = "";
    $_SESSION['valid_up_password_confirm'] = "";
    $verify_valid_sign_up = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST")
        {   
            //họ tên
            if(!empty($_POST["fullname"]))
            {
                $verify_valid_sign_up ++;
                $fullname = str_replace(["'","@","!",";"], '', $_POST["fullname"]);
                $valid_up_name = "is-valid";
            }else
            {
                $valid_up_name = "is-invalid";
                $_SESSION['valid_up_name'] = "Vui lòng nhập họ và tên";
            }
            //sđt
            if(!empty($_POST["phone"]))
            {
                $verify_valid_sign_up ++;
                $phone = $_POST["phone"];
                if($phone > 99999999)
                {
                    $valid_up_phone = "is-valid";
                }else
                {
                    $valid_up_phone = "is-invalid";
                    $_SESSION['valid_up_phone'] = "Số điện thoại không hợp lệ";
                }
            }else
            {
                $valid_up_phone = "is-invalid";
                $_SESSION['valid_up_phone'] = "Vui lòng nhập số điện thoại";
            }
            //email
            if(!empty($_POST["email"]))
            {
                $email = str_replace("'", '', $_POST["email"]);
                $CheckMail = check_email($email);
                if(empty($CheckMail))
                {
                    $verify_valid_sign_up ++;
                    $valid_up_email = "is-valid";
                }else
                {
                    $valid_up_email = "is-invalid";
                    $_SESSION['valid_up_email'] = "Địa chỉ Email này đã được đăng kí";
                }
                
            }else
            {
                $valid_up_email = "is-invalid";
                $_SESSION['valid_up_email'] = "Vui lòng nhập địa chỉ E-mail";
            }
            //địa chỉ
            if(!empty($_POST["address"]))
            {
                $verify_valid_sign_up ++;
                $address = str_replace("'", '', $_POST["address"]);
                $valid_up_address = "is-valid";
            }else
            {
                $valid_up_address = "is-invalid";
                $_SESSION['valid_up_address'] = "Vui lòng nhập địa chỉ nơi ở";
            }
            //user
            if(!empty($_POST["username"]))
            {
                $username = str_replace([" ", "'",";","!",",","."], '', $_POST["username"]);
                $CheckUser = check_user($username);
                if(empty($CheckUser))
                {
                    $verify_valid_sign_up ++;
                    $valid_up_user = "is-valid";
                }else
                {
                    $valid_up_user = "is-invalid";
                    $_SESSION['valid_up_user'] = "Tài khoản này đã tồn tại !";
                }
                
            }else
            {
                $valid_up_user = "is-invalid";
                $_SESSION['valid_up_user'] = "Vui lòng nhập thông tin tài khoản đăng nhập";
            }
            //pass
            if(!empty($_POST["password"]))
            {
                $password = str_replace("'", '', $_POST["password"]);
                $length_password = strlen($password);
                    if($length_password >= 8)
                    {
                        $start_password = substr($_POST["password"],0,1);
                        if($start_password == strtoupper($start_password))
                        {
                            $verify_valid_sign_up ++;
                            $valid_up_password = "is-valid";
                            //pass confirm
                                if(!empty($_POST["password-confirm"]))
                                {
                                    $password_confirm = str_replace("'", '', $_POST["password-confirm"]);
                                        if($password_confirm == $password)
                                        {
                                            $verify_valid_sign_up ++;
                                            $valid_up_password_confirm = "is-valid";
                                        }else
                                        {
                                            $valid_up_password_confirm = "is-invalid";
                                            $_SESSION['valid_up_password_confirm'] = "Mật khẩu xác thực không đúng";
                                        }
                                }else
                                {
                                    $valid_up_password = "is-invalid";
                                    $_SESSION['valid_up_password'] = "Vui lòng nhập xác thực mật khẩu";
                                }
                            }else
                            {
                                $valid_up_password = "is-invalid";
                                $_SESSION['valid_up_password'] = "Vui lòng nhập ít nhất 1 chữ viết hoa ở đầu dòng";
                            }
                    }else
                    {
                        $valid_up_password = "is-invalid";
                        $_SESSION['valid_up_password'] = "Vui lòng điền mật khẩu lớn hơn 8 kí tự";
                    }
            }else
            {
                $valid_up_password = "is-invalid";
                $_SESSION['valid_up_password'] = "Vui lòng nhập mật khẩu đăng nhập";
            }
            //successful
            if($verify_valid_sign_up == 7)
            {
                $pmd = md5($password);
                them_user($username,$pmd,$fullname,$email,$phone,$address);
                header('Location: index.php?act=taouser&success');
            }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">

    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="format-detection" content="telephone=no"/>
        <title>Stroyka Admin - eCommerce Dashboard Template</title>
        <!-- icon -->
        <link rel="icon" type="image/png" href="images/favicon.png"/>
        <!-- fonts -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i"/>
        <!-- css -->
        <link rel="stylesheet" href="./../template/admin_t/vendor/bootstrap/css/bootstrap.ltr.css"/>
        <link rel="stylesheet" href="./../template/admin_t/vendor/highlight.js/styles/github.css"/>
        <link rel="stylesheet" href="./../template/admin_t/vendor/simplebar/simplebar.min.css"/>
        <link rel="stylesheet" href="./../template/admin_t/vendor/quill/quill.snow.css"/>
        <link rel="stylesheet" href="./../template/admin_t/vendor/air-datepicker/css/datepicker.min.css"/>
        <link rel="stylesheet" href="./../template/admin_t/vendor/select2/css/select2.min.css"/>
        <link
            rel="stylesheet"
            href="./../template/admin_t/vendor/datatables/css/dataTables.bootstrap5.min.css"/>
        <link rel="stylesheet" href="./../template/admin_t/vendor/nouislider/nouislider.min.css"/>
        <link rel="stylesheet" href="./../template/admin_t/vendor/fullcalendar/main.min.css"/>
        <link rel="stylesheet" href="./../template/admin_t/css/style.css"/>
    </head>

    <body>
        <div class="min-h-100 p-0 p-sm-6 d-flex align-items-stretch">
            <div class="card w-25x flex-grow-1 flex-sm-grow-0 m-sm-auto">
                <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                    <h1 style="display: <?=$bool_display?>" class="mb-0 fs-3">Đăng Kí Tài Khoản</h1>
                    <?=$_SESSION['alert']?>
                <form action="index.php?act=taouser" method="post" style="display: <?=$bool_display?>"> 
                    <div class="fs-exact-14 text-muted mt-2 pt-1 mb-5 pb-2">Điền vào biểu mẫu để tạo một tài khoản mới.</div>
                    <div class="mb-4">
                        <label class="form-label">Họ Và Tên <span class="text-danger">(*)</span> </label>
                            <input type="text" name="fullname" value="<?=$fullname?>" class="form-control form-control-lg <?=$valid_up_name?>"/>
                            <small class="text-danger"><?=$_SESSION['valid_up_name']?></small>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Số Điện Thoại <span class="text-danger">(*)</span></label>
                            <input type="number" name="phone" value="<?=$phone?>" max="1000000000" class="form-control form-control-lg <?=$valid_up_phone?>"/>
                            <small class="text-danger"><?=$_SESSION['valid_up_phone']?></small>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Địa Chỉ <span class="text-danger">(*)</span></label>
                            <input type="text" name="address" value="<?=$address?>" class="form-control form-control-lg <?=$valid_up_address?>"/>
                            <small class="text-danger"><?=$_SESSION['valid_up_address']?></small>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Email liên hệ <span class="text-danger">(*)</span></label>
                            <input type="email" name="email" value="<?=$email?>" class="form-control form-control-lg <?=$valid_up_email?>"/>
                            <small class="text-danger"><?=$_SESSION['valid_up_email']?></small>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Tài Khoản <span class="text-danger">(*)</span></label>
                            <input type="text" name="username" value="<?=$username?>" class="form-control form-control-lg <?=$valid_up_user?>"/>
                            <small class="text-danger"><?=$_SESSION['valid_up_user']?></small>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Mật Khẩu <span class="text-danger">(*)</span></label>
                            <input type="password" name="password" value="<?=$password?>" class="form-control form-control-lg <?=$valid_up_password?>"/>
                            <small class="text-danger"><?=$_SESSION['valid_up_password']?></small>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Xác thực mật khẩu <span class="text-danger">(*)</span></label>
                            <input type="password" name="password-confirm" value="<?=$password_confirm?>" class="form-control form-control-lg <?=$valid_up_password_confirm?>"/>
                            <small class="text-danger"><?=$_SESSION['valid_up_password_confirm']?></small>
                    </div>
                    <!-- <div class="mb-4 py-2">
                        <label class="form-check mb-0"><input type="checkbox" class="form-check-input"/>
                            <span class="form-check-label">I agree to the
                                <a href="page-terms.html">terms and conditions</a>.</span></label>
                    </div> -->
                    <div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">Đăng Kí</button>
                    </div>
                </form>
                </div>
                <div class="sa-divider sa-divider--has-text">
                <div class="sa-divider__text">Tiếp Tục Với</div>
            </div>
                    <div class="form-group mb-4 mt-4 pt-2 text-center text-muted">
                        <a href="index.php?act=dangnhap">Đăng nhập tài khoản</a>
                    </div>
                </div>
            </div>
        </div>
      
        <!-- scripts -->
        <script src="./../template/admin_t/vendor/jquery/jquery.min.js"></script>
        <script src="./../template/admin_t/vendor/feather-icons/feather.min.js"></script>
        <script src="./../template/admin_t/vendor/simplebar/simplebar.min.js"></script>
        <script src="./../template/admin_t/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="./../template/admin_t/vendor/highlight.js/highlight.pack.js"></script>
        <script src="./../template/admin_t/vendor/quill/quill.min.js"></script>
        <script src="./../template/admin_t/vendor/air-datepicker/js/datepicker.min.js"></script>
        <script src="./../template/admin_t/vendor/air-datepicker/js/i18n/datepicker.en.js"></script>
        <script src="./../template/admin_t/vendor/select2/js/select2.min.js"></script>
        <script
            src="./../template/admin_t/vendor/fontawesome/js/all.min.js"
            data-auto-replace-svg=""
            async=""></script>
        <script src="./../template/admin_t/vendor/chart.js/chart.min.js"></script>
        <script src="./../template/admin_t/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="./../template/admin_t/vendor/datatables/js/dataTables.bootstrap5.min.js"></script>
        <script src="./../template/admin_t/vendor/nouislider/nouislider.min.js"></script>
        <script src="./../template/admin_t/vendor/fullcalendar/main.min.js"></script>
        <script src="./../template/admin_t/js/stroyka.js"></script>
        <script src="./../template/admin_t/js/custom.js"></script>
        <script src="./../template/admin_t/js/calendar.js"></script>
        <script src="./../template/admin_t/js/demo.js"></script>
        <script src="./../template/admin_t/js/demo-chart-js.js"></script>
    </body>
    <!-- Mirrored from
    stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/auth-sign-up.html by
    HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Jul 2023 09:19:12 GMT -->

</html>