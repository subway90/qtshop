<?php
$edit;
$id;
$sp;
//select 1 sản phẩm
    $id = $_REQUEST['id'];
    $sp = mot_sanpham("sanpham",$id);
    $view_new = $sp[0][4] + 1;
    $id_sp = $sp[0][0];
    capnhatviewsp($id_sp,$view_new);

//add comment
    if(!empty($_SESSION['dangnhap']))
    {
    $id_sp_cmt = $sp[0][0];
    $id_user_cmt = $_SESSION['dangnhap'][0][0];
    $cmt = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cmt = $_POST['cmt'];
        themcmt($id_user_cmt,$cmt,$id_sp_cmt);
    }
    }
$result = danhsachcmt($id);
$ListReview = list_review($id);
    $count_cmt = count($result);
    $count_review = count($ListReview);
//point rating
$average_rating = 0;
$total_rating = 0;
if($count_review == 0)
{
    $point_rating = 0;
}else
{
    for($i=0;$i<$count_review;$i++)
    {
        $rc = $ListReview[$i];
        $total_rating += $rc['rating'];
    }
    $average_rating = $total_rating/$count_review;
}


?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="index.php?act=shop">Sản phẩm</a>
                    <span class="breadcrumb-item active">Chi tiết sản phẩm</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="../View/img/<?=$sp[0][8]?>" alt="Image">
                        </div>
                        <?php

                        // gallery image product
                        for($i=0;$i<4;$i++)
                        {
                            ?>
                            <div class="carousel-item">
                                <img class="w-100 h-100" src="../View/img/<?=$sp[0][8]?>" alt="Image">
                            </div>
                            <?php
                        }
                        ?>
                        
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3><?=$sp[0][1]?></h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <?=$average_rating?>
                            <small class="fas fa-star"></small>
                        </div>
                        <small class="pt-1"><?=$count_review?> đánh giá</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4"><?=$sp[0][2]?></h3>
                    <p class="mb-4">
                        <?=$sp[0][14]?>
                    </p>
                    <form action="index.php?act=giohang" method="post">
                        <input hidden name="id" type="text" value="<?=$sp[0][0]?>">
                        <input hidden name="name" type="text" value="<?=$sp[0][1]?>">
                        <input hidden name="price" type="number" value="<?=$sp[0][2]?>">
                        <input hidden name="sl" type="number" value="1">
                        <input hidden name="image" type="text" value="<?=$sp[0][8]?>">

                    <!-- check size start -->
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">Kích cỡ:</strong>
                            <?php
                            $array_size_sp = explode(' ',$sp[0]['size']);
                            for($i=0;$i<count($array_size_sp);$i++)
                            {
                                ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input checked type="radio" class="custom-control-input" id="size-<?=$i+1?>" name="size" value="<?=strtoupper($array_size_sp[$i])?>">
                                    <label  class="custom-control-label" for="size-<?=$i+1?>"><?=strtoupper($array_size_sp[$i])?></label>
                                </div>
                                <?php
                            }
                            ?>
                    </div>
                    <!-- check size end -->

                    <!-- check color start -->
                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">Màu :</strong>
                        <?php
                        $array_color_sp = explode(',',$sp[0]['color']);
                        for($i=0;$i<count($array_color_sp);$i++)
                        {
                            ?>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input checked type="radio" class="custom-control-input" id="color-<?=$i+1?>" name="color" value="<?=$array_color_sp[$i]?>">
                                <label class="custom-control-label" for="color-<?=$i+1?>"><?=$array_color_sp[$i]?></label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <!-- check color end -->
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <!-- <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div> -->
                        <button type="submit" class="btn btn-primary px-3">
                            <i class="fa fa-shopping-cart mr-1"></i>
                            Thêm vào giỏ
                        </button>
                        <span class="p-2"></span>
                        <?php
                                $count_pro_heart = count($_SESSION['yeuthich']);
                                $bool_heart = false;
                            for($j=0;$j<$count_pro_heart;$j++)
                            {
                                if($_SESSION['yeuthich'][$j][0] == $sp[0][0])
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
                                <a href="index.php?act=yeuthich&id=<?=$sp[0][0]?>&tensp=<?=$sp[0][1]?>&dongia=<?=$sp[0][2]?>&hinh=<?=$sp[0][8]?>" class="btn btn-primary px-3">
                                    <i class="far fa-heart mr-1"></i>
                                    Yêu thích
                                </a>
                                <?php
                            }else
                            {
                                ?>
                                <a onclick="alert('Sản phẩm này đã có trong danh sách yêu thích')" class="btn btn-primary px-3">
                                    <i class="fa fa-heart mr-1"></i>
                                    Yêu thích
                                </a>
                                <?php
                            }
                            ?>
                        
                    </form>
                        <!-- <a href="index.php?act=giohang&id=<?=$sp[0][0]?>&tensp=<?=$sp[0][1]?>&dongia=<?=$sp[0][2]?>&hinh=<?=$sp[0][8]?>">
                            <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>Thêm vào giỏ</button>
                        </a> -->
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Chia sẻ</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Chi tiết sản phẩm</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Đánh giá (<?=$count_review?>)</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Bình luận (<?=$count_cmt?>)</a>
                    </div>
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <div class="row">
                                <table>
                                    <thead>
                                    <h4 class="mb-3">Chi tiết sản phẩm</h4>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?=$sp[0][5]?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>

                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4"><?=$count_review?> đánh giá của sản phẩm "<?=$sp[0][1]?>"</h4>
                                    <?php
                                    $count_review = count($ListReview);
                                    if(count($ListReview) <= 0){
                                        echo("<div class='text-primary'>Chưa có đánh giá cho sản phẩm này.</div>");
                                    }else
                                    {
                                        for($i = 0; $i < count($ListReview); $i++)
                                        {
                                            $OneReview = $ListReview[$i];
                                        ?>
                                    <div class="media mb-4">
                                        <img src="../View/img/<?=$OneReview['image']?>" alt="image user" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6><?=$OneReview['name']?><small> - <i><?=$OneReview['time']?></i></small></h6>
                                            <div class="text-primary mb-2">
                                                Điểm đánh giá : <?=$OneReview['rating']?> <i class="fas fa-star"></i>
                                            </div>
                                            <p><?=$OneReview['noidung']?></p>
                                            <div>
                                                <?php
                                                if($OneReview['image_review'] != 'trống')
                                                {
                                                ?>
                                                <img width="190px" src="../View/img/<?=$OneReview['image_review']?>" alt="<?=$OneReview['image_review']?>">
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4"><?=$count_cmt?> bình luận của sản phẩm " <?=$sp[0][1]?> "</h4>
                                    <?php
                                    $result = danhsachcmt($id);
                                    $id = $sp[0][0];
                                    if(count($result) <= 0){
                                        echo("<div class='text-primary'>Chưa có bình luận. Hãy trở thành người bình luận đầu tiên</div>");
                                    }else
                                    {
                                        for($i = 0; $i < count($result); $i++)
                                        {
                                            $rc = $result[$i];
                                    ?>
                                    <div class="media mb-4">
                                        <img src="../View/img/<?=$rc["image"]?>" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6><?=$rc["hoten"]?><small> - <i><?=$rc["time"]?></i></small></h6>
                                            
                                            <p><?=$rc["noidung"]?></p>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <?php
                                if(!empty($_SESSION['dangnhap']))
                                {
                                    ?>
                                    <div class="col-md-6">
                                    <h4 class="mb-4">Để lại bình luận của bạn</h4>
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="message">Nội dung bình luận *</label>
                                            <textarea name="cmt" id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Họ và tên *</label>
                                            <input disabled value="<?=$user[0][3]?>" type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Đăng bình luận" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                                    <?php
                                }else
                                {
                                    ?>
                                    <div class="col-md-6">
                                    <h4 class="mb-4">Để lại bình luận của bạn</h4>
                                    <small>Đăng nhập để bình luận. Chưa có tài khoản ? <a href="index.php?act=toausser">Đăng ký !</a></small>
                                    <form>
                                        <div class="form-group">
                                            <label for="message">Nội dung bình luận *</label>
                                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Họ và tên *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input disabled type="submit" value="Đăng bình luận" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <!-- <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/product-2.jpg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/product-3.jpg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/product-4.jpg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/product-5.jpg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Products End -->