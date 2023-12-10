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
        padding: 10px;
    }
</style>
<table align="center" border="1" style="border-collapse: collapse; margin-top: 5%">
    <tr>
        <td class="h1" width=15%>STT</td>
        <td class="h1" width=15%>ID_ĐƠN HÀNG</td>
        <td class="h1" width=15%>ID_USER</td>
        <td class="h1" width=15%>TỔNG ĐƠN</td>
        <td class="h1" width=25%>NGÀY ĐẶT</td>
        <td class="h1" width=25%>Chi tiết</td>

    </tr>
<?php
    $result = danhsachhoadon();
    for($i=0;$i<count($result);$i++){
    $rc = $result[$i];
?>

        <tr>
        <td ><?=$i+1;?></td>
        <td ><?=$rc['id_dh']?></td>
        <td ><?=$rc['id_user']?></td>
        <td ><?=$rc['tongdh']?></td>
        <td ><?=$rc['ngaydat']?></td>
        <td><a href="index.php?act=donhang-chitiet&edit=3&id_ct=<?=$rc['id_dh']?>&name=<?=$rc['hoten']?>&phone=<?=$rc['phone']?>&e=<?=$rc['email']?>&add=<?=$rc['address']?>&t=<?=$rc['tongdh']?>">Chi tiết</a></td>
        </tr>

<?php
    }
?>
</table>