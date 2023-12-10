<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$email = "";
$subject = "";
$content = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];
}
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
    $mail->isSMTP();// gửi mail SMTP
    $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
    $mail->SMTPAuth = true;// Enable SMTP authentication
    $mail->Username = 'hieunmps33151@fpt.edu.vn';// SMTP username
    $mail->Password = 'snsonnjjuevebcfw';
    // $mail->Password = 'kjfffpvwiysfnbmp'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; // TCP port to connect to
    //Recipients
    //email goi
    $mail->setFrom('hieunmps33151@fpt.edu.vn', 'H-SHOP store');
    // email nhan
    $mail->addAddress("$email", 'Joe User'); // Add a recipient
   // $mail->addAddress('ellen@example.com'); // Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
  //  $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');
    // Attachments
  //  $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
 //   $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
    // Content
    $mail->isHTML(true);   // Set email format to HTML
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('Y-m-d H:i:s');
    $mail->Subject = $subject;
    $mail->Body = $content."<br>Time: ".$date;
    $mail->AltBody = '';
    $mail->send();
    echo '<script type="text/javascript">

            window.onload = function () { alert("ĐÃ GỬI EMAIL THÀNH CÔNG !"); }

        </script>';
} catch (Exception $e) {
    echo '<script type="text/javascript">

            window.onload = function () { alert("Không thành công (X) !"); }

        </script>';
}






?>

