<?php
if(!defined('_CODE'))
{
    require_once('404.html'); exit;
}
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $price = $_REQUEST['price'];
        $image = $_REQUEST['image'];
        $sl = $_REQUEST['sl'];
        $size = strtoupper($_REQUEST['size']);
        $color = $_REQUEST['color'];
        $sp_u = [$id,$name,$price,$sl,$image,$size,$color];
        $vitri = kiemtra_update($sp_u); //vị trí id
        if($vitri === -1){ //giá trị thay đổi
            $sp_u[3] = 1;
            $_SESSION['giohang'][] = $sp_u;
            header('Location: index.php?act=giohang');
        }else{ //giá trị giữ nguyên
            $_SESSION['giohang'][$vitri][3]=$sl+1; //cập nhật số lượng thay đổi tại id_sp=$vitri
            header('Location: index.php?act=giohang');
        }
        
    }
//thêm sản phẩm từ button giỏ hàng
    if(isset($_REQUEST['id']) && isset($_REQUEST['tensp']))
    {
        $id = $_REQUEST['id'];
        $tensp = $_REQUEST['tensp'];
        $dongia = $_REQUEST['dongia'];
        $hinh = $_REQUEST['hinh'];
        $size = $_REQUEST['size'];
        $color = $_REQUEST['color'];

        $sp = [$id,$tensp,$dongia,1,$hinh,$size,$color];
        $vitri = kiemtra($sp);
        if($vitri === -1){
            $_SESSION['giohang'][] = $sp;
            header('Location: index.php?act=giohang');
        }else{
            $_SESSION['giohang'][$vitri][3]++;
            header('Location: index.php?act=giohang');
        }
    }
//xóa sản phẩm khỏi giỏ hàng
    if(isset($_REQUEST['del']))
    {
        $id_del = $_REQUEST['del'];
        $size = $_REQUEST['size'];
        $color = $_REQUEST['color'];
        $sp_d = [$id_del,$size,$color];
        $vitri = kiemtra_del($sp_d);
        array_splice($_SESSION['giohang'],$vitri,1);
        header('Location: index.php?act=giohang');
    }
    
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="index.php?act=shop">Cửa hàng</a>
                    <span class="breadcrumb-item active">Giỏ hàng</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="2">Sản phẩm</th>
                            <th>Màu</th>
                            <th>Size</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Cập nhật</th>
                            <!-- <th>Tổng</th> -->
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php
                        $tong = 0;
                        $c_pr = count($_SESSION['giohang']);
                        if($c_pr>0)
                        {
                        for($i=0;$i<$c_pr;$i++)
                        {
                        $pr = $_SESSION['giohang'][$i];
                        ?>
                        <tr>
                            <td class="align-middle">
                                <img src="./../View/img/<?=$pr[4]?>" alt="" style="width: 50px;">
                            </td>
                            <td class="align-middle">
                                <div class="h6"><?=$pr[1]?></div>
                            </td>
                            <form action="index.php?act=giohang" method="post" enctype="multipart/form-data">
                            <td class="align-middle">
                                <input hidden name="id" value="<?=$pr[0]?>">
                                <input hidden name="name" value="<?=$pr[1]?>">
                                <input hidden name="price" value="<?=$pr[2]?>">
                                <input hidden name="image" value="<?=$pr[4]?>">
                                <select style="width:120px" class="form-control form-control-sm bg-secondary" name="color" id="">
                                <?php
                                $color_and_size = color_and_size($pr[0]);
                                $arr_mau = explode(',',$color_and_size[0]['color']);
                                $arr_kichthuoc = explode(' ',$color_and_size[0]['size']);
                                ?>
                                    <?php
                                    for($j=0;$j<count($arr_mau);$j++)
                                    {
                                        if($arr_mau[$j]==$pr[6])
                                        {
                                        ?>
                                    <option selected value="<?=$pr[6]?>"><?=$pr[6]?></option>
                                        <?php
                                        }else
                                        {
                                        ?>
                                    <option value="<?=$arr_mau[$j]?>"><?=$arr_mau[$j]?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td class="align-middle">
                                <select style="width:70px" class="form-control form-control-sm bg-secondary" name="size" id="">
                                    <?php
                                    for($j=0;$j<count($arr_kichthuoc);$j++)
                                    {
                                        if(strtoupper($arr_kichthuoc[$j]) == $pr[5])
                                        {
                                        ?>
                                    <option selected value="<?=$pr[5]?>"><?=strtoupper($pr[5])?></option>
                                        <?php
                                        }else
                                        {
                                        ?>
                                    <option value="<?=$arr_kichthuoc[$j]?>"><?=strtoupper($arr_kichthuoc[$j])?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td class="align-middle"><?=number_format($pr[2],0,',','.')?> vnđ
                            </td>
                            <td class="align-middle">
                                <div class="input-group mx-auto" style="width: 70px;">
                                    <input required name="sl" type="number" min="1" max="200" class="form-control form-control-sm bg-secondary text-center" value="<?=$pr[3]?>">
                            <td class="align-middle">
                                <button type="submit" class="btn btn-sm btn-primary" >
                                    <i class="fa fa-sync-alt"></i>
                                </button>
                            </td>
                                        <input hidden type="type" name="id" 
                                        value="<?=$pr[0]?>">    
                                </div>
                            </td>
                            <?php
                            $tong_pr[$i] = $pr[2]*$pr[3];
                            $tong += $tong_pr[$i];
                            ?>
                            <!-- <td class="align-middle"><?=number_format(($tong_pr[$i]),0,',','.')?> vnđ</td> -->
                            </form>
                            <td class="align-middle">
                                <!-- xóa sản phẩm -->
                                <button onclick='window.location.href="index.php?act=giohang&del=<?=$pr[0]?>&size=<?=$pr[5]?>&color=<?=strtolower($pr[6])?>"' class="btn btn-sm btn-primary">
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                        <td class="card-header bg-secondary border-0" colspan="9"><a class="link" href="index.php?act=shop">Tiếp tục mua hàng</a></td>
                        </tr>
                        <?php
                    }else
                        { ?>
                            <tr>
                                <td colspan="9"><a class="nav-link" href="index.php?act=shop">Tiếp tục mua hàng</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
<?php
if(!empty($_GET['code']))
{
    $code = strtolower(str_replace(["'",";"]," ",$_GET['code']));
    if(count($_SESSION['giohang'])>0)
    {
        $arr_vourcher = select_code_voucher($code);
            if(!empty($arr_vourcher))
            {   
                $_SESSION['voucher'] = [$code,$arr_vourcher['condition_voucher'],$arr_vourcher['number_voucher'],$arr_vourcher['time_start'],$arr_vourcher['time_end'],$arr_vourcher['amount'],$arr_vourcher['status'],$arr_vourcher['id_voucher']];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $time_now = date('Y/m/d H:i:s');
                            $time_end_vourcher = $_SESSION['voucher'][4];
                            if(strtotime($time_now)<strtotime($time_end_vourcher))
                            {
                                if($tong>=$_SESSION['voucher'][1])
                                {
                                    if($_SESSION['voucher'][5]>0)
                                    {
                                        $alert_vourcher = "<span class='text-success'>Áp dụng mã thành công vào hóa đơn</span>";
                                    }else
                                    {
                                        $_SESSION['voucher'] = [];
                                        $alert_vourcher = "Mã voucher này đã hết số lượng !";
                                    }
                                }else
                                {
                                    $_SESSION['voucher'] = [];
                                    $alert_vourcher = "Điều kiện của bạn chưa đủ áp dụng cho mã này !";
                                }
                            }else
                            {
                                $_SESSION['voucher'] = [];
                                $alert_vourcher = "Mã giảm giá đã hết hạn sử dụng !";
                            }
            }else
            {
                $_SESSION['voucher'] = [];
                $alert_vourcher = "Mã giảm giá không chính xác. Vui lòng thử lại !";
            }
    }else
    {
        $alert_vourcher = "Vui lòng thêm sản phẩm vào giỏ để áp dụng mã !";
    }
}else
{
        $code = "";
        $alert_vourcher = "";
}
?>
            <div class="col-lg-4">
                <form class="mb-30" action="index.php?act=giohang" method="get">
                    <div class="input-group">
                        <input hidden name="act" value="giohang" type="text">
                        <input required type="text" name="code" value="<?=strtoupper($code)?>" class="form-control border-0 p-4" placeholder="Nhập mã giảm giá">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Áp dụng</button>
                        </div>
                    </div>
                    <small class="p-4 text-danger align-middle"><?=$alert_vourcher?></small>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Giỏ hàng</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                    <?php
                        if($c_pr>0)
                        {
                        for($i=0;$i<$c_pr;$i++)
                        {
                            $pr = $_SESSION['giohang'][$i];
                            ?>

                        <div class="d-flex justify-content-between mb-3">
                            <h6>
                                <?=$pr[1]?> <br>
                                <small>size <?=strtoupper($pr[5])?> - màu <?=$pr[6]?> - số lượng <?=$pr[3]?></small>
                            </h6>
                            <h6>
                                <?=number_format($tong_pr[$i],0,',','.')?> đ <br>
                            </h6>
                         
                        </div>
                        <?php
                        }
                        ?>
                         </div>
                        <?php
                    if(!empty($_SESSION['voucher']) && $tong >= $_SESSION['voucher'][1])
                    {
                        if($_SESSION['voucher'][6] == 2)
                        {
                        ?>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h6>Tổng</h6>
                                <h6><?=number_format($tong,0,',','.')?> đ</h6>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <h6>Mã giảm giá <br><small>mã <strong><?=strtoupper($_SESSION['voucher'][0])?></strong></small></h6>
                                <h6><?='-'.number_format($_SESSION['voucher'][2],0,',','.')?> đ</h6>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Tổng thanh toán<br> <small class="text-success h6" >Tiết kiệm được <?=number_format($_SESSION['voucher'][2],0,',','.')?> đ</small></h5>
                                <h5><?=number_format(($tong-$_SESSION['voucher'][2]),0,',','.')?> đ</h5>
                            </div>
                        <?php
                        }
                        elseif($_SESSION['voucher'][6] == 3)
                        {
                            $number_voucher = ($tong*$_SESSION['voucher'][2])/100;
                            $tong_moi =$tong - $number_voucher;
                            $_SESSION['voucher'][8] = $number_voucher;
                        ?>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h6>Tổng</h6>
                                <h6><?=number_format($tong,0,',','.')?> đ</h6>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <h6>Mã giảm giá <br><small>mã <strong><?=strtoupper($_SESSION['voucher'][0])?></strong></small></h6>
                                <h6 style="text-align: right"><?='- '.number_format($number_voucher,0,',','.')?> đ <br><small>giảm <?=$_SESSION['voucher'][2]?>% hóa đơn</small></h6>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Tổng thanh toán<br> <small class="text-success h6" >Tiết kiệm được <?=number_format($number_voucher,0,',','.')?> đ</small></h5>
                                <h5><?=number_format($tong_moi,0,',','.')?> đ</h5>
                            </div>
                        <?php
                        }
                        elseif($_SESSION['voucher'][6] == 4)
                        {
                        ?>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h6>Tổng</h6>
                                <h6><?=number_format($tong,0,',','.')?> đ</h6>
                            </div>
                            <div class="d-flex justify-content-between mt-2 ">
                                <h6 class="text-success">Phí giao hàng <br><small class="text-dark">mã <strong><?=strtoupper($_SESSION['voucher'][0])?></strong></small></h6>
                                <h6 class="text-success">0 đ</h6>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Tổng thanh toán<br></h5>
                                <h5><?=number_format(($tong-$_SESSION['voucher'][2]),0,',','.')?> đ</h5>
                            </div>
                        <?php
                        }
                    }else
                    {
                        $_SESSION['voucher'] = [];
                    ?>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Tổng thanh toán</h5>
                                <h5><?=number_format($tong,0,',','.')?> đ</h5>
                            </div>
                    <?php
                    }
                    ?>
                        <a href="index.php?act=thanhtoan" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Thanh toán</a>
                    <?php
                }else
                {
                    ?>
                            <div class="d-flex justify-content-center mb-3">
                                <h6 style="text-align:center">
                                    Không có sản phẩm
                                    <br>
                                    <small class="mb-5 mt-2">Vui lòng thêm <a href="index.php?act=shop">sản phẩm</a> vào giỏ hàng để tiếp tục thanh toán</small>
                                </h6>
                            </div>
                        </div>

                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Tổng</h5>
                                <h5>0 đ</h5>
                            </div>
                        <button disabled class="btn btn-block btn-primary font-weight-bold my-3 py-3" disabled>Thanh toán</button>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
