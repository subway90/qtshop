<?php
if(!defined('_CODE'))
{
        require_once('404.html'); exit;
}
require_once('env.php');
function connection_database(){
$servername = _SERVER_DB;
$username   = _USER_DB;
$password   = _PASS_DB;
$dbname     = _NAME_DB;
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);   
    }catch(PDOException $e){   
        throw $e;
    }
    return $conn;
}
?>