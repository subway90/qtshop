<?php
include './../Model/xl_sanpham.php';
if (isset($_REQUEST['delete_loai'])) {
    if ($_REQUEST['delete_loai'] == 1) {
        $id_loai = $_REQUEST['id_l'];
        deleteloai($id_loai);
    }
    if ($_REQUEST['delete_loai'] == 2) {
        $id_loai = $_REQUEST['id_l'];
        restoreloai($id_loai);
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./../View/css/sang.css" rel="stylesheet">
</head>
<body>
    <div class="containerInput">
        <table>
            <caption>DANH SÁCH LOẠI HÀNG</caption>
                <tr>
                    <th width="1%">STT (ID)</th>
                    <th width="50%" colspan="2">TÊN LOẠI</th>
                </tr>

                <?php
                $list = listloai();
                for ($i = 0; $i < count($list); $i++)
                {
                    if($list[$i][2] == 1)
                    {
                    
                ?>
                <tr>
                <td><?=$list[$i][1]?></td>
                <td width=70%><?=$list[$i][0]?></td>
                <td class="click" onclick="location.href='index.php?act=ds-loai&delete_loai=1&id_l=<?=$list[$i][1]?>'">Xóa</td>
                </tr>
                <?php
                    }else{ ?>
                        <tr>
                            <td><?=$list[$i][1]?></td>
                            <td width=70%><?=$list[$i][0]?></td>
                            <td onclick="location.href='index.php?act=ds-loai&delete_loai=2&id_l=<?=$list[$i][1]?>'">Đã xóa</td>
                        </tr>
                        <?php
                    }
                }
                ?>
        </table>
    </div>
    <br><br><br>
</body>

</html>