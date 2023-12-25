<?php
function SelectOneNews($slug){
    $conn = connection_database();
    $sql = "SELECT * FROM news WHERE slug = '".$slug."'";
    $result = $conn->query($sql);
    $news = $result->fetch();
    return $news;
}
function SelectOneCateNews($id){
    $conn = connection_database();
    $sql = "SELECT * FROM cate_news WHERE id_cate = ".$id;
    $result = $conn->query($sql);
    $news = $result->fetch();
    return $news;
}
function SelectAllNewsInCate($id_cate){
    $conn = connection_database();
    $sql = "SELECT slug, date_setup, status, title, image_title, decribe FROM news WHERE id_cate = ".$id_cate." AND status > 1";
    $result = $conn->query($sql); 
    $news = $result->fetchAll();
    return $news;
}
function SelectAllCateOfNews(){
    $conn = connection_database();
    $sql = "SELECT id_cate, name FROM cate_news WHERE status = 2";
    $result = $conn->query($sql);
    $list = $result->fetchAll();
    return $list;
}
?>