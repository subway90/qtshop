<?php
include('scriptnews.php');
    if(isset($_REQUEST['slugone']))
    {
        $slugone = $_REQUEST['slugone'];
        $news = SelectOneNews($slugone);
        if(!empty($news))
        {
            $date_setup = $news['date_setup'];
            $id_cate = $news['id_cate'];
            $status = $news['status'];
            $title = $news['title'];
            $slug = $news['slug'];
            $image_title = $news['id_cate'];
            $decribe = $news['decribe'];
            $id_news = $news['id_news'];
        }else
        {
            require_once('404.html');
            exit;
        }
        
    }
?>
<div id="top" class="sa-app__body">
    <form action="index.php?act=admin-edit-news&edit=8&id=<?=$id_news?>" method="post" enctype="multipart/form-data">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <h1 class="h3 m-0">Chỉnh sửa bài viết</h1>
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
                                                    <label for="form-product/publish-date" class="form-label">Hẹn ngày mới (nếu có)</label>
                                                        <input name="date_setup" value="" type="text" class="form-control <?=$valid_date_setup?> datepicker-here" id="form-product/publish-date" data-auto-close="true" data-language="en"/>
                                                        
                                                </div>
                                                <div class="col">
                                                   <label for="category" class="form-label">Loại tin tức <span class="text-danger">(*)</span></label>
                                                   <select name="id_cate" id="category" class="sa-select2 form-select">
                                                    <?php
                                                    $list_cate = ListCateNewsForCreate();
                                                    for($i=0;$i<count($list_cate);$i++)
                                                    {
                                                        $cate = $list_cate[$i];
                                                        if($cate['id'] == $id_cate)
                                                        {
                                                    ?>
                                                        <option selected value="<?=$cate['id']?>"><?=$cate['name']?></option>
                                                    <?php
                                                        }else
                                                        {
                                                    ?>
                                                    
                                                        <option value="<?=$cate['id']?>"><?=$cate['name']?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                   <label for="category" class="form-label">Chế độ hiển thị <span class="text-danger">(*)</span></label>
                                                   <select name="status" id="category" class="sa-select2 form-select">
                                                    <?php
                                                    if($status == 1)
                                                    {
                                                    ?>
                                                        <option value="3">Hiện</option>
                                                        <option value="2">Nổi bật</option>
                                                        <option selected value="1">Ẩn</option>
                                                    <?php
                                                    }elseif($status == 2)
                                                    {
                                                    ?>
                                                        <option value="3">Hiện</option>
                                                        <option selected value="2">Nổi bật</option>
                                                        <option value="1">Ẩn</option>
                                                    <?php
                                                    }elseif($status == 3)
                                                    {
                                                    ?>
                                                        <option selected value="3">Hiện</option>
                                                        <option value="2">Nổi bật</option>
                                                        <option value="1">Ẩn</option>
                                                    <?php
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row g-4">
                                                <div style="text-align: center" class="col-4">
                                                <div style="text-align: left" >
                                                <label for="old_date_setup" class="form-label mt-2">Hẹn ngày cũ</label>
                                                <input id="old_date_setup" disabled class="form-control" type="text" value="<?=$date_setup?>">
                                                <input hidden type="text" name="old_date_setup" value="<?=$date_setup?>">
                                                </div>
                                                <?php
                                                if(!empty($news['image_title']))
                                                {
                                                ?>
                                                    <div>
                                                    <img class="p-5" id="image" src="../View/img/<?=$news['image_title']?>" alt="image" width="42%"> <br>
                                                    <input type="text" class="form-control" disabled value="Ảnh cũ: <?=$news['image_title']?>">
                                                    </div>
                                                <?php
                                                }else
                                                {
                                                ?>
                                                    <img class="p-5" id="image" src="../View/img/product_default.png" alt="image" width="42%"> <br>
                                                    <input type="text" class="form-control" disabled value="Ảnh cũ: (chưa có)">
                                                <?php
                                                }
                                                ?>
                                                </div>
                                                <div class="col-8">
                                                <div class="mb-5 mt-5">
                                                        <label for="form-product/name" class="form-label">
                                                            Tiêu đề 
                                                            <span class="text-danger">(*)</span></label>
                                                            <input name="title" type="text" value="<?=$title?>" class="form-control <?=$valid_title?>" id="form-product/name" placeholder="Tiêu đề bài viết"/>
                                                    </div>
                                                    <div class="mb-5">
                                                        <label for="form-product/slug" class="form-label">
                                                            Đường dẫn đến bài viết
                                                            <span class="text-danger">(*)</span></label>
                                                            <?php
                                                            if(!empty($tipforslug))
                                                            {
                                                            ?>
                                                            <div class="p-3">
                                                            <strong>Gợi ý: <div class="mb-2 badge badge-sa-info"><?=$tipforslug?></div></strong>
                                                            </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <input name="slug" type="text" value="<?=$slug?>" class="form-control <?=$valid_slug?>" id="form-product/slug" placeholder="Ví dụ: tieu-de-bai-viet"/>
                                                    </div>
                                                    <div class="mb-5">
                                                        <label for="imageFile" class="form-label">
                                                            Ảnh hiển thị
                                                            <span class="text-danger">(*)</span></label>
                                                            <input name="image_title" type="file" class="form-control <?=$valid_image_title?>" id="imageFile"  onchange="chooseFile(this)"  placeholder="Tiêu đề bài viết" accept="image/jpeg, image/png, image/gif"/>
                                                            <input hidden name="old_image_title" value="<?=$image_title?>" type="text">
                                                    </div>
                                                </div>
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