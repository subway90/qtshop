<?php
if(!defined('_CODE'))
{
        require_once('404.html'); exit;
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
    <link rel="icon" type="image/png" href="./../t/admin_t/images/favicon.png" />
    <!-- fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href="./../t/admin_t/vendor/bootstrap/css/bootstrap.ltr.css" />
    <link rel="stylesheet" href="./../t/admin_t/vendor/highlight.js/styles/github.css" />
    <link rel="stylesheet" href="./../t/admin_t/vendor/simplebar/simplebar.min.css" />
    <link rel="stylesheet" href="./../t/admin_t/vendor/quill/quill.snow.css" />
    <link rel="stylesheet" href="./../t/admin_t/vendor/air-datepicker/css/datepicker.min.css" />
    <link rel="stylesheet" href="./../t/admin_t/vendor/select2/css/select2.min.css" />
    <link rel="stylesheet" href="./../t/admin_t/vendor/datatables/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="./../t/admin_t/vendor/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="./../t/admin_t/vendor/fullcalendar/main.min.css" />
    <link rel="stylesheet" href="./../t/admin_t/css/style.css" />
</head>
<body>
<form action="index.php?act=admin-edit-accounts&update=1&user=<?=$load_account[0]['username']?>" method="post" enctype="multipart/form-data">
<div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="index.php?act=user">Trang chủ</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Thông tin</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Chỉnh sửa thông tin</h1>
                                </div>
                                <div class="col-auto d-flex"><a href="index.php?act=admin-accounts" class="btn btn-secondary me-3">Quay về</a><button
                                        type="submit" class="btn btn-primary">Cập nhật</button></div>
                            </div>
                        </div>
                    <div><?=$_SESSION['alert']?></div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <div class="pt-3">
                                                <div class="sa-symbol sa-symbol--shape--circle" style="--sa-symbol--size:6rem">
                                                    <img src="./../View/img/<?=$load_account[0][8]?>" width="96" height="96" alt="" />
                                                </div>
                                            </div>
                                            <div class="text-center mt-4">
                                                <div class="fs-exact-16 fw-medium"> <?=$load_account[0][3]?></div>
                                                <div class="mt-2">Giới tính:
                                                    <?php if($load_account[0][10]==1){ ?>nam<?php }else{ ?>nữ<?php }?>
                                                </div>

                                                <div class="fs-exact-13 text-muted">
                                                    <div class="mt-2"><a href="mailto:<?=$load_account[0][4]?>"><?=$load_account[0][4]?></a></div>
                                                    <div class="mt-2">0<?=number_format($load_account[0][5],0,',',' ')?></div>
                                                    <div class="mt-2"><?=$load_account[0][6]?></div>
                                                    <div class="mt-4">Thay ảnh đại diện</div>
                                                    <input hidden  name="old_image" type="text" value="<?=$load_account[0][8]?>">
                                                    <input class="form-control form-control-sm" type="file" name="new_image" value="">
                                                </div>
                                            </div>
                                            <div class="sa-divider my-5"></div>
                                            <div class="w-100">
                                                <dl class="list-unstyled m-0">
                                                    <dt class="fs-exact-14 fw-medium">Họ và Tên</dt>
                                                            <input name="fullname" type="text" class="form-control" value="<?=$load_account[0][3]?>" required>
                                                </dl>
                                                <dl class="list-unstyled m-0 mt-4">
                                                    <dt class="fs-exact-14 fw-medium">Giới tính</dt>
                                                            <select class="form-control " name="sex">
                                                                <option value="1">Nam</option>
                                                                <option value="2">Nữ</option>
                                                            </select>
                                                </dl>
                                                <dl class="list-unstyled m-0 mt-4">
                                                    <dt class="fs-exact-14 fw-medium">Ngày sinh</dt>
                                                            <input disabled type="date" name="born" class="form-control" value="<?=$load_account[0][9]?>">
                                                </dl>
                                                <dl class="list-unstyled m-0 mt-4">
                                                    <dt class="fs-exact-14 fw-medium">Email</dt>
                                                    <input disabled name="email" type="email" class="form-control" value="<?=$load_account[0][4]?>" required>

                                                </dl>
                                                <dl class="list-unstyled m-0 mt-4">
                                                    <dt class="fs-exact-14 fw-medium">Số điện thoại</dt>
                                                    <input name="phone" type="number" class="form-control" value="0<?=$load_account[0][5]?>" required>

                                                </dl>
                                                <dl class="list-unstyled m-0 mt-4">
                                                    <dt class="fs-exact-14 fw-medium">Địa chỉ</dt>
                                                    <input name="address" type="text" class="form-control" value="<?=$load_account[0][6]?>" required>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</form>
</body>
</html>