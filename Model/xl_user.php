<?php
include "database.php";
function id()
{
    $conn = connection_database();
    $sql = "SELECT * FROM taikhoan ORDER BY id_user desc limit 1";
    $goiid = $conn->query($sql);
    $danhsach = $goiid->fetch();
    return $danhsach;
}   
function them_user($id_new,$username,$password,$fullname,$email,$phone,$address,$position){
    $conn = connection_database();
    $sql = "INSERT INTO taikhoan VALUES($id_new,'".$username."','".$password."' ,'".$fullname."','".$email."',".$phone.",'".$address."','".$position."', 'user_image.jpg',01-01-2000, 1)";
    // echo($sql);
    $conn->query($sql); 
}
function mot_user($username){
    $conn = connection_database();
    $sql = "SELECT * FROM taikhoan WHERE username = '".$username."'";
    $result = $conn->query($sql);
    $danhsach = $result->fetch();
    return $danhsach;
}
    function check_user($test_user){
        $conn = connection_database();
        $sql = "SELECT username FROM taikhoan where username = '".$test_user."'";
        $r_c_u = $conn->query($sql);
        $l_r_c_u = $r_c_u->fetchAll();
        return $l_r_c_u;
    }
    function check_email($test_email){
        $conn = connection_database();
        $sql = "SELECT password FROM taikhoan where email = '".$test_email."'";
        $result = $conn->query($sql);
        $danhsach = $result->fetchAll();
        return $danhsach;
    }
    function change_pass($new_pass,$email){
        $umd = md5($new_pass);
        $conn = connection_database();
        $sql = "UPDATE taikhoan SET password = '".$umd."' where email ='".$email."'";
        $conn->query($sql);
        echo'
        <script type="text/javascript">
        function confirm_alert(node) {
            return confirm("Nhấn OK để quay lại.");
        }
        </script>
        <br>Mật khẩu mới của bạn là: <strong>'.$new_pass.'</strong><br>
        <a href="index.php?act=dangnhap" onclick="return confirm_alert(this);">Vui lòng quay lại trang ĐĂNG NHẬP để đổi mật khẩu!<br></a>';
    }
    function capnhat_user($id_user, $name_user,$phone_user,$address_user,$sex_user,$image){
        $conn = connection_database();
        $sql =  "UPDATE taikhoan 
                SET fullname='". $name_user ."', 
                phone=". $phone_user.",
                address ='".$address_user."', 
                image = '". $image ."',
                sex = ".$sex_user."
                where id_user = ".$id_user;
       $conn->query($sql);
       header('Location: index.php?act=update_info');
    //    echo'
    //     <script type="text/javascript">
    //     function confirm_alert(node) {
    //         return confirm("Nhấn OK để quay lại trang chủ");
    //     }
    //     </script>
    //     <a href="index.php?act=user" onclick="return confirm_alert(this);">Sửa thành công ! Click để quay lại trang chủ</a>';
      }
      function capnhat_pass($id_user, $pass){
        $conn = connection_database();
        $sql =  "UPDATE taikhoan 
                SET password='".$pass."' 
                WHERE id_user = ".$id_user;
       $conn->query($sql);
       echo'
        <script type="text/javascript">
        function confirm_alert(node) {
            return confirm("Nhấn OK để quay lại trang ĐĂNG NHẬP");
        }
        </script>
        <a href="index.php?act=dangnhap" onclick="return confirm_alert(this);">Sửa mật khẩu thành công ! Click để đăng nhập lại !</a>';
    //    header ('Location: index.php?act=update_info');
       
      }
      function all_in_feedback($id_review){
        $conn = connection_database();
        $sql = "SELECT rv.status as status, rv2.id_ct as id_ct, rv2.id_sp as id_sp, rv2.id_dh as id_dh, rv2.giasp as giasp, rv2.soluong as soluong, rv2.size as size, rv2.color as color, rv2.date_ct as date, rv2.tensp as tensp, rv2.anhsp as anhsp FROM review rv JOIN (SELECT ct.id_chitiet as id_ct, ct.id_dh as id_dh, ct.id_sp as id_sp, ct.soluong as soluong, ct.size as size, ct.color as color, ct.date_create as date_ct, sp.Name as tensp, sp.image as anhsp, sp.Sale as giasp FROM dh_chitiet ct JOIN sanpham sp ON ct.id_sp = sp.id_sp) rv2 ON rv.id_ct = rv2.id_ct WHERE rv.id_review = ".$id_review;
        $r_c_u = $conn->query($sql);
        $result = $r_c_u->fetch();
        return $result;
    }
    function send_feedback($id_review,$noidung,$rating,$image)
    {
        $conn = connection_database();
        $sql =  "UPDATE review
                SET noidung ='". $noidung ."', 
                rating =".$rating.",
                image ='".$image."',
                status = 2,
                date_submit = current_timestamp
                WHERE id_review = ".$id_review;
       $conn->query($sql);
    }
?>