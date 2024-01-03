<?php
if(!defined('_CODE'))
{
        require_once('404.html'); exit;
}
if(isset($_REQUEST['id']) && !isset($_REQUEST['edit']))
{
    if(!empty($_REQUEST['id']))
    {
        $id = $_REQUEST['id'];
        $cate_news = SelectOneCateNews($id);    
        if(empty($cate_news))
        {
            require_once('404.html'); exit;
        }else
        {
            $status = $cate_news['status'];
            $name = $cate_news['name'];
            $decribe = $cate_news['decribe'];
        }
    }else
    {
        require_once('404.html'); exit;
    }
}
if(isset($_REQUEST['id']) && isset($_REQUEST['edit-cate-news']))
{
    if(!empty($_REQUEST['id']))
    {
        $id_cate = $_REQUEST['id'];
        $verify_edit_cate_news = 0;
        $status = $_POST['status'];
        $name = $_POST['name'];
        $decribe = $_POST['decribe'];
        if(!empty($name))
        {
            $verify_edit_cate_news++;
            $valid_name = "is-valid";
        }else
        {
            $valid_name = "is-invalid";
            $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Tên loại tin tức chưa được nhập</div>";

        }
        if(!empty($decribe))
        {
            $verify_edit_cate_news++;
            $valid_decribe = "is-valid";
        }else
        {
            $valid_decribe = "is-invalid";
            $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Ghi chú tin tức chưa được nhập</div>";

        }
        if($verify_edit_cate_news == 2)
        {
        $_SESSION['alert'] = "<div class='alert alert-sa-danger-card'><span class='text-success'>Sửa thành công loại tin tức ! <a href='index.php?act=admin-cate-news' class='alert-link'>Quay về</a></span></div>";
        updateCateNews($name,$decribe,$status,$id_cate);
        }
    }else
    {
        require_once('404.html'); exit;
    }
}
?>
</html>
<form action="index.php?act=admin-edit-cate-news&id=<?=$id?>&edit-cate-news" method="post" enctype="multipart/form-data">
           <!-- sa-app__body -->
            <div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <h1 class="h3 m-0">Chỉnh sửa loại tin tức</h1>
                                </div>
                                <div class="col-auto d-flex">
                                    <a href="index.php?act=admin-cate-news" class="btn btn-secondary me-3">Hủy</a>
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div>
                                        <?=$_SESSION['alert']?>
                                    </div>
                                    <div class="card">
                                    
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Thông tin</h2>
                                            </div>
                                            <div class="mb-4">
                                            <label class="form-label">Trạng thái</label>
                                            <select name="status" class="sa-select2 form-select">
                                            <?php
                                            if($status == 2)
                                            {
                                            ?>
                                                <option value="1">Ẩn</option>
                                                <option selected value="2">Hiển thị</option>
                                            <?php
                                            }else
                                            {
                                            ?>
                                                <option selected value="1">Ẩn</option>
                                                <option value="2">Hiển thị</option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Tên tin tức</label>
                                                <input type="text" class="form-control <?=$valid_name?>" value="<?=$name?>" name="name" />
                                            </div>
                                            <div>
                                                <label class="form-label">Ghi chú</label>
                                                <textarea name="decribe" id="form-product/short-description" class="form-control <?=$valid_decribe?>"
                                                    rows="2"><?=$decribe?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Ảnh tin tức <span class="text-danger">(đang cập nhật)</span></h2>
                                            </div>
                                        </div>
                                        <div class="mt-n5">
                                            <div class="sa-divider"></div>
                                            <div class="table-responsive" >
                                                <table class="sa-table">
                                                    <tbody>
                                                        <div style="display:flex; justify-content: center; height: 100%">
                                                        <img style="text-align: center" id="image" height="10%" width="50%" src="../View/img/product_default.png" >
                                                        </div>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="sa-divider"></div>
                                            <div class="px-5 py-4 my-2">
                                                <input disabled class="form-control" id="imageFile" type="file" name="image" onchange="chooseFile(this)" value="">
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
