
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Đổi mật khẩu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="./../t/user_t/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./../View/user/template/lib/animate/animate.min.css" rel="stylesheet">
    <link href="./../View/user/template/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./../View/user/template/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
<!-- php cua doi mat khau -->
<?php
 include "./../Model/xl_user.php";
 $edit;
 $id_user = $_SESSION['dangnhap'][0][0];
 if(isset($_REQUEST['edit'])){
    $edit = $_REQUEST['edit'];
    // if($edit == 0){
    //     $id_user = $_SESSION['dangnhap'][0][0];
    // }
    if($edit ==1)
    {
        $pass = md5($_POST['pass']);
        capnhat_pass($id_user, $pass);
    }
}
?>
   



    <!-- Join Now Start -->
    <div class="container-fluid ">
      
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4 "><span class="bg-secondary pr-3">Đổi mật khẩu</span></h2>
        <div class="row px-xl-5 ">
            <div class="col-lg-6 mb-5">
                <div class="contact-form bg-pink p-30">
                    <h3 class="mb-4">Đổi mật khẩu</h3>


                    <form name="" action="index.php?act=change_pass&edit=1" method="post" enctype="multipart/form-data">
                        <div class="control-group mb-3">
                            <input  class="form-control"  name="pass" placeholder="nhập mật khẩu mới của bạn">
                        </div>
                       
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" >Cập Nhật</button>
                        </div>
                    </form>



                </div>
            </div>
            
    </div>
    <!-- Join Now End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Join Now Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>














