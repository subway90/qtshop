<?php
if(!defined('_CODE'))
{
        require_once('404.html'); exit;
}
?>
<?php
$h_alert = '<div class="alert alert-sa-danger-card alert-sa-has-icon alert-dismissible fade show" role="alert">
<div class="alert-sa-icon">
    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
        <circle cx="12" cy="12" r="10"></circle> <line x1="12" y1="16" x2="12" y2="12"></line> <line x1="12" y1="8" x2="12.01" y2="8"></line>
    </svg>
</div>
<div class="alert-sa-content">';
$f_alert = '</div>
<button type="button" class="sa-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
        if(!empty($_POST['title1']))
        {
            $bool =1;
            $title1 = $_POST['title1'];
        }else{
            $_SESSION['alert'] .= 'Tiêu đề 1 chưa được nhập.<br>';
            $bool =2;
        }
        if(!empty($_POST['title2']))
        {
            $bool =1;
            $title2 = $_POST['title2'];
        }else{
            $_SESSION['alert'] .= 'Tiêu đề 2 chưa được nhập.<br>';
            $bool =2;
        }
        if(!empty($_POST['link']))
        {
            $bool =1;
            $link = $_POST['link'];
        }else{
            $_SESSION['alert'] .= 'Liên kết (link) chưa được nhập.<br>';
            $bool =2;
        }
        $status = $_POST['status'];
        if(basename($_FILES['image']['name']) !== "")
        {
            $image = basename($_FILES['image']['name']);
            $path = __DIR__ . './../View/img/';
            $target_file = $path . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            if($bool == 1)
                {
                    themslide($title1, $title2, $link, $status, $image); //xl_search
                }
        }
        else{
            $_SESSION['alert'] .= 'Hình ảnh chưa được nhập.<br>';
        }
}
?>
    <!-- template -->
<div id="top" class="sa-app__body">
<form action="" method="post" enctype="multipart/form-data">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="index.php?act=admin-dashboard">Quản lí</a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="index.php?act=admin-slide">Quản lí slide</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Thêm slide</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Thêm slide</h1>
                                    
                                </div>
                                <div class="col-auto d-flex"><a href="index.php?act=admin-slide" class="btn btn-secondary me-3">Quay về</a>
                                <button class="btn btn-primary" type="submit" >Lưu</button></div>
                            </div>
                            <div class="mt-5">
                                <?php
                                if($_SESSION['alert']== "")
                                {
                                    echo $_SESSION['alert'];
                                }else{
                                    echo $h_alert.$_SESSION['alert'].$f_alert;
                                }
                           ?>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div class="card">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Nội dung slide</h2>
                                            </div>
                                            <div class="mb-4"><label class="form-label">Nội dung tiêu đề 1</label>
                                                    <input type="text" name="title1" class="form-control" placeholder="Ví dụ: GIẢM GIÁ 10%"/>
                                            </div>
                                            <div class="mb-4"><label class="form-label">Nội dung tiêu đề 2</label>
                                                    <input type="text" name="title2" class="form-control"  placeholder="Ví dụ: chương trình ĐẠI HẠ GIÁ"  />

                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Liên kết</h2>
                                            </div>
                                            <div class="mb-4"><label class="form-label">Nhập địa chỉ (link)</label>
                                                <input type="text" name="link" class="form-control" placeholder="Ví dụ: index.php?act=shop" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card w-100">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Trạng thái</h2>
                                            </div>
                                            <select name="status" class="sa-select2 form-select">
                                                <option value="2">Ẩn</option>
                                                <option value="1">Hiện</option>
                                                <option value="3">Nổi bật</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Ảnh slide (1366x800)</h2>
                                            </div>
                                            <div class="border p-4 d-flex justify-content-center">
                                                <div class="max-w-20x"><img src="./../View/img/product_default.png"
                                                        class="w-100 h-auto" width="320" height="320" alt="" /></div>
                                            </div>
                                            <div class="mt-4 mb-n2">
                                                <a href="#" class="me-3 pe-2">
                                                    <input type="file" name="image" >
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
</div>
</form>

