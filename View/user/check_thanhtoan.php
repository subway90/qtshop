<?php
 $id_user;
 $hoten;
 $phone;
 $address;
 $email;
 $id_dh;
 $pay;
 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
    $id_user = $_REQUEST['id_user'];
    $hoten = $_REQUEST['hoten'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];
    $pay = $_REQUEST['pay'];
    $id_dh = rand(100000,1000000);
    $id_chitiet = rand(10000,100000);
    $tongdh = $tong;
    for($i=0;$i<count($_SESSION['thanhtoan']);$i++)
    {
        $tongdh += $_SESSION['thanhtoan'][$i][2]*$_SESSION['thanhtoan'][$i][3];
    
    them_donhang($id_dh,$id_user,$tongdh,$pay,$hoten, $phone,$email,$address);
    
 $_SESSION['giohang'] = [];  //khởi tạo lại session giỏ hàng
    echo'
        <script type="text/javascript">
        function confirm_alert(node) {
            return confirm("Nhấn OK để quay lại trang chủ");
        }
        </script>
        <a href="index.php" onclick="return confirm_alert(this);">Thanh toán thành công ! Click to return index</a>';
        // for($j=0;$j<count($_SESSION['thanhtoan']);$j++)
        // {
        //       them_cthd("dh_chitiet",$id_chitiet+$j,$_SESSION['thanhtoan'][$j][0],$id_dh,$_SESSION['thanhtoan'][$j][3],$tongdh);  
        // }
    }
 }
?>
<a href="index.php">Quay lại trang chủ</a>