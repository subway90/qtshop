<?php
function SelectOneNews($slug){
    $conn = connection_database();
    $sql = "SELECT * FROM news WHERE slug = '".$slug."' AND status > 1";
    $result = $conn->query($sql);
    $news = $result->fetch();
    return $news;
}
?>