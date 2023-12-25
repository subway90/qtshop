<?php
include "../Model/xl_mail.php";
if(isset($_REQUEST['cancel']) && !empty($_SESSION['otp']))
{
    $_SESSION['otp']= "";
    $step_forget = 2;
    $arr_info = explode(",",$_SESSION['info_forget']);
    $_SESSION['info_forget'] = $arr_info[0];
    header('Location: index.php?act=forget-pass&user='.$arr_info[0]);
}
if(!empty($_SESSION['otp']))
{
    $step_forget = 3;
}else
{
    $step_forget = 1;
    $_SESSION['info_forget']= "";
}
$text_user = "";
$text_email = "";
$otp_confirm = "";
$valid_user = "";
$warning_small_user = "";
$valid_email = ""; 
$warning_small_email = "";
$valid_otp = "";
$warning_small_otp = "";

if(defined('VERIFY_EMAIL') && isset($_REQUEST['user']) && isset($_REQUEST['email']))
{
    require_once('404.html');
    exit;
}
if(isset($_REQUEST['user']))
{
    $text_user = str_replace(["'","-","!","@","#","-"," ","$","*","/","~"],"",$_REQUEST['user']);
    if(!empty($text_user))
    {
        $user = check_user($text_user);
        if(!empty($user))
        {
            $step_forget++;
            $valid_user = "is-valid";
            $_SESSION['info_forget'] .= $text_user;
        }else
        {
            $valid_user = "is-invalid";
            $warning_small_user = "Tài khoản không chính xác";
        }
    }else
    {
        $valid_user = "is-invalid";
        $warning_small_user = "Vui lòng nhập tài khoản của bạn";
    }
}
if(isset($_REQUEST['email']))
{
    $text_email = str_replace(["'","--","!","#"," ","$","*","/","~"],"",$_REQUEST['email']);
    if(!empty($text_email))
    {
        $email = check_email($text_email);
        if(!empty($email))
        {
            if($email['email'] == $text_email)
            {
                $step_forget++;
                $_SESSION['info_forget'] .= ','.$text_email;
                define('VERIFY_EMAIL',1);
                header('Location: index.php?act=forget-pass&verify-otp');
            }else
            {
                $valid_email = "is-invalid";
                $warning_small_email = "Email không trùng khớp";
            }
        }else
        {
            $valid_email = "is-invalid";
            $warning_small_email = "Email không trùng khớp";
        }
    }else
    {
        $valid_email = "is-invalid";
        $warning_small_email = "Vui lòng nhập email của bạn";
    }
}
if(isset($_REQUEST['verify-otp']) && isset($_REQUEST['check']))
{
    if(!empty($_SESSION['otp']))
    {
        if(!empty($_POST['otp-confirm']))
        {
            $otp = $_SESSION['otp'];
            $otp_confirm = str_replace(["'","-","!","#","-"," ","$","*","/","~"],"",$_POST['otp-confirm']);
            if($otp_confirm == $otp)
            {
                $step_forget++;
                define('SUCCESS',1);
            }else
            {
                $valid_otp = "is-invalid";
                $warning_small_otp = "Mã OTP không trùng khớp";
            }
        }else
        {
            $valid_otp = "is-invalid";
            $warning_small_otp = "Vui lòng nhập OTP của bạn";
        }
    }else
    {  
        require_once('404.html');
        exit;
    }
}
if($step_forget==1)
{
?>
<form style="padding-top: 150px;" method="get">
<input hidden name="act" value="forget-pass" type="text">
    <div class="min-h-100 p-0 p-sm-6 d-flex align-items-stretch">
        <div class="card w-25x flex-grow-1 flex-sm-grow-0 m-sm-auto">
            <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                <h1 class="mb-0 fs-3 mb-5">Quên mật khẩu</h1>
                <div class="mb-4">
                        <label class="form-label">Tài khoản (username)</label>
                        <input placeholder="Nhập tài khoản của bạn" type="text" required name="user" value="<?=$text_user?>" class="form-control <?=$valid_user?> form-control-lg" />
                        <small class="text-danger"><?=$warning_small_user?></small>
                </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">Tiếp theo</button>
                    </div>
                    <div class="form-group mb-0 mt-5 pt-2 text-center text-muted">Tôi đã có tài khoản và <a href="index.php?act=dangnhap">Đăng Nhập</a>
                    </div>
            </div>
        </div>
</form>
<?php
}
elseif($step_forget==2)
{
?>
<form style="padding-top: 150px;" method="get">
<input hidden name="act" value="forget-pass" type="text">
    <div class="min-h-100 p-0 p-sm-6 d-flex align-items-stretch">
        <div class="card w-25x flex-grow-1 flex-sm-grow-0 m-sm-auto">
            <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                <h1 class="mb-0 fs-3 mb-5">Quên mật khẩu</h1>
                <div class="mb-4">
                        <label class="form-label">Tài khoản (username)</label>
                        <input disabled placeholder="Nhập tài khoản của bạn" type="text" required name="user" value="<?=$text_user?>" class="form-control <?=$valid_user?> form-control-lg" />
                        <input hidden type="text" name="user" value="<?=$text_user?>">
                        <small class="text-danger"><?=$warning_small_user?></small>
                </div>
                <div class="mb-4">
                        <label class="form-label">Email</label>
                        <input placeholder="Nhập email đã đăng kí tài khoản" type="email" required name="email" value="<?=$text_email?>" class="form-control <?=$valid_email?> form-control-lg" />
                        <small class="text-danger"><?=$warning_small_email?></small>
                </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">XÁC THỰC</button>
                    </div>
                    <div class="form-group mb-0 mt-5 pt-2 text-center text-muted">Tôi đã có tài khoản và <a href="index.php?act=dangnhap">Đăng Nhập</a>
                    </div>
            </div>
        </div>
</form>
<?php
}elseif($step_forget==3)
{
    $arr_info = explode(",",$_SESSION['info_forget']);
        if(empty($_SESSION['otp']))
        {
            $otp = rand(100000,1000000);
            $_SESSION['otp'] = $otp;
            SendOTP($otp,$arr_info[1]);
        }
?>
<form action="index.php?act=forget-pass&verify-otp&check" style="padding-top: 150px;" method="post">
<input hidden name="act" value="forget-pass" type="text">
    <div class="min-h-100 p-0 p-sm-6 d-flex align-items-stretch">
        <div class="card w-25x flex-grow-1 flex-sm-grow-0 m-sm-auto">
            <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                <h1 class="mb-0 fs-3 mb-5">Nhập mã OTP</h1>
                <h6 class="text-muted small">mã OTP đã được gửi qua <span class="text-danger"><?=$arr_info[1]?></span></h6>
                <h6 class="text-info small">Vui lòng kiểm tra hộp thư Email của bạn</h6>
                <div class="mb-4 mt-5">
                        <label class="form-label">nhập mã OTP <span class="text-danger">(gồm 6 số)</span></label>   
                        <input min="100000" max="999999" placeholder="Nhập mã OTP của bạn (6 số)" type="number" required name="otp-confirm" value="<?=$otp_confirm?>" class="form-control <?=$valid_otp?> form-control-lg" />
                        <small class="text-danger"><?=$warning_small_otp?></small>
                </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">Xác thực</button>
                    </div>
                    <script type="text/javascript">
                    function confirm_alert(node)
                    {
                    return confirm("Bạn sẽ quay lại bước nhập Email để nhận OTP.");
                    }
                </script>
                    <div class="form-group mb-0 mt-5 pt-2 text-center text-muted small"><a class="text-danger" onclick="return confirm_alert(this);" href="index.php?act=forget-pass&cancel">Tôi không nhận được mã OTP</a></a>
                    </div>
                    <div class="form-group mb-0 mt-2 pt-2 text-center text-muted">Tôi đã có tài khoản và <a href="index.php?act=dangnhap">Đăng Nhập</a>
                    </div>
            </div>
        </div>
</form>
    <?php
}elseif($step_forget==4 && defined('SUCCESS'))
{
    $arr_info = explode(",",$_SESSION['info_forget']);
    $email = $arr_info[1];
    $user = $arr_info[0];
    $newpass = rand(10000,100000);
    change_pass($newpass,$email);
    sendNP($newpass,$email);
    $_SESSION['otp'] = "";
    $_SESSION['info_forget'] = "";
?>
<form action="index.php?act=forget-pass&success" style="padding-top: 150px;" method="post">
    <input hidden name="act" value="forget-pass" type="text">
        <div class="min-h-100 p-0 p-sm-6 d-flex align-items-stretch">
            <div class="card w-25x flex-grow-1 flex-sm-grow-0 m-sm-auto">
                <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                    <h1 class="mb-0 fs-3 mb-5 text-success">Khôi phục hành công</h1>
                    <h6 class="text-muted small">Tài khoản <strong><?=$user?></strong> đã được khôi phục</h6>
                    <h6 class="text-info small">Mật khẩu mới: <strong><?=$newpass?></strong></h6>
                    <h6 class="text-muted small">Kiểm tra Email : <strong class="text-danger"><?=$email?></strong>.</h6>
                    <div>
                        <a href="index.php?act=dangnhap" class="btn btn-primary btn-lg w-100 mt-3">Đăng nhập</a>
                    </div>
                        </div>
                </div>
            </div>
</form>
<?php
}
?>
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