<?php
if(!defined('_CODE'))
{
        require_once('404.html'); exit;
}
?>
<?php
if(isset($_REQUEST["id"]))
{
    $id = $_REQUEST["id"];
    $slide = slide($id);
}
?>
    <!-- template -->
<div id="top" class="sa-app__body">
<form action="index.php?act=admin-edit-slide&id=<?=$id?>&edit=7" method="post" enctype="multipart/form-data">
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
                                <div class="col-auto d-flex"><a href="index.php?act=admin-slide" class="btn btn-secondary me-3">Hủy</a>
                                <button class="btn btn-primary" type="submit" >Lưu</button></div>
                            </div>
                            <div class="mt-5">
                                <?=$_SESSION['alert']?>
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
                                            <div class="mb-0"><label class="form-label">Nội dung tiêu đề 1</label>
                                            <br><small class="mb-4">Có thể để trống</small>
                                                    <input type="text" name="title1" class="form-control" value="<?=$slide['title1']?>"/>
                                            </div>
                                            <div class="mb-0"><label class="form-label">Nội dung tiêu đề 2</label>
                                            <br><small class="mb-4">Có thể để trống</small>
                                                    <input type="text" name="title2" class="form-control"  value="<?=$slide['title2']?>"/>

                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Liên kết</h2>
                                            </div>
                                            <div class="mb-4"><label class="form-label">Địa chỉ (link)</label>
                                            <br><small class="mb-4">Có thể để trống</small>
                                                <input type="text" name="link" class="form-control" value="<?=$slide['link']?>" />
                                            </div>
                                            <div class="mb-4"><label class="form-label">Tên button (nếu có Địa chỉ link)</label>
                                            <br><small class="mb-4">Có thể để trống nếu không có <strong>Địa chỉ Link</strong></small>
                                                <input type="text" name="name_link" class="form-control <?=$_SESSION['valid_name_link']?>" value="<?=$slide['name_link']?>" />
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
                                            <label class="form-label" for="status">Loại slide</label>
                                            <select id="status" name="status" class="sa-select2 form-select">
                                                <?php if($slide['status']==1)
                                                {
                                                    ?>
                                                <option selected value="1">Slide 1</option><option value="2">Slide 2</option><option value="3">Ẩn slide</option>
                                                    <?php
                                                }elseif($slide['status']==3)
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
                                            <label class="form-label mt-4" for="bg">Làm mờ background</label>
                                            <select id="bg" name="background" class="sa-select2 form-select">
                                                <?php if(!empty($slide['background']))
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
                                    <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Ảnh slide (1920 x 725)</h2>
                                            </div>
                                            <div class="border p-4 d-flex justify-content-center">
                                                <div class="max-w-20x"><img id="image" src="./../View/img/<?=$slide['image']?>"
                                                        class="w-100 h-auto" width="320" height="320" alt="" /></div>
                                            </div>
                                            <div class="mt-4 mb-n2">
                                                <a href="#" class="me-3 pe-2">
                                                    <input hidden name="hinh_cu" value="<?=$slide['image']?>" type="text">
                                                    <input id="imageFile" type="file" name="hinh_moi" onchange="chooseFile(this)" accept="image/jpeg, image/png, image/gif" >
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

