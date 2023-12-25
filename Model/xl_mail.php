<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../View/user/PHPMailer/src/Exception.php';
require '../View/user/PHPMailer/src/PHPMailer.php'; 
require '../View/user/PHPMailer/src/SMTP.php';
function SendOTP($otp,$email)
{
        $mail = new PHPMailer(true);
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
            $mail->isSMTP();// gửi mail SMTP
            $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
            $mail->SMTPAuth = true;// Enable SMTP authentication
            $mail->Username = 'hieunmps33151@fpt.edu.vn';// SMTP username
            $mail->Password = 'wcbdxylyfovuyxum'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to
            $mail->setFrom('hieunmps33151@fpt.edu.vn', 'THOI TRANG QT shop');
            $mail->addAddress("$email", 'Member'); // Add a recipient
            $mail->isHTML(true);   // Set email format to HTML
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y-m-d H:i:s');
            $mail->Subject = 'Ma OTP khoi phuc mat khau';
            $mail->Body = "Xin chào, <br> Mã OTP của bạn là : <strong>".$otp."</strong>. Vui lòng không cung cấp mã này cho người khác. <br> Thời gian: ".$date;
            $mail->AltBody = '';
            $mail->send();
        } catch (Exception $e) {
            echo '<script type="text/javascript">
                    window.onload = function () { alert(" (X) Sorry, PHP Mailer not activity ! Try again later..."); }
                </script>';
        }
}
function SendNP($newpass,$email)
{
        $mail = new PHPMailer(true);
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
            $mail->isSMTP();// gửi mail SMTP
            $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
            $mail->SMTPAuth = true;// Enable SMTP authentication
            $mail->Username = 'hieunmps33151@fpt.edu.vn';// SMTP username
            $mail->Password = 'wcbdxylyfovuyxum'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to
            $mail->setFrom('hieunmps33151@fpt.edu.vn', 'THOI TRANG QT shop');
            $mail->addAddress("$email", 'Member'); // Add a recipient
            $mail->isHTML(true);   // Set email format to HTML
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y-m-d H:i:s');
            $mail->Subject = 'Mat khau cua tai khoan ThoiTrangQT';
            $mail->Body = "Xin chào, <br> Mật khẩu mới của bạn là : <strong>".$newpass."</strong>. Vui lòng không cung cấp mật khẩu này cho người khác và truy cập vào website thoitrangqt.shop để đổi lại mật khẩu. <br> Thời gian: ".$date;
            $mail->AltBody = '';
            $mail->send();
        } catch (Exception $e) {
            echo '<script type="text/javascript">
                    window.onload = function () { alert(" (X) Sorry, PHP Mailer not activity ! Try again later..."); }
                </script>';
        }
}
?>


