<?php
// if(isset($_REQUEST['id']))
// {
//     $list_news = SelectAllNewsInCate($_REQUEST['id']);
//     if(empty($list_news))
//     {
//         require_once('404.html');
//         exit;
//     }
// }else
// {
//     require_once('404.html');
//     exit;
// }
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
                        <!-- tin tức nổi bật start -->
                        <a href="index.php?act=news&slug=khuyen-mai-gio-am-xmas" class="carousel-item position-relative active" style="height: 380px;">
                            <img class="position-absolute w-100 h-100" src="../View/img/product_default.png" style="object-fit: cover;"  alt="Tiêu đề bài viết">
                            <div style="text-align: left" class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 1000px; margin-top: 20%">
                                    <h5 class="text-white mb-3 animate__animated animate__fadeInDown">
                                        Title NewsTitle NewsTitle NewsTitle NewsTitle NewsTitle NewsTitle NewsTitle NewsTitle NewsTitle News
                                        </h5>
                                    <p style="font-size: 15px" class="animate__animated animate__bounceIn">
                                        Nội dung bài viết string 250Nội dung bài viết string 250Nội dung bài viết string 250Nội dung bài viết string 250Nội dung bài viết string 250Nội dung bài viết string 250
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="index.php" class="carousel-item position-relative" style="height: 380px;">
                            <img class="position-absolute w-100 h-100" src="../View/img/product_default.png" style="object-fit: cover;"  alt="Tiêu đề bài viết">
                            <div style="text-align: left" class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 1000px; margin-top: 20%">
                                    <h5 class="text-white mb-3 animate__animated animate__fadeInDown">
                                        Title NewsTitle NewsTitle NewsTitle NewsTitle NewsTitle NewsTitle NewsTitle NewsTitle NewsTitle News
                                        </h5>
                                    <p style="font-size: 15px" class="animate__animated animate__bounceIn">
                                        Nội dung bài viết string 250Nội dung bài viết string 250Nội dung bài viết string 250Nội dung bài viết string 250Nội dung bài viết string 250Nội dung bài viết string 250
                                    </p>
                                </div>
                            </div>
                        </a>
                        <!-- tin tức nổi bật end -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Tin tức phụ start -->
                <div class="product-offer mb-30" style="height: 175px;">
                    <img class="img-fluid" src="../View/img/product_default.png" alt="">
                    <a href="index.php" class="offer-text text-decoration-none">
                        <h6 class="mt-5 ml-3 pt-4 text-white text-uppercase">
                            Title2 Title2 Title2 Title2 Title2 Title2 Title2 Title2 Title2 Title2 Title2 
                        </h6>
                        <p style="font-size: 13px" class="text-white mb-3 ml-3">
                            Content2 Content2 Content2 Content2 Content2 Content2 Content2 Content2 Content2 Content2 Content2 Content2
                        </p style="font-size: 15px">
                    </a>
                </div>
                <div class="product-offer mb-30" style="height: 175px;">
                    <img class="img-fluid" src="../View/img/product_default.png" alt="">
                    <a href="index.php" class="offer-text text-decoration-none">
                        <h6 class="mt-5 ml-3 pt-4 text-white text-uppercase">
                            Title2 Title2 Title2 Title2 Title2 Title2 Title2 Title2 Title2 Title2 Title2 
                        </h6>
                        <p style="font-size: 13px" class="text-white mb-3 ml-3">
                            Content2 Content2 Content2 Content2 Content2 Content2 Content2 Content2 Content2 Content2 Content2 Content2
                        </p style="font-size: 15px">
                    </a>
                </div>
                <!-- Tin tức phụ end -->
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
