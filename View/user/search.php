<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST")
// {
//   $text_search = $_POST["text-search"];
//   $list_search = search($text_search);
// }
$cls = count($list_search);
if ($cls == 0)
{
    ?>
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h4 class="section-title px-5"><span class="px-2">Không tìm thấy sản phẩm "<?=$text_search?>"</span></h4> <br><br><br><br><br>
            <a href="index.php?act=shop">Tất cả sản phẩm</a>
        </div>
        <div class="row px-xl-5 pb-3">
    <?php
}
else
{
    ?>
        <div class="container-fluid ">
        <div class="text-center mb-4">
            <h4 class="section-title px-5"><span class="px-2">Tìm thấy <?=$cls?> sản phẩm liên quan</span></h4>
        </div>
        <div class="row px-xl-5 pb-3">
    <?php
    for($i = 0; $i<$cls; $i++)
    {
        $rc = $list_search[$i];
        $arr_size = explode(' ',$rc['size']);
        $arr_color = explode(',',$rc['color']);
        ?>
        <div class="col-lg-2 col-md-6 col-sm-12 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="../View/img/<?=$rc['image']?>" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href="index.php?act=giohang&id=<?=$rc['id_sp']?>&tensp=<?=$rc['Name']?>&dongia=<?=$rc['Sale']?>&hinh=<?=$rc['image']?>&size=<?=strtoupper($arr_size[0])?>&color=<?=$arr_color[0]?>">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a class="btn btn-outline-dark btn-square" href="index.php?act=yeuthich&id=<?=$rc['id_sp']?>&tensp=<?=$rc['Name']?>&dongia=<?=$rc['Sale']?>&giagoc=<?=$rc['Price']?>&hinh=<?=$rc['image']?>&size=<?=strtoupper($arr_size[0])?>&color=<?=$arr_color[0]?>&search">
                                        <i class="far fa-heart"></i>
                                    </a>
                                    <a class="btn btn-outline-dark btn-square" href="index.php?act=detail&edit=0&id=<?= $rc["id_sp"]?>">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a style="white-space: unset" class="h6 text-decoration-none text-truncate" href=""><?=$rc['Name']?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5><?=number_format($rc['Sale'],0,',','.')?></h5>
                                    <?php
                                    if($rc['Sale'] !== $rc['Price'])
                                    {
                                    ?>
                                    <h6 class="text-muted ml-2"><del><?=number_format($rc['Price'],0,',','.')?> đ</del></h6>
                                    <?php
                                    }
                                    ?>
                                </div>

                                 <!-- rating review start -->
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                                <!-- rating review end -->

                            </div>
                        </div>
                    </div>
        <?php
    }
}
?>