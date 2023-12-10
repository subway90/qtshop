<?php
include "./../Model/xl_sanpham.php";
?>
<style>
    body
    {
        font-size: 16px;
        font-family: Popins, sans-serif;
        color: #6f6f6f;
    }
    a
    {
        color: pink;
    }
    .h1
    {
        text-align: center;
        font-size: 13px;
        font-weight: bold;
    }
    td
    {
        text-align: center;
        padding: 5px;
    }
</style>
<table border="1" style="border-collapse: collapse; margin-top: 5%">
    <tr>
        <td class="h1" width=10%>STT</td>
        <td class="h1" width=10%>ID</td>
        <td class="h1" width=10%>TK</td>
        <td class="h1" width=10%>MK</td>
        <td class="h1" width=10%>Họ và tên</td>
        <td class="h1" width=10%>Email</td>
        <td class="h1" width=10%>SĐT</td>
        <td class="h1" width=30%>Địa chỉ</td>
    </tr>
<?php
    $result = danhsachuser("taikhoan");
    for($i=0;$i<count($result);$i++){
    $rc = $result[$i];
?>

        <tr>
        <td width=10%><?=$i+1;?></td>
        <td width=10%><?=$rc['id_user']?></td>
        <td width=10%><?=$rc['username']?></td>
        <td width=10%><?=$rc['password']?></td>
        <td width=10%><?=$rc['fullname']?></td>
        <td width=10%><?=$rc['email']?></td>
        <td width=10%><?=$rc['phone']?></td>
        <td width=30%><?=$rc['address']?></td>
        </tr>

<?php
    }
?>
</table>