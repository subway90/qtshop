<?php
include "./../Model/xl_sanpham.php";
$danhsach = danhsachsp("sanpham");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta c
    
    <h1>danh sach san pham</h1>
    <table>
        <tr>
            <td>stt</td>
            <td>masp</td>
            <td>hinh</td>
            <td>tensp</td>
            <td>gia</td>
        </tr>
<?php
    for($i=0;$i<count($danhsach);$i++){
        $rc = $danhsach[$i];
?>
    <tr>
        <td><?=$i+1?></td>
        <td><?=$rc["id_sp"]?></td>
        <td><?=$rc["image"]?></td>
        <td><?=$rc["Name"]?></td>
        <td><?=$rc["Price"]?></td>
    </tr>
<?php
    }
?>
    </table>
</body>
</html>