
<?php
include './../Model/xl_sanpham.php';
$orders = order_of_user($_SESSION['dangnhap'][0]['id_user']);
$count_orders = count($orders);
$total_spend = 0;
for($i=0;$i<$count_orders;$i++)
{
    if($orders[$i]['thanhtoan'] == 1)
    {
        $total_spend += $orders[$i]['tongdh'];
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
</head>

<body><!-- sa-app -->
<!-- sa-app__body -->
            <div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                            <li class="breadcrumb-item"><a href="index.php?act=update_info">Tài khoản</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Lịch sử mua hàng</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Lịch sử mua hàng</h1>
                                </div>
                                <div class="col-auto d-flex"><a href="index.php?act=update_info" class="btn btn-secondary me-3">quay về Tài khoản</a><a
                                        href="index.php" class="btn btn-primary">Thoát</a></div>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <div class="pt-3">
                                                <div class="sa-symbol sa-symbol--shape--circle"
                                                    style="--sa-symbol--size:6rem"><img
                                                        src="./../View/img/<?=$_SESSION['dangnhap'][0]['image']?>" width="96"
                                                        height="96" alt="" /></div>
                                            </div>
                                            <div class="text-center mt-4">
                                                <div class="fs-exact-16 fw-medium"><?=$_SESSION['dangnhap'][0]['fullname']?></div>
                                                <div class="fs-exact-13 text-muted">
                                                    <div class="mt-1"><a href="#"><?=$_SESSION['dangnhap'][0]['email']?></a></div>
                                                    <div class="mt-1">0<?=number_format($_SESSION['dangnhap'][0]['phone'],0,' ',' ')?></div>
                                                </div>
                                            </div>
                                            <div class="sa-divider my-5"></div>
                                            <div class="w-100">
                                            <div
                                            class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                            <h2 class="mb-0 fs-exact-18 me-4">Hóa đơn</h2>
                                            <div class="text-muted fs-exact-14 text-end">Số hóa đơn: <?=$count_orders?> | Tổng chi trả: <?=number_format($total_spend,0,',','.')?> đ</div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="sa-table text-nowrap">
                                                <tbody>
                                                <tr>
                                                        <td><strong>Mã hóa đơn</strong></td>
                                                        <td><strong>Ngày đặt</strong></td>
                                                        <td><strong>Phương thức thanh toán</strong></td>
                                                        <td><strong>Trạng thái thanh toán</strong></td>
                                                        <td><strong>Trạng thái giao hàng</strong></td>
                                                        <td><strong>Tổng hóa đơn</strong></td>
                                                    </tr>
                                                <?php
                                                    
                                                    for($i=0;$i<$count_orders;$i++)
                                                    {
                                                        $one_order = $orders[$i];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <a href="index.php?act=detail_history&id=<?=$one_order['id_dh']?>&total=<?=$one_order['tongdh']?>&date=<?=$one_order['ngaydat']?>&pay=<?=$one_order['pay']?>&name=<?=$one_order['hoten']?>&phone=<?=$one_order['phone']?>&email=<?=$one_order['email']?>&address=<?=$one_order['address']?>&tt=<?=$one_order['thanhtoan']?>&gh=<?=$one_order['giaohang']?>&area=<?=$one_order['area_ship']?>&zip=<?=$one_order['zipcode']?>&fb=<?=$one_order['facebook']?>&vc=<?=$one_order['id_voucher']?>&eb=<?=$one_order['id_ebanking']?>">#<?=$one_order['id_dh']?></a>
                                                        </td>
                                                        <td><?=$one_order['ngaydat']?></td>
                                                        <td>
                                                            <?php
                                                            if($one_order['pay']==1)
                                                            {
                                                                ?>
                                                                    <span class="badge badge-sa-info">Tiền mặt (Thanh toán lúc nhận hàng)</span>
                                                            <?php
                                                            }else
                                                            {
                                                                ?>
                                                                    <span class="badge badge-sa-primary">E-banking (Thanh toán điện tử)</span>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if($one_order['thanhtoan']==1)
                                                            {
                                                                ?>
                                                                    <span class="badge badge-sa-success">Đã thanh toán</span>
                                                            <?php
                                                            }elseif($one_order['thanhtoan']==2)
                                                            {
                                                                ?>
                                                                    <span class="badge badge-sa-danger">Chưa thanh toán</span>
                                                                <?php
                                                            }else
                                                            {
                                                                ?>
                                                                    <span class="badge badge-sa-dark">Đã hủy</span>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if($one_order['giaohang']==1)
                                                            {
                                                                ?>
                                                                <span class="badge badge-sa-success">Đã giao hàng</span>
                                                            <?php
                                                            }elseif($one_order['giaohang']==2)
                                                            {
                                                                ?>
                                                                <span class="badge badge-sa-danger">Chưa giao hàng</span>
                                                            <?php
                                                            }elseif($one_order['giaohang']==3)
                                                            {
                                                                ?>
                                                                <span class="badge badge-sa-warning">Đang giao hàng</span>
                                                            <?php
                                                            }else
                                                            {
                                                                ?>
                                                                <span class="badge badge-sa-dark">Đã hủy</span>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?=number_format($one_order['tongdh'],0,',','.')?> <span style="text-decoration: underline">đ</span></td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- sa-app__body / end --><!-- sa-app__footer -->
        </div><!-- sa-app__content / end --><!-- sa-app__toasts -->
        <div class="sa-app__toasts toast-container bottom-0 end-0"></div><!-- sa-app__toasts / end -->
    </div><!-- sa-app / end --><!-- scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/feather-icons/feather.min.js"></script>
    <script src="vendor/simplebar/simplebar.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/highlight.js/highlight.pack.js"></script>
    <script src="vendor/quill/quill.min.js"></script>
    <script src="vendor/air-datepicker/js/datepicker.min.js"></script>
    <script src="vendor/air-datepicker/js/i18n/datepicker.en.js"></script>
    <script src="vendor/select2/js/select2.min.js"></script>
    <script src="vendor/fontawesome/js/all.min.js" data-auto-replace-svg="" async=""></script>
    <script src="vendor/chart.js/chart.min.js"></script>
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/js/dataTables.bootstrap5.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/fullcalendar/main.min.js"></script>
    <script src="js/stroyka.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/calendar.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/demo-chart-js.js"></script>
</body>
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/app-customer.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Jul 2023 09:19:07 GMT -->

</html>