<?php
if(!defined('_CODE'))
{
        require_once('404.html'); exit;
}
?>
    <!-- template -->
<div id="top" class="sa-app__body">
<form action="index.php?act=admin-upload-slide&upload=6" method="post" enctype="multipart/form-data">
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
                                            <br><small>Có thể để trống</small>
                                                    <input type="text" name="title1" class="form-control <?=$valid_title1?>" placeholder="Ví dụ: GIẢM GIÁ 10%"/>
                                            </div>
                                            <div class="mb-4 mt-5"><label class="form-label">Nội dung tiêu đề 2</label>
                                            <br><small>Có thể để trống</small>
                                                    <input type="text" name="title2" class="form-control <?=$valid_title2?>"  placeholder="Ví dụ: chương trình ĐẠI HẠ GIÁ"  />

                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Liên kết</h2>
                                            </div>
                                            <div class="mb-4"><label class="form-label">Nhập địa chỉ (link)</label>
                                                <input type="text" value="<?=$link?>" name="link" class="form-control <?=$valid_link?>" placeholder="Ví dụ: index.php?act=shop" />
                                            </div>
                                            <div class="mb-4"><label class="form-label">Tên button (nếu có Địa chỉ link)</label>
                                            <br><small class="mb-4">Có thể để trống nếu không có <strong>Địa chỉ Link</strong></small>
                                                <input type="text" name="name_link" class="form-control <?=$valid_name_link?>" value="<?=$name_link?>" />
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
                                                <label for="cateslide" class="form-label">Loại slide</label>
                                                <select id="cateslide" name="status" class="sa-select2 form-select">
                                                    <?php if($status==1)
                                                    {
                                                        ?>
                                                    <option selected value="1">Slide 1</option><option value="2">Slide 2</option><option value="3">Ẩn slide</option>
                                                        <?php
                                                    }elseif($status==3)
                                                    {
                                                        ?>
                                                    <option selected value="3">Ẩn slide</option><option value="2">Slide 2</option><option value="1">Slide 1</option>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <option selected value="2">Slide 2</option><option value="1">Slide 1</option><option value="3">Ẩn slide</option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            <div class="mt-4">
                                                <label for="cateslide" class="form-label">Làm mờ background</label>
                                                <select id="cateslide" name="background" class="sa-select2 form-select">
                                                    <?php if($background==1)
                                                    {
                                                        ?>
                                                    <option selected value="1">Không</option><option value="2">Có</option>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <option selected value="2">Có</option><option value="1">Không</option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Ảnh slide (1366x800)</h2>
                                            </div>
                                            <div class="border p-4 d-flex justify-content-center">
                                                <div class="max-w-20x"><img id="image" src="./../View/img/product_default.png"
                                                        class="w-100 h-auto" width="320" height="320" alt="" /></div>
                                            </div>
                                            <div class="mt-4 mb-n2">
                                                <a href="#" class="me-3 pe-2">
                                                    <input id="imageFile" type="file" name="image" onchange="chooseFile(this)" accept="image/jpeg, image/png, image/gif">
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
<script>
    function chooseFile(fileInput)
    {
        if(fileInput.files && fileInput.files[0])
        {
            var reader = new FileReader();
            reader.onload =function (e)
                                        {
                                            $('#image').attr('src',e.target.result);
                                        }
                                        reader.readAsDataURL(fileInput.files[0])
        }
    }
</script>

