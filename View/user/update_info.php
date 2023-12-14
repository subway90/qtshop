
<body>
<form action="index.php?act=update_info&update=1" method="post" enctype="multipart/form-data">
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
                                <div class="col-auto d-flex"><a href="index.php" class="btn btn-secondary me-3">Quay về</a><button
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
                                                    <img src="../View/img/<?=$load_user[8]?>" width="96" height="96" alt="" />
                                                </div>
                                            </div>
                                            <div class="text-center mt-4">
                                                <div class="fs-exact-16 fw-medium"> <?=$load_user[3]?></div>
                                                <div class="mt-2">Giới tính:
                                                    <?php if($load_user[10]==1){ ?>nam<?php }else{ ?>nữ<?php }?>
                                                </div>

                                                <div class="fs-exact-13 text-muted">
                                                    <div class="mt-2"><a href="mailto:<?=$load_user[4]?>"><?=$load_user[4]?></a></div>
                                                    <div class="mt-2">0<?=number_format($load_user[5],0,',',' ')?></div>
                                                    <div class="mt-2"><?=$load_user[6]?></div>
                                                    <div class="mt-4">Thay ảnh đại diện</div>
                                                    <input hidden  name="old_image" type="text" value="<?=$load_user[8]?>">
                                                    <input style="margin-left: 15%" type="file" name="new_image" value="">
                                                </div>
                                            </div>
                                            <div class="sa-divider my-5"></div>
                                            <div class="w-100">
                                                <dl class="list-unstyled m-0">
                                                    <dt class="fs-exact-14 fw-medium">Họ và Tên</dt>
                                                            <input name="fullname" type="text" class="form-control" value="<?=$load_user[3]?>" required>
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
                                                            <input disabled type="date" name="born" class="form-control" value="<?=$load_user[9]?>">
                                                </dl>
                                                <dl class="list-unstyled m-0 mt-4">
                                                    <dt class="fs-exact-14 fw-medium">Email</dt>
                                                    <input disabled name="email" type="email" class="form-control" value="<?=$load_user[4]?>" required>

                                                </dl>
                                                <dl class="list-unstyled m-0 mt-4">
                                                    <dt class="fs-exact-14 fw-medium">Số điện thoại</dt>
                                                    <input name="phone" type="number" class="form-control" value="0<?=$load_user[5]?>" required>

                                                </dl>
                                                <dl class="list-unstyled m-0 mt-4">
                                                    <dt class="fs-exact-14 fw-medium">Địa chỉ</dt>
                                                    <input name="address" type="text" class="form-control" value="<?=$load_user[6]?>" required>
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