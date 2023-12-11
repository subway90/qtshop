    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4"><span class="text-primary">QT</span> FASHION</h5>
                <p class="mb-4">
                    <?=$info['web_introduce']?>
                </p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>
                <?=$info['web_address']?>
                </p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>
                <?=$info['web_email']?>
            </p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>
                0<?=number_format(965279041,0,' ',' ')?>
            </p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Liên kết nhanh</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                            <a class="text-secondary mb-2" href="index.php?act=shop"><i class="fa fa-angle-right mr-2"></i>Sản phẩm</a>
                            <a class="text-secondary mb-2" href="index.php?act=search-product"><i class="fa fa-angle-right mr-2"></i>Tìm kiếm</a>
                            <a class="text-secondary mb-2" href="index.php?act=giohang"><i class="fa fa-angle-right mr-2"></i>Giỏ hàng</a>
                            <a class="text-secondary mb-2" href="index.php?act=thanhtoan"><i class="fa fa-angle-right mr-2"></i>Thanh toán</a>
                            <a class="text-secondary" href="index.php?act=contact"><i class="fa fa-angle-right mr-2"></i>Liên hệ</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Tài khoản của tôi</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <?php
                            if(!empty($_SESSION['dangnhap']))
                            {
                                ?>
                                <a class="text-secondary mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Đăng nhập</a>
                                <?php
                            }else{
                                ?>
                                <a class="text-secondary mb-2" href="index.php?act=dangnhap"><i class="fa fa-angle-right mr-2"></i>Đăng nhập</a>
                                <?php
                            }
                            ?>
                            <a class="text-secondary mb-2" href="index.php?act=taouser"><i class="fa fa-angle-right mr-2"></i>Đăng ký</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Chỉnh sửa</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Đổi mật khẩu</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Quên mật khẩu</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Thông báo</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">CHÍNH SÁCH</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Chính sách mua hàng</a>
                            <a class="text-secondary mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Chính sách vận chuyển</a>
                            <a class="text-secondary mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Chính sách hoàn trả</a>
                        </div>
                        <h6 class="text-secondary text-uppercase mt-3 mb-3">Theo dõi</h6>
                        <div class="d-flex">

                            <a class="btn btn-primary btn-square mr-2" href="<?=$info['link_fanpage']?>"><i class="fab fa-facebook-f"></i></a>
                        
                            <a class="btn btn-primary btn-square mr-2" href="<?=$info['link_instagram']?>"><i class="fab fa-instagram"></i></a>
                            
                            <a class="btn btn-primary btn-square" href="<?=$info['link_twitter']?>"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">H-GROUP</a>. Copyright and power by 
                    <a class="text-primary" href="#">qt-fashion.com</a> 2023
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="./../View/user/template/lib/easing/easing.min.js"></script>
    <script src="./../View/user/template/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="./../View/user/template/mail/jqBootstrapValidation.min.js"></script>
    <script src="./../View/user/template/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="./../View/user/template/js/main.js"></script>

</body>

</html>