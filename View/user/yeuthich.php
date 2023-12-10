<?php
include "./../Model/xl_giohang.php";
    if(isset($_REQUEST['id']) && isset($_REQUEST['tensp']))
    {
        $id = $_REQUEST['id'];
        $tensp = $_REQUEST['tensp'];
        $dongia = $_REQUEST['dongia'];
        $hinh = $_REQUEST['hinh'];
        $sp = [$id,$tensp,$dongia,1 ,$hinh];
        $vitri = kiemtra_2($sp);
        if($vitri === -1){
            $_SESSION['yeuthich'][] = $sp;
        }else{
            $_SESSION['yeuthich'][$vitri][3]++;
        }
            ?>
                <script>
                    history.back();
                    history.go(-1);
                    alert('Đã thêm "<?=$tensp?>" vào danh sách yêu thích !');
                </script>
            <?php
    }
    if(isset($_REQUEST['del']))
    {
        $id_del = $_REQUEST['del'];
        $sp = [$id_del];
        $vitri = kiemtra_2($sp);
        array_splice($_SESSION['yeuthich'],$vitri,1);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sl = $_REQUEST['sl'];
        $id = $_REQUEST['id'];
        $sp = [$id,$sl];
        $vitri = kiemtra_2($sp);
        $_SESSION['yeuthich'][$vitri][3]=$sl;
    }
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="index.php?act=shop">Cửa hàng</a>
                    <span class="breadcrumb-item active">Yêu thích</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">

            <div class="col-12 col-md-12">

                <div class="row pb-3">

                <?php
                        $c_pr = count($_SESSION['yeuthich']);
                        if($c_pr>0)
                        {
                        for($i=0;$i<$c_pr;$i++)
                        {
                        $pro_heart = $_SESSION['yeuthich'][$i];
                        ?>
                    <div class="col-lg-2 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="../View/img/<?=$pro_heart[4]?>" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href="index.php?act=giohang&id=<?=$pro_heart[0]?>&tensp=<?=$pro_heart[1]?>&dongia=<?=$pro_heart[2]?>&hinh=<?=$pro_heart[4]?>">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a class="btn btn-outline-dark btn-square" href="index.php?act=yeuthich&del=<?=$pro_heart[0]?>">
                                        <i class="fa fa-times"></i>
                                    </a>
                                    <a class="btn btn-outline-dark btn-square" href="index.php?act=detail&edit=0&id=<?= $pro_heart[0]?>">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a  style="white-space: unset" class="h6 text-decoration-none text-truncate" href="index.php?act=detail&edit=0&id=<?= $pro_heart[0]?>"><?=$pro_heart[1]?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5><?=number_format($pro_heart[2],0,',','.')?></h5>
                                    <h6 class="text-muted ml-2"><del><?=number_format($pro_heart[3],0,',','.')?> đ</del></h6>
                                </div>

                                 <!-- rating review start -->
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                                <!-- rating review end -->

                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                        ?>
                </div>
            </div>
        </div>
    </div>
                    

                        

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        table
        {
            display: flex;
            flex-direction: column;
        }
        td
        {
            text-align: center;
            width: 15%;
            padding: 1rem;
        }
        .text-title-cart
        {
            font-weight: bold;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
        }
    </style>
    <div>
        <table border="1" style="border-collapse: collapse; margin-top: 5%">
            <tr>
            <td>STT</td>
            <td>Ảnh</td>
            <td>Tên sản phẩm</td>
            <td align="center">Giá</td>
            <td align="center">Số lượng</td>
            <td>Cập nhật</td>
            <td>Tổng tiền</td>
            <td>Xóa</td>
            </tr>
<?php
    for($i=0;$i<count($_SESSION['yeuthich']);$i++){
?>
<tr>
            <td><?=$i+1;?></td>
            <td><img src="./../View/img/<?=$_SESSION['giohang'][$i][4]?>" height="180px" width="180px"></td>
            <td><?=$_SESSION['giohang'][$i][1]?></td>
            <td align="center"><?=$_SESSION['giohang'][$i][2]?></td>
            <form action="index.php?act=giohang" method="post" 
                    enctype="multipart/form-data">
                <td align="center">
                    <input type="number" name="sl" style="text-align: center"
                    value="<?=$_SESSION['giohang'][$i][3]?>"    
                    min = 1 max = 200>
                    <td><input type="submit" value="Edit"></td>
                    <input hidden type="type" name="id" 
                     value="<?=$_SESSION['giohang'][$i][0]?>">
                </td>
                <td>$<?=$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][3]?></td>
                
            </form>
            <td><a href="index.php?act=giohang&del=<?=$_SESSION['giohang'][$i][0]?>">delete</a></td>
            </tr>

<?php
 }
 ?>
    <tr align="center">
        <?php
        if(!empty($_SESSION['giohang']))
        {
        ?>
                <td colspan="5">
                <a class="nav-link" href="index.php?act=shop">
                <button class="btn btn-block btn-primary my-3 py-3">Tiếp tục mua hàng</button>
                </a>
                </td>
                <td colspan="3">
                <a class="nav-link" href="index.php?act=thanhtoan">
                <button class="btn btn-block btn-primary my-3 py-3">Thanh toán</button>
                </td>
                </a>
        <?php
        }else
        {
        ?>
                <td colspan="10"><a href="index.php?act=shop">Danh sách trống ! Vui lòng mua hàng để tiếp tục thanh toán</a></td>
        <?php
        }
        ?>
    </tr>
        </table>
    </div>
</body>
</html> -->
