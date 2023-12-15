<?php
if(!defined('_CODE'))
{
        require_once('404.html'); exit;
}
?>
</html>
<form name="" action="index.php?act=admin-upload-voucher&upload=4" method="post" enctype="multipart/form-data">
           <!-- sa-app__body -->
            <div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <h1 class="h3 m-0">Thêm voucher</h1>
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
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Thông tin voucher</h2>
                                            </div>
                                            <div class="mb-4">
                                            <label class="form-label">Loại voucher</label>
                                            <select name="status" class="sa-select2 form-select">
                                            <?php
                                            if($status == 2)
                                            {
                                                ?>
                                                <option selected value="2">Loại 1: giảm giá theo vnđ</option>
                                                <option value="3">Loại 2: giảm giá theo %</option>
                                                <option value="4">Miễn phí giao hàng</option>
                                                <?php
                                            }elseif($status == 3)
                                            {
                                                ?>
                                                <option value="2">Loại 1: giảm giá theo vnđ</option>
                                                <option selected value="3">Loại 2: giảm giá theo %</option>
                                                <option value="4">Miễn phí giao hàng</option>
                                                <?php
                                            }elseif($status == 4)
                                            {
                                                ?>
                                                <option value="2">Loại 1: giảm giá theo vnđ</option>
                                                <option value="3">Loại 2: giảm giá theo %</option>
                                                <option selected value="4">Miễn phí giao hàng</option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Mã code</label>
                                                <input type="text" value="<?=$code?>" class="form-control" placeholder="mã code viết hoa, ví dụ: VOUCHER" name="code" />
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Điều kiện (nếu có)</label>
                                                <input type="number" value="<?=$condition?>" min="0" max="100000000" class="form-control" placeholder="Điều kiện để áp dụng" name="condition" />
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Thực thi</label>
                                                <input type="number" value="<?=$number?>"  min="0" max="100000000" class="form-control" placeholder="Nhập số tiền/% thực thi cho voucher, nếu Freeship thì mặc định để trống" name="number" />
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Số lượng</label>
                                                <input type="number" value="<?=$amount?>" min="1" max="1000" class="form-control" placeholder="Số lượng mã voucher" name="amount" />
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
                                                <h2 class="mb-0 fs-exact-18">Cập nhật ngày</h2>
                                            </div>
                                        </div>
                                        <div class="mt-n5">
                                            <div class="px-5 py-4 my-2">
                                                <label for="form-product/seo-title" class="form-label">Ngày bắt đầu <span class="text-danger">(năm/tháng/ngày giờ:phút:giây)</span><br><small>Ví dụ: 2023/12/15 23:59:59</small>
                                                <input type="text" value="<?=$datestart?>" name="datestart" class="form-control">
                                                <label for="form-product/seo-title" class="form-label mt-5">Ngày kết thúc <span class="text-danger">(năm/tháng/ngày giờ:phút:giây)</span><br><small>Ví dụ: 2023/12/15 23:59:59</small>
                                                <input type="text" value="<?=$dateend?>" name="dateend" class="form-control"> 
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