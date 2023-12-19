<?php
if(!defined('_CODE'))
{
        require_once('404.html'); exit;
}
?>
</html>
<form action="index.php?act=admin-upload-cate-news&upload=2" method="post" enctype="multipart/form-data">
           <!-- sa-app__body -->
            <div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <h1 class="h3 m-0">Thêm loại tin tức</h1>
                                </div>
                                <div class="col-auto d-flex">
                                    <a href="index.php?act=admin-products" class="btn btn-secondary me-3">Hủy</a>
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
                                            <option selected value="1">Hiển thị</option>
                                            <option value="2">Ẩn</option>
                                            </select>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Tên tin tức</label>
                                                <input type="text" class="form-control" value="" name="name" />
                                            </div>
                                            <div>
                                                <label class="form-label">Ghi chú</label>
                                                <textarea name="decribe" id="form-product/short-description" class="form-control"
                                                    rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Ảnh tin tức (đang cập nhật)</h2>
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
