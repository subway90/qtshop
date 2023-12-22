<?php
function SelectOneNews($slug){
    $conn = connection_database();
    $sql = "SELECT * FROM news WHERE slug = '".$slug."'";
    $result = $conn->query($sql);
    $news = $result->fetch();
    return $news;
}
?>