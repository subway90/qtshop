<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
    $mail->isSMTP();// gửi mail SMTP
    $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
    $mail->SMTPAuth = true;// Enable SMTP authentication
    $mail->Username = 'hieunmps33151@fpt.edu.vn';// SMTP username
    $mail->Password = 'kjfffpvwiysfnbmp'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; // TCP port to connect to
    $mail->setFrom('hieunmps33151@fpt.edu.vn', 'H-SHOP store');
    $mail->addAddress("$email", 'Joe User'); // Add a recipient
    $mail->isHTML(true);   // Set email format to HTML
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('Y-m-d H:i:s');
    $mail->Subject = 'h-shop.store gui ma OTP cho cap lai mat khau';
    $mail->Body = "Xin chào, <br> Mã OTP của bạn là : <strong>".$otp."</strong>. Vui lòng không cung cấp mã này cho người khác và truy cập vào website h-shop.store để đổi lại mật khẩu !. <br> Thời gian: ".$date;
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
?>

