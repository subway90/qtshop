<?php
include "./../Model/xl_user.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php'; 
require 'PHPMailer/src/SMTP.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $test_email = str_replace("'", '', $_POST["email"]);
    $check = check_email($test_email);
    if(!empty($check))
    {
        $otp = rand(10000,100000);
        $user_email = $_POST["email"];

$mail = new PHPMailer(true);
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
    $mail->isSMTP();// gửi mail SMTP
    $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
    $mail->SMTPAuth = true;// Enable SMTP authentication
    $mail->Username = 'hieunmps33151@fpt.edu.vn';// SMTP username
    $mail->Password = 'snsonnjjuevebcfw'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; // TCP port to connect to
    $mail->setFrom('hieunmps33151@fpt.edu.vn', 'H-SHOP store');
    $mail->addAddress("$user_email", 'Joe User'); // Add a recipient
    $mail->isHTML(true);   // Set email format to HTML
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('Y-m-d H:i:s');
    $mail->Subject = 'h-shop.store - OTP KHOI PHUC MAT KHAU';
    $mail->Body = "Xin chào, <br> Mã OTP của bạn là : <strong>".$otp."</strong>. Vui lòng không cung cấp mã này cho người khác và truy cập vào website h-shop.store để đổi lại mật khẩu. <br> Thời gian: ".$date;
    $mail->AltBody = '';
    $mail->send();
    echo '<script type="text/javascript">

            window.onload = function () { alert("Thành công ! Kiểm tra mã OTP ở email của bạn !"); }

        </script>';
} catch (Exception $e) {
    echo '<script type="text/javascript">

            window.onload = function () { alert("Không thành công (X) !"); }

        </script>';
}
        // var_dump($otp." & ".$user_email);
        ?>
        <!-- <form action="index.php?act=reset_pass" method="post">
            <strong>Vui lòng nhập OTP được gửi qua</strong> <br>    
            Email : <input style="width: 200px" value="<?=$_POST['email']?>" disabled><br>
            <input hidden name="otp-fir" value="<?=$otp?>">
            <input hidden name="email_user" value="<?=$user_email?>">
            Hiệu lực OTP còn: <strong style="color: red" id="demo"></strong> <br>
            Nhập OTP : <input type="number" max="100000" name="otp" placeholder="mã OTP gồm 5 số"> <br><br>
            <button>Tiếp tục</button>
        </form> -->






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
    
        <form action="index.php?act=reset_pass" method="post">
    <div class="min-h-100 p-0 p-sm-6 d-flex align-items-stretch">
        <div class="card w-25x flex-grow-1 flex-sm-grow-0 m-sm-auto">
            <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                <h1 style="text-align: center;" class="mb-0 fs-3">Vui lòng nhập OTP</h1> 
                <div class="mb-4"><label class="form-label">Email</label>
                <input value="<?=$_POST['email']?>" disabled  class="form-control form-control-lg" />
                <input hidden name="otp-fir" value="<?=$otp?>">
                <input hidden name="email_user" value="<?=$user_email?>">
                 </div>
                <div class="mb-4"><label class="form-label">Hiệu lực OTP còn :</label>
                <strong style="color: red" id="demo" class="form-control form-control-lg"></strong>
                </div>
                <div class="mb-4"><label class="form-label">Nhập OTP :</label>
                <input type="number" max="100000" name="otp" placeholder="mã OTP gồm 5 số" class="form-control form-control-lg">
                </div>
                        
                <div><button type="submit" class="btn btn-primary btn-lg w-100">Tiếp Tục</button></div>
                
            </div>
        </div>
</form>
    </div><!-- scripts -->
    <script src="./../template/admin_t/vendor/jquery/jquery.min.js"></script>
    <script src="./../template/admin_t/vendor/feather-icons/feather.min.js"></script>
    <script src="./../template/admin_t/vendor/simplebar/simplebar.min.js"></script>
    <script src="./../template/admin_t/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./../template/admin_t/vendor/highlight.js/highlight.pack.js"></script>
    <script src="./../template/admin_t/vendor/quill/quill.min.js"></script>
    <script src="./../template/admin_t/vendor/air-datepicker/js/datepicker.min.js"></script>
    <script src="./../template/admin_t/vendor/air-datepicker/js/i18n/datepicker.en.js"></script>
    <script src="./../template/admin_t/vendor/select2/js/select2.min.js"></script>
    <script src="./../template/admin_t/vendor/fontawesome/js/all.min.js" data-auto-replace-svg="" async=""></script>
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
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/auth-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Jul 2023 09:19:12 GMT -->

</html>




        <?php
        // $pass = md5($_POST["new_pass"]);
        // change_pass($pass, $test_email);
    
    // $email = str_replace("'", '', $_POST["email"]);
    // $new_pass = $_POST["new_pass"];
    }
    else
    {
        echo'
        <script type="text/javascript">
        function confirm_alert(node) {
            return confirm("Nhấn OK để quay lại");
        }
        </script> <strong>Email chưa được đăng ký hoặc không tồn tại</strong>
        <a href="index.php?act=test" onclick="return confirm_alert(this);">Quay lại</a>';
        // echo'<script>alert("Email này chưa được đăng ký !");</script>';
    }
}
else
{
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
                <h1 class="mb-0 fs-3">Quên Mật Khẩu?</h1> 
                <div class="fs-exact-14 text-muted mt-2 pt-1 mb-5 pb-2">Nhập địa chỉ email được liên kết với tài khoản 
                    của bạn và chúng tôi sẽ gửi liên kết để đặt lại mật khẩu của bạn.</div>
                <div class="mb-4"><label class="form-label">Địa Chỉ Email</label><input placeholder="Nhập email của bạn"
                 type="email" required name="email" value=""  class="form-control form-control-lg" /></div>
                        <input hidden type="number" name="new_pass" value="<?=$new_pass?>">
                <div><button type="submit" class="btn btn-primary btn-lg w-100">Đổi Mật Khẩu</button></div>
                <div class="form-group mb-0 mt-4 pt-2 text-center text-muted">Ghi nhớ mật khẩu của bạn? <a
                        href="index.php?act=dangnhap">Đăng Nhập</a></div>
            </div>
        </div>
</form>
    </div><!-- scripts -->
    <script src="./../template/admin_t/vendor/jquery/jquery.min.js"></script>
    <script src="./../template/admin_t/vendor/feather-icons/feather.min.js"></script>
    <script src="./../template/admin_t/vendor/simplebar/simplebar.min.js"></script>
    <script src="./../template/admin_t/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./../template/admin_t/vendor/highlight.js/highlight.pack.js"></script>
    <script src="./../template/admin_t/vendor/quill/quill.min.js"></script>
    <script src="./../template/admin_t/vendor/air-datepicker/js/datepicker.min.js"></script>
    <script src="./../template/admin_t/vendor/air-datepicker/js/i18n/datepicker.en.js"></script>
    <script src="./../template/admin_t/vendor/select2/js/select2.min.js"></script>
    <script src="./../template/admin_t/vendor/fontawesome/js/all.min.js" data-auto-replace-svg="" async=""></script>
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
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/auth-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Jul 2023 09:19:12 GMT -->

</html>

        <?php
}
?>
    <script>
    // var countDownDate = <?php echo strtotime('Oct 31, 2023 23:59:59') ?> * 1000;
    var countDownDate = 15 * 60 * 1000;
    // var now = <?php echo time() ?> * 1000;
    var now = 0;
    var x = setInterval(function() {
        now = now + 1000;
        var distance = countDownDate - now;
        // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("demo").innerHTML = minutes + " phút " + seconds + " giây. ";
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "OTP đã hết hiệu lực";
        }
    }, 1000);
    </script>

