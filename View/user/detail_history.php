<?php
    include './../Model/xl_sanpham.php';
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];
    $tt = $_REQUEST['tt'];
    $total = $_REQUEST['total'];
    $date = $_REQUEST['date'];
    $gh = $_REQUEST['gh'];
    $pay = $_REQUEST['pay'];
    $zip = $_REQUEST['zip'];
    $area = $_REQUEST['area'];
    $fb = $_REQUEST['fb'];
    $id_vc = $_REQUEST['vc'];
    $id_eb = $_REQUEST['eb'];
    if($id_vc == 0)
    {
        $voucher_detail = [];
    }else
    {
        $voucher_detail = select_one_voucher($id_vc);
    }
    if($id_eb == 1)
    {
        $ebanking_detail = [];
    }else
    {
        $ebanking_detail = select_one_ebanking($id_eb);
    }
    $detail_order = detail_of_order($id);
    $info = select_infomation_web();
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
<div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="index.php?act=update_info">Tài khoản</a></li>
                                            <li class="breadcrumb-item"><a href="index.php?act=history">Lịch sử mua hàng</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Chi tiết hóa đơn</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Chi tiết hóa đơn #<?=$id?></h1>
                                </div>
                                <div class="col-auto d-flex"><a href="index.php?act=history" class="btn btn-secondary me-3">quay về Lịch sử</a><a
                                        href="index.php" class="btn btn-primary">Thoát</a></div>
                            </div>
                        </div>
                        <div class="sa-page-meta mb-5">
                            <div class="sa-page-meta__body">
                                <div class="sa-page-meta__list">
                                    <div class="sa-page-meta__item">Thời gian: <?=$date?></div>
                                    <div class="sa-page-meta__item">Tổng hóa đơn: <?=number_format($total,0,',','.')?> đ</div>
                                    <?php
                                    if($gh==4 && $tt==4)
                                    {
                                    ?>
                                    <div class="sa-page-meta__item d-flex align-items-center fs-6">
                                        <span class="badge badge-sa-dark me-2">Đơn hàng đã bị hủy</span>
                                    </div>
                                    <?php
                                    }else
                                    {
                                    ?>
                                    <div class="sa-page-meta__item d-flex align-items-center fs-6">
                                        <?php
                                        if($tt==1)
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
                                        if($gh==1)
                                        {
                                        ?>
                                        <span class="badge badge-sa-success me-2">Đã giao hàng</span>
                                        <?php
                                        }elseif($gh==2)
                                        {
                                        ?>
                                        <span class="badge badge-sa-danger me-2">Chưa giao hàng</span>
                                        <?php
                                        }else
                                        {
                                        ?>
                                        <span class="badge badge-sa-warning me-2">Đang giao hàng</span>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div class="card mt-5">
                                        <div
                                            class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                            <h2 class="mb-0 fs-exact-18 me-4">Chi tiết hóa đơn</h2>
                                            <div class="text-muted fs-exact-14"><a href="#"></a></div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="sa-table">
                                                <tbody>
                                                    <tr>
                                                        <td class="min-w-20x">Sản phẩm</td>
                                                        <td class="text-end">Giá</td>
                                                        <td class="text-end">Size</td>
                                                        <td class="text-end">Màu</td>
                                                        <td class="text-end">Số lượng mua</td>
                                                        <td class="text-end">Tổng</td>
                                                    </tr>
                                                    <?php
                                                    $total_product = 0;
                                                    for($i=0;$i<count($detail_order);$i++)
                                                    {
                                                        $order = $detail_order[$i];
                                                        $total_product += $order['tong'];
                                                    ?>
                                                    <tr>
                                                        <td class="min-w-20x">
                                                            <div class="d-flex align-items-center">
                                                                <img  src="./../View//img/<?=$order['image']?>" class="me-4" width="40" height="40" alt="" />
                                                                <a href="index.php?act=detail&edit=0&id=<?=$order['id_sp']?>" class="text-reset"><?=$order['tensp']?></a>
                                                            </div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol"><?=number_format($order['giasp'],0,',','.')?> đ</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol"><?=strtoupper($order['size'])?></span>
                                                            </div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol"><?=$order['color']?></span>
                                                            </div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol"><?=$order['soluong']?></span>
                                                            </div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol"><?=number_format($order['tong'],0,',','.')?> đ</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                                <tbody class="sa-table__group">
                                                    <tr>
                                                        <td colSpan="5">Tổng sản phẩm</td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol"><?=number_format($total_product,0,',','.')?> đ</span>
                                                        </td>
                                                    </tr>
                                                        <?php
                                                        if(!empty($voucher_detail))
                                                        {
                                                        ?>
                                                    <tr>
                                                        <td colSpan="5">Áp dụng mã giảm giá
                                                            <div class="text-muted fs-exact-13">mã <strong><?=strtoupper($voucher_detail['code'])?></strong></div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol"><?='- '.number_format($total_product-$total,0,',','.')?> đ</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td colSpan="5">Tổng hóa đơn</td>
                                                        <td class="text-end">
                                                            <div class="sa-price"><span class="sa-price__symbol"><?=number_format($total,0,',','.')?> đ</span>
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
                                            <h2 class="mb-0 fs-exact-18 me-4">Thông tin giao hàng</h2>
                                            <div>
                                            <?php
                                            if($gh==1)
                                            {
                                            ?>
                                            <span class="badge badge-sa-success">Đã giao hàng</span>
                                            <?php
                                            }elseif($gh==2)
                                            {
                                            ?>
                                            <span class="badge badge-sa-danger">Chưa giao hàng</span>
                                            <?php
                                            }else
                                            {
                                            ?>
                                            <span class="badge badge-sa-warning">Đang giao hàng</span>
                                            <?php
                                            }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="sa-table text-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Họ và tên</strong></div>
                                                        </td>
                                                        <td class="text-end"><?=$name?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Số điện thoại</strong></div>
                                                        </td>
                                                        <td class="text-end"><?='0'.number_format($phone,0,',',' ')?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Địa chỉ</strong></div>
                                                        </td>
                                                        <td class="text-end"><?=$address?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Email</strong></div>
                                                        </td>
                                                        <td class="text-end"><?=$email?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Khu vực giao hàng</strong></div>
                                                        </td>
                                                        <td class="text-end">Khu vực <?=$area?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Mã bưu điện</strong></div>
                                                        </td>
                                                        <td class="text-end"><?=$zip?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Facebook</strong></div>
                                                        </td>
                                                        <td class="text-end"><?=$fb?></td>
                                                    </tr>
                                                </tbody>
                                                    <?php
                                                    if($pay==2)
                                                    {
                                                        if($tt==1)
                                                        {
                                                            if($gh==1)//đã thanh toán, đã giao hàng
                                                            {
                                                        ?>
                                                        <tr>
                                                            <td colSpan="2" style="text-align:center"><span class="text-muted">Đơn hàng đã được giao, cảm ơn quý khách ! Thời gian cập nhật trạng thái Giao hàng : <strong>0000-00-00 00:00:00</strong><br>Hotline liên hệ hỗ trợ <strong><?=$info['web_phone']?></strong> | 08h00 - 20h00</span></td>
                                                        </tr>
                                                        <?php
                                                            }
                                                            elseif($gh==2)//đã thanh toán, chưa giao hàng
                                                            {
                                                        ?>
                                                        <tr>
                                                            <td colSpan="2" style="text-align:center"><span class="text-muted">Đơn hàng đang được sắp xếp để giao cho bạn, trễ nhất là 24h sau khi có trạng thái <span class="text-success">Thanh toán Thành công</span><br>Hotline liên hệ hỗ trợ <strong><?=$info['web_phone']?></strong> | 08h00 - 20h00</span></td>
                                                        </tr>
                                                        <?php
                                                            }elseif($gh==3)//đã thanh toán, đang giao hàng
                                                            {
                                                        ?>
                                                        <tr>
                                                            <td colSpan="2" style="text-align:center"><span class="text-muted">Đơn hàng đang được giao đến cho bạn. Thời gian cập nhật trạng thái Giao hàng : <strong>0000-00-00 00:00:00</strong><br>Hotline liên hệ hỗ trợ <strong><?=$info['web_phone']?></strong> | 08h00 - 20h00</span></td>
                                                        </tr>
                                                        <?php
                                                            }
                                                        }elseif($tt==2)
                                                        {
                                                        ?>
                                                        <tr>
                                                            <td colSpan="2" style="text-align:center"><span class="text-muted">Quý khách vui lòng thannh toán để được nhận hàng.</span></td>
                                                        </tr>
                                                        <?php
                                                        }
                                                    }elseif($pay==1)
                                                    {
                                                        if($gh==1)//giao thành công
                                                        {
                                                    ?>
                                                        <tr>
                                                            <td colSpan="2" style="text-align:center"><span class="text-muted">Đơn hàng đã được <span class="text-success">Giao thành công</span>, cảm ơn quý khách ! Thời gian cập nhật trạng thái Giao hàng : <strong>0000-00-00 00:00:00</strong><br>Hotline liên hệ hỗ trợ <strong><?=$info['web_phone']?></strong> | 08h00 - 20h00</span></td>
                                                        </tr>
                                                        
                                                    <?php
                                                        }elseif($gh==2)//chưa giao
                                                        {
                                                    ?>
                                                        <tr>
                                                            <td colSpan="2" style="text-align:center"><span class="text-muted">Đơn hàng đang được sắp xếp để giao cho bạn. Hotline liên hệ hỗ trợ <strong><?=$info['web_phone']?></strong> | 08h00 - 20h00</span></td>
                                                        </tr>
                                                    <?php
                                                        }elseif($gh==3)//đang giao
                                                        {
                                                    ?>
                                                        <tr>
                                                            <td colSpan="2" style="text-align:center"><span class="text-muted">Đơn hàng <span class="text-warning">Đang được giao</span> đến cho bạn. Thời gian cập nhật trạng thái Giao hàng : <strong>0000-00-00 00:00:00</strong><br>Hotline liên hệ hỗ trợ <strong><?=$info['web_phone']?></strong> | 08h00 - 20h00</span></td>
                                                        </tr>
                                                    <?php
                                                        }else
                                                        {
                                                    ?>
                                                        <tr>
                                                            <td colSpan="2" style="text-align:center"><span class="text-muted">Đơn hàng đã hủy vì bạn chưa được xác nhận. Thời gian cập nhật trạng thái: <strong>0000-00-00 00:00:00</strong><br>Hotline liên hệ hỗ trợ <strong><?=$info['web_phone']?></strong> | 08h00 - 20h00</span></td>
                                                        </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div
                                            class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                            <h2 class="mb-0 fs-exact-18 me-4">Thông tin thanh toán</h2>
                                            <div>
                                            <?php
                                            if($tt==1)
                                            {
                                            ?>
                                            <span class="badge badge-sa-success">Đã thanh toán</span>
                                            <?php
                                            }else
                                            {
                                            ?>
                                            <span class="badge badge-sa-danger">Chưa thanh toán</span>
                                            <?php
                                            }
                                            ?>
                                            </div>
                                        </div>
                                        <table class="sa-table">
                                            <?php
                                            if($pay==2)
                                            {
                                                if($tt==2)
                                                {
                                            ?>
                                            <tbody class="sa-table__group">
                                                <tr>
                                                    <td>Phương thức thanh toán</td>
                                                    <td class="text-end">
                                                        <div class="sa-price">
                                                            <span class="sa-price__symbol">Thanh toán điện tử <strong>E-banking </strong></span
                                                            ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Số tiền cần thanh toán</td>
                                                    <td class="text-end">
                                                        <div class="sa-price">
                                                            <span class="sa-price__symbol"><?=number_format($total,0,',','.')?> đ</span>
                                                            </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody class="sa-table__group">
                                                <tr>
                                                    <td class="h6"><strong>Quý khách vui lòng thanh toán theo thông tin sau: </strong></td>
                                                    <td class="text-end">
                                                        <div class="sa-price">
                                                            <span class="sa-price__symbol"></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Ngân hàng nhận:</td>
                                                    <td class="text-end">
                                                        <div class="sa-price">
                                                            <span class="sa-price__symbol"><strong class="text-muted"><?=$info['bank_name1']?></strong></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Số tài khoản</td>
                                                    <td class="text-end">
                                                        <div class="sa-price">
                                                            <span class="sa-price__symbol"><strong class="text-muted"><?=$info['bank_id1']?></strong></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Chủ tài khoản</td>
                                                    <td class="text-end">
                                                        <div class="sa-price">
                                                            <span class="sa-price__symbol"><strong class="text-muted"><?=$info['bank_user1']?></strong></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Số tiền chuyển khoản</td>
                                                    <td class="text-end">
                                                        <div class="sa-price">
                                                            <span class="sa-price__symbol"><strong class="text-muted"><?=number_format($total,0,',','.')?> đ</strong></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nội dung chuyển khoản</td>
                                                    <td class="text-end">
                                                        <div class="sa-price">
                                                            <span class="sa-price__symbol"><strong class="text-muted"><?='QTE'.$id_eb?></strong></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td colSpan="2" style="text-align:center"><span class="text-muted">Sau khi chuyển khoản thành công, bên shop sẽ phản hồi sớm nhất có thể, chậm nhất là 24h. Liên hệ hỗ trợ qua hotline <strong><?=$info['web_phone']?></strong> | 08h00 - 20h00</span></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                                }elseif($tt==1)
                                                {
                                                    ?>
                                            <tbody class="sa-table__group">
                                                <tr>
                                                    <td>Phương thức thanh toán</td>
                                                    <td class="text-end">
                                                        <div class="sa-price">
                                                            <span class="sa-price__symbol">Thanh toán điện tử <strong>E-banking </strong></span
                                                            ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Số tiền đã thanh toán</td>
                                                    <td class="text-end">
                                                        <div class="sa-price">
                                                            <span class="sa-price__symbol"><?=number_format($total,0,',','.')?> đ</span>
                                                            </div>
                                                    </td>
                                                </tr>
                                            <tbody>
                                                <tr>
                                                    <td colSpan="2" style="text-align:center"><span class="text-muted">Quý khách đã thanh toán hóa đơn. Mã thanh toán <strong class="text-muted"><?='QTE'.$id_eb?></strong>. Thời gian cập nhật trạng thái: <strong>0000-00-00 00:00:00</strong><br>Hotline liên hệ hỗ trợ <strong><?=$info['web_phone']?></strong> | 08h00 - 20h00</span></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                                }
                                            }else
                                            {
                                            ?>
                                            <tbody class="sa-table__group">
                                                <tr>
                                                    <td>Phương thức thanh toán</td>
                                                    <td class="text-end">
                                                        <div class="sa-price">
                                                            <span class="sa-price__symbol">Thanh toán<strong> Tiền mặt </strong></span
                                                            ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Số tiền cần thanh toán</td>
                                                    <td class="text-end">
                                                        <div class="sa-price">
                                                            <span class="sa-price__symbol"><?=number_format($total,0,',','.')?> đ</span>
                                                            </div>
                                                    </td>
                                                </tr>
                                                <tbody class="sa-table__group">
                                                    <?php
                                                    if($tt==1)
                                                    {
                                                    ?>
                                                    <tr>
                                                        <td style="text-align: center" colSpan="2">Quý khách đã <span class="text-success">Thanh toán Hóa đơn</span>. Thời gian cập nhật trạng thái: <strong>0000-00-00 00:00:00</strong><br>Hotline liên hệ hỗ trợ <strong><?=$info['web_phone']?></strong> | 08h00 - 20h00</span></td>
                                                    </tr>
                                                    <?php
                                                    }elseif($tt==2)
                                                    {
                                                        ?>
                                                        <tr>
                                                            <td style="text-align: center" colSpan="2">Quý khách vui lòng đưa tiền Thanh toán cho người giao hàng trước khi nhận hàng. <br>Hotline liên hệ hỗ trợ <strong><?=$info['web_phone']?></strong> | 08h00 - 20h00</span></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- sa-app__body / end --><!-- sa-app__footer -->
            <div class="sa-app__footer d-block d-md-flex"><!-- copyright -->Stroyka Admin — eCommerce Dashboard Template
                © 2021<div class="m-auto"></div>
                <div>Powered by HTML — Design by <a href="https://themeforest.net/user/kos9/portfolio">Kos</a></div>
                <!-- copyright / end -->
            </div><!-- sa-app__footer / end -->
            </div><!-- sa-app__footer / end -->
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