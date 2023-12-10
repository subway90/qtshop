<?php
function connection_database(){
$servername = "localhost";
$username="root";
$password="";
$dbname= "qtshop";
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);   
    }catch(PDOException $e){   
        throw $e;
    }
    return $conn;
}
?>