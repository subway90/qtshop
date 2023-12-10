    <style>
        *
        {
            font-size: 12px;
            padding: -15px;
        }
        .table {
        margin-top: 5%  ;
        border-collapse: collapse;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        align-items: center;
        }
    </style>
<body>
    <div>
    <table border="1" style="border-collapse: collapse; margin-top: 5%">
                <tr>
                <td width=3%>Mã sản phẩm</td>
                <td width=7%>Loại sản phẩm</td>
                <td width=10%>Hình ảnh</td>
                <td width=12%>Tên sản phẩm</td>
                <td width=5%>SALE</td>
                <td width=35%>Chi tiết</td>
                <td width=8%>Ngày</td>
                <td width=10%>Giá</td>
                <td width=5%>Số Lượng</td>
                <td colspan="2">Chỉnh sửa</td>
            </tr>
            <?php
            include "../model/xl_sanpham.php";
            $result = danhsachsp();
            if(count($result) <= 0){
                ?>
                <tbody>
                    <td style="color: red" width=100%>DANH SÁCH TRỐNG, VUI LÒNG ĐĂNG SẢN PHẨM</td>
                </tbody>
                <?php
            }else{
                for ($i = 0; $i < count($result); $i++) { //Vòng lặp sản phẩm
                    $rc = $result[$i];
                    
                    if($rc['status'] == 1) //Trạng thái sản phẩm chưa được ẩn (xóa)
                    {
                    ?>
                    <!-- 1 dòng sản phẩm -->
                    <tr> 
                        <td> <!-- ID sản phẩm -->
                            <?= $rc["id_sp"] ?>
                        </td> 
                        <td> <!-- Tên loại hàng sản phẩm -->
                        <?= $rc["name"] ?> 
                        </td>
                        <td> <!-- Ảnh sp -->
                            <img height="200px" width="200px" src="../view/img/<?= $rc['image'] ?>">
                        </td>
                        <td> <!-- Tên sản phẩm -->
                            <?= $rc["Name"] ?>
                        </td>
                        <td> <!-- % Sale -->
                            <?= $rc["Sale"] ?>%
                        </td>
                        <td> 
                            <?= $rc["Decribe"] ?>
                        </td>
                        <td>
                            <?= $rc["Date_import"] ?>
                        </td>
                        <td style="font-weight: bold">
                            <?= $rc["Price"] ?> <sup>vnđ</sup>
                        </td>
                        <td>
                                <?php
                            if($rc["Mount"]>0){ //Nếu số lượng > 0 thì hiện " còn xxx "
                                ?>
                            còn <?=$rc["Mount"]?>
                                <?php
                            }else{              //Ngược lại thì hiện " Hết hàng "
                                ?>
                            Hết hàng
                                <?php
                            }
                                ?>
                        </td>
                        <td> <!-- Sửa sản phẩm/ gắn vào href của tên sản phẩm -->
                            <a href="index.php?act=editsp&edit=0&id=<?=$rc["id_sp"]?>">Sửa</a>
                        </td>
                        <td> 
                            <a href="index.php?act=admin&del=1&id=<?= $rc["id_sp"]?>">Xóa</a>
                        </td>
                    </tr>
                    <?php
                }
                
            }
           
            }
            ?>
        </table>
    </div>
</body>

</html>