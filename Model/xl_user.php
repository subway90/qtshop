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
    $danhsach = $result->fetchAll();
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
?>