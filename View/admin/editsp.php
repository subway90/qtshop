<?php
if(!defined('_CODE'))
{
        require_once('404.html'); exit;
}
?>
<form name="" action="index.php?act=admin-products&edit=1" method="post" enctype="multipart/form-data">
           <!-- sa-app__body -->
            <div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <h1 class="h3 m-0">Chỉnh sửa sản phẩm</h1>
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
                                    <div class="card">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Thông tin sản phẩm</h2>
                                            </div>
                                            <div class="mb-4">
                                                <label for="form-product/name" class="form-label">Tên sản phẩm</label><input
                                                    type="text" class="form-control" id="form-product/name"
                                                    value="<?=$sp[0][1]?>" name="tensp" />
                                            </div>
                                            <div class="mb-4">
                                                <!-- <label for="form-product/description" class="form-label">Ghi chú</label> -->
                                                <!-- <textarea class="sa-quill-control form-control" rows="8">ERROR</textarea> -->
                                            </div>
                                            <div>
                                                <label for="form-product/short-description" class="form-label">Ghi chú</label>
                                                <textarea name="decribe" id="form-product/short-description" class="form-control"
                                                    rows="3"><?=$sp[0][5]?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Giá sản phẩm</h2>
                                                <small><span class="text-danger">Lưu ý: </span>Nếu nhập Giá hiện tại > (lớn hơn) Giá gốc, thì Giá gốc sẽ thay đổi thành Giá hiện tại bạn vừa nhập.</small>
                                            </div>
                                            <div class="row g-4">
                                                <div class="col">
                                                    <label for="form-product/price"
                                                        class="form-label">Giá hiện tại (sale)</label><input type="number"
                                                        class="form-control" id="form-product/price" value="<?=$sp[0]['Sale']?>" name="giasale" />
                                                </div>
                                                <div class="col">
                                                    <label for="form-product/old-price" class="form-label">Giá gốc</label>
                                                    <input disabled type="number" class="form-control" id="form-product/old-price" value="<?=$sp[0]['Price']?>"/>
                                                    <input hidden type="number" value="<?=$sp[0]['Price']?>" name="giagoc">
                                                </div>
                                                <div class="col">
                                                    <label for="form-product/old-price" class="form-label">% Sale</label>
                                                    <input disabled  type="number" class="form-control" id="form-product/old-price" value="<?=$sp[0]['%sale']?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Kho hàng</h2>
                                            </div>
                                            <div class="mb-4">
                                                <label for="form-product/sku" class="form-label">Size (kích thước)</label>
                                                <small><span class="text-danger">Lưu ý: </span>Nếu nhập hơn 1 size, thì hãy cách bằng (<strong>space</strong>). Ví dụ<i> 1xl 2xl 3xl 40 41 ...</i></small>
                                                <input hidden type="text" name="masp" value="<?=$sp[0][0]?>">
                                                <input name="size" type="text" class="form-control" id="form-product/sku" value="<?=$sp[0]['size']?>" />
                                            </div>
                                            <div class="mb-4">
                                                <label for="form-product/quantity" class="form-label">Màu</label>
                                                <small><span class="text-danger">Lưu ý: </span>Nếu nhập hơn 1 màu, thì hãy cách bằng dấu phẩy (<strong>,</strong>). Ví dụ<i> đỏ,xanh dương,xanh lá,vàng,...</i></small>
                                                <input name="color" type="text" class="form-control" id="form-product/quantity" value="<?=$sp[0]['color']?>" />
                                            </div>
                                            <div>
                                                <label for="form-product/quantity" class="form-label">Số lượng</label>
                                                <small><span class="text-danger">Lưu ý: </span>Số lượng phải lớn hơn <strong>1</strong> và nhỏ hơn <strong>1000</strong> <i>(tùy điều chỉnh của Admin)</i></small>
                                                <input name="slsp" min="0" max="1000" type="number" class="form-control" id="form-product/quantity" value="<?=$sp[0][6]?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Ảnh sản phẩm</h2>
                                            </div>
                                        </div>
                                        <div class="border p-4 d-flex justify-content-center">
                                                <div class="max-w-20x"><img id="image" src="./../View/img/<?=$sp[0][8]?>"
                                                        class="w-100 h-auto" width="320" height="320" alt="" /></div>
                                            </div>
                                            <div class="p-4">
                                                <input type="file" id="imageFile" name="hinh_moi" onchange="chooseFile(this)" class="form-control"
                                                            accept="image/jpeg, image/png, image/gif">
                                                <input hidden type="text" name="hinh_cu" value="<?=$sp[0][8]?>">
                                            </div>
                                        
                                    </div>
                                    
                                    <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Loại hàng</h2>
                                            </div>
                                            <select name="loaihang" class="sa-select2 form-select">
                                            <?php
                                            $list = listloai();
                                            for ($i = 0; $i < count($list); $i++)
                                            {
                                                if($list[$i][1] == $sp[0][9])
                                                {
                                            ?>
                                                <option selected value="<?=$list[$i][1]?>">ID :<?=$list[$i][1]?> - <?=$list[$i][0]?></option>
                                            <?php
                                                }else
                                            ?>
                                                <option value="<?=$list[$i][1]?>">ID :<?=$list[$i][1]?> - <?=$list[$i][0]?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                            <div class="mt-4 mb-n2">
                                                <a href="index.php?act=admin-upload-cate">Thêm loại hàng mới</a>
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