<?php
if(isset($_REQUEST['slug']))
{
    $slug = $_REQUEST['slug'];
    $news = SelectOneNews($slug);
    if(empty($news))
    {
        require_once('404.html');
        exit;
    }else
    {
        ?>
        <!-- html start -->
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="index.php?act=news-fashion">Tin tức thời trang</a>
                    <span class="breadcrumb-item active"><?=$news['title']?></span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div style="width: 100%" class="col-lg-9 bg-light mb-5 p-5">
                <h6 class="mt-5 text-muted"><?=substr($news['date_create'],0,16)?> - <i>Admin</i></h6>
               <h3 class="mt-5"><?=$news['title']?></h3>
               <p class="mt-4"><?=$news['decribe']?></p>
               <i class="fab fa-facebook text-dark"></i>
            </div>
            <div class="col-lg-3">
                <!-- Tìm kiếm bài viết -->
                <form class="mb-30" action="#">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">TÌM KIẾM CHỦ ĐỀ</span></h5>
                    <div class="input-group">
                        <input id="inputsearch" type="text" class="form-control border-0 p-4" placeholder="Nhập chủ đề của bạn">
                        <div class="input-group-append">
                            <button disabled class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
                <!-- Bài viết tương tự -->
                <h5 class="section-title position-relative text-uppercase mb-3 mt-5"><span class="bg-secondary pr-3">BÀI VIẾT LIÊN QUAN</span></h5>
                <div class="bg-light p-30 mb-5">
                <?php
                for($i=0;$i<5;$i++)
                {
                ?>
                    <div class="border-bottom pb-2 mt-4">
                        <div class="d-flex">
                            <img class="border" width="50px" height="50px" src="../View/img/product_default.png" alt="image">
                            <a style="text-decoration:none" href="index.php" class="ml-2 small" style="text-align: right">
                                Tiêu đề bài viết bài viết bài viết bài viết bài viết bài viết bài viết bài vi.....
                            <br><small class="text-muted">Thời gian: 00-00-0000</small>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
                </div>
            </div>
            <div class="col-lg-12 mb-5">
            <!-- Vendor Start -->
            <div class="container-fluid">
                    <div class="row ">
                        <div class="col">
                            <div class="owl-carousel vendor-carousel">
                                <a href="index.php" class="bg-light d-flex"  style="text-decoration:none;flex-direction:column;align-items:center">
                                    <img src="./../View/user/template/img/vendor-1.jpg" alt="">
                                    <h6 class="p-1 mt-2 text-muted">Nội dung liên quan</h6>
                                </a href="index.php">
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Vendor End -->
            </div>
        </div>
    </div>
    <!-- Cart End -->
        <!-- html end -->
        <?php
    }
}else
{
    require_once('404.html');
    exit;
}
?>