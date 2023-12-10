<?php
if(!defined('_CODE'))
{
        require_once('404.html'); exit;
}
?>
<?php
$edit;
$id_ct;
$sp;
isset($_REQUEST['edit']);
$id_ct = $_REQUEST['id_ct'];
    $sp = donhang_chitiet($id_ct);
    $clsptt = count($sp);
    if(!empty($sp))
    {
?>
<div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="index.php?act=admin-dashboard">Quản lí</a></li>
                                            <li class="breadcrumb-item"><a href="index.php?act=admin-orders">Hóa đơn </a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Hóa đơn chi tiết</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Mã #<?=$id_ct?></h1>
                                </div>
                                <div class="col-auto d-flex"><a href="index.php" class="btn btn-secondary me-3">Quay về trang chủ</a>
                                <a href="index.php?act=admin-orders" class="btn btn-primary">Thoát</a></div>
                            </div>
                        </div>
                        <div class="sa-page-meta mb-5">
                            <div class="sa-page-meta__body">
                                <div class="sa-page-meta__list">
                                    <div class="sa-page-meta__item"><?=$sp[0][5]?></div>
                                    <div class="sa-page-meta__item"><?=$clsptt?> sản phẩm</div>
                                    <div class="sa-page-meta__item">Tổng : <?=number_format($_REQUEST['t'], 0, ',', '.')?> vnđ</div>
                                    <div class="sa-page-meta__item d-flex align-items-center fs-6">
                                        <?php
                                        $s_s_dh =  select_stt_dh($id_ct);
                                        if($s_s_dh['thanhtoan']==4 && $s_s_dh['giaohang']==4)
                                        {
                                        ?>
                                        <span class="badge badge-sa-dark me-2">Hóa đơn đã được hủy</span>
                                        <?php
                                        }else
                                        {
                                            if($s_s_dh['thanhtoan'] == 1)
                                            {
                                                ?>
                                            <span class="badge badge-sa-success me-2">Đã thanh toán</span>
                                                <?php
                                            }else
                                            {
                                            ?>
                                            <span class="badge badge-sa-danger me-2">Chưa thanh toán</span>
                                            <?php
                                            }
                                            if($s_s_dh['giaohang'] == 1)
                                            {
                                                ?>
                                            <span class="badge badge-sa-success me-2">Đã giao hàng</span>
                                                <?php
                                            }elseif($s_s_dh['giaohang'] == 3)
                                            {
                                                ?>
                                            <span class="badge badge-sa-warning me-2">Đang giao hàng</span>
                                                <?php
                                            }else
                                            {
                                            ?>
                                            <span class="badge badge-sa-danger me-2">Chưa giao hàng</span>
                                            <?php
                                            }
                                        }
                                        ?>
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div class="card mt-0">
                                        <div
                                            class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                            <h2 class="mb-0 fs-exact-18 me-4">Chi tiết</h2>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="sa-table">
                                                <tbody>
                                                <tr>
                                                        <td class="min-w-20x">

                                                            <div class="d-flex align-items-center">Sản phẩm</div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                Giá
                                                            </div>
                                                        </td>
                                                        <td class="text-end">Số lượng</td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                Tổng
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
        for($i=0; $i<$clsptt; $i++)
        {
            $id_sp[$i] = mot_sanpham("sanpham",$sp[$i][2]);
            if(!empty($id_sp[$i]))
            {
?>                       
                                                    <tr>
                                                        <td class="min-w-20x">

                                                            <div class="d-flex align-items-center"><img src="./../View/img/<?=$id_sp[$i][0]['image']?>"
                                                                    class="me-4" width="40" height="40" alt="" /><a
                                                                    href="app-product.html" class="text-reset"></span><?=$id_sp[$i][0]['Name']?></a></div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="sa-price"><span
                                                                    class="sa-price__symbol"><?=number_format($id_sp[$i][0]['Price'],0,',','.')?></span>
                                                            </div>
                                                        </td>
                                                        <td class="text-end"><?=$sp[$i][3]?></td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol"><?=number_format($sp[$i][4],0,',','.')?></span>
                                                            </div>
                                                        </td>
                                                    </tr>
<?php
            }
        }
            ?>
                                                </tbody>
                                                <tbody class="sa-table__group">
                                                    <tr>
                                                        <td colSpan="3">Tổng hóa đơn</td>
                                                        <td class="text-end">
                                                            <div class="sa-price"><span
                                                                    class="sa-price__symbol"><?=number_format($_REQUEST['t'], 0, ',', '.')?></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colSpan="3">Phí giao hàng<div class="text-muted fs-exact-13">dịch vụ Giaohangnhanh.vn</div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="sa-price"><span
                                                                    class="sa-price__symbol">50.000</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td colSpan="3">Tổng</td>
                                                        <td class="text-end">
                                                            <div class="sa-price"><span
                                                                    class="sa-price__symbol"><?=number_format($_REQUEST['t']+50000, 0, ',', '.')?></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div
                                            class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                            <h2 class="mb-0 fs-exact-18 me-4">Trạng thái thanh toán</h2>
                                         </div>
                                        <div class="table-responsive">
                                            <table class="sa-table text-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td>E-banking<div class="text-muted fs-exact-13">Vietcombank</div>
                                                        </td>
                                                        <td><?=$sp[0][5]?></td>
                                                        <td class="text-end">
                                                            <div class="sa-price"><span
                                                                    class="sa-price__symbol"><?=number_format($_REQUEST['t']+50000, 0, ',', '.')?> </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card">
                                        <div
                                            class="card-body d-flex align-items-center justify-content-between pb-0 pt-4">
                                            <h2 class="fs-exact-16 mb-0">Khách hàng</h2>
                                        </div>
                                        <?php
                                                $image = image_user($_REQUEST['id_user']);
                                        ?>
                                        <div class="card-body d-flex align-items-center pt-4">
                                            <div class="sa-symbol sa-symbol--shape--circle sa-symbol--size--lg">
                                             
                                                <img src="./../View/img/<?=$image['image']?>" width="40" height="40" alt="image user" />
                                            </div>
                                            <div class="ms-3 ps-2">
                                                <div class="fs-exact-14 fw-medium"><?=$_REQUEST['name']?></div>
                                                <div class="fs-exact-13 text-muted"><?=$_REQUEST['e']?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div
                                            class="card-body d-flex align-items-center justify-content-between pb-0 pt-4">
                                            <h2 class="fs-exact-16 mb-0">Thông tin liên hệ</h2>
                                        </div>
                                        <div class="card-body pt-4 fs-exact-14">
                                            <div><?=$_REQUEST['name']?></div>
                                            <div class="mt-1"><a href="mailto:<?=$_REQUEST['e']?>"> Email: <?=$_REQUEST['e']?></a></div>
                                            <div class="text-muted mt-1">SĐT : <?=$_REQUEST['phone']?></div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div
                                            class="card-body d-flex align-items-center justify-content-between pb-0 pt-4">
                                            <h2 class="fs-exact-16 mb-0">Địa chỉ giao hàng</h2>
                                        </div>
                                        <div class="card-body pt-4 fs-exact-14">
                                        <?=$_REQUEST['add'];?>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div
                                            class="card-body d-flex align-items-center justify-content-between pb-0 pt-4">
                                            <h2 class="fs-exact-16 mb-0">Địa chỉ giao hàng 2</h2>
                                        </div>
                                        <div class="card-body pt-4 fs-exact-14">Không</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
<?php
            }else
            {
                ?>
                <div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="index.php?act=admin-dashboard">Quản lí</a></li>
                                            <li class="breadcrumb-item"><a href="index.php?act=admin-orders">Hóa đơn </a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Hóa đơn chi tiết</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Mã #<?=$id_ct?></h1>
                                </div>
                                <div class="col-auto d-flex"><a href="index.php?act=admin-orders" class="btn btn-secondary me-3">Quay về</a>
                                <a href="#" class="btn btn-primary">Edit</a></div>
                            </div>
                        </div>
                        <div class="sa-page-meta mb-5">
                            <div class="sa-page-meta__body">
                                <div class="sa-page-meta__list">
                                    
                                    <div class="sa-page-meta__item d-flex align-items-center">
                                    <h1 class="text-danger">Đơn hàng không tồn tại !</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
                <?php
            }
?>