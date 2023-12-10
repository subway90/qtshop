
<?php
$bool_name = 2;
$name = "";
$price = "";
$mount = "";
$sale = 0;
$decribe = "";
$hinhsp = "";
$valid_image = 2;
$h_alert = '<div class="alert alert-sa-danger-card alert-sa-has-icon alert-dismissible fade show" role="alert">
<div class="alert-sa-icon">
    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
        <circle cx="12" cy="12" r="10"></circle> <line x1="12" y1="16" x2="12" y2="12"></line> <line x1="12" y1="8" x2="12.01" y2="8"></line>
    </svg>
</div>
<div class="alert-sa-content">';
$f_alert = '</div>
<button type="button" class="sa-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        include "./../Model/xl_sanpham.php";
        include "./../Model/xl_search.php";
        $load_user = load_user($_SESSION['dangnhap'][0][1]);
        if (isset($_REQUEST['update'])) 
        {
            $update = $_REQUEST['update'];
            $stt = $_REQUEST['stt'];
            $dh = $_REQUEST['dh'];
            if($update==0)
            {
                update_order_checkout($stt,$dh);
            }
            if($update==1)
            {
                update_order_delivery($stt,$dh);
            }
            if($update==2)
            {
                update_order_status($stt,$dh);
            }
            
        }
        if (isset($_REQUEST['del'])) 
        {
            $id = $_REQUEST['id'];
            if ($_REQUEST['del'] == 1) {
                if($_REQUEST['stt'] == 1)
                {
                    on_product($id);
                }else{
                    off_product($id);
                }
            }
            if($_REQUEST['del'] == 2) {
                if($_REQUEST['stt'] == 1)
                {
                    on_cate($id);
                }else{
                    off_cate($id);
                }
            }
            if($_REQUEST['del'] == 3) {
                if($_REQUEST['stt'] == 1)
                {
                    on_slide($id);
                }if($_REQUEST['stt'] == 3)
                {
                    in_slide();
                }
                else{
                    off_slide($id);
                }
            }
            if($_REQUEST['del'] == 4) {
                if($_REQUEST['stt'] == 1)
                {
                    on_cate_v1($id);
                }else{
                    off_cate_v1($id);
                }
            }
            
        }
        if(isset($_REQUEST['edit']))
        {
            $edit = $_REQUEST['edit'];
            if($edit == 0){
                $id = $_REQUEST['id'];
                $sp = mot_sanpham("sanpham",$id);
            }
            if($edit ==1)
            {
                $masp = $_POST['masp'];
                $tensp = $_POST['tensp'];
                $giasale = $_POST['giasale'];
                $giagoc = $_POST['giagoc'];
                $slsp = $_POST['slsp'];
                $decribe = $_POST['decribe'];
                $loaihang = $_POST['loaihang'];
                $size = $_POST['size'];
                $color = $_POST['color'];
                $hinhsp = $_POST['hinh_cu'];
                if(isset($_FILES['hinh_moi'])){  
                    if( $_FILES['hinh_moi']['name'] != ""){
                        $hinhsp = basename($_FILES['hinh_moi']['name']) ;
                        $path = __DIR__ . './../View/img/';
                        $target_file = $path . $hinhsp;
                        move_uploaded_file($_FILES['hinh_moi']['tmp_name'], $target_file);
                        // unlink("./../View/img/".$_POST['hinh_cu'] );
                    }
                }
                if($giasale>$giagoc)
                {
                    $giagoc = $giasale;
                    $sale = 0;
                }else
                {
                    $sale = floor((1-($giasale/$giagoc))*100);
                }
                capnhatsp("sanpham", $masp, $tensp, $giasale, $giagoc, $decribe, $slsp, $hinhsp,$loaihang, $sale, $size, $color);

            }
            if($edit ==2)
            {
                $v1 = $_POST['v1'];
                $name_cate = $_POST['name_cate'];
                $decribe_cate = $_POST['decribe_cate'];
                $id_cate = $_POST['id_cate'];
                $image_cate = $_POST['hinh_cu'];
                if(isset($_FILES['hinh_moi'])){  
                    if( $_FILES['hinh_moi']['name'] != ""){
                        $image_cate = basename($_FILES['hinh_moi']['name']) ;
                        $path = __DIR__ . './../View/img/';
                        $target_file = $path . $image_cate;
                        move_uploaded_file($_FILES['hinh_moi']['tmp_name'], $target_file);
                        // unlink("./../View/img/".$_POST['hinh_cu'] );
                    }
                }
                upload_cate($name_cate,$decribe_cate,$id_cate,$image_cate,$v1);
                // header('Location: index.php?act=admin-category');

            }
            if($edit == 3){
                $id_ct = $_REQUEST['id_ct'];
                $order = donhang_chitiet($id_ct);
            }
            if($edit == 4){
                $id = $_REQUEST['id'];
                $s_cate = select_cate($id);
            }
            if($edit == 5){
                $id = $_REQUEST['id'];
                $s_cate_v1 = select_one_cate_v1($id);
            }
            if($edit ==6)
            {
                $level = $_POST['level'];
                $name_cate = $_POST['name_cate_v1'];
                $decribe_cate = $_POST['decribe_cate_v1'];
                $id_cate = $_POST['id_cate_v1'];
                $image_cate = $_POST['hinh_cu'];
                if(isset($_FILES['hinh_moi'])){  
                    if( $_FILES['hinh_moi']['name'] != ""){
                        $image_cate = basename($_FILES['hinh_moi']['name']) ;
                        $path = __DIR__ . './../View/img/';
                        $target_file = $path . $image_cate;
                        move_uploaded_file($_FILES['hinh_moi']['tmp_name'], $target_file);
                        // unlink("./../View/img/".$_POST['hinh_cu'] );
                    }
                }
                upload_cate_v1($name_cate,$decribe_cate,$id_cate,$image_cate,$level);
                // header('Location: index.php?act=admin-category');

            }
        }

        if(isset($_REQUEST['upload']))
        {
            $upload = $_REQUEST['upload'];
            if($upload == 0){
                    $v1 = $_POST['v1'];
                    $name = $_POST['name'];
                    $decribe = $_POST['decribe'];
                    if(isset($_FILES['image']))
                    {
                        $image = basename($_FILES['image']['name']);
                        $path = __DIR__ . './../View/img/';
                        $target_file = $path . $image;
                        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                        themloai($name,$v1,$decribe,$image);
                    }
            }
            if($upload == 3){
                $level = $_POST['level'];
                $name = $_POST['name'];
                $decribe = $_POST['decribe'];
                if(isset($_FILES['image']))
                {
                    $image = basename($_FILES['image']['name']);
                    $path = __DIR__ . './../View/img/';
                    $target_file = $path . $image;
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                    themloaiv1($name,$level,$decribe,$image);
                }
        }
        if($upload==1)
        {
            $bool = 0;
            $id_loai = $_POST['id_loai'];
            if(!empty($_POST['name']))
            {
                $bool++;
                $name = $_POST['name'];
                $valid_name = "is-valid";
            }else{
                $_SESSION['alert'] .= 'Tên chưa được nhập.<br>';
                $valid_name = "is-invalid";
            }
            if(!empty($_POST['price']))
            {
                $bool++;
                $valid_price = "is-valid";
                $price = $_POST['price'];
            }else{
                $_SESSION['alert'] .= 'Giá Gốc chưa được nhập.<br>';
                $valid_price = "is-invalid";
            }
            if(!empty($_POST['sale']))
            {
                $sale = $_POST['sale'];
                if($sale<=$price)
                {
                    $bool++;
                    $ptsale = round((1-($sale/$price))*100);
                    $valid_sale = "is-valid";
                    $sale = $_POST['sale'];
                }else
                {
                    $valid_sale = "is-invalid";
                    $_SESSION['alert'] .= 'Giá Sale không được lớn hơn Giá Gốc.<br>';
                }
            }else{
                $bool++;
                $sale = $price;
                $ptsale = 0;
                $valid_sale = "is-valid";
            }
            if(!empty($_POST['mount']))
            {
                $bool++;
                $valid_mount = "is-valid";
                $mount = $_POST['mount'];
            }else{
                $_SESSION['alert'] .= 'Số lượng chưa được nhập.<br>';
                $valid_mount = "is-invalid";
            }
            if(!empty($_POST['size']))
            {
                $bool++;
                $valid_size = "is-valid";
                $size = $_POST['size'];
            }else{
                $_SESSION['alert'] .= 'Size sản phẩm chưa được nhập.<br>';
                $valid_size = "is-invalid";
            }
            if(!empty($_POST['color']))
            {
                $bool++;
                $valid_color = "is-valid";
                $color = $_POST['color'];
            }else{
                $_SESSION['alert'] .= 'Màu sản phẩm chưa được nhập.<br>';
                $valid_color = "is-invalid";
            }
            if(!empty($_POST['decribe']))
            {
                $bool++;
                $valid_decribe = "is-valid";
                $decribe = $_POST['decribe'];
            }else{
                $_SESSION['alert'] .= 'Ghi chú chưa được nhập.<br>';
                $valid_decribe = "is-invalid";
            }
            if($_FILES['image']['name'] !== "")
            {
                $auth_image = array('image/jpeg','image/jpg', 'image/png');
                if(in_array($_FILES['image']['type'],$auth_image) === false)
                {
                    $_SESSION['alert'] .= 'Vui lòng chọn đúng file ảnh (png/ jpg/ jpeg).<br>';
                }
                else{
                    if($_FILES['image']['size'] >= 5120000) // đơn vị: byte
                    {
                        $_SESSION['alert'] .= 'Vui lòng chọn đúng file ảnh dưới 5MB.<br>';
                    }
                    else{ //thành công
                        // $hinhsp = basename($_FILES['image']['name']);
                    $valid_image = 1;
                    $bool++;
                        $hinhsp = $_FILES['image']['name'];
                        $path = __DIR__ . './../View/img/';
                        $target_file = $path . $hinhsp;
                        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                        
                        }
                    }
                }
            else
            {
                $_SESSION['alert'] .= 'Hình ảnh chưa được nhập.<br>';
            }
            if($bool == 8)
        {
        $h_alert = '<div class="alert alert-sa-success-card alert-sa-has-icon alert-dismissible fade show" role="alert">
                        <div class="alert-sa-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
                                <circle cx="12" cy="12" r="10"></circle> <line x1="12" y1="16" x2="12" y2="12"></line> <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                        </div>
                    <div class="alert-sa-content">';
        $f_alert = '</div>
                        <button type="button" class="sa-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        $_SESSION['alert'] .= 'Sản phẩm đã đăng thành công !';
        themsp($id_loai, $name, $price, $sale, $decribe, $mount, $ptsale, $hinhsp, $color, $size);
        }
        }
        }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title>Quản lí H-Fashion</title>
    <!-- icon -->
    <link rel="icon" type="image/png" href="./../template/admin_t/images/favicon.png" />
    <!-- fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href="./../template/admin_t/vendor/bootstrap/css/bootstrap.ltr.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/highlight.js/styles/github.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/simplebar/simplebar.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/quill/quill.snow.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/air-datepicker/css/datepicker.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/select2/css/select2.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/datatables/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/fullcalendar/main.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/css/style.css" />
    <!-- cdn google -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
</head>

<body>
    <!-- sa-app -->
    <div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
        <!-- sa-app__sidebar -->
        <div class="sa-app__sidebar">
            <div class="sa-sidebar">
                <div class="sa-sidebar__header">
                    <a class="sa-sidebar__logo" href="index.php?act=admin-dashboard">
                        <!-- logo -->
                        <div class="sa-sidebar-logo">
                            <span class="h5 mb-0 text-uppercase text-primary bg-dark px-2">H</span>
                            <span class="h5 mb-0 text-uppercase text-dark bg-white px-2 ml-n1">Fashion</span>
                        </div>
                        <!-- logo / end -->
                    </a>
                </div>
                <div class="sa-sidebar__body" data-simplebar="">
                    <ul class="sa-nav sa-nav--sidebar" data-sa-collapse="">
                        <li class="sa-nav__section">
                            <ul class="sa-nav__menu sa-nav__menu--root">
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="index.php?act=admin-dashboard" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-tachometer-alt"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí doanh thu</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="index.php?act=admin-products" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-box"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí sản phẩm</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                    data-sa-collapse-item="sa-nav__menu-item--open"><a href="#" class="sa-nav__link"
                                        data-sa-collapse-trigger="">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-boxes"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí loại hàng</span>
                                            <span class="sa-nav__arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                                                <path d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z">
                                                </path>
                                                </svg></span></a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
                                        <li class="sa-nav__menu-item"><a href="index.php?act=admin-category-v1"
                                                class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Loại hàng mẹ (Lv1)</span></a></li>
                                        <li class="sa-nav__menu-item"><a href="index.php?act=admin-category"
                                                class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Loại hàng con (Lv2)</span></a></li>
                                    </ul>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="index.php?act=admin-accounts" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí tài khoản</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="index.php?act=admin-orders" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-shopping-cart"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí hóa đơn</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="index.php?act=admin-slide" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <!-- <i class="fas fa-shopping-cart"></i> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                                                <path d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2 C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2 C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3 C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z" ></path>
                                            </svg>
                                        </span>
                                        <span class="sa-nav__title">Quản lí slide</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sa-app__sidebar-shadow"></div>
            <div class="sa-app__sidebar-backdrop" data-sa-close-sidebar=""></div>
        </div>
        <!-- sa-app__sidebar / end -->
        <!-- sa-app__content -->
        <div class="sa-app__content">
            <!-- sa-app__toolbar -->
            <div class="sa-toolbar sa-toolbar--search-hidden sa-app__toolbar">
                <div class="sa-toolbar__body">
                    <div class="sa-toolbar__item">
                        <button class="sa-toolbar__button" type="button" aria-label="Menu" data-sa-toggle-sidebar="">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <div class="sa-toolbar__item">
                        Hệ thống quản lí H-Fashion
                    </div>
                    <div class="mx-auto"></div>

                    <div class="dropdown sa-toolbar__item">
                        <button class="sa-toolbar-user" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                            data-bs-offset="0,1" aria-expanded="false">
                            <span class="sa-toolbar-user__avatar sa-symbol sa-symbol--shape--rounded">
                                <img src="./../View/img/<?=$load_user[0]['image']?>" width="64" height="64">
                            </span>
                            <span class="sa-toolbar-user__info">
                                <span class="sa-toolbar-user__title">
                                <?=$load_user[0]['fullname']?>
                                </span>
                                <span class="sa-toolbar-user__subtitle">
                                <?=$_SESSION['dangnhap'][0][4]?>
                                </span>
                            </span>
                        </button>
                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="index.php">Trang chủ</a>
                                <a class="dropdown-item text-danger" href="index.php?act=logout">Thoát</a>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sa-toolbar__shadow"></div>
            </div>

                 
            
    