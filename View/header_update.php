<?php
 include "./../Model/xl_user.php";
 $update;
 $load_user = mot_user($_SESSION['dangnhap'][0][1]);
 if(isset($_REQUEST['update']))
 {
    $update = $_REQUEST['update'];
    if($update == 1)
    {

        $id_user = $_SESSION['dangnhap'][0][0];
        $name_user = $_POST['fullname'];
        $sex_user = $_POST['sex'];
        $address_user = $_POST['address'];
        $phone_user = $_POST['phone'];
            $image = $_POST['old_image'];
            if(isset($_FILES['new_image'])){  
                if( $_FILES['new_image']['name'] != ""){
                    $image = basename($_FILES['new_image']['name']) ;
                    $path = __DIR__ . './../View/img/';
                    $target_file = $path . $image;
                    move_uploaded_file($_FILES['new_image']['tmp_name'], $target_file);
                    // unlink("./../View/img/".$_POST['old_image'] );

                }
            }
        capnhat_user($id_user, $name_user,$phone_user,$address_user,$sex_user,$image);
        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Cập nhật thông tin thành công!</div>
        ';
    }
}
//case feedback
if($_REQUEST['act'] == "review")
{
    $id_review = $_REQUEST['id_review'];
    $info_review = all_in_feedback($id_review);
    if(!empty($info_review['rating']))
    {
        $rating = $info_review['rating'];
    }else
    {
        $rating = 5;
    }
    if(!empty($info_review['noidung']))
    {
        $noidung = $info_review['noidung'];
    }else
    {
        $noidung = "";
    }

    if(isset($_REQUEST['sendfeedback']))
    {
        $valid_image = "";
        $valid_rating = "";
        $valid_noidung = "";
        $step_sent_feedback = 0;
        $id_review = $_POST['id_review'];
        $noidung = $_POST['noidung'];
        if(!empty($noidung))
        {
            ++$step_sent_feedback;
            $valid_noidung = "is-valid";
        }else
        {
            $valid_noidung = "is-invalid";
            $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Bạn chưa nhập nội dung đánh giá!</div><br>';
        }
        if(!empty($_POST['rating']))
        {
            ++$step_sent_feedback;
            $rating = $_POST['rating'];
            $valid_rating = "is-valid";
        }else
        {
            $rating = 5;
        }
        if(isset($_FILES['image']))
            {
                if($_FILES['image']['name'] !== "")
                {
                    $verify_type = array('image/jpeg','image/jpg', 'image/png');
                    if(in_array($_FILES['image']['type'],$verify_type) === false)
                    {
                        --$step_sent_feedback;
                        $valid_image = "is-invalid";
                        $_SESSION['alert'] .= '<div class="alert alert-danger" role="alert">Vui lòng chọn đúng định dạng ảnh!</div><br>';
                    }else
                    {
                        if($_FILES['image']['size'] > 5120000) // đơn vị: byte (>5MB)
                        {
                            --$step_sent_feedback;
                            $valid_image = "is-invalid";
                            $_SESSION['alert'] .= '<div class="alert alert-danger" role="alert">Vui lòng chọn ảnh có kích thước dưới 5MB.</div><br>';
                        }else
                        {
                            $image = basename($_FILES['image']['name']) ;
                            $path = __DIR__ . './../View/img/';
                            $target_file = $path . $image;
                            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                            $valid_image = "is-valid";
                        }
                    }
                }else
                {
                    $image="trống";
                }
            }else
            {
                $image="trống";
            }
            if($step_sent_feedback==2)
            {
                send_feedback($id_review,$noidung,$rating,$image);
            }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/png" href="./../template/admin_t/images/favicon.png" />
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

</head>
<body>
