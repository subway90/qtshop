<?php
    include "database.php";
    function DeleteLetterMark($str)
    {
        // Mảng các ký tự tiếng việt không dấu theo mã unicode tổ hợp
        $tv_unicode_tohop  =
            [
                "à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă", "ằ","ắ","ặ","ẳ","ẵ",
                "è","é","ẹ","ẻ","ẽ","ê","ề" ,"ế","ệ","ể","ễ",
                "ì","í","ị","ỉ","ĩ",
                "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ" ,"ò","ớ","ợ","ở","õ",
                "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
                "ỳ","ý","ỵ","ỷ","ỹ",
                "đ",
                "À","À","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă" ,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
                "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
                "Ì","Í","Ị","Ỉ","Ĩ",
                "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ" ,"Ờ","Ớ","Ợ","Ở","Ỡ",
                "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
                "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
                "Đ"
            ];
        // Mảng các ký tự tiếng việt không dấu theo mã unicode dựng sẵn   
        $tv_unicode_dungsan  =
            [
                "à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
                "è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
                "ì","í","ị","ỉ","ĩ",
                "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
                "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
                "ỳ","ý","ỵ","ỷ","ỹ",
                "đ",
                "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
                "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
                "Ì","Í","Ị","Ỉ","Ĩ",
                "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
                "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
                "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
                "Đ"
            ];
        // Mảng các ký không dấu sẽ thay thế cho ký tự có dấu
        $tv_khongdau =
            [
                "a","a","a","a","a","a","a","a","a","a","a" ,"a","a","a","a","a","a",
                "e","e","e","e","e","e","e","e","e","e","e",
                "i","i","i","i","i",
                "o","o","o","o","o","o","o","o","o","o","o","o" ,"o","o","o","o","o",
                "u","u","u","u","u","u","u","u","u","u","u",
                "y","y","y","y","y",
                "d",
                "A","A","A","A","A","A","A","A","A","A","A","A" ,"A","A","A","A","A",
                "E","E","E","E","E","E","E","E","E","E","E",
                "I","I","I","I","I",
                "O","O","O","O","O","O","O","O","O","O","O","O" ,"O","O","O","O","O",
                "U","U","U","U","U","U","U","U","U","U","U",
                "Y","Y","Y","Y","Y",
                "D"
            ];

        $str = str_replace($tv_unicode_dungsan, $tv_khongdau, $str);
        $str = str_replace($tv_unicode_tohop,   $tv_khongdau, $str);
        return $str;
    }
    function CreateSlug($str)
    {
        // Chuyển tiếng việt không dấu
        $str = DeleteLetterMark($str);
        // chuyển sang in thường
        $str = strtolower($str);
        // Giữ lại các ký tự chữ a - z và số 0 - 9 còn lại thay bằng -
        $str = preg_replace('/[^a-z0-9]/', '-', ($str));
        $str = preg_replace('/[--]+/', '-', $str);
        $str = trim($str, '-');
        return $str;
    }
    function count_all_product(){
        $conn = connection_database();
        $sql = "SELECT COUNT(id_sp) as sosp from sanpham";
        $result = $conn->query($sql);
        $danhsach = $result->fetch();
        return $danhsach;
    }
    function on_product($id){
        $conn = connection_database();
        $sql = " UPDATE sanpham SET status = 2 where id_sp =" . $id;
        $conn->query($sql);
        header('Location: index.php?act=admin-products'); 
    }
    function off_product($id){
        $conn = connection_database();
        $sql = " UPDATE sanpham SET status = 1 where id_sp =" . $id;
        $conn->query($sql);
        header('Location: index.php?act=admin-products'); 
    }
    function on_cate($id){
        $conn = connection_database();
        $sql = " UPDATE loaihang SET status = 2 where id_loaihang =" . $id;
        $conn->query($sql);
        header('Location: index.php?act=admin-category'); 
    }
    function off_cate($id){
        $conn = connection_database();
        $sql = " UPDATE loaihang SET status = 1 where id_loaihang =" . $id;
        $conn->query($sql);
        header('Location: index.php?act=admin-category'); 
    }
    function on_cate_v1($id){
        $conn = connection_database();
        $sql = " UPDATE cate_v1 SET status = 2 where id_cate =" . $id;
        $conn->query($sql);
        header('Location: index.php?act=admin-category-v1'); 
    }
    function off_cate_v1($id){
        $conn = connection_database();
        $sql = " UPDATE cate_v1 SET status = 1 where id_cate =" . $id;
        $conn->query($sql);
        header('Location: index.php?act=admin-category-v1'); 
    }
    function on_cate_news($id){
        $conn = connection_database();
        $sql = " UPDATE cate_news SET status = 2 where id_cate =" . $id;
        $conn->query($sql);
        header('Location: index.php?act=admin-cate-news'); 
    }
    function off_cate_news($id){
        $conn = connection_database();
        $sql = " UPDATE cate_news SET status = 1 where id_cate =" . $id;
        $conn->query($sql);
        header('Location: index.php?act=admin-cate-news'); 
    }
    function on_review($id){
        $conn = connection_database();
        $sql = " UPDATE review SET status = 2 where id_review =" . $id;
        $conn->query($sql);
        header('Location: index.php?act=admin-review'); 
    }
    function off_review($id){
        $conn = connection_database();
        $sql = " UPDATE review SET status = 3 where id_review =" . $id;
        $conn->query($sql);
        header('Location: index.php?act=admin-review'); 
    }
    function restart_review($id){
        $conn = connection_database();
        $sql = " UPDATE review SET status = 1 where id_review =" . $id;
        $conn->query($sql);
        header('Location: index.php?act=admin-review'); 
    }
    function update_order_checkout($stt,$dh){
        $conn = connection_database();
        $sql = " UPDATE donhang SET thanhtoan=".$stt.",date_update_thanhtoan = current_timestamp WHERE id_dh =".$dh;
        $conn->query($sql);
        header('Location: index.php?act=admin-orders'); 
    }
    function update_order_delivery($stt,$dh){
        $conn = connection_database();
        $sql = " UPDATE donhang SET giaohang=".$stt.",date_update_giaohang = current_timestamp WHERE id_dh =".$dh;
        $conn->query($sql);
        header('Location: index.php?act=admin-orders'); 
    }
    function update_order_status($stt,$dh){
        $conn = connection_database();
        $sql = " UPDATE donhang SET giaohang=".$stt.", thanhtoan=".$stt.",date_update_giaohang = current_timestamp,date_update_thanhtoan = current_timestamp WHERE id_dh =".$dh;
        $conn->query($sql);
        header('Location: index.php?act=admin-orders'); 
    }
    function update_slide_status($stt,$slide){
        $conn = connection_database();
        $sql = " UPDATE slide SET status = ".$stt.",date = current_timestamp WHERE id_slide =".$slide;
        $conn->query($sql);
        header('Location: index.php?act=admin-slide'); 
    }
    function danhsachsp_all(){
        $conn = connection_database();
        $sql = "SELECT sp.id_sp as id_sp, sp.Name as Name, sp.Price as Price, sp.Sale as Sale, sp.Date_import as Ngay, sp.Viewsp as View, sp.Decribe as Decribe, sp.Mount as Mount, sp.Sale as Sale, sp.`%sale` as `%sale`, sp.image as image, sp.status as status, l.name as name FROM sanpham as sp JOIN loaihang as l ON sp.id_loai = l.id_loaihang order by sp.id_sp asc;";
        $result = $conn->query($sql);
        $danhsach = $result->fetchAll();
        return $danhsach;
    }
    function admin_list_review(){
        $conn = connection_database();
        $sql = "SELECT rv3.*, ct.size as size, ct.color as color
        FROM dh_chitiet ct
        JOIN
        (
        SELECT rv2.*, sp.Name as tensp, sp.image as anhsp
        FROM sanpham sp
        JOIN
        (
        SELECT rv.*, tk.fullname as hoten, tk.image as image_user, tk.email as email_user
        FROM review rv
        JOIN taikhoan tk
        ON rv.id_user = tk.id_user
        ) rv2
        ON sp.id_sp = rv2.id_sp
        ) rv3
        ON ct.id_chitiet = rv3.id_ct
        ORDER BY rv3.id_review DESC";
        $result = $conn->query($sql);
        $danhsach = $result->fetchAll();
        return $danhsach;
    }
    function danhsachsp($select_product){
        $conn = connection_database();
        $sql = "SELECT sp.id_sp as id_sp, sp.Name as Name, sp.Price as Price, sp.Date_import as Ngay, sp.Viewsp as View, sp.Decribe as Decribe, sp.Mount as Mount, sp.Sale as Sale, sp.`%sale` as `%sale`, sp.image as image, sp.status as status, l.name as name, sp.color as color, sp.size as size FROM sanpham as sp JOIN loaihang as l ON sp.id_loai = l.id_loaihang where sp.status = 1 ".$select_product. " ORDER BY sp.Sale asc";
        $result = $conn->query($sql);
        $danhsach = $result->fetchAll();
        return $danhsach;
    }
    function danhsachsp_limit($st,$records,$select_product){
        $conn = connection_database();
        $sql = "SELECT sp.id_sp as id_sp, sp.Name as Name, sp.Price as Price, sp.Date_import as Ngay, sp.Viewsp as View, sp.Decribe as Decribe, sp.Mount as Mount, sp.Sale as Sale, sp.`%sale` as `%sale`, sp.image as image, sp.status as status, l.name as name, sp.color as color, sp.size as size FROM sanpham as sp JOIN loaihang as l ON sp.id_loai = l.id_loaihang where sp.status = 1  ".$select_product. " order by Sale asc limit ".$st.",".$records."";
        $kq= $conn->query($sql);  
        $danhsach = $kq->fetchAll();
        return $danhsach;
        }
    function danhsachcmt($id){
        $conn = connection_database();
        $sql = "SELECT cmt.id_user as id, tk.fullname as hoten, tk.image as image, cmt.noidung as noidung, cmt.time as time
        FROM binhluan as cmt JOIN taikhoan as tk
        ON cmt.id_user = tk.id_user
        WHERE cmt.sanpham =".$id." AND cmt.status = 1";
        $result_cmt = $conn->query($sql);
        $danhsach_cmt = $result_cmt->fetchAll();
        return $danhsach_cmt;
    }
    function list_review($id){
        $conn = connection_database();
        $sql = "SELECT tk.fullname as name, tk.image as image, rv.id_user id_user, rv.id_sp as id_sp, rv.noidung as noidung, rv.rating as rating, rv.date_submit as time,rv.image as image_review
        FROM review rv
        JOIN taikhoan as tk
        ON rv.id_user = tk.id_user
        WHERE rv.id_sp =".$id." AND status = 2"; 
        $result = $conn->query($sql);
        $l_review = $result->fetchAll();
        return $l_review;
    }
    function SelectAllRating($id){
        $conn = connection_database();
        $sql = "SELECT sum(rating) as total_star, count(id_sp) as count_review
        FROM review
        WHERE id_sp = ".$id." AND status = 2
        GROUP BY id_sp";
        $result = $conn->query($sql);
        $review = $result->fetch();
        return $review;
    }

    function chitietsp($table_name, $id){
        $conn = connection_database();
        $sql = "select * from ".$table_name." where id_sp =".$id;
        $result = $conn->query($sql);
        $danhsach = $result->fetchAll();
        return $danhsach;
    }
    function danhsachhoadon(){
        $conn = connection_database();
        $sql = "select * from donhang order by id_dh asc";
        $result = $conn->query($sql);
        $danhsach = $result->fetchAll();
        return $danhsach;
    }
    function list_voucher(){
        $conn = connection_database();
        $sql = "SELECT * FROM vourcher ORDER BY date_create DESC";
        $result = $conn->query($sql);
        $danhsach = $result->fetchAll();
        return $danhsach;
    }
    
    function order_of_user($id){
        $conn = connection_database();
        $sql = "SELECT * FROM donhang WHERE id_user = ".$id." ORDER BY ngaydat DESC";
        $result = $conn->query($sql);
        $danhsach = $result->fetchAll();
        return $danhsach;
    }
    function detail_of_order($id){
        $conn = connection_database();
        $sql = "SELECT ct.soluong as soluong, ct.tong_dh as tong, ct.size as size, ct.color as color, sp.Name as tensp, sp.Sale as giasp, sp.id_sp as id_sp, sp.image as image, sp.id_loai as id_loai, ct.id_chitiet as id_ct
        FROM dh_chitiet ct
        JOIN sanpham sp
        ON ct.id_sp = sp.id_sp
        WHERE id_dh =".$id;
        $result = $conn->query($sql);
        $danhsach = $result->fetchAll();
        return $danhsach;
    }
    function danhsachuser($table_name){
        $conn = connection_database();
        $sql = "select * from ".$table_name." order by id_user asc";
        $result = $conn->query($sql);
        $danhsach = $result->fetchAll();
        return $danhsach;
    }

    function themsp($id_loai, $name, $price, $sale, $decribe, $short_decribe, $mount, $ptsale, $hinhsp, $color, $size)
    {
        $conn = connection_database();
        $sql = " INSERT INTO sanpham VALUES 
        (NULL,'".$name."',".$price.",current_timestamp, 0,'".$decribe."',".$mount.",".$sale.",'".$hinhsp."',".$id_loai.",1,'".$color."','".$size."',".$ptsale.",'".$short_decribe."')";
        $conn->query($sql);
        echo '<script type="text/javascript">

            window.onload = function () { alert("ĐĂNG SẢN PHẨM THÀNH CÔNG !"); }

        </script>';
    }
    function themcmt($id_user_cmt, $cmt,$id_sp_cmt)
    {
        $conn = connection_database();
        $sql = " INSERT INTO binhluan VALUES (NULL,".$id_user_cmt.", '".$cmt."', current_timestamp,".$id_sp_cmt.",1)";
        // echo $sql;
        $conn->query($sql);
        
    }
    function themloai($name,$v1,$decribe,$image)
    {
        $conn = connection_database();
        $sql = " INSERT INTO loaihang  VALUES (NULL,'".$name."','".$decribe."','".$image."',1,".$v1.",current_timestamp)";
        $conn->query($sql);
        echo '<script type="text/javascript">

            window.onload = function () { alert("Thêm loại hàng LV2 thành côngg !"); }

        </script>';
    }
    function AddNews($id_cate,$title,$slug,$image_title,$decribe,$id_user,$status,$date_setup)
    {
        if(empty($date_setup))
        {
            $date_setup = "current_timestamp";
        }else
        {
            //  mm/dd/yyyy
            $str_date_input = $date_setup;
            $date_setup = substr($str_date_input,6,4)."-".substr($str_date_input,0,2)."-".substr($str_date_input,3,2);
        }
        $conn = connection_database();
        $sql = " INSERT INTO news VALUES (NULL,".$id_cate.",'".$title."','".$slug."','".$image_title."','".$decribe."',current_timestamp,current_timestamp,".$id_user.",".$id_user.",".$status.",".$date_setup.")";
        // var_dump("<div style='margin: 10% 20%'>".$sql."</div>"); exit;
        $conn->query($sql);
        echo '<script type="text/javascript">

            window.onload = function () { alert("Thêm tin tức thành công !"); }

        </script>';
    }
    function UpdateNews($id_cate,$title,$slug,$image_title,$decribe,$user_submit,$status,$date_setup,$id_news)
    {
        $conn = connection_database();
        $sql =  "UPDATE news
                SET 
                id_cate ='".$id_cate."',
                title ='".$title."',
                slug ='".$slug."',
                image_title ='".$image_title."',
                decribe ='".$decribe."',
                date_submit = current_timestamp,
                user_submit =".$user_submit.",
                date_setup =".$date_setup."
                WHERE id_news = ".$id_news;
       $conn->query($sql);
    }
    
    function themloaiv1($name,$level,$decribe,$image)
    {
        $conn = connection_database();
        $sql = " INSERT INTO cate_v1  VALUES (NULL,'".$name."','".$decribe."',current_timestamp,".$level.",1,'".$image."')";
        $conn->query($sql);
        echo '<script type="text/javascript">

            window.onload = function () { alert("Thêm loại hàng LV1 thành côngg !"); }

        </script>';
    }
    function AddCateNews($status,$name,$decribe)
    {
        $conn = connection_database();
        $sql = " INSERT INTO cate_news  VALUES (NULL,'".$name."','".$decribe."',".$status.",current_timestamp,current_timestamp)";
        $conn->query($sql);
        echo '<script type="text/javascript">

            window.onload = function () { alert("Thêm tin tức mới thành côngg !"); }

        </script>';
        $_SESSION['alert'] = "<div class='alert alert-sa-danger-card'><span class='text-success'>Thêm thành công !</span></div>";
    }
    function themvoucher($code,$condition,$number,$datestart,$dateend,$amount,$status,$decribe)
    {
        $conn = connection_database();
        $sql = " INSERT INTO vourcher  VALUES (NULL,'".$code."',".$condition.",".$number.",".$datestart.",".$dateend.",".$amount.",current_timestamp,".$status.",'".$decribe."')";
        $conn->query($sql);
        echo '<script type="text/javascript">

            window.onload = function () { alert("Thêm voucher thành công !"); }

        </script>';
    }
    function listloai(){
        $conn = connection_database();
        $sql = "SELECT name as tenloai,  id_loaihang as stt, status FROM loaihang WHERE status= 1 ORDER by id_loaihang ASC";
        $result = $conn->query($sql);
        $list_s = $result->fetchAll();
        return $list_s;
    }
    function tenloai($id){
        $conn = connection_database();
        $sql = "SELECT name FROM loaihang WHERE id_loaihang =".$id ;
        $result = $conn->query($sql);
        $name = $result->fetch();
        return $name;
    }
    function select_one_cate_v1($id){
        $conn = connection_database();
        $sql = "SELECT * FROM cate_v1 WHERE id_cate =".$id ;
        $result = $conn->query($sql);
        $name = $result->fetch();
        return $name;
    }
    
    function list_cate_v1(){
        $conn = connection_database();
        $sql = "SELECT * FROM cate_v1 WHERE status = 1 ORDER BY id_cate ASC";
        $result = $conn->query($sql);
        $list_v1 = $result->fetchAll();
        return $list_v1;
    }
    function list_cate_v2($id_v1){
        $conn = connection_database();
        $sql = "SELECT * FROM loaihang WHERE status = 1 AND id_cate_v1 = ".$id_v1." ORDER by id_loaihang ASC";
        $result = $conn->query($sql);
        $list = $result->fetchAll();
        return $list;
    }
    function listloai_all(){
        $conn = connection_database();
        $sql = "SELECT name as tenloai,  id_loaihang as stt, status, image, date, id_cate_v1 as id_v1 FROM loaihang ORDER by id_loaihang ASC";
        $result = $conn->query($sql);
        $list_s = $result->fetchAll();
        return $list_s;
    }
    function listloai_v1_all(){
        $conn = connection_database();
        $sql = "SELECT v1.name as name, v1.decribe as decribe, v1.id_cate as stt, v1.status as status, v1.image as image, v1.level as level, v1.date as date
        FROM cate_v1 v1
        -- JOIN loaihang v2
        -- ON v1.id_cate = v2.id_cate_v1
        -- GROUP BY v2.id_cate_v1
        ORDER by v1.id_cate ASC";
        $result = $conn->query($sql);
        $list_s = $result->fetchAll();
        return $list_s;
    }
    function list_cate_news(){
        $conn = connection_database();
        $sql = "SELECT * FROM cate_news";
        $result = $conn->query($sql);
        $list = $result->fetchAll();
        return $list;
    }
    function ListCateNewsForCreate(){
        $conn = connection_database();
        $sql = "SELECT id_cate as id, name FROM cate_news";
        $result = $conn->query($sql);
        $list = $result->fetchAll();
        return $list;
    }
    function list_news(){
        $conn = connection_database();
        $sql = "SELECT * FROM news";
        $result = $conn->query($sql);
        $list = $result->fetchAll();
        return $list;
    }
    function c_pro_in_cate($id_loai){
        $conn = connection_database();
        $sql = "SELECT count(id_sp) FROM sanpham where id_loai =".$id_loai;
        $result = $conn->query($sql);
        $c_pro = $result->fetch();
        return $c_pro;
    }
    function select_cate($id){
        $conn = connection_database();
        $sql = "SELECT * FROM loaihang where id_loaihang =".$id;
        $result = $conn->query($sql);
        $s_cate = $result->fetch();
        return $s_cate;
    }

        function mot_sanpham($table_name,$id){
            $conn = connection_database();
            $sql = "SELECT * 
            FROM ".$table_name." as sp
            JOIN loaihang as l
            ON sp.id_loai = l.id_loaihang
            WHERE id_sp = ".$id;
            $result = $conn->query($sql);
            $danhsach = $result->fetchAll();
            return $danhsach;
        }
        
        function donhang_chitiet($id_ct){
            $conn = connection_database();
            $sql = "select * from dh_chitiet where id_dh = ".$id_ct;
            $result = $conn->query($sql);
            $danhsach = $result->fetchAll();
            return $danhsach;
        }
    function select_stt_dh($id_dh){
        $conn = connection_database();
        $sql = "SELECT dh.giaohang giaohang, dh.thanhtoan thanhtoan from dh_chitiet ct
        JOIN donhang dh
        ON ct.id_dh = dh.id_dh
        WHERE ct.id_dh =".$id_dh;
        $result = $conn->query($sql);
        $s_s_dh = $result->fetch();
        return $s_s_dh;
    }
    function capnhatsp($tenbang, $masp, $tensp, $giasale, $giagoc, $decribe, $short_decribe,$slsp, $hinhsp,$loaihang, $sale, $size, $color){
        $conn = connection_database();
        $sql =  "Update ".$tenbang." 
                Set Name='". $tensp ."', 
                Price=". $giagoc .",
                Sale=".$giasale.",
                Mount=". $slsp.",
                image='".$hinhsp."',
                id_loai =".$loaihang.",
                `%sale` = ".$sale.",
                Decribe ='".$decribe."',
                size ='".$size."',
                color ='".$color."',
                short_decribe ='".$short_decribe."',
                Date_import = current_timestamp
                where id_sp = ".$masp;
       $conn->query($sql);
      }
          function upload_cate($name_cate,$decribe_cate,$id_cate,$image_cate,$v1){
            $conn = connection_database();
            $sql =  "UPDATE loaihang 
                    Set name='". $name_cate ."', 
                    decribe='". $decribe_cate ."',
                    image='".$image_cate."',
                    id_cate_v1=".$v1."
                    where id_loaihang = ".$id_cate;
           $conn->query($sql);
           echo '<script type="text/javascript">

            window.onload = function () { alert("chỉnh sửa thành công loại hàng LV2 !"); }

        </script>';
          }
          function upload_cate_v1($name_cate,$decribe_cate,$id_cate,$image_cate,$level){
            $conn = connection_database();
            $sql =  "UPDATE cate_v1
                    Set name='". $name_cate ."', 
                    decribe='". $decribe_cate ."',
                    image='".$image_cate."',
                    level=".$level."
                    where id_cate = ".$id_cate;
           $conn->query($sql);
           echo '<script type="text/javascript">

            window.onload = function () { alert("chỉnh sửa thành công loại hàng LV1 !"); }

        </script>';
          }
          function capnhatviewsp($id_sp,$view_new){
            $conn = connection_database();
            $sql =  "Update sanpham
                    Set Viewsp=". $view_new ."
                    where id_sp = ".$id_sp;
            //  echo ($sql);
           $conn->query($sql);
          }
          function LimitComment($id_sp_cmt,$id_user_cmt){
            $conn = connection_database();
            $sql = "SELECT id_binhluan, time
                    FROM binhluan
                    WHERE id_user = ".$id_user_cmt." AND sanpham = ".$id_sp_cmt." AND status = 1
                    ORDER BY time DESC LIMIT 3";
            $result = $conn->query($sql);
            $danhsach = $result->fetchAll();
            return $danhsach;
        }
          function load($id){
            $conn = connection_database();
            $sql = "select * from taikhoan where id_user =".$id;
            $result = $conn->query($sql);
            $danhsach = $result->fetchAll();
            return $danhsach;
        }
        function image_user($id){
            $conn = connection_database();
            $sql = "SELECT image from taikhoan where id_user =".$id;
            $result = $conn->query($sql);
            $danhsach = $result->fetch();
            return $danhsach;
        }
        function sum_total_month($month){
            $date_year = getdate();
            $conn = connection_database();
            $sql = "SELECT sum(tongdh) as sum, count(tongdh) as count FROM donhang WHERE ngaydat LIKE '".$date_year['year']."-".$month."%' AND thanhtoan = 2";
            $result = $conn->query($sql);
            $total = $result->fetch();
            return $total;
        }
        function list_view_product(){
            $conn = connection_database();
            $sql = "SELECT Name, Viewsp, id_sp FROM `sanpham` ORDER by Viewsp desc limit 10;";
            $result = $conn->query($sql);
            $l_v_pro = $result->fetchAll();
            return $l_v_pro;
        }
        function list_order_dashboard(){
            $conn = connection_database();
            $sql = "SELECT l.name as tenloai, gr2.tensp as tensp, gr2.giasp as giasp, gr2.soluongmua as soluongmua, gr2.solanmua as solanmua, gr2.tongmua as tongmua FROM loaihang l
            JOIN 
            (SELECT sp.Name as tensp, sp.Price as giasp , sp.id_loai as loai, ct.tongmua as tongmua, ct.slmua as soluongmua, ct.c_mua as solanmua, ct.id as idsp FROM sanpham sp
            JOIN (SELECT sum(dhct.tong_dh) tongmua,sum(soluong) as slmua, count(id_sp) as c_mua, dhct.id_sp id FROM dh_chitiet dhct GROUP BY dhct.id_sp) ct
            ON sp.id_sp = ct.id) gr2
            ON l.id_loaihang = gr2.loai
            ";
            $result = $conn->query($sql);
            $l_order = $result->fetchAll();
            return $l_order;
        }
        function list_hot_product(){
            $conn = connection_database();
            $sql = "SELECT sp.id_sp as id, sp.Name as tensp, sp.Price as giasp , sp.image as image, sp.Sale as sale, sp.status as stt, ct.slmua as soluongmua, sp.size as size, sp.color as color
            FROM sanpham sp
            JOIN 
            (
                    SELECT sum(soluong) as slmua, id_sp as id
                    FROM dh_chitiet dhct 
                    GROUP BY dhct.id_sp
            ) ct
            ON sp.id_sp = ct.id
            WHERE sp.status = 1
            ORDER BY ct.slmua DESC LIMIT 8
            ";
            $result = $conn->query($sql);
            $l_order = $result->fetchAll();
            return $l_order;
        }
        function list_new_product(){
            $conn = connection_database();
            $sql = "SELECT id_sp as id, Name as tensp, Price as giasp, Sale as sale, image, Date_import as date, size, color
            FROM `sanpham` WHERE status = 1 ORDER BY Date_import DESC LIMIT 12
            ";
            $result = $conn->query($sql);
            $l_new = $result->fetchAll();
            return $l_new;
        }
        function list_sale_product(){
            $conn = connection_database();
            $sql = "SELECT id_sp as id, Name as tensp, Price as giasp, Sale as sale, `%sale`,color, size, image
            FROM `sanpham` WHERE status = 1 and `%sale` >0 ORDER BY `%sale` DESC LIMIT 18
            ";
            $result = $conn->query($sql);
            $l_new = $result->fetchAll();
            return $l_new;
        }
        function color_and_size($id){
            $conn = connection_database();
            $sql = "SELECT color, size
            FROM `sanpham` WHERE id_sp =".$id;
            $result = $conn->query($sql);
            $c_and_s = $result->fetchAll();
            return $c_and_s;
        }
        function list_view_product_user(){
            $conn = connection_database();
            $sql = "SELECT id_sp as id, Name as tensp, Price as giasp, Sale as sale, image, Viewsp as view, size, color
            FROM `sanpham` WHERE status = 1 AND Viewsp > 0 ORDER BY Viewsp DESC LIMIT 12
            ";
            $result = $conn->query($sql);
            $l_view = $result->fetchAll();
            return $l_view;
        }
        function load_user($username){
            $conn = connection_database();
            $sql = "SELECT * from taikhoan where username = '".$username."'";
            $result = $conn->query($sql);
            $load_user = $result->fetchAll();
            return $load_user;
        }
        function admin_update_user($username, $name_user,$phone_user,$address_user,$sex_user,$image){
            $conn = connection_database();
            $sql =  "UPDATE taikhoan 
                    SET fullname='". $name_user ."', 
                    phone=". $phone_user.",
                    address ='".$address_user."', 
                    image = '". $image ."',
                    sex = ".$sex_user."
                    where username = '".$username."'";
           $conn->query($sql);
           header("Location: index.php?act=admin-edit-accounts&user=$username");
        }
        function select_one_voucher($id){
            $conn = connection_database();
            $sql = "SELECT * FROM vourcher WHERE id_voucher =".$id;
            $result = $conn->query($sql);
            $vourcher = $result->fetch();
            return $vourcher;
        }
        function select_one_ebanking($id){
            $conn = connection_database();
            $sql = "SELECT * FROM ebanking WHERE id_ebanking =".$id;
            $result = $conn->query($sql);
            $ebanking = $result->fetch();
            return $ebanking;
        }
        function select_infomation_web()
        {
            $conn = connection_database();
            $sql = "SELECT * FROM infomation";
            $result = $conn->query($sql);
            $info = $result->fetch();
            return $info;
        }
        function select_date_update($id)
        {
            $conn = connection_database();
            $sql = "SELECT date_update_thanhtoan, date_update_giaohang FROM donhang WHERE id_dh=".$id;
            $result = $conn->query($sql);
            $date = $result->fetch();
            return $date;
        }
        function upload_new_feedback($user,$id_sp,$id_ct,$id_dh)
    {
        $conn = connection_database();
        $sql = " INSERT INTO review VALUES 
        (NULL,".$user.",".$id_sp.",".$id_ct.",".$id_dh.",NULL,NULL,NULL,1,current_timestamp,NULL)";
        $conn->query($sql);
    }
    function select_one_feedback($id)
        {
            $conn = connection_database();
            $sql = "SELECT id_user FROM review WHERE id_dh=".$id;
            $result = $conn->query($sql);
            $one = $result->fetch();
            return $one;
        }
        function select_user_feedback($id)
        {
            $conn = connection_database();
            $sql = "SELECT * FROM review WHERE id_user=".$id." AND status >0";
            $result = $conn->query($sql);
            $list = $result->fetchAll();
            return $list;
        }
?>