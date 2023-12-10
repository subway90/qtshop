<?php
include './../Model/xl_user.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$email = "";
$newp_pass = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $test_email = str_replace("'", '', $_POST["email"]);
    $check = check_email($test_email);
    if(!empty($check))
    {
        $pass = md5($_POST["new_pass"]);
        change_pass($pass, $test_email);
    
    $email = str_replace("'", '', $_POST["email"]);
    $new_pass = $_POST["new_pass"];


$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
    $mail->isSMTP();// gửi mail SMTP
    $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
    $mail->SMTPAuth = true;// Enable SMTP authentication
    $mail->Username = 'hieunmps33151@fpt.edu.vn';// SMTP username
    $mail->Password = 'snsonnjjuevebcfw'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; // TCP port to connect to
    $mail->setFrom('hieunmps33151@fpt.edu.vn', 'H-SHOP store');
    $mail->addAddress("$email", 'Joe User'); // Add a recipient
    $mail->isHTML(true);   // Set email format to HTML
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('Y-m-d H:i:s');
    $mail->Subject = 'Khoi phuc mat khau tai h-shop.store';
    $mail->Body = "Xin chào, <br> Mật khẩu mới của bạn là : <strong>".$new_pass."</strong>. Vui lòng không cung cấp mật khẩu này cho người khác và truy cập vào website h-shop.store để đổi lại mật khẩu !. <br> Thời gian: ".$date;
    $mail->AltBody = '';
    $mail->send();
    echo '<script type="text/javascript">

            window.onload = function () { alert("THÀNH CÔNG ! Mật khẩu đã được gửi qua hộp thư mail của bạn!"); }

        </script>';
} catch (Exception $e) {
    echo '<script type="text/javascript">

            window.onload = function () { alert("Không thành công (X) !"); }

        </script>';
}
}
else
{ 
    echo'
        <script type="text/javascript">
        function confirm_alert(node) {
            return confirm("Nhấn OK để quay lại");
        }
        </script>
        <a href="index.php?act=test" onclick="return confirm_alert(this);">Email này chưa đăng ký ! Bạn muốn thử lại ?</a><br><br><br><a href="index.php">Trang chủ</a>';
}
}
?>

