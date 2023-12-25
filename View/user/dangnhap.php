<?php
if(!defined('_CODE'))
{
    require_once('404.html');exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="../View/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../View/css/style.css" rel="stylesheet">
    <!-- template mẫu chuẩn -->
    <link rel="icon" type="../t_admin_t/image/png" href="../t_user_t/images/favicon.png" /><!-- fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href="../template/admin_t/vendor/bootstrap/css/bootstrap.ltr.css" />
    <!-- <link rel="stylesheet" href="../template/admin_t/vendor/highlight.js/styles/github.css" />
    <link rel="stylesheet" href="../template/admin_t/vendor/simplebar/simplebar.min.css" />
    <link rel="stylesheet" href="../template/admin_t/vendor/quill/quill.snow.css" />
    <link rel="stylesheet" href="../template/admin_t/vendor/air-datepicker/css/datepicker.min.css" />
    <link rel="stylesheet" href="../template/admin_t/vendor/select2/css/select2.min.css" />
    <link rel="stylesheet" href="../template/admin_t/vendor/datatables/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="../template/admin_t/vendor/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="../template/admin_t/vendor/fullcalendar/main.min.css" /> -->
    <link rel="stylesheet" href="../template/admin_t/css/style.css" />
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-97489509-8');
    </script>
</head>
<body>
    <!-- Topbar Start -->
   
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <!-- <div class="container-fluid pt-5"> -->
    <?php
ob_start();
include "./../Model/xl_user.php";
if(!empty($_SESSION['remember'][0]))
{
    $remember = "checked";
    $username = $_SESSION['remember'][1];
    $password = $_SESSION['remember'][2];
}else
{
    $remember = "";
    $username = "";
    $password = "";
}
// var_dump($_SESSION['remember']);
$valid_username = "";
$valid_password = "";
$verify_valid_login = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Hiếu code
    if(!empty($_POST["remember"]))
    {
        $_SESSION['remember'][0] = "checked";
        $remember = $_POST["remember"];
    }else
    {
        $_SESSION['remember'][0] = "";
    }

    //kiểm tra đăng nhập
    if(!empty($_POST["username"]))
    {
        $verify_valid_login ++;
        $username = str_replace("'", '', $_POST["username"]); //xóa kí tự ' trong chuỗi username
        $valid_username = "is-valid";
        
    }else
    {
        $_SESSION['valid_username'] = "Vui lòng điền tài khoản";
        $valid_username = "is-invalid";
    }
    if(!empty($_POST["password"]))
    {
        $verify_valid_login ++;
        $password = $_POST['password'];
        $password_md5 = md5($password);
        $valid_password = "is-valid";
    }else
    {
        $_SESSION['valid_password'] = "Vui lòng điền mật khẩu";
        $valid_password = "is-invalid";
    }
        if($verify_valid_login == 2)
        {
            $tk = mot_user($username); //gọi hàm mot_user và truyền tham số $username
            if(!empty($tk))
            {
                if ($tk[0]['password'] == $password_md5) // so sánh
                {
                    //Hiếu code
                    if($remember == 1)
                    {
                        $_SESSION['remember'][1] = $username;
                        $_SESSION['remember'][2] = $password;
                    }
                    
                    $_SESSION['dangnhap'] = $tk; // gán biến tk vào session dang nhap
                    if ($tk[0]["position"] == 0) {
                        header("Location: index.php?act=admin-dashboard");
                    }
                    if ($tk[0]["position"] == 1) {
                        header("Location: index.php");
                    }
                }
                else
                {
                    $_SESSION['valid_password'] = "Mật khẩu không chính xác !";
                    $valid_password = "is-invalid";
                }
            }else
            {
                $_SESSION['valid_username'] = "Tài khoản không tồn tại !";
                $valid_username = "is-invalid";
                $valid_password = "";
            }
            
        }
    }
?>
    <!-- Checkout End -->

    <!-- template chuẩn 1 -->


    <div class="min-h-100 p-0 p-sm-6 d-flex align-items-stretch">
        <div class="card w-25x flex-grow-1 flex-sm-grow-0 m-sm-auto">
        <form action="index.php?act=dangnhap" method="post" enctype="multipart/form-data" >
            <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                <h1 class="mb-0 fs-3">Đăng Nhập</h1>
                <div class="fs-exact-14 text-muted mt-2 pt-1 mb-5 pb-2">Đăng nhập để thanh toán, mua sản phẩm</div>
                <div class="mb-4">
                    <label class="form-label">Tài Khoản</label>
                    <input type="text" name="username" class="form-control form-control-lg <?=$valid_username?>" value="<?=$username?>"/>
                    <small  class="text-danger"><?=$_SESSION['valid_username']?></small>
                </div>
                <div class="mb-4">
                    <label class="form-label">Mật Khẩu</label>
                    <input type="password" name="password" class="form-control form-control-lg <?=$valid_password?>" value="<?=$password?>"/>
                    <small  class="text-danger"><?=$_SESSION['valid_password']?></small>
                </div>
                <div class="mb-4 row py-2 flex-wrap">
                    <div class="col-auto me-auto">
                        <label class="form-check mb-0"><input <?=$remember?> name="remember" value="1" type="checkbox" class="form-check-input" />
                            <span class="form-check-label">Ghi Nhớ</span>
                        </label>
                    </div>
                    <div class="col-auto d-flex align-items-center"><a href="index.php?act=forget-pass">Quên Mật khẩu
                           </a></div>
                </div>
                <div><button type="submit" class="btn btn-primary btn-lg w-100">ĐĂNG NHẬP</button></div>
            </div>
            <div class="mb-4 d-flex justify-content-center"><a href="index.php?act=taouser">Đăng ký tài khoản</a><span class="ml-1">nếu chưa có.</span></div>
            <!-- <div class="sa-divider sa-divider--has-text">
                <div class="sa-divider__text">Tiếp Tục Với</div>
            </div> -->
            <!-- <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                <div class="d-flex flex-wrap me-n3 mt-n3"><button type="button"
                        class="btn btn-secondary flex-grow-1 me-3 mt-3" onclick="alert('Chức năng đang cập nhật');">Google</button><button type="button"
                        class="btn btn-secondary flex-grow-1 me-3 mt-3" onclick="alert('Chức năng đang cập nhật');">Facebook</button><button type="button"
                        class="btn btn-secondary flex-grow-1 me-3 mt-3" onclick="alert('Chức năng đang cập nhật');">Twitter</button></div>
                <div class="form-group mb-0 mt-4 pt-2 text-center text-muted">Không có tài khoản ? <a
                        href="index.php?act=taouser">Đăng kí</a></div>
            </div> -->
            </form>
        </div>
       
    </div><!-- scripts -->
<!-- template chuẩn -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <!-- js của template chuẩn -->
    <script src="../template/admin_t/vendor/jquery/jquery.min.js"></script>
    <script src="../template/admin_t/vendor/feather-icons/feather.min.js"></script>
    <script src="../template/admin_t/vendor/simplebar/simplebar.min.js"></script>
    <script src="../template/admin_t/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../template/admin_t/vendor/highlight.js/highlight.pack.js"></script>
    <script src="../template/admin_t/vendor/quill/quill.min.js"></script>
    <script src="../template/admin_t/vendor/air-datepicker/js/datepicker.min.js"></script>
    <script src="../template/admin_t/vendor/air-datepicker/js/i18n/datepicker.en.js"></script>
    <script src="../template/admin_t/vendor/select2/js/select2.min.js"></script>
    <script src="../template/admin_t/vendor/fontawesome/js/all.min.js" data-auto-replace-svg="" async=""></script>
    <script src="../template/admin_t/vendor/chart.js/chart.min.js"></script>
    <script src="../template/admin_t/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../template/admin_t/vendor/datatables/js/dataTables.bootstrap5.min.js"></script>
    <script src="../template/admin_t/vendor/nouislider/nouislider.min.js"></script>
    <script src="../template/admin_t/vendor/fullcalendar/main.min.js"></script>
    <script src="../template/admin_t/js/stroyka.js"></script>
    <script src="../template/admin_t/js/custom.js"></script>
    <script src="../template/admin_t/js/calendar.js"></script>
    <script src="../template/admin_t/js/demo.js"></script>
    <script src="../template/admin_t/js/demo-chart-js.js"></script>
</body>
</html>
