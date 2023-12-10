<?php
    include "./../Model/xl_sanpham.php";
    include "./../Model/xl_loaihang.php";
    include "./../Model/xl_thanhtoan.php";
    include "./../Model/xl_search.php";
    if (isset($_POST['text-search']))
    {
    $text_search = $_POST["text-search"];
    $list_search = search($text_search);
    }
    else
    {
    $text_search = "";
    $list_search = search($text_search);
    }
    $info_user = '
    <div class="navbar-nav ml-auto py-0">
        <a href="index.php?act=dangnhap" class="nav-item nav-link">Đăng nhập</a>
        <a href="index.php?act=taouser" class="nav-item nav-link">Đăng kí</a>
    </div>';
    $list = listloai();
    $count_list = count($list);
    $height = $count_list * 41;
    if(!empty($_SESSION['dangnhap']))
    {
        $user = load($_SESSION['dangnhap'][0][0]);
        if(($_SESSION['dangnhap'][0][7]) == 1)
        {
            $info_user = '
            <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span style="color: black">Xin chào</span> <span style="font-weight: bold">'.$user[0][3].'</span></a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="index.php?act=update_info" class="dropdown-item">Chỉnh sửa</a>
                                        <a href="index.php?act=change_pass" class="dropdown-item">Đổi mật khẩu</a>
                                        <a href="index.php?act=logout" class="dropdown-item text-danger">Đăng xuất</a>
                                    </div>
                            </div>';
        }else
        {
            $info_user = '
            <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span style="color: black">Xin chào</span> <span style="font-weight: bold">'.$user[0][3].'</span></a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="index.php?act=admin-dashboard" class="dropdown-item text-warning">Quản lí</a>
                                        <a href="index.php?act=update_info" class="dropdown-item">Chỉnh sửa</a>
                                        <a href="index.php?act=change_pass" class="dropdown-item">Đổi mật khẩu</a>
                                        <a href="index.php?act=logout" class="dropdown-item text-danger">Đăng xuất</a>
                                    </div>
                            </div>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cửa hàng thời trang</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="./../View/img/favicon.png" rel="icon">
    <!-- <link rel="icon" type="image/png" href="./../t/admin_t/images/favicon.png" /> -->
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./../View/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./../View/css/style.css" rel="stylesheet">
    <script language=javascript>
    function fPageseparate(page){
		document.adminForm.txtPage.value=page;
		document.adminForm.submit();

        
	}
    </script>
    

</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="index.php" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">H</span>Fashion</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                    <form action="index.php?act=search-product" method="post">
                    <div class="input-group">
                        <input name="text-search" type="text" class="form-control" placeholder="Nhập tên sản phẩm để tìm kiếm" required value="<?=$text_search?>">
                        <div class="input-group-append">
                            <button class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="index.php?act=giohang" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge"><?=count($_SESSION['giohang'])?></span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div style="z-index:2;" class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Loại hàng</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: <?=$height?>px?>
                    px">
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Dresses <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                                <a href="" class="dropdown-item">Baby's Dresses</a>
                            </div>  
                        </div> -->
                        <?php
                        for ($l = 0; $l < $count_list; $l++)
                        {
                        ?>
                        <a href="index.php?act=404" class="nav-item nav-link"><?=$list[$l][0]?></a>
                        <?php
                        }
                        ?>
                        <!-- <a href="index.php?act=404" class="nav-item nav-link">Jeans</a>
                        <a href="index.php?act=404" class="nav-item nav-link">Swimwear</a>
                        <a href="index.php?act=404" class="nav-item nav-link">Sleepwear</a>
                        <a href="index.php?act=404" class="nav-item nav-link">Sportswear</a>
                        <a href="index.php?act=404" class="nav-item nav-link">Jumpsuits</a>
                        <a href="index.php?act=404" class="nav-item nav-link">Blazers</a>
                        <a href="index.php?act=404" class="nav-item nav-link">Jackets</a>
                        <a href="index.php?act=404" class="nav-item nav-link">Shoes</a> -->
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Trang chủ</a>
                            <a href="index.php?act=shop" class="nav-item nav-link">Cửa hàng</a>
                            <a href="index.php?act=giohang" class="nav-item nav-link">Giỏ hàng</a>
                            <a href="index.php?act=contact" class="nav-item nav-link">Liên hệ</a>
                        </div>
                        
                    </div><?=$info_user?>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->