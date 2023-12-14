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
<!-- form end -->

<!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Trang chủ</a>
                    <span class="breadcrumb-item active">Tất cả sản phẩm</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">

            <div class="col-12 col-md-12">

                <div class="row pb-3">

                    <!-- sort start -->
                    <div class="col-12 pb-1">
                        <form name="filter" method="get">
                            <input hidden type="text" name="act" value="shop">
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <!-- <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div> -->  
                            <div class="">
                                <label for="price">Tìm theo giá </label>
                                    <select id="price" name="price" class="custom-select">
                                        <option selected value="1" >Tất cả giá</option>
                                        <option value="2" >Dưới 100K</option>
                                        <option value="3" >Từ 100K đến 200K</option>
                                        <option value="4" >Từ 200K đến 500K</option>
                                        <option value="5" >Từ 500K đến 1 Triệu</option>
                                        <option value="6" >Từ 1 Triệu đến 2Tr</option>
                                        <option value="7" >Trên 2Triệu</option>
                                    </select>
                            </div>
                            <div class="ml-4">
                                <label for="color">Tìm theo màu </label>
                                    <select id="color" name="color" class="custom-select">
                                        <option selected value="1" >Tất cả màu</option>
                                        <option value="2" >Đen (Cá tính)</option>
                                        <option value="3" >Trắng (Thanh lịch)</option>
                                        <option value="4" >Xám (Hài hòa)</option>
                                        <option value="5" >Be (Ấm áp)</option>
                                        <option value="6" >Đỏ (Rực rỡ)</option>
                                        <option value="7" >Xanh Dương (Tuổi trẻ)</option>
                                        <option value="8" >Xanh lá (Tươi mát)</option>
                                        <option value="9" >Hồng (Điệu đà)</option>
                                        <option value="10" >Vàng (Cuốn hút)</option>
                                        <option value="11" >Cam (Nổi bật)</option>
                                        <option value="12" >Tím (Lãng mạn)</option>
                                        <option value="13" >khác...</option>
                                    </select>
                            </div>
                            <div class="ml-4">
                                <label for="size">Tìm theo kích cỡ </label>
                                    <select id="size" name="size" class="custom-select">
                                        <option selected value="1" >Tất cả kích cỡ</option>
                                        <option value="2" >size S</option>
                                        <option value="3" >size M</option>
                                        <option value="4" >size L</option>
                                        <option value="5" >size XL</option>
                                        <option value="6" >size XXL</option>
                                        <option value="7" >size 3XL</option>
                                        <option value="8" >size 4XL</option>
                                        <option value="9" >size 5XL</option>
                                        <option value="10" >size 6XL</option>
                                        <option value="11" >size 7XL</option>

                                    </select>
                            </div>
                            <div class="ml-4">
                                <label for="cate">Tìm theo loại </label>
                                    <select id="cate" name="cate" class="custom-select">
                                        <option selected value="0" >Tất cả loại</option>
                                        <?php
                                        $loaihang_v2 = listloai();
                                        for($i=0;$i<count($loaihang_v2);$i++)
                                        {  $loai = $loaihang_v2[$i];
                                        ?>
                                        <option value="<?=$loai['stt']?>" ><?=$loai['tenloai']?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                            </div>
                            <div class="ml-4">
                                <label for="btn">Tìm kiếm</label>
                                <button id="btn" type="submit" class="btn btn-block btn-primary font-weight-bold ">Tìm kiếm sản phẩm</button>
                            </div>
                        </div>
                        </form>
                        <div class="mb-2 mt-2">
                        <?=$_SESSION['filter_list']?>
                        </div>
                    </div>
                    <!-- sort End -->

                    <!-- product star -->
                    <?php
                        for($i = 0; $i<count($listitems);$i++)
                        {
                        $rc = $listitems[$i];
                        $arr_size = explode(' ',$rc['size']);
                        $arr_color = explode(',',$rc['color']);
                    ?>
                    <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="../View/img/<?=$rc['image']?>" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href="index.php?act=giohang&id=<?=$rc['id_sp']?>&tensp=<?=$rc['Name']?>&dongia=<?=$rc['Price']?>&hinh=<?=$rc['image']?>&size=<?=strtoupper($arr_size[0])?>&color=<?=$arr_color[0]?>">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a class="btn btn-outline-dark btn-square" href="index.php?act=yeuthich&id=<?=$rc['id_sp']?>&tensp=<?=$rc['Name']?>&dongia=<?=$rc['Price']?>&giagoc=<?=$rc['Price']?>&hinh=<?=$rc['image']?>&size=<?=strtoupper($arr_size[0])?>&color=<?=$arr_color[0]?>">
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
                                    <h5><?=number_format($rc['Sale'],0,',','.')?> đ</h5>
                                    <?php
                                    if($rc['Price'] !== $rc['Sale'])
                                    {
                                        ?>
                                    <h6 class="text-muted ml-2"><del><?=number_format($rc['Price'],0,',','.')?> đ</del></h6>
                                        <?php
                                    }
                                    ?>
                                </div>

                                 <!-- rating review start -->
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                <?php
                                $SelectAllRating = SelectAllRating($rc['id_sp']);
                                if(!empty($SelectAllRating))
                                {
                                    $Avarage_Star = round($SelectAllRating['total_star']/$SelectAllRating['count_review'],1);
                                    $Number_Review = $SelectAllRating['count_review'];
                                }else
                                {
                                    $Avarage_Star = 0;
                                    $Number_Review = 0;
                                }
                                for($i=1;$i<6;$i++)
                                {
                                    if($Avarage_Star>=$i)
                                    {
                                    ?>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <?php
                                    }else
                                    {
                                    ?>
                                    <small class="far fa-star text-primary mr-1"></small>
                                    <?php
                                    }
                                }
                                ?>
                                    <small>(<?=$Number_Review?>)</small>
                                </div>
                                <!-- rating review end -->

                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <!-- product end -->

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
            if($i==$page-1){
            ?>
        <li class="page-item active"><a class="page-link" href="javascript:fPageseparate('<?=$i+1?>')"><?=$i+1?></a></li>
            <?php
        }else{
            ?>
        <li class="page-item"><a class="page-link" href="javascript:fPageseparate('<?=$i+1?>')"><?=$i+1?></a></li>
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
                    
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->