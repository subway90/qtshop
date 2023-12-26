<?php
require_once('config.php');
if(!defined('_CODE'))
{
        require_once('404.html'); exit;
}
session_start();
ob_start();
if(!isset($_SESSION['voucher'])) $_SESSION['voucher'] = [];
if(!isset($_SESSION['remember'])) $_SESSION['remember'] = [];
if(!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
if(!isset($_SESSION['yeuthich'])) $_SESSION['yeuthich'] = [];
if(!isset($_SESSION['dangnhap'])) $_SESSION['dangnhap'] = [];
if(!isset($_SESSION['thanhtoan'])) $_SESSION['thanhtoan'] = [];
if(!empty($_SESSION['dangnhap']))
{
        if($_SESSION['dangnhap'][0][7] == 0)
        {
                define('_ADMIN',true);
        }
}

if(isset($_REQUEST['act']))
{
        $act = $_REQUEST['act'];
        switch($act)
        {
        // chuc nang admin
        case "admin-cate-news":
                if(defined('_ADMIN'))
                {        
                include "./../View/header-admin.php";
                include "./../View/admin/cate_news.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                        require_once('404.html'); exit;
                }
        case "admin-edit-cate-news":
                if(defined('_ADMIN'))
                {  
                $_SESSION['alert'] = "";
                 include "./../View/header-admin.php";
                include "./../View/admin/edit_cate_news.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                        require_once('404.html'); exit;
                }
        case "admin-upload-cate-news":
                if(defined('_ADMIN'))
                {
                $_SESSION['alert'] = "";
                include "./../View/header-admin.php";
                include "./../View/admin/upload_cate_news.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                        require_once('404.html'); exit;
                }
        case "admin-upload-news":
                $_SESSION['alert'] = "";
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/upload_news.php";
                // include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                        require_once('404.html'); exit;
                }
        case "admin-edit-news":
                $_SESSION['alert'] = "";
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/edit_news.php";
                // include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                        require_once('404.html'); exit;
                }
        case "admin-news":
                $_SESSION['alert'] = "";
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/news.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                        require_once('404.html'); exit;
                }
        case "admin-infomation":
                $_SESSION['alert'] = "";
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/infomation.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                        require_once('404.html'); exit;
                }
        case "admin-voucher":
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/voucher.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                        require_once('404.html'); exit;
                }
        case "admin-upload-voucher":
                $_SESSION['alert'] = "";
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/upload_voucher.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                        require_once('404.html'); exit;
                }
        case "admin-review":
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/admin-review.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                        require_once('404.html'); exit;
                }
        case "admin-slide":
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/slide.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                        require_once('404.html'); exit;
                }
        case "admin-upload-slide":
                if(defined('_ADMIN'))
                {
                $_SESSION['alert'] = "";
                include "./../View/header-admin.php";
                include "./../View/admin/upload_slide.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                require_once('404.html'); exit;
                }       
        case "admin-edit-slide":
                $_SESSION['alert'] ="";
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/edit_slide.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                 require_once('404.html'); exit;
                }
        case "admin-edit":
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/editsp.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                require_once('404.html'); exit;
                }
        
        case "admin-dashboard":
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/dashboard.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else{
                        require_once('404.html'); exit;
                }
        case "admin-products":
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/products.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                header ('Location: index.php?act=404');              
                }
                case "admin-upload-product":
                $_SESSION['alert'] = "";
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/upload_sp.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                        require_once('404.html'); exit;
                }       
             
        case "admin-category":
                if(defined('_ADMIN'))
                {        
                include "./../View/header-admin.php";
                include "./../View/admin/category.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                        require_once('404.html'); exit;
                }

        case "admin-edit-cate":
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/edit_loai.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                require_once('404.html'); exit;
                }

        case "admin-upload-cate":
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/upload_loai.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                require_once('404.html'); exit;
                }

        case "admin-category-v1":
                if(defined('_ADMIN'))
                {        
                include "./../View/header-admin.php";
                include "./../View/admin/category-v1.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                        require_once('404.html'); exit;
                }
        case "admin-upload-cate-v1":
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/upload_loai_v1.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                require_once('404.html'); exit;
                }

        case "admin-edit-cate-v1":
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/edit_loai_v1.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                        require_once('404.html'); exit;
                }
        
        case "admin-accounts":
                $_SESSION['alert'] = "";
                include "./../View/header-admin.php";
                include "./../View/admin/accounts.php";
                include "./../View/admin/footer-admin.php";
                break;

        case "admin-edit-accounts":
                include "./../View/header_edit_acc.php";
                include "./../View/admin/edit_account.php";
                break;

        case "admin-orders":
                include "./../View/header-admin.php";
                include "./../View/admin/orders.php";
                include "./../View/admin/footer-admin.php";
                break;

        case "404":
                include "./../View/admin/404.html";
                break;

        case "forget-pass":
                include "./../View/user/header1.php";
                include "./../View/user/forget-pass.php";
                include "./../View/user/footer1.php";
                break;

        case "donhang-chitiet":
                if(defined('_ADMIN'))
                {
                include "./../View/header-admin.php";
                include "./../View/admin/hoadonchitiet.php";
                include "./../View/admin/footer-admin.php";
                break;
                }else
                {
                require_once('404.html'); exit;
                }      

        case "up-loai":
                if(defined('_ADMIN'))
                {
                include "./../View/admin/headeradmin.php";
                include "./../View/admin/upload_loai.php";
                break;
                }else
                {
                require_once('404.html'); exit;
                }


        // chuc nang user
        case "update_info":
                include "./../View/header_update.php";
                include "./../View/user/update_info.php";
                break;

        case "review":
                $_SESSION['alert'] = "";
                include "./../View/header_update.php";
                include "./../View/user/review.php";
                break;

        case "change_pass":
                include "./../View/user/doimatkhau.php";
                break;

        case "taouser":
                include "./../View/user/taouser.php";
                break;

        case "history":
                include "./../View/user/history.php";
                break;
        case "detail_history":
                include "./../View/user/detail_history.php";
                break;

        case "dangnhap":
                $_SESSION['alert'] = "";
                if(empty($_SESSION['dangnhap']))
                {
                $_SESSION['valid_username'] = "";
                $_SESSION['valid_password'] = "";
                include "./../View/user/dangnhap.php";
                break;
                }else
                {
                header('Location: index.php');
                }
        case "logout":
                $_SESSION['dangnhap']= [];
                header('Location: index.php');
                break;

        case "check_thanhtoan":
                include "./../View/user/check_thanhtoan.php";
                break;

        case "testcode":
                include "./../View/user/testcode.php";
                break;

        case "notification":
                include "./../View/user/header2.php";
                include "./../View/user/notification.php";
                include "./../View/user/footer2.php";
                break;
        
        case "testcode4":
                include "./../View/user/testcode4.php";
                break;

        case "giohang":
                $_SESSION['active_home'] = "";$_SESSION['active_product'] = "";$_SESSION['active_cart'] = "active";$_SESSION['active_contact'] = "";$_SESSION['active_news'] = "";$_SESSION['active_fashion'] = "";$_SESSION['active_promotion'] = "";
                include "./../View/user/header2.php";
                include "./../View/user/giohang2.php";
                include "./../View/user/footer2.php";
                break;

        case "yeuthich":
                $_SESSION['active_home'] = "";$_SESSION['active_product'] = "active";$_SESSION['active_cart'] = "";$_SESSION['active_contact'] = "";$_SESSION['active_news'] = "";$_SESSION['active_fashion'] = "";$_SESSION['active_promotion'] = "";
                include "./../View/user/header2.php";
                include "./../View/user/yeuthich.php";
                include "./../View/user/footer2.php";
                break;

        case "thanhtoan":
                $_SESSION['active_home'] = "";$_SESSION['active_product'] = "";$_SESSION['active_cart'] = "active";$_SESSION['active_contact'] = "";$_SESSION['active_news'] = "";$_SESSION['active_fashion'] = "";$_SESSION['active_promotion'] = "";
                if(!empty($_SESSION['giohang']))
                {
                include "./../View/user/header2.php";
                include "./../View/user/thanhtoan1.php";
                include "./../View/user/footer2.php";
                break;
                }
                else
                {
                header('Location: index.php?act=giohang');
                }

        case "detail":
                $_SESSION['active_home'] = "";$_SESSION['active_product'] = "active";$_SESSION['active_cart'] = "";$_SESSION['active_contact'] = "";$_SESSION['active_news'] = "";$_SESSION['active_fashion'] = "";$_SESSION['active_promotion'] = "";
                include "./../View/user/header2.php";
                include "./../View/user/detail2.php";
                include "./../View/user/footer2.php";
                break;

        case "contact":
                $_SESSION['alert'] = "";
                $_SESSION['active_home'] = "";$_SESSION['active_product'] = "";$_SESSION['active_cart'] = "";$_SESSION['active_contact'] = "active";$_SESSION['active_news'] = "";$_SESSION['active_fashion'] = "";$_SESSION['active_promotion'] = "";
                include "./../View/user/header2.php";
                include "./../View/user/contact2.php";
                include "./../View/user/footer2.php";
                break;

        case "shop":
                $_SESSION['active_home'] = "";$_SESSION['active_product'] = "active";$_SESSION['active_cart'] = "";$_SESSION['active_contact'] = "";$_SESSION['active_news'] = "";$_SESSION['active_fashion'] = "";$_SESSION['active_promotion'] = "";
                include "./../View/user/header2.php";
                include "./../View/user/shop2.php";
                include "./../View/user/footer2.php";
                break;

        case "news-index":
                $_SESSION['active_home'] = "";$_SESSION['active_product'] = "";$_SESSION['active_cart'] = "";$_SESSION['active_contact'] = "";$_SESSION['active_news'] = "active";$_SESSION['active_fashion'] = "active";$_SESSION['active_promotion'] = "";
                include "./../View/user/header2.php";
                include "./../View/user/news_index.php";
                include "./../View/user/footer2.php";
                break;

        case "news":
                $_SESSION['active_home'] = "";$_SESSION['active_product'] = "";$_SESSION['active_cart'] = "";$_SESSION['active_contact'] = "";$_SESSION['active_news'] = "active";$_SESSION['active_fashion'] = "active";$_SESSION['active_promotion'] = "";
                include "./../View/user/header2.php";
                include "./../View/user/news_user.php";
                include "./../View/user/footer2.php";
                break;

        case "search-product":
                $_SESSION['active_home'] = "active";$_SESSION['active_product'] = "";$_SESSION['active_cart'] = "";$_SESSION['active_contact'] = "";$_SESSION['active_news'] = "";$_SESSION['active_fashion'] = "";$_SESSION['active_promotion'] = "";
                include "./../View/user/header2.php";
                include "./../View/user/search.php";
                include "./../View/user/footer2.php";
                break;

        default:
                $_SESSION['active_home'] = "active";$_SESSION['active_product'] = "";$_SESSION['active_cart'] = "";$_SESSION['active_contact'] = "";$_SESSION['active_news'] = "";$_SESSION['active_fashion'] = "";$_SESSION['active_promotion'] = "";
                include "./../View/user/header2.php";
                include "./../View/user/body2.php";
                include "./../View/user/footer2.php";
                break;
                
    }
}
else
{     
                $_SESSION['alert'] = "";
                $_SESSION['active_home'] = "active";$_SESSION['active_product'] = "";$_SESSION['active_cart'] = "";$_SESSION['active_contact'] = "";$_SESSION['active_news'] = "";$_SESSION['active_fashion'] = "";$_SESSION['active_promotion'] = "";
                include "../View/user/header2.php";
                include "../View/user/body2.php";
                include "../View/user/footer2.php";
}  
?>
