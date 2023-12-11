<!-- Breadcrumb Start -->
<?php
$select_code_banking = select_code_ebanking();
$code_banking = ++$select_code_banking[0];
//value input
$id_user = $_SESSION['dangnhap'][0][0];
$name = "";
$phone = $_SESSION['dangnhap'][0][5];
$street = "";
$village = "";
$district = "";
$city = "";
$showphone = "";
$area = 1;
$zipcode = null;
$email = $_SESSION['dangnhap'][0][4];
$facebook = null;
$address = null;
$bill_pay = ["checked",""];
$checkout_point = 0;
//valid input
$bill_name = ""; $bill_city = ""; $bill_district = ""; $bill_phone = ""; $bill_street = ""; $bill_village= ""; $bill_email = ""; $bill_zipcode = ""; $bill_facebook = "";
//alert input
$alert_name = ""; $alert_phone = ""; $alert_street = ""; $alert_village = ""; $alert_district = ""; $alert_city  = "";

    $_SESSION['thanhtoan'] = $_SESSION['giohang'];
    $count_product = count($_SESSION['thanhtoan']);
    $total_product = 0;
    $total_one = [];
    $name_one = [];
    $size_one = [];
    $color_one= [];
    $amount_one= [];
    for($i = 0 ; $i < $count_product ; $i++)
    {
        $product_checkout = $_SESSION['thanhtoan'][$i];
        $name_one[$i] = $product_checkout[1];
        $amount_one[$i] = $product_checkout[3];
        $size_one[$i] = $product_checkout[5];
        $color_one[$i]= $product_checkout[6];
        $total_one[$i] = $product_checkout[2] * $product_checkout[3];
        $total_product += $total_one[$i];
    }
    if(!empty($_SESSION['voucher']))
    {
        if($_SESSION['voucher'][6]==2)
        {
            $total_product -= $_SESSION['voucher'][2];
        }
        if($_SESSION['voucher'][6]==3)
        {
             $total_product -= $_SESSION['voucher'][8];
        }
    }
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(!empty($_REQUEST['name']))
                {$checkout_point++;$name = $_REQUEST['name'];$bill_name = "is-valid";}
            else
                {$bill_name = "is-invalid";$alert_name = "Vui lòng điền Họ và tên của bạn";}
            if(!empty($_REQUEST['phone']))
                {$phone = $_REQUEST['phone'];
                if(strlen($phone) == 10)
                {$checkout_point++;$bill_phone = "is-valid";$showphone.=$phone;}
                else
                {$bill_phone = "is-invalid";$alert_phone = "Số điện thoại không hợp lệ";}}
            else
                {$bill_phone = "is-invalid";$alert_phone = "Vui lòng điền Số điện thoại của bạn";}
            if(!empty($_REQUEST['street']))
                {$checkout_point++;$street = $_REQUEST['street'];$bill_street = "is-valid";$address.=$street.", ";}
            else
                {$bill_street = "is-invalid";$alert_street = "Vui lòng điền Số nhà của bạn";}
            if(!empty($_REQUEST['village']))
                {$checkout_point++;$village = $_REQUEST['village'];$bill_village = "is-valid";$address.=$village.", ";}
            else
                {$bill_village = "is-invalid";$alert_village = "Vui lòng điền Phường/xã của bạn";}
            if(!empty($_REQUEST['district']))
                {$checkout_point++;$district = $_REQUEST['district'];$bill_district = "is-valid";$address.=$district.", ";}
            else
                {$bill_district = "is-invalid";$alert_district = "Vui lòng điền Quận/huyện của bạn";}
            if(!empty($_REQUEST['city']))
                {$checkout_point++;$city = $_REQUEST['city'];$bill_city = "is-valid";$address.=$city;}
            else
                {$bill_city = "is-invalid";$alert_city = "Vui lòng điền Thành phố/tỉnh của bạn";}
            if(!empty($_REQUEST['area']))
                {$area = $_REQUEST['area'];$bill_area = "is-valid";}
            else
                {$bill_area = "";}
            if(!empty($_REQUEST['zipcode']))
                {$zipcode = $_REQUEST['zipcode'];$bill_zipcode = "is-valid";}
            else
                {$bill_zipcode = "";}
            if(!empty($_REQUEST['facebook']))
                {$facebook = $_REQUEST['facebook'];$bill_facebook = "is-valid";}
            else
                {$bill_facebook = "";}
            if(!empty($_REQUEST['email']))
                {$email = $_REQUEST['email'];$bill_email = "is-valid";}
            else
                {$bill_email = "";}
            if(!empty($_REQUEST['pay']))
                {$pay = $_REQUEST['pay'];
                    if($pay == 1)
                    {$bill_pay = ["checked",""];}
                    else
                    {$bill_pay = ["","checked"];}}
            if($checkout_point == 6)
            {
                $id_ct = select_id_ct();
                $id_dh = select_id_dh();
                $id_chitiet = ++$id_ct[0];
                $id_donhang = ++$id_dh[0];
                if($pay == 2)
                {
                    $ebanking = $_POST['ebanking'];
                    them_ebanking($id_user,$id_donhang,$total_product);
                }else
                {
                    $ebanking = 1;
                }
                $voucher = $_POST['voucher'];
                them_donhang($id_user,$name,$phone,$address,$area,$zipcode,$email,$facebook,$pay,$total_product,$voucher,$ebanking);
            for($i=0 ;$i<count($_SESSION['thanhtoan']);$i++)
            {
                $id_chitiet += $i;
                $id_sp = $_SESSION['thanhtoan'][$i][0];
                $soluong = $amount_one[$i];
                $tong = $total_one[$i];
                $size = $size_one[$i];
                $color = $color_one[$i];
                them_cthd($id_chitiet,$id_donhang,$id_sp,$soluong,$tong,$size,$color);
            }
            $_SESSION['giohang'] = [];  //khởi tạo lại session giỏ hàng
            $_SESSION['voucher'] = [];  //khởi tạo lại session voucher
            echo'<script>alert("Thanh toán thành công");</script>';
            define('_SC_CHECKOUT',1);
            }
        }
?>
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="index.php?act=shop">Cửa hàng</a>
                    <a class="breadcrumb-item text-dark" href="index.php?act=giohang">Giỏ hàng</a>
                    <span class="breadcrumb-item active">Thanh toán</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thông tin giao hàng</span></h5>
                <form action="" method="post">
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Họ và tên <span class="text-danger">(*)</span></label>
                            <input name="name" class="form-control <?=$bill_name?>" value="<?=$name?>" type="text" placeholder="ví dụ Nguyễn Văn A">
                            <small class="text-danger"><?=$alert_name?></small>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại <span class="text-danger">(*)</span></label>
                            <input name="phone" class="form-control <?=$bill_phone?>" value="<?=$showphone?>" type="number" min="100000000" max="1000000000" placeholder="ví dụ 0375621447">
                            <small class="text-danger"><?=$alert_phone?></small>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số nhà (Thôn, khu dân cư) <span class="text-danger">(*)</span></label>
                            <input name="street" class="form-control <?=$bill_street?>" value="<?=$street?>" type="text" placeholder="ví dụ 01 Nguyễn Trãi / Thôn 2 KDC 11">
                            <small class="text-danger"><?=$alert_street?></small>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Phường (Xã) <span class="text-danger">(*)</span></label>
                            <input name="village" class="form-control <?=$bill_village?>" value="<?=$village?>" type="text" placeholder="ví dụ phường 1 / xã Đức Lân">
                            <small class="text-danger"><?=$alert_village?></small>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Quận (Huyện) <span class="text-danger">(*)</span></label>
                            <input name="district" class="form-control <?=$bill_district?>" value="<?=$district?>" type="text" placeholder="ví dụ quận Gò Vấp / huyện Mộ Đức">
                            <small class="text-danger"><?=$alert_district?></small>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Thành phố (Tỉnh) <span class="text-danger">(*)</span></label>
                            <input name="city" class="form-control <?=$bill_city?>" value="<?=$city?>" type="text" placeholder="ví dụ TP HCM / tỉnh Quảng Ngãi">
                            <small class="text-danger"><?=$alert_city?></small>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Khu vực giao hàng <span class="text-danger">(*)</span></label>
                            <select name="area" class="custom-select">
                                <?php
                                if($area == 1)
                                {
                                ?>
                                    <option value="1" selected>Nội thành ở Thành phố Hồ Chí Minh (miễn phí ship)</option>
                                    <option value="2" >Các tỉnh còn lại (người mua tự trả phí ship)</option>
                                <?php
                                }else
                                {
                                ?>
                                    <option value="1" >Nội thành ở Thành phố Hồ Chí Minh (miễn phí ship)</option>
                                    <option value="2" selected>Các tỉnh còn lại (người mua tự trả phí ship)</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mã bưu điện</label>
                            <input name="zipcode" class="form-control <?=$bill_zipcode?>" value="<?=$zipcode?>" type="number" placeholder="Tra google để biết mã ZIP ở địa phương bạn">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email</label>
                            <input name="email" class="form-control <?=$bill_email?>" value="<?=$email?>" type="email" placeholder="ví dụ nguyenvana@gmail.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Facebook</label>
                            <input name="facebook" class="form-control <?=$bill_facebook?>" value="<?=$facebook?>" type="text" placeholder="ví dụ https://fb.com/nguyenvana ">
                        </div>
                    </div>
                </div>
                <div class="bg-light p-30 mb-5">
                    <div class="h6 mb-3">Chính sách vận chuyển</div>
                    <ul id="ol">
                        <li class="mb-2 text-primary" data-toggle="collapse" data-target="#csa">Chính sách A</li>
                            <div class="collapse mb-5" id="csa">
                                <div class="h6 mt-4">Headline chính sách </div>
                                <ul>
                                    <li>Oop~! Thông tin chính sách này đang cập nhật và bổ sung. Vui lòng xem lại lần sau</li>
                                    <li>Xin lỗi quý khách vì sự bất tiện này ! Hotline hỗ trợ & tư vấn : 0366 455 679</li>
                                </ul>
                            </div>

                        <li class="mb-2 text-primary" data-toggle="collapse" data-target="#csb">Chính sách B</li>
                            <div class="collapse mb-5" id="csb">
                                <div class="h6 mt-4">Headline chính sách </div>
                                <ul>
                                    <li>Oop~! Thông tin chính sách này đang cập nhật và bổ sung. Vui lòng xem lại lần sau</li>
                                    <li>Xin lỗi quý khách vì sự bất tiện này ! Hotline hỗ trợ & tư vấn : 0366 455 679</li>
                                </ul>
                            </div>
                            
                        <li class="mb-2 text-primary" data-toggle="collapse" data-target="#csc">Chính sách C</li>
                            <div class="collapse mb-5" id="csc">
                                <div class="h6 mt-4">Headline chính sách </div>
                                <ul>
                                    <li>Oop~! Thông tin chính sách này đang cập nhật và bổ sung. Vui lòng xem lại lần sau</li>
                                    <li>Xin lỗi quý khách vì sự bất tiện này ! Hotline hỗ trợ & tư vấn : 0366 455 679</li>
                                </ul>
                            </div>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">HÓA ĐƠN CỦA BẠN</span></h5>
            <!-- hóa đơn start -->
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Sản phẩm mua</h6>
                        <!-- giỏ hàng start -->
                        <?php
                        for($i=0;$i< $count_product;$i++)
                        {
                        ?>
                        <div class="d-flex justify-content-between">
                            <p>
                                <?=$name_one[$i]?> <br>
                                <small><strong>size:</strong> <?=strtoupper($size_one[$i])?> - <strong>màu:</strong> <?=$color_one[$i]?> - <strong>s.lượng:</strong> <?=$amount_one[$i]?></small>

                            </p>
                            <p><?=number_format($total_one[$i],0,',','.')?> đ</p>
                        </div>
                        <?php
                        }
                        ?>
                        <!-- giỏ hàng end -->
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tổng tiền sản phẩm</h6>
                            <h6><?=number_format($total_product,0,',','.')?> đ</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <?php
                            if(!empty($_SESSION['voucher']))
                            {
                            ?>
                            <input hidden name="voucher" type="number" value="<?=$_SESSION['voucher'][7]?>">
                                <h6>Áp dụng Voucher<br>
                                <small>mã <strong><?=strtoupper($_SESSION['voucher'][0])?></strong></small>
                                </h6>
                                <?php
                                if($_SESSION['voucher'][6]==3)
                                {
                                ?>
                                <h6><?='- '.number_format($_SESSION['voucher'][8],0,',','.')?> đ</h6>
                                <?php
                                }else
                                {
                                ?>
                                <h6><?='- '.number_format($_SESSION['voucher'][2],0,',','.')?> đ</h6>
                            <?php
                                }
                            }else
                            {
                            ?>
                                <input hidden name="voucher" type="number" value="0">
                                <h6>Vourcher giảm giá <br>
                                <small>Nếu bạn có <strong>mã giảm giá</strong> thì vui lòng quay lại <a class="link" href="index.php?act=giohang">giỏ hàng</a> để nhập !</small>
                                </h6>
                                <h6>0 đ</h6>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="d-flex justify-content-between">
                        <?php
                        if($total_product>=500000)
                        {
                        ?>
                            <h6 class="text-success font-weight-medium">
                                Phí giao hàng <br>
                                <small>Áp dụng với hóa đơn <strong>từ 500K trở lên</strong></small>
                            </h6>
                            <h6 class="text-success font-weight-medium">0 đ</h6>
                        <?php
                        }else
                        {
                            if(!empty($_SESSION['voucher']) && $_SESSION['voucher'][6]==4)
                            {
                                ?>
                                <h6 class="text-success font-weight-medium">
                                    Phí giao hàng <br>
                                    <small>Áp dụng mã <strong><?=strtoupper($_SESSION['voucher'][0])?></strong></small>
                                </h6>
                                <h6 class="text-success font-weight-medium">0 đ</h6>
                        <?php
                            }else
                            {
                        ?>
                            <h6 class="font-weight-medium">
                                Phí giao hàng <br>
                                <small><span class="text-danger">Lưu ý</span> bạn sẽ tự thanh toán phí giao hàng</strong></small>
                            </h6>
                            <h6 class="font-weight-medium">0 đ</h6>
                        <?php
                            }
                        }
                        ?>
                        </div>
                        
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng hóa đơn</h5>
                            <h5><?=number_format($total_product,0,',','.')?> đ</h5>
                        </div>
                    </div>
                </div>
                <!-- hóa đơn end -->
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Phương thức thanh toán</span></h5>
                    <!-- phương thức thanh toán start -->
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input <?=$bill_pay[0]?> name="pay" value="1" type="radio" class="custom-control-input" id="paypal">
                                <label class="custom-control-label" data-toggle="collapse" data-target="#cost" for="paypal">Tiền mặt</label>
                            </div>
                            <div class="collapse mb-5" id="cost">
                                <div class="h6 mt-4">Lưu ý thanh toán</div>
                                <ul>
                                    <li>Được kiểm tra hàng trước khi thanh toán.</li>
                                    <li>Tiền thanh toán của bạn sẽ trả cho người giao hàng (shipper), nếu không trả sẽ không được nhận hàng.</li>
                                    <li>Xem chi tiết tại <a href="">Lịch sử mua hàng</a> để coi số tiền cần thanh toán từ hóa đơn.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input <?=$bill_pay[1]?> name="pay" value="2" type="radio" class="custom-control-input" id="directcheck">
                                <label class="custom-control-label" data-toggle="collapse" data-target="#bank" for="directcheck">Chuyển khoản E-banking</label>
                            </div>
                            <div class="collapse mb-5" id="bank">
                                <input hidden type="number" name="ebanking" value="<?=$code_banking?>">
                                <div class="h6 mt-4">Thông tin chuyển khoản</div>
                                <ul>
                                    <li>Ngân hàng: <strong>Việt Á Bank (VietABank)</strong></li>
                                    <li>Tài khoản: <strong>66 45 56 79</strong></li>
                                    <li>Tên tài khoản: <strong>Lê Thị Hồng Hà</strong></li>
                                    <li>Nội dung chuyển khoản: <strong>QTE<?=$code_banking?></strong></li>
                                    <small><span class="text-danger">Lưu ý: </span>Nội dung chuyển khoản để xác thực thanh toán của bạn với hóa đơn thanh toán, vui lòng nhập chính xác nội dung chuyển khoản. Trường hợp nhập sai sau khi chuyển khoản thành công thì hãy liên hệ ngay Hotline <strong>0366 455 679</strong> để được hỗ trợ.</small>
                                </ul>
                                <div class="h6 mt-4">Sau khi chuyển khoản thành công, bạn sẽ nhận được cuộc gọi hỗ trợ bên SHOP để thông báo và đơn hàng sẽ giao tới ngay cho bạn !</div>
                            </div>
                        </div>
                        <?php
                        if(defined('_SC_CHECKOUT'))
                        {
                        ?>
                        <div class="btn btn-block btn-success font-weight-bold py-3">
                            <div class="mb-2">
                                <i class="fa fa-check"></i>
                            </div>
                            Đơn hàng đang được xác nhận, vui lòng kiểm tra <a class="text-primary" href="index.php?act=history">Lịch sử mua hàng</a>
                        </div>
                        <?php
                        }else
                        {
                        ?>
                        <button class="btn btn-block btn-primary font-weight-bold py-3">XÁC NHẬN THANH TOÁN</button>
                        <?php
                        }
                        ?>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->

