<?php
    function search($text_search){
        $conn = connection_database();
        $sql = "SELECT * FROM sanpham where Name LIKE '%".$text_search."%' AND status = 1";
        $rc_s = $conn->query($sql);
        $list_search = $rc_s->fetchAll();
        return $list_search;
    }
    function slide_1()
    {
        $conn = connection_database();
        $sql = "SELECT * FROM slide where status = 1 order by date desc limit 20";
        $rc_s = $conn->query($sql);
        $slide_1 = $rc_s->fetchAll();
        return $slide_1;
    }
    function slide_2()
    {
        $conn = connection_database();
        $sql = "SELECT * FROM slide where status = 2 order by id_slide desc limit 2";
        $rc_s = $conn->query($sql);
        $slide_2 = $rc_s->fetchAll();
        return $slide_2;
    }
    function slide_all()
    {
        $conn = connection_database();
        $sql = "SELECT * FROM slide ORDER BY id_slide DESC";
        $rc_s = $conn->query($sql);
        $slide = $rc_s->fetchAll();
        return $slide;
    }
    function themslide($title1,$title2,$image,$link,$name_link,$status,$background)
    {
        if(empty($title1)) $title1 = NULL;
        if(empty($title2)) $title2 = NULL;
        if(empty($link)) $link = NULL;
        if(empty($name_link)) $name_link = NULL;
        if($background == 1) $background = "background: none"; elseif($background == 2) $background = NULL;
        $conn = connection_database();
        $sql = " INSERT INTO slide VALUES (NULL, '".$title1."', '".$title2."', '".$image."', '".$link."','".$name_link."',".$status.",'".$background."',current_timestamp)";
        $conn->query($sql);
        echo '<script type="text/javascript">

            window.onload = function () { alert("ĐĂNG SLIDE THÀNH CÔNG !"); }

        </script>';
    }
    function edit_slide($id,$title1,$title2,$image,$link,$name_link,$status,$background){
        if($background==1)
        {
            $background = "background: none";
        }else
        {
            $background = "";
        }

        $conn = connection_database();
        $sql =  "UPDATE slide
                SET title1='".$title1."',
                title1='".$title1."',
                title2='".$title2."',
                image='".$image."',
                link='".$link."',
                name_link='".$name_link."',
                status=".$status.",
                background='".$background."',
                date = current_timestamp
                WHERE id_slide = ".$id;
       $conn->query($sql);
       echo '<script type="text/javascript">
        window.onload = function () { alert("Chỉnh sửa thành công slide !"); }
    </script>';
      }
    function slide($id)
    {
        $conn = connection_database();
        $sql = "SELECT * FROM slide where id_slide =".$id;
        $rc_s = $conn->query($sql);
        $result = $rc_s->fetch();
        return $result;
    }
    function on_slide($id){
        $conn = connection_database();
        $sql = " UPDATE slide SET status = 2 where id_slide =" . $id;
        $conn->query($sql);
        header('Location: index.php?act=admin-slide'); 
    }
    function off_slide($id){
        $conn = connection_database();
        $sql = " UPDATE slide SET status = 1 where id_slide =" . $id;
        $conn->query($sql);
        header('Location: index.php?act=admin-slide'); 
    }
    function in_slide(){
        header('Location: index.php?act=admin-slide'); 
    }
    function contact($name,$email,$subject,$message){
        $conn = connection_database();
        $sql = " INSERT INTO contact VALUES (NULL, '".$name."', '".$email."', '".$subject."', '".$message."',1)";
        $conn->query($sql);
    }
?>