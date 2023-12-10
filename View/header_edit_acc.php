<?php
 include "./../Model/xl_sanpham.php";
 $update;
 $username = $_REQUEST['user'];
 $load_account = load_user($username);
 if(isset($_REQUEST['update'])){
    $update = $_REQUEST['update'];
    if($update == 1)
    {
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
        admin_update_user($username, $name_user,$phone_user,$address_user,$sex_user,$image);
        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Cập nhật thông tin thành công!</div>';
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
    
</body>
</html>