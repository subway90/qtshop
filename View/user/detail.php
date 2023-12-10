<?php
$edit;
$id;
$sp;
isset($_REQUEST['edit']);
$id = $_REQUEST['id'];
    $sp = mot_sanpham("sanpham",$id);
    $view_new = $sp[0][4] + 1;
    $id_sp = $sp[0][0];
capnhatviewsp($id_sp,$view_new);
$result = danhsachcmt($id);
    $id = $sp[0][0];
    $count_cmt = count($result);
$total_point= 0;
    if($count_cmt > 0)
    {
        for($cmt = 0; $cmt < $count_cmt; $cmt++)
        {
            $total_point =$total_point + $result[$cmt]["rating"];
        }
    }
    else
    {
        $total_point = 0;
    }
//add comment
if(!empty($_SESSION['dangnhap']))
{
$id_sp_cmt = $sp[0][0];
$id_user_cmt = $_SESSION['dangnhap'][0][0];
$rating_cmt = 0;  
$cmt = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating_cmt = $_POST['rating'];
    $cmt = $_POST['cmt'];
    // var_dump("id_sp_cmt = ".$id_sp_cmt."id_user_cmt = ".$id_user_cmt);
    themcmt($id_user_cmt,$cmt,$id_sp_cmt);
}
}

?>

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">CHI TIẾT SẢN PHẨM</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php?act=user">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Chi tiết</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="./../view/img/<?=$sp[0][8]?>" alt="Image">
                        </div>
                        <!-- <div class="carousel-item">
                            <img class="w-100 h-100" src="./../view/img/<?=$sp[0][8]?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="./../view/img/<?=$sp[0][8]?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="./../view/img<?=$sp[0][8]?>" alt="Image">
                        </div> -->
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <!-- <i class="fa fa-2x fa-angle-left text-dark"></i> -->
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <!-- <i class="fa fa-2x fa-angle-right text-dark"></i> -->
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold"><?=$sp[0][1]?><br></h3>
                <div class="d-flex mb-3">
                    <?php
                    if($count_cmt == 0)
                    {
                        ?>
                        <div class="text-primary mr-2">
                        0 <small class="fas fa-star"></small>
                    </div>
                    <?php
                    }
                    else
                    {
                        ?>
                        <div class="text-primary mr-2">
                        <?=$total_point/$count_cmt?> <small class="fas fa-star"></small>
                    </div>
                        <?php
                    }
                    ?>
                    <small class="pt-1"><?=$count_cmt?> lượt đánh giá / </small>
                    <small class="pt-1"><?=$sp[0][4]?> lượt xem sản phẩm.</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4"><?=number_format($sp[0][2],0,',','.')?> vnđ</h3>
                <p class="mb-4"><?=$sp[0][5]?></p>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-1" name="size">
                            <label class="custom-control-label" for="size-1">XS</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-2" name="size">
                            <label class="custom-control-label" for="size-2">S</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-3" name="size">
                            <label class="custom-control-label" for="size-3">M</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-4" name="size">
                            <label class="custom-control-label" for="size-4">L</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-5" name="size">
                            <label class="custom-control-label" for="size-5">XL</label>
                        </div>
                    </form>
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-1" name="color">
                            <label class="custom-control-label" for="color-1">Black</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-2" name="color">
                            <label class="custom-control-label" for="color-2">White</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-3" name="color">
                            <label class="custom-control-label" for="color-3">Red</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-4" name="color">
                            <label class="custom-control-label" for="color-4">Blue</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-5" name="color">
                            <label class="custom-control-label" for="color-5">Green</label>
                        </div>
                    </form>
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <a href="index.php?act=giohang&id=<?=$sp[0][0]?>&tensp=<?=$sp[0][1]?>&dongia=<?=$sp[0][2]?>&hinh=<?=$sp[0][8]?>">
                        <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm vào giỏ hàng</button>
                    </a>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
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
        <div class="row px-xl-5">
            
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <!-- <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a> -->
                    <!-- <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a> -->
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                </div>
                    <div class="tab-pane fade  show active" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4"><?=$count_cmt?> đánh giá của sản phẩm " <?=$sp[0][1]?> "</h4>
                                <!-- start cmt -->
                    <?php
            $result = danhsachcmt($id);
            $id = $sp[0][0];
            $count_cmt = count($result);
            if(count($result) <= 0){
                echo("BÌNH LUẬN TRỐNG");
            }else{
                for ($i = 0; $i < count($result); $i++) {
                    $rc = $result[$i];
                    ?>
                                <div class="media mb-4">
                                    <img src="./../View/img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6><?=$rc["hoten"]?><small> - <i><?= $rc["time"] ?></i></small></h6>
                                        <div class="text-primary mb-2">
                                        <?= $rc["rating"] ?>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <p><?= $rc["noidung"] ?></p>
                                    </div>
                                </div>
                    <?php
                }
            }
                    ?>
                    
                                <!-- end cmt -->
                            </div>
                            <div class="col-md-6">
                            <h4 class="mb-4">ĐÁNH GIÁ SẢN PHẨM</h4>
                                <small>Thông tin của người bình luận sẽ được lưu theo tài khoản của khách hàng</small>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">Số sao đánh giá cho sản phẩm <br>
                                    <select class="select-custom" name="rating">
                                    <option value="1">Rất tệ (1 sao)</option>
                                    <option value="2">Tệ (2 sao)</option>
                                    <option value="3">Bình thường (3 sao)</option>
                                    <option value="4">Tốt (4 sao)</option>
                                    <option value="5">Rất tốt (5 sao)</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Nội dung đánh giá </label>
                                        <textarea name="cmt" cols="30" rows="5" class="form-control" required></textarea>
                                    </div>
                                    
                                    <div class="form-group mb-0">
                                        <?php
                                        if(!empty($_SESSION['dangnhap']))
                                        {
                                        ?>
                                        <input type="submit" value="Đăng đánh giá"  class="btn btn-primary px-3">
                                        <?php
                                        }else{
                                            ?>
                                        <input disabled value="Đăng đánh giá"  class="btn btn-primary px-3">
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </form>
                                <!-- <div class="d-flex my-3">
                                    
                                    <div class="text-primary">
                                    
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>

                                    </div>
                                </div> -->
                                <!-- <form>
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/product-2.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/product-3.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/product-4.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/product-5.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    ?>
    <!-- Products End -->
