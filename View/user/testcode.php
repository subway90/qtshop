<!-- <?php phpinfo(); ?> -->
<?php
$arr_replace =
[ 
    "abc" => "xyz",
    "Hieu" => "thoi trang",
    " " => "-"
];
$title = 'Nguyen Minh Hieu 2023';
$title = strtr($title,$arr_replace);
echo $title;
?>