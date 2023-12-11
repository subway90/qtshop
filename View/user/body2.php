    <!-- Carousel Start -->
        <?php
    $slide_1 = slide_1(); //xl_search
    $slide_2 = slide_2(); //xl_search
    $slide_3 = slide_3(); //xl_search
    ?>
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <?php
                        for($i=1;$i<=count($slide_1);$i++)
                        {
                            ?>    
                        <li data-target="#header-carousel" data-slide-to="<?=$i?>"></li>
                        <?php
                        }
                        ?>
                    </ol>
                    <div class="carousel-inner">
                        <!-- slide 3 start -->

                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="./../View/img/<?=$slide_3['image']?>" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown"><?=$slide_3['title2']?></h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn"><?=$slide_3['title1']?></p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="<?=$slide_3['link']?>">Mua ngay</a>
                                </div>
                            </div>
                        </div>

                        <!-- slide 3 end -->

                        <!-- slide 1 start -->
                        <?php
                        for($i=0;$i<count($slide_1);$i++)
                        {
                            ?>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="./../View/img/<?=$slide_1[$i]['image']?>" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown"><?=$slide_1[$i]['title2']?></h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn"><?=$slide_1[$i]['title1']?></p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="<?=$slide_1[$i]['link']?>">Tham gia</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>

                        <!-- slide 1 end -->
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Sản phẩm chất lượng</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Miễn phí giao hàng</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Đổi, trả 30 ngày</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">6h00 - 20h00 mỗi ngày</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">MẶT HÀNG HIỆN CÓ</span></h2>
        <div class="row px-xl-5 pb-3">
        <?php
            $result = show_list_cate_v1();
            for($i=0; $i<count($result);$i++)
            {
                $loai_v1 = $result[$i]
                ?>
            <div class="col-lg-3 col-md-6 col-sm-9 pb-1">
                <a class="text-decoration-none" href="index.php?act=search-product&searchloai=<?=$loai_v1['name']?>">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="./../View/img/<?=$loai_v1['image']?>" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6><?=$loai_v1['name']?></h6>
                            <small class="text-body"><?=$loai_v1['soluong']?> sản phẩm</small>
                        </div>
                    </div>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Categories End -->

    <!--Sản phẩm HOT SALE Start -->
    <div class="container-fluid pt-5 pb-3">
    <?php
?>
        <?php 
            $result = list_sale_product();
        ?>

        <h2 class="section-title position-relative text-light mx-xl-5 mb-4"><span class="bg-danger pr-3 pl-3 pr-2"><span class="h5 text-light"> HOT SALE to</span> <?=$result[0]['%sale']?>% </span></h2>
        <div class="row px-xl-5">
            <?php
            for($i=0;$i<count($result);$i++)
            {
                $pro_hot = $result[$i];
                $arr_size = explode(' ',$pro_hot['size']);
                $arr_color = explode(',',$pro_hot['color']);
                ?>
        
            <div class="col-lg-2 col-md-2 col-sm-1 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="./../View/img/<?=$pro_hot['image']?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="index.php?act=giohang&id=<?=$pro_hot['id']?>&tensp=<?=$pro_hot['tensp']?>&dongia=<?=$pro_hot['sale']?>&hinh=<?=$pro_hot['image']?>&size=<?=strtoupper($arr_size[0])?>&color=<?=$arr_color[0]?>">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            
                            <?php
                                $count_pro_heart = count($_SESSION['yeuthich']);
                                $bool_heart = false;
                            for($j=0;$j<$count_pro_heart;$j++)
                            {
                                if($_SESSION['yeuthich'][$j][0] == $pro_hot['id'])
                                {
                                    $bool_heart = true;
                                    break;
                                }else
                                {
                                    continue;
                                }
                            }
                            if($bool_heart == false)
                            {
                                ?>
                                <a class="btn btn-outline-dark btn-square" href="index.php?act=yeuthich&id=<?=$pro_hot['id']?>&tensp=<?=$pro_hot['tensp']?>&dongia=<?=$pro_hot['sale']?>&giagoc=<?=$pro_hot['giasp']?>&hinh=<?=$pro_hot['image']?>&size=<?=strtoupper($arr_size[0])?>&color=<?=$arr_color[0]?>">
                                    <i class="far fa-heart"></i>
                                </a>

                                <?php
                            }else
                            {
                                ?>
                                <!-- <a class="btn btn-outline-dark btn-square" href="index.php?act=yeuthich&del=<?=$pro_hot['id']?>"> -->
                                <a onclick="alert('Sản phẩm này đã có trong danh sách yêu thích')" class="btn btn-outline-dark btn-square">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <?php
                            }
                            ?>
                            <a class="btn btn-outline-dark btn-square" href="index.php?act=detail&edit=0&id=<?=$pro_hot['id']?>">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                    </div>
                        <div class="text-center py-4">
                        <h6 class="section-title position-relative text-light mx-sm-3 mt-6"><span class="bg-danger pr-2 pl-2">SALE <?=$pro_hot['%sale']?>%</span></h6>
                        <a style="white-space: unset" class="h6 text-decoration-none text-truncate" href="index.php?act=detail&edit=0&id=<?=$pro_hot['id']?>"><?=$pro_hot['tensp']?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?=number_format($pro_hot['sale'],0,',','.')?> <span style="text-decoration: underline">đ</span></h5>
                                <h6 class="text-muted ml-2">
                                    <?php 
                                    if($pro_hot['giasp'] !== $pro_hot['sale'])
                                    {
                                        ?>
                                <del><?=number_format($pro_hot['giasp'],0,',','.')?></del>
<?php } ?>
                            </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                        </div>
                    </div>
                </div>
            </div>

                <?php
            }
        ?>
        </div>
    </div>
    <!--Sản phẩm HOT SALE End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM BÁN CHẠY</span></h2>
        <div class="row px-xl-5">
            <?php
            $result = list_hot_product();
            for($i=0;$i<count($result);$i++)
            {
                $pro_hot = $result[$i];
                $arr_size = explode(' ',$pro_hot['size']);
                $arr_color = explode(',',$pro_hot['color']);
                ?>
                <!-- sản phẩm bán chạy start-->
            <div class="col-lg-2 col-md-2 col-sm-1 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="./../View/img/<?=$pro_hot['image']?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="index.php?act=giohang&id=<?=$pro_hot['id']?>&tensp=<?=$pro_hot['tensp']?>&dongia=<?=$pro_hot['sale']?>&hinh=<?=$pro_hot['image']?>&size=<?=strtoupper($arr_size[0])?>&color=<?=$arr_color[0]?>">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            <a class="btn btn-outline-dark btn-square" href="index.php?act=yeuthich&id=<?=$pro_hot['id']?>&tensp=<?=$pro_hot['tensp']?>&dongia=<?=$pro_hot['sale']?>&giagoc=<?=$pro_hot['giasp']?>&hinh=<?=$pro_hot['image']?>&size=<?=strtoupper($arr_size[0])?>&color=<?=$arr_color[0]?>">
                                <i class="far fa-heart"></i>
                            </a>
                            <a class="btn btn-outline-dark btn-square" href="index.php?act=detail&edit=0&id=<?=$pro_hot['id']?>">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <h6 class="section-title position-relative text-light mx-sm-3 mt-6"><span class="bg-dark pr-2 pl-2"><?=$pro_hot['soluongmua']?> lượt mua</span></h6>
                        <a style="white-space: unset" class="h6 text-decoration-none text-truncate" href="index.php?act=detail&edit=0&id=<?=$pro_hot['id']?>"><?=$pro_hot['tensp']?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?=number_format($pro_hot['sale'],0,',','.')?> <span style="text-decoration: underline">đ</span></h5>
                            <?php
                            if($pro_hot['sale']>0)
                            {
                                ?>
                                <h6 class="text-muted ml-2">
                                    <?php 
                                    if($pro_hot['giasp'] !== $pro_hot['sale'])
                                    {
                                        ?>
                                <del><?=number_format($pro_hot['giasp'],0,',','.')?></del>
<?php } ?>
                            </h6>
                                <?php
                            }?>
                            
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            
                        </div>
                    </div>
                </div>
            </div>
                <!-- sản phẩm bán chạy end-->

                <?php
            }
        ?>
        </div>
    </div>
    <!-- Products End -->


    <!-- Slide 2 Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="./../View/img/<?=$slide_2[0]['image']?>" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase"><?=$slide_2[0]['title2']?></h6>
                        <h3 class="text-white mb-3"><?=$slide_2[0]['title1']?></h3>
                        <a href="<?=$slide_2[0]['link']?>" class="btn btn-primary">Mua ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="./../View/img/<?=$slide_2[1]['image']?>" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase"><?=$slide_2[1]['title2']?></h6>
                        <h3 class="text-white mb-3"><?=$slide_2[1]['title1']?></h3>
                        <a href="<?=$slide_2[1]['link']?>" class="btn btn-primary">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slide 2 End -->


    <!-- Sản phẩm mới nhất -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM MỚI NHẤT</span></h2>
        <div class="row px-xl-5">

        <!-- product start -->
        <?php
            $result = list_new_product();
            for($i=0;$i<count($result);$i++)
            {
                $pro_new = $result[$i];
                $arr_size = explode(' ',$pro_new['size']);
                $arr_color = explode(',',$pro_new['color']);
                ?>
             <div class="col-lg-2 col-md-2 col-sm-1 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="./../View/img/<?=$pro_new['image']?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="index.php?act=giohang&id=<?=$pro_new['id']?>&tensp=<?=$pro_new['tensp']?>&dongia=<?=$pro_new['sale']?>&hinh=<?=$pro_new['image']?>&size=<?=strtoupper($arr_size[0])?>&color=<?=$arr_color[0]?>">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            <a class="btn btn-outline-dark btn-square" href="index.php?act=yeuthich&id=<?=$pro_new['id']?>&tensp=<?=$pro_new['tensp']?>&dongia=<?=$pro_new['sale']?>&giagoc<?=$pro_new['giasp']?>&hinh=<?=$pro_new['image']?>&size=<?=strtoupper($arr_size[0])?>&color=<?=$arr_color[0]?>">
                                <i class="far fa-heart"></i>
                            </a>
                            <a class="btn btn-outline-dark btn-square" href="index.php?act=detail&edit=0&id=<?=$pro_new['id']?>">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <h6 class="section-title position-relative text-dark mx-sm-3 mt-6"><span class="bg-primary pr-2 pl-2"><?=substr($pro_new['date'],0,10)?></span></h6>
                        <a style="white-space: unset" class="h6 text-decoration-none text-truncate" href="index.php?act=detail&edit=0&id=<?=$pro_new['id']?>"><?=$pro_new['tensp']?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?=number_format($pro_new['sale'],0,',','.')?> <span style="text-decoration: underline">đ</span></h5>
                            <?php
                            if($pro_new['sale']>0)
                            {
                                ?>
                                <h6 class="text-muted ml-2">
                                    <?php 
                                    if($pro_new['giasp'] !== $pro_new['sale'])
                                    {
                                        ?>
                                <del><?=number_format($pro_new['giasp'],0,',','.')?></del>
<?php } ?>
                            </h6>
                                <?php
                            }?>
                            
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
        ?>
        <!-- product end     -->
        </div>
    </div>
    <!-- SẢn phẩm mới nhất End -->

    <!--Sản phẩm lượt xem cao nhất Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM ĐƯỢC CHÚ Ý</span></h2>
        <div class="row px-xl-5">
            <?php
            $result = list_view_product_user();
            for($i=0;$i<count($result);$i++)
            {
                $pro_view = $result[$i];
                $arr_size = explode(' ',$pro_view['size']);
                $arr_color = explode(',',$pro_view['color']);
                ?>
                <!-- sản phẩm bán chạy start-->
            <div class="col-lg-2 col-md-2 col-sm-1 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="./../View/img/<?=$pro_view['image']?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="index.php?act=giohang&id=<?=$pro_view['id']?>&tensp=<?=$pro_view['tensp']?>&dongia=<?=$pro_view['sale']?>&hinh=<?=$pro_view['image']?>&size=<?=strtoupper($arr_size[0])?>&color=<?=$arr_color[0]?>">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            <a class="btn btn-outline-dark btn-square" href="index.php?act=yeuthich&id=<?=$pro_view['id']?>&tensp=<?=$pro_view['tensp']?>&dongia=<?=$pro_view['sale']?>&giagoc=<?=$pro_view['giasp']?>&hinh=<?=$pro_view['image']?>&size=<?=strtoupper($arr_size[0])?>&color=<?=$arr_color[0]?>">
                                <i class="far fa-heart"></i>
                            </a>
                            <a class="btn btn-outline-dark btn-square" href="index.php?act=detail&edit=0&id=<?=$pro_view['id']?>">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a style="white-space: unset" class="h6 text-decoration-none text-truncate" href="index.php?act=detail&edit=0&id=<?=$pro_view['id']?>"><?=$pro_view['tensp']?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?=number_format($pro_view['sale'],0,',','.')?> <span style="text-decoration: underline">đ</span></h5>
                            <?php
                            if($pro_view['sale']>0)
                            {
                                ?>
                                <h6 class="text-muted ml-2">
                                    <?php 
                                    if($pro_view['giasp'] !== $pro_view['sale'])
                                    {
                                        ?>
                                <del><?=number_format($pro_view['giasp'],0,',','.')?></del>
<?php } ?>
                            </h6>
                                <?php
                            }?>
                            
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                        <h6 class="section-title position-relative text-light mx-sm-3 mt-6"><span class="bg-dark pr-2 pl-2"><?=$pro_view['view']?> lượt xem</span></h6>
                        <!-- <h6 class="section-title position-relative text-light mx-xl-5 mb-4"><span class="bg-dark pr-3 pl-3"><?=$pro_view['view']?> lượt xem</span></h6> -->
                        </div>
                    </div>
                </div>
            </div>
                <!-- sản phẩm bán chạy end-->

                <?php
            }
        ?>
        </div>
    </div>
    <!--Sản phẩm lượt xem cao nhất End -->


    <!-- Vendor Start -->
    <!-- <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="./../View/user/template/img/vendor-1.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="./../View/user/template/img/vendor-2.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="./../View/user/template/img/vendor-3.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="./../View/user/template/img/vendor-4.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="./../View/user/template/img/vendor-5.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="./../View/user/template/img/vendor-6.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="./../View/user/template/img/vendor-7.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="./../View/user/template/img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Vendor End -->
