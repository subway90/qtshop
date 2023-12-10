<?php
function select_code_voucher($code){
    $conn = connection_database();
    $sql = "SELECT * FROM vourcher WHERE code ='".$code."' AND status >1 ORDER BY date_create LIMIT 1";
    $result = $conn->query($sql);
    $vourcher = $result->fetch();
    return $vourcher;
}

 function kiemtra($sp){
    for($i = 0 ; $i < sizeof($_SESSION['giohang']) ; $i++){
        if (
            $_SESSION['giohang'][$i][0] === $sp[0] && 
            $_SESSION['giohang'][$i][5] === $sp[5] && 
            $_SESSION['giohang'][$i][6] === $sp[6]
            )
            {
            return $i;
            }
   }
   return -1;
}
function kiemtra_update($sp_u){
    for($i = 0 ; $i < sizeof($_SESSION['giohang']) ; $i++){
        if (
            $_SESSION['giohang'][$i][0] === $sp_u[0] && 
            $_SESSION['giohang'][$i][5] === $sp_u[5] && 
            $_SESSION['giohang'][$i][6] === $sp_u[6]
            )
            {
            return $i;
            }
   }
   return -1;
}
function kiemtra_del($sp_d){
    for($i = 0 ; $i < sizeof($_SESSION['giohang']) ; $i++){
        if (
            $_SESSION['giohang'][$i][0] === $sp_d[0] && 
            $_SESSION['giohang'][$i][5] === $sp_d[1] && 
            $_SESSION['giohang'][$i][6] === $sp_d[2]
            )
            {
            return $i;
            }
   }
   return -1;
}
function kiemtra_2($id){
    for($i = 0 ; $i < sizeof($_SESSION['yeuthich']) ; $i++){
        if ($_SESSION['yeuthich'][$i][0] === $id[0]){
            return $i;
        }
   }
   return -1;
}
?>