<?php
function show_list_cate_v1(){
    $conn = connection_database();
    $sql = "SELECT  SUM(v2.soluong) as soluong, v1.image as image, v1.name as name
    FROM cate_v1 v1
    JOIN
    (
        SELECT l.id_cate_v1 as id_cate_v1, sp.soluong as soluong
        FROM loaihang l 
         JOIN
        (
            SELECT id_loai, COUNT(id_loai) as soluong 
            FROM sanpham
            WHERE status = 1
            GROUP BY id_loai
        ) sp
        ON l.id_loaihang = sp.id_loai
        WHERE l.status = 1
        ORDER BY soluong DESC
    ) v2
    ON v1.id_cate = v2.id_cate_v1
    WHERE v1.status = 1
    GROUP BY v1.name
    ";
    $result = $conn->query($sql);
    $list = $result->fetchAll();
    return $list;
}
?>