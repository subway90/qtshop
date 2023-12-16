<?php
    include "./../Model/xl_sanpham.php";
    include "./../Model/xl_loaihang.php";
    include "./../Model/xl_giohang.php";
    include "./../Model/xl_thanhtoan.php";
    include "./../Model/xl_search.php";
    $info = select_infomation_web();
    //case tìm kiếm sản phẩm
    if (isset($_POST['text-search']))
    {
    $text_search = $_POST["text-search"];
    $list_search = search($text_search);
    }
    else
    {
    $text_search = "";
    }
    $info_user = '
    <div>
                <img src="../View/img/user_default.png" width="30px" height="30px" alt="image_user">
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span class="text-dark">Tài khoản của tôi</span></a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="index.php?act=dangnhap" class="dropdown-item">Đăng nhập</a>
                        <a href="index.php?act=taouser" class="dropdown-item">Đăng kí</a>
                    </div>
            </div>';
    if(!empty($_SESSION['dangnhap']))
    {
        $list_feedback = select_user_feedback($_SESSION['dangnhap'][0][0]);
        $count_feedback = count($list_feedback);
        if($count_feedback>0)
        {
            $notify_feedback = 0;
            for($i=0;$i<$count_feedback;$i++)
            {
                if($list_feedback[$i]['status'] == 1)
                {
                    $notify_feedback++;
                }else
                {
                    continue;
                }
            }
        }else
        {
            $notify_feedback = 0;
        }
        $user = load($_SESSION['dangnhap'][0][0]);
        if(($_SESSION['dangnhap'][0][7]) == 1)
        {
            $info_user = '
            <div>
                <img src="../View/img/'.$user[0][8].'" width="30px" height="30px" alt="image_user">
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span style="color: black">Xin chào</span> <span style="font-weight: bold">'.$user[0][3].'</span></a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="index.php?act=update_info" class="dropdown-item">Chỉnh sửa</a>
                        <a href="index.php?act=history" class="dropdown-item">Lịch sử mua hàng</a>
                        <a href="index.php?act=change_pass" class="dropdown-item">Đổi mật khẩu</a>
                        <a href="index.php?act=logout" class="dropdown-item text-danger">Đăng xuất</a>
                    </div>
            </div>';
        }else
        {
            $info_user = '
            <div>
                <img src="../View/img/'.$user[0][8].'" width="30px" height="30px" alt="image_user">
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span style="color: black">Xin chào</span> <span style="font-weight: bold">'.$user[0][3].'</span></a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="index.php?act=admin-dashboard" class="dropdown-item text-warning">Quản lí</a>
                        <a href="index.php?act=history" class="dropdown-item">Lịch sử mua hàng</a>
                        <a href="index.php?act=update_info" class="dropdown-item">Chỉnh sửa</a>
                        <a href="index.php?act=change_pass" class="dropdown-item">Đổi mật khẩu</a>
                        <a href="index.php?act=logout" class="dropdown-item text-danger">Đăng xuất</a>
                    </div>
            </div>';
        }
    }else
    {
        $notify_feedback = 0;
    }

    //filter shop
    $f_price = 0;
    $f_size = 0;
    $f_color = 0;
    $f_cate = 0;
    if(isset($_REQUEST['act']) && isset($_REQUEST['price']) && isset($_REQUEST['color']) && isset($_REQUEST['size']) && isset($_REQUEST['cate']))
    {
        $_SESSION['filter_list'] = "Bạn đang tìm theo : ";
        $select_product = "";
        $f_price = $_REQUEST['price'];
        if($f_price == 2){
            $select_product .= " AND sale >=0 AND sale <=100000 ";
            $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> GIÁ dưới 100K</button>";
        }elseif($f_price == 3){
            $select_product .= " AND sale >=100000 AND sale <=200000 ";
            $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> GIÁ từ 100K đến 200K</button>";
        }elseif($f_price == 4){
            $select_product .= " AND sale >=200000 AND sale <=500000 ";
            $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> GIÁ từ 200K đến 500K</button>";
        }elseif($f_price == 5){
            $select_product .= " AND sale >=500000 AND sale <=1000000 ";
            $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> GIÁ từ 500K đến 1TR</button>";
        }elseif($f_price == 6){
            $select_product .= " AND sale >=1000000 AND sale <=2000000 ";
            $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> GIÁ từ 1TR đến 2TR</button>";
        }elseif($f_price == 7){
            $select_product .= " AND sale >=2000000 ";
            $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> GIÁ trên 2 Triệu</button>";
        }else{
            $select_product .= "";
        }

        $f_color = $_REQUEST['color'];
        if($f_color >=2 && $f_color <=12){
            if($f_color == 2)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> màu đen</button>";
                $select_product .= " AND color like '%đen%' ";
            }
            if($f_color == 3)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> màu trắng</button>";
                $select_product .= " AND color like '%trắng%' ";
            }
            if($f_color == 4)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> màu xám</button>";
                $select_product .= " AND color like '%xám%' ";
            }
            if($f_color == 5)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> màu be</button>";
                $select_product .= " AND color like '%be%' ";
            }
            if($f_color == 6)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> màu đỏ</button>";
                $select_product .= " AND color like '%đỏ%' ";
            }
            if($f_color == 7)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> màu xanh dương</button>";
                $select_product .= " AND color like '%xanh dương%' ";
            }
            if($f_color == 8)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> màu xanh lá</button>";
                $select_product .= " AND color like '%xanh lá%' ";
            }
            if($f_color == 9)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> màu hồng</button>";
                $select_product .= " AND color like '%hồng%' ";
            }
            if($f_color == 10)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> màu vàng</button>";
                $select_product .= " AND color like '%vàng%' ";
            }
            if($f_color == 11)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> màu cam</button>";
                $select_product .= " AND color like '%cam%' ";
            }
            if($f_color == 12)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> màu tím</button>";
                $select_product .= " AND color like '%tím%' ";
            }
            if($f_color == 13)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> màu khác</button>";
                $select_product .= " AND color like '%khác%' ";
            }
        }else{
            $select_product .= "";
        }
        $f_size = $_REQUEST['size'];
        if($f_size >=2 && $f_size <=11)
        {
            if($f_size == 2)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> SIZE S</button>";
                $select_product .= " AND size like '%s%' ";
            }
            if($f_size == 3)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> SIZE M</button>";
                $select_product .= " AND size like '%m%' ";
            }
            if($f_size == 4)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> SIZE L</button>";
                $select_product .= " AND size like '%l%' ";
            }
            if($f_size == 5)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> SIZE 1XL</button>";
                $select_product .= " AND size like '%1xl%' ";
            }
            if($f_size == 6)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> SIZE 2XL</button>";
                $select_product .= " AND size like '%2xl%' ";
            }
            if($f_size == 7)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> SIZE 3XL</button>";
                $select_product .= " AND size like '%3xl%' ";
            }
            if($f_size == 8)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> SIZE 4XL</button>";
                $select_product .= " AND size like '%4xl%' ";
            }
            if($f_size == 9)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> SIZE 5XL</button>";
                $select_product .= " AND size like '%5xl%' ";
            }
            if($f_size == 10)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> SIZE 6XL</button>";
                $select_product .= " AND size like '%6xl%' ";
            }
            if($f_size == 11)
            {
                $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'> SIZE 7XL</button>";
                $select_product .= " AND size like '%7xl%' ";
            }
        }else{
            $select_product .= "";
        }
        $f_cate = $_REQUEST['cate'];
        if($f_cate > 0){
            $select_product .= " AND l.id_loaihang = $f_cate";
            $name = tenloai($f_cate);
            $_SESSION['filter_list'] .= "<button class='ml-2 btn-sm bg-secondary text-dark'>$name[0]</button>";
        }else{
            $select_product .= "";
        }
        if($select_product == "")
        {
            $_SESSION['filter_list'] = "";
        }
        $listitems = danhsachsp($select_product);
    }else
    {
        $select_product = "";
        $_SESSION['filter_list'] = "";
        $listitems = danhsachsp($select_product);
    }

    // lấy danh sách sản phẩm

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?=$info[1]?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../View/img/<?=$info[3]?>" rel="icon">
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

    <!-- JS paging -->
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
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="index.php?act=about-us">Giới thiệu</a>
                    <a class="text-body mr-3" href="index.php?act=contact">Liên hệ</a>
                    <a class="text-body mr-3" href="index.php?act=help">Câu hỏi</a>
                    <a class="text-body mr-3" href="index.php?act=dieukhoan">Điều khoản</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <?=$info_user?>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                                <!-- Mobile button heart and button carrt Mobile -->
                    <a href="index.php?act=notification" class="btn px-0 ml-2">
                        <i class="fas fa-bell text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;"><?=$notify_feedback?></span>
                    </a>
                    <a href="index.php?act=yeuthich" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;"><?=count($_SESSION['yeuthich'])?></span>
                    </a>
                    <a href="index.php?act=giohang" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;"><?=count($_SESSION['giohang'])?></span>
                    </a>
                    
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.php" class="text-decoration-none">
                    <span class="h1">
                    <img class="h1 mb-30" src="../View/img/<?=$info[3]?>" width="88px" height="88px" alt="">
                    </span>
                    <span class="h1 text text-dark bg-light">Thời Trang <span class="h1 text-danger">QT</span></span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="index.php?act=search-product" method="post">
                    <div class="input-group">
                    <input name="text-search" type="text" class="form-control" placeholder="Nhập tên sản phẩm để tìm kiếm" required value="<?=$text_search?>">
                        <div class="input-group-append">
                            <button class="ml-2 input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Hotline đặt hàng</p>
                <h5 class="m-0"><?=$info['web_phone']?></h5>
                <h6 class="m-0 mt-2">06H - 20H mỗi ngày</h6>
            </div>
            
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Tất cả loại hàng</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                    <?php
                        $list_v1 = list_cate_v1();
                        for ($i = 0; $i < count($list_v1); $i++)
                        {
                            $cate_v1 = $list_v1[$i];
                            if($cate_v1['level'] == 1)
                            {
                                ?>
                                <a href="index.php?act=shop&price=1&color=1&size=1&cate=<?=$cate_v1['id_cate']?>" class="nav-item nav-link"><?=$cate_v1['name']?></a>
                                <?php
                            }
                            else if($cate_v1['level'] == 2)
                            {
                                ?>
                                <div class="nav-item dropdown dropright">
                                    <a href="index.php?act=shop&price=1&color=1&size=1&cate=<?=$cate_v1['id_cate']?>" class="nav-link dropdown-toggle" data-toggle="dropdown"><?=$cate_v1['name']?>
                                        <i class="fa fa-angle-right float-right mt-1"></i>
                                    </a>
                                    <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                    <?php
                                    $list_v2 = list_cate_v2($cate_v1['id_cate']);
                                    if(count($list_v2)>0)
                                    {
                                        for($j=0;$j<count($list_v2);$j++)
                                        {
                                            $cate_v2 = $list_v2[$j];
                                        ?>
                                            <a href="index.php?act=shop&price=1&color=1&size=1&cate=<?=$cate_v2['id_loaihang']?>" class="dropdown-item"><?=$cate_v2['name']?></a>
                                        <?php
                                        }
                                    }
                                    else
                                    {
                                    ?>
                                            <a href="#" class="dropdown-item">Không có loại hàng</a>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                        <?php
                        }
                        ?>
                        
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="index.php" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text text-dark bg-light px-2">Thời Trang</span>
                        <span class="h1 text-uppercase bg-primary px-2 ml-n1">QT</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link <?=$_SESSION['active_home']?>">Trang chủ</a>
                            <a href="index.php?act=shop" class="nav-item nav-link <?=$_SESSION['active_product']?>">Sản phẩm</a>
                            <a href="index.php?act=giohang" class="nav-item nav-link <?=$_SESSION['active_cart']?>">Giỏ hàng</a>
                            <a href="index.php?act=contact" class="nav-item nav-link <?=$_SESSION['active_contact']?>">Liên hệ</a>

                            <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tin tức <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Thông báo</a>
                                    <a href="checkout.html" class="dropdown-item">Khuyến mãi</a>
                                </div>
                            </div> -->

                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="index.php?act=notification" class="btn px-0 ml-3">
                                <i class="fas fa-bell text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?=$notify_feedback?></span>
                            </a>
                            <a href="index.php?act=yeuthich" class="btn px-0 ml-3">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?=count($_SESSION['yeuthich'])?></span>
                            </a>

                            <a href="index.php?act=giohang" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?=count($_SESSION['giohang'])?></span>
                            </a>
                            
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
