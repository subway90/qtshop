<!-- <?php phpinfo(); ?> -->
<?php
    echo('1.<br>');
$arr_replace =
[ 
    "abc" => "xyz",
    "Hieu" => "thoi trang",
    " " => "-"
];
$title = 'Nguyen Minh Hieu 2023';
$title = strtr($title,$arr_replace);
echo $title.'<br>';
    echo('<br>2.<br>');
$d = dir(getcwd());

	echo "Handle: " . $d->handle . "<br>";
	echo "Path: " . $d->path . "<br>";
	
	while (($file = $d->read()) !== false){ 
	  echo "filename: " . $file . "<br>"; 
	} 
	$d->close();

    echo('<br>3.<br>');
    //  setcookie(name, value, expire, path, domain, security);
    // name: tên cookie
    // value: thiết lập giá trị
    // expiry: thiết lập hạn dùng cho cookie, để trống là tự hết hạn sau khi đóng trình duyệt
    // path: xác định thư mục cho cookie, để dấu gạch chéo (/) là dùng chung cho tất cả thư mục
    // domain: tên miền
    // security: thiết lập số một (1) để dùng cho HTTPS, thiết lập số không (0) để dùng cho HTTP
    setcookie("login","admin Admin123",time()+20,"/","",0);
    if(isset($_COOKIE['login']))
    {
        $login = $_COOKIE['login'];
        $arr_login = explode(" ", $login);
        var_dump($arr_login);
    }else
    {
        var_dump('Cookie đã hết hạn');
    }
    ?>
    <a href="index.php?act=testcode">Reload</a>