<?php
    $records=12; //số sản phẩm trên 1 trang
    $page=1; //số trang đang thực thi
    if(isset($_REQUEST['txtPage'])){
        $page = $_REQUEST['txtPage']; //thực thi trang thứ $page
    }	
//lây danh sach san pham
    $listitems = danhsachsp($select_product);
    $tongsp = count($listitems);
     $mode = $tongsp%$records; //mode = phần dư (bội của số sản phẩm trên 1 trang)
    if($mode>0){
        $pages=floor($tongsp/$records)+1; //hàm floor: chia lấy số nguyên
    }else{
        $pages=$tongsp/$records; //pages = tổng số trang của shop
    }
    if($page>$pages){ //nếu trang request lớn hơn giá trị tổng số trang của shop
        $page=1;
    }
    $limits=$records*$page;	
    $st = $limits - $records;
    $listitems = danhsachsp_limit($st,$records,$select_product); // danh sách sản phẩm cho trang thứ $page
    //bắt đầu bằng sản phẩm thứ $st, select $records sản phẩm
?>
<!-- form start-->
<form  name="adminForm" method="post" enctype="multipart/form-data"> 
        <input type="hidden" name="txtPage" value="<?=$page?>"/>
</form>
<!-- Breadcrumb Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Trang chủ</a>
                    <span class="breadcrumb-item active">Tin tức thời trang</span>
                </nav>
            </div>
        </div>
</div>
<!-- Breadcrumb End -->
<!-- form end -->

    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 380px;">
                            <img class="position-absolute w-100 h-100" src="img/carousel-1.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Men Fashion</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 380px;">
                            <img class="position-absolute w-100 h-100" src="img/carousel-2.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Women Fashion</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 175px;">
                    <img class="img-fluid" src="img/offer-1.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 175px;">
                    <img class="img-fluid" src="img/offer-2.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- paging start -->
    <div class="col-12">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mb-3">
            <?php          
            if($pages>1)
            {
                if($page>1)
                {
            ?>
            <!-- // Previous -->
                <li class="page-item">
                    <a class="page-link" href="javascript:fPageseparate('<?=$page-1?>')" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                 </li>
            <?php
                }else
                {
            ?>
                <li class="page-item disabled">
                    <a class="page-link" href="javascript:fPageseparate('<?=$page-1?>')" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            <?php
                }
                // vòng lặp số trang hiện có
                for($i=0;$i<$pages;$i++)
                {
                    if($i==$page-1)
                    {
                ?>
                <li class="page-item active">
                    <a class="page-link" href="javascript:fPageseparate('<?=$i+1?>')"><?=$i+1?></a>
                </li>
            <?php
                    }else
                    {
                ?>
                <li class="page-item">
                    <a class="page-link" href="javascript:fPageseparate('<?=$i+1?>')"><?=$i+1?></a>
                </li>
            <?php
                    }
                }
                if($page<$pages)
                {
            ?>
            <!-- // Next -->
                <li class="page-item">
                    <a class="page-link" href="javascript:fPageseparate('<?=$page+1?>')" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                 </li>
            <?php
                }else
                {
            ?>
                <li class="page-item disabled">
                    <a class="page-link" href="javascript:fPageseparate('<?=$page+1?>')" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            <?php
                }
            }				
            ?>
            </ul>
        </nav>
    </div>
<!-- paging end -->
