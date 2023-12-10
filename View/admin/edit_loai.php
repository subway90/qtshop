<?php
if(!defined('_CODE'))
{
        require_once('404.html'); exit;
}
?>
<form name="" action="index.php?act=admin-category&edit=2" method="post" enctype="multipart/form-data">
           <!-- sa-app__body -->
            <div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <h1 class="h3 m-0">Chỉnh sửa loại hàng</h1>
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
                                                <h2 class="mb-0 fs-exact-18">Thông tin loại hàng</h2>
                                            </div>
                                            <div class="mb-4">
                                            <label class="form-label">Loại V1</label>
                                            <select name="v1" class="sa-select2 form-select">
                                                <?php
                                                $select_v1 = listloai_v1_all();
                                                for($i=0;$i<count($select_v1);$i++)
                                                {
                                                    $arr_select_v1 = $select_v1[$i];
                                                    if($arr_select_v1['stt'] !== $s_cate['id_cate_v1'])
                                                    {
                                                ?>
                                            <option value="<?=$arr_select_v1['stt']?>">ID :<?=$arr_select_v1['stt']?> - <?=$arr_select_v1['name']?></option>
                                            <?php
                                                    }else
                                                    {
                                                        ?>
                                            <option selected value="<?=$arr_select_v1['stt']?>">ID :<?=$arr_select_v1['stt']?> - <?=$arr_select_v1['name']?></option>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                            </select>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Tên loại</label>
                                                <input type="text" class="form-control" value="<?=$s_cate[1]?>" name="name_cate" />
                                                <input type="number" hidden value="<?=$s_cate[0]?>" name="id_cate" />
                                            </div>
                                            <div>
                                                <label class="form-label">Ghi chú</label>
                                                <textarea name="decribe_cate" id="form-product/short-description" class="form-control"
                                                    rows="2"><?=$s_cate[2]?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Ảnh loại hàng</h2>
                                            </div>
                                        </div>
                                        <div class="mt-n5">
                                            <div class="sa-divider"></div>
                                            <div class="table-responsive" >
                                                <table class="sa-table">
                                                    <tbody>
                                                        <div style="display:flex; justify-content: center; height: 100%">
                                                        <img id="image" style="text-align: center" height="10%" width="50%" src="../view/img/<?=$s_cate[3]?>" >
                                                        </div>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="sa-divider"></div>
                                            <div class="px-5 py-4 my-2">
                                                <input class="form-control" type="file" id="imageFile" onchange="chooseFile(this)" name="hinh_moi" value="">
                                                <input hidden type="text" name="hinh_cu" value="<?=$s_cate[3]?>">
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
