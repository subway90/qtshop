<?php
include "./../Model/xl_giohang.php";
    if(isset($_REQUEST['id']) && isset($_REQUEST['tensp'])){
        $id = $_REQUEST['id'];
        $tensp = $_REQUEST['tensp'];
        $dongia = $_REQUEST['dongia'];
        $hinh = $_REQUEST['hinh'];
        $sp = [$id,$tensp,$dongia,1,$hinh];
        $vitri = kiemtra($sp);
        if($vitri === -1){
            $_SESSION['giohang'][] = $sp;
        }else{
            $_SESSION['giohang'][$vitri][3]++;
        }
}
    if(isset($_REQUEST['del'])){
        $id_del = $_REQUEST['del'];
        $sp = [$id_del];
        $vitri = kiemtra($sp);
        array_splice($_SESSION['giohang'],$vitri,1);
}

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sl = $_REQUEST['sl'];
        $id = $_REQUEST['id'];
        $sp = [$id,$sl];
        $vitri = kiemtra($sp);
        $_SESSION['giohang'][$vitri][3]=$sl;
    }
?>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">GIỎ HÀNG</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Giỏ hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th colspan="2">Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
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
                            <td><?=$pr[1]?></td>
                            <td class="align-middle"><?=number_format($pr[2],0,',','.')?> vnđ
                            </td>
                            <form action="index.php?act=giohang" method="post" enctype="multipart/form-data">
                            <td class="align-middle">
                                <div class="input-group mx-auto" style="width: 100px;">
                                    <input name="sl" type="number" min="1" max="200" class="form-control form-control-sm bg-secondary text-center" value="<?=$pr[3]?>">
                                    <button type="submit" class="btn btn-sm btn-primary" >
                                        <i class="fa fa-check"></i>
                                        </button>
                                        <input hidden type="type" name="id" 
                                        value="<?=$pr[0]?>">    
                                </div>
                            </td>
                            <?php
                            $tong_pr[$i] = $pr[2]*$pr[3];
                            $tong += $tong_pr[$i];
                            ?>
                            <td class="align-middle"><?=number_format(($tong_pr[$i]),0,',','.')?> vnđ</td>
                            </form>
                            <td class="align-middle">
                                <button onclick='window.location.href="index.php?act=giohang&del=<?=$pr[0]?>"' class="btn btn-sm btn-primary">
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                        <td class="card-header bg-secondary border-0" colspan="6"><a class="link" href="index.php?act=shop">Tiếp tục mua hàng</a></td>
                        </tr>
                        <?php
                    }else
                        { ?>
                            <tr>
                                <td colspan="6"><a class="nav-link" href="index.php?act=shop">Tiếp tục mua hàng</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Nhập mã giảm giá">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Áp dụng</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Hóa đơn</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if($c_pr>0)
                        {
                        for($i=0;$i<$c_pr;$i++)
                        {
                            $pr = $_SESSION['giohang'][$i];
                            ?>
                            
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium"><?=$pr[1]?></h6>
                            <h6 class="font-weight-medium"><?=number_format($tong_pr[$i],0,',','.')?> vnđ</h6>
                        </div>
                        </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng</h5>
                            <h5 class="font-weight-bold"><?=number_format($tong,0,',','.')?> vnđ</h5>
                        </div>
                        <button onclick='window.location.href="index.php?act=thanhtoan"' class="btn btn-block btn-primary my-3 py-3">Tiếp tục thanh toán</button>
                    </div>
                        <?php
                        }
                        }else{
                            ?>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Không có sản phẩm</h6>
                            <h6 class="font-weight-medium">0 vnđ</h6>
                        </div>
                        </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng</h5>
                            <h5 class="font-weight-bold"><?=number_format($tong,0,',','.')?> vnđ</h5>
                        </div>
                        <button disabled onclick='window.location.href="index.php?act=thanhtoan"' class="btn btn-block btn-primary my-3 py-3">Tiếp tục thanh toán</button>
                    </div>
                            <?php
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
    for($i=0;$i<count($_SESSION['giohang']);$i++){
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
