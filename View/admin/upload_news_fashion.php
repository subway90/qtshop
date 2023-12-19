<?php
if(isset($_REQUEST['checked']))
{
    $noidung = $_POST['noidung'];
}else
{
$noidung = "";
}

?>
<div id="top" class="sa-app__body">
    <form action="index.php?act=admin-upload-news-fashion&checked" method="post" enctype="multipart/form-data">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <h1 class="h3 m-0">Tạo bài viết mới</h1>
                                </div>
                                <div class="col-auto d-flex">
                                    <a href="#" class="btn btn-secondary me-3">Hủy</a>
                                    <button class="btn btn-primary" type="submit" >Lưu</button>
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
                                            <div class="row g-4">
                                                <div class="col">
                                                    <label for="form-product/seo-title" class="form-label">Hẹn ngày</label>
                                                        <input type="text" class="form-control datepicker-here" id="form-product/publish-date" data-auto-close="true" data-language="en"/>
                                                </div>
                                                <div class="col">
                                                   <label for="category" class="form-label">Loại tin tức</label>
                                                   <select id="category" class="sa-select2 form-select">
                                                        <option>Thời trang</option>
                                                        <option>Khuyến mãi</option>
                                                        <option selected="">Thông báo</option>
                                                        <option>Khác</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                   <label for="category" class="form-label">Chế độ hiển thị</label>
                                                   <select id="category" class="sa-select2 form-select">
                                                        <option>Nổi bật</option>
                                                        <option>Bình thường</option>
                                                        <option selected="">Ẩn danh</option>
                                                        <option>Khác</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-4 mt-4">
                                                <label for="form-product/name" class="form-label">Tiêu đề</label><input
                                                    type="text" class="form-control" id="form-product/name" placeholder="Tiêu đề bài viết"/>
                                            </div>
                                            <div class="mb-4">
                                                <label for="description_news" class="form-label">Nội dung</label>
                                                <textarea name="noidung" id="description_news" class="form-control" rows="15"><?=$noidung?></textarea>
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