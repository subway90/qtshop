<?php
    // include "database.php";
    function select_code_ebanking(){
        $conn = connection_database();
        $sql = "SELECT id_ebanking FROM ebanking ORDER BY id_ebanking DESC limit 1";
        $result = $conn->query($sql);
        $id = $result->fetch();
        return $id;
    }
    function them_donhang($id_user,$name,$phone,$address,$area,$zipcode,$email,$facebook,$pay,$total_product,$voucher,$ebanking)
    {
        $conn = connection_database();
        if($zipcode == null)
        { $zipcode = 1;}
        if($facebook == "")
        { $facebook = "trống";}
        $sql =  "INSERT into donhang VALUES (null,'".$id_user."','".$total_product."',current_timestamp,".$pay.",'".$name."',".$phone.",'".$email."','".$address."',2,2,".$area.",".$zipcode.",'".$facebook."',".$voucher.",".$ebanking.")";
        $conn->query($sql);
    }
    function them_ebanking($id_user,$id_donhang,$total_product)
    {
        $conn = connection_database();
        $sql =  "INSERT into ebanking VALUES (null,".$id_user.",".$id_donhang.",".$total_product.",'chưa cập nhật','chưa cập nhật','chưa cập nhật','chưa cập nhật','chưa cập nhật',current_timestamp,current_timestamp,1)";
        $conn->query($sql);  
    }
    function them_cthd($id_chitiet,$id_donhang,$id_sp,$soluong,$total_product,$size,$color)
    {
        $conn = connection_database();
        $sql =  "INSERT into dh_chitiet VALUES (".$id_chitiet.",".$id_donhang.",".$id_sp.",".$soluong.",".$total_product.", current_timestamp,'".$size."','".$color."')";
        $conn->query($sql);
     }
    function select_id_ct(){
        $conn = connection_database();
        $sql = "SELECT id_chitiet FROM dh_chitiet ORDER BY id_chitiet desc limit 1";
        $result = $conn->query($sql);
        $id_max = $result->fetch();
        return $id_max;
    }
    function select_id_dh(){
        $conn = connection_database();
        $sql = "SELECT id_dh FROM donhang ORDER BY id_dh DESC lIMIT 1";
        $result = $conn->query($sql);
        $id_dh = $result->fetch();
        return $id_dh;
    }
?>