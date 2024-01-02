<?php
if(!defined('_CODE'))
{
        require_once('404.html'); exit;
}
?>
    <!-- template -->
<div id="top" class="sa-app__body">
<form action="index.php?act=admin-upload-product&upload=1" method="post" enctype="multipart/form-data">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="index.php?act=admin-dashboard">Quản lí</a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="index.php?act=admin-products">Quản lí sản phẩm</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Thêm sản phẩm</h1>
                                    
                                </div>
                                <div class="col-auto d-flex"><a href="index.php?act=admin-products" class="btn btn-secondary me-3">Hủy</a>
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
                                                <h2 class="mb-0 fs-exact-18">Thông tin sản phẩm</h2>
                                            </div>
                                            <div class="mb-4"><label class="form-label">Tên sản phẩm</label>
                                                    <input type="text" name="name" class="form-control <?=$valid_name?>" id="form-category/name" placeholder="Nhập tên sản phẩm" value="<?=$name?>" />
                                            </div>
                                            <div class="mb-4"><label class="form-label">Giá gốc</label>
                                                    <input type="number" name="price" min="1000" class="form-control <?=$valid_price?>" value="<?=$price?>" placeholder="giá gốc (vnđ)"  />
                                            </div>
                                            <div class="mb-4"><label class="form-label">Giá hiện tại (Sale)</label> <br>
                                            <small><span class="text-danger">Lưu ý: </span>Nếu sản phẩm này <strong>muốn sale</strong> (giảm giá) thì nhập vào, còn để trống thì mặc định là <strong>không SALE</strong></small>
                                                    <input type="number" name="sale" min="1000" class="form-control <?=$valid_sale?>" value="<?=$sale?>" placeholder="nhập giá bạn muốn sale (vnđ), có thể để trống nếu không sale"  />
                                            </div>
                                            <div class="mb-4"><label class="form-label">Ghi chú ngắn</label><textarea name="short_decribe" class=" form-control <?=$valid_short_decribe?>"
                                                    rows="2"><?=$short_decribe?></textarea>
                                            </div>
                                            <div class="mb-4"><label class="form-label">Ghi chú</label><textarea name="decribe" class=" form-control <?=$valid_decribe?>"
                                                    rows="5"><?=$decribe?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Kho hàng</h2>
                                            </div>
                                            <div class="mb-5"><label class="form-label">Số lượng</label>
                                            <input type="number" name="mount" class="form-control <?=$valid_mount?>" value="<?=$mount?>" min="1" max="1000" placeholder="min = 1, max = 1000"  />
                                            </div>
                                            <div class="mb-5"><label class="form-label">Size (kích thước)</label> <br>
                                            <small><span class="text-danger">Lưu ý: </span>Nếu số lượng size nhập vào nhiều <strong>hơn 1</strong>, thì hãy cách nhau các size bằng dấu cách (<strong>space</strong>). Ví dụ <i>1xl 2xl 3xl 42 43 44</i></small>
                                                <input type="text" name="size" class="form-control <?=$valid_size?>" value="<?=$size?>" placeholder="Có thể nhập được nhiều size khác nhau"/>
                                            </div>
                                            <div><label class="form-label">Màu</label> <br>
                                            <small><span class="text-danger">Lưu ý: </span>Nếu số lượng màu nhập vào nhiều <strong>hơn 1</strong>, thì hãy cách nhau các màu bằng dấu phẩy (<strong> , </strong>). Ví dụ <i>đỏ,cam,xanh dương,xanh lá</i></small>
                                            <input type="text" name="color" class="form-control <?=$valid_color?>" value="<?=$color?>" placeholder="Có thể nhập được nhiều màu khác nhau"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card w-100">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Loại hàng</h2>
                                            </div>
                                            <select name="id_loai" class="sa-select2 form-select">
        <?php
            $stt = listloai();
            for ($i = 0; $i < count($stt);$i++)
            {
                ?>
                <option value="<?=$stt[$i][1]?>"><?="ID: ".$stt[$i][1]." - ".$stt[$i][0]?></option>
                <?php
            };
        ?>
                                            </select>
                                            <div class="mt-4 mb-n2">
                                                <a href="index.php?act=404" class="me-3 pe-2">Thêm loại hàng mới
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Ảnh sản phẩm</h2>
                                            </div>
                                               <?php
                                               if($hinhsp !== "")
                                               { ?>
                                                <div class="form-control ">
                                                <div class="max-w-20x">
                                                    <img src="./../View/img/<?=$hinhsp?>" id="image" class="w-100 h-auto" width="320" height="320" alt="" /></div>
                                                </div>
                                               <?php
                                               }else{
                                                ?>
                                                <div class="form-control ">
                                                <div class="max-w-20x">
                                                    <img src="./../View/img/product_default.png" id="image" class="w-100 h-auto" width="320" height="320" alt="" /></div>
                                                </div>
                                                <?php
                                               }
                                               ?>
                                                <div class="mt-4 mb-n2">
                                                    <a href="#" class="me-3 pe-2">
                                                            <input type="file" id="imageFile" name="image" onchange="chooseFile(this)" class="form-control"
                                                            accept="image/jpeg, image/png, image/gif" >

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

