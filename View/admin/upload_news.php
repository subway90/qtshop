<?php
include('scriptnews.php');
if(isset($_REQUEST['checked']))
{
    $id_user = $_SESSION['dangnhap'][0][0];
    $date_setup = $_POST['date_setup'];
    $id_cate = $_POST['id_cate'];
    $status = $_POST['status'];
    $title = $_POST['title'];
    $decribe = $_POST['decribe'];
    AddNews($id_cate,$title,$decribe,$id_user,$status,$date_setup);
    $_SESSION['alert'] = "<div class='alert alert-sa-danger-card'><span class='text-success'>Sửa thành công slide</span></div>";
}else
{
$decribe = "";
}

?>
<div id="top" class="sa-app__body">
    <form action="index.php?act=admin-upload-news&checked" method="post" enctype="multipart/form-data">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <h1 class="h3 m-0">Tạo bài viết mới</h1>
                                </div>
                                <div class="col-auto d-flex">
                                    <a href="index.php?act=admin-news" class="btn btn-secondary me-3">Hủy</a>
                                    <button class="btn btn-primary" type="submit" >Lưu</button>
                                </div>
                            </div>
                        </div>
                        <div class="sa-entity-layout" data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div>
                                        <?=$_SESSION['alert']?>
                                    </div>
                                    <div class="card">
                                        <div class="card-body p-5">
                                            <div class="row g-4">
                                                <div class="col">
                                                    <label for="form-product/seo-title" class="form-label">Hẹn ngày (nếu có)</label>
                                                        <input name="date_setup" type="text" class="form-control datepicker-here" id="form-product/publish-date" data-auto-close="true" data-language="en"/>
                                                </div>
                                                <div class="col">
                                                   <label for="category" class="form-label">Loại tin tức <span class="text-danger">(*)</span></label>
                                                   <select name="id_cate" id="category" class="sa-select2 form-select">
                                                    <?php
                                                    $list_cate = ListCateNewsForCreate();
                                                    for($i=0;$i<count($list_cate);$i++)
                                                    {
                                                        $cate = $list_cate[$i];
                                                    ?>
                                                        <option value="<?=$cate['id']?>"><?=$cate['name']?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                   <label for="category" class="form-label">Chế độ hiển thị <span class="text-danger">(*)</span></label>
                                                   <select name="status" id="category" class="sa-select2 form-select">
                                                        <option value="3">Hiện</option>
                                                        <option  value="2">Nổi bật</option>
                                                        <option  value="1">Ẩn</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-4 mt-4">
                                                <label for="form-product/name" class="form-label">
                                                    Tiêu đề 
                                                    <span class="text-danger">(*)</span></label>
                                                    <input name="title" type="text" class="form-control" id="form-product/name" placeholder="Tiêu đề bài viết"/>
                                            </div>
                                            <div class="mb-4">
                                                <label for="description_news" class="form-label">Nội dung</label>
                                                <textarea name="decribe" id="description_news" class="form-control" rows="15"><?=$decribe?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </form>
</div>