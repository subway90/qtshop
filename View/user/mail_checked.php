<?php
include "./../Model/xl_user.php";
$email = "";
$otp = "";
$otp_fir = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST["email_user"];
    $new_pass = rand(10000,100000);
    $otp_fir = $_POST["otp"];
    $otp = $_POST["otp-fir"];
    // var_dump($email, $otp_fir, $otp, $new_pass);
    if($otp_fir == $otp)
    {
        echo"OTP ĐÚNG, VUI LÒNG ĐỢI GIÂY LÁT...";
        change_pass($new_pass,$email);

    }
    else
    {
        echo'<script>alert("OTP SAI");</script><a href="index.php?act=check">Quay lại</a>';
    }
}
?>