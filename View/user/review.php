<?php
$id_review = $_REQUEST['id_review'];
$info_review = all_in_feedback($id_review);
if($info_review['status'] == 1)
{
    $status_button = "";
}else
{
    $status_button = "style='display:none'";
}
?>
<body>
<div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                
                                <div class="col">
                                    <h1 class="h3 m-0">Đánh giá sản phẩm</h1>
                                </div>
<form action="index.php?act=review&id_review=<?=$id_review?>&sendfeedback" method="post" enctype="multipart/form-data">
                                <input name="id_review" hidden type="number" value="<?=$id_review?>">
                                <div class="col-auto d-flex">
                                    <a href="index.php?act=notification" class="btn btn-secondary me-3">Quay về</a>
                                    <button <?=$status_button?> type="submit" class="btn btn-primary">Gửi</button>
                                </div>
                            </div>
                        </div>
                        <div>
                            <?=$_SESSION['alert']?>
                        </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Đánh giá sản phẩm</h2>
                                                <small>Đánh giá của bạn sẽ giúp chúng tôi cải thiện chất lượng sản phẩm hơn !</small>
                                            </div>
                                            <div class="mb-4">
                                                <label for="form-product/name" class="form-label">Thông tin</label>
                                                <input disabled type="text" class="form-control" id="form-product/name" value="Thời gian: <?=$info_review['date']?> | Mã: <?=$info_review['id_ct']?>"/>
                                            </div>
                                            <div class="row g-4">
                                                <div style="text-align: center" class="col-sm-6">
                                                    <label for="form-product/old-price" class="form-label">Ảnh sản phẩm <br>
                                                        <img id="form-product/old-price" class="card-body form-label" src="../View/img/<?=$info_review['anhsp']?>" width="50%" alt="">
                                                </div>
                                                <div style="text-align: center" class="col-sm-6">
                                                    <label for="form-product/old-price" class="form-label">Thông tin <br>
                                                    <table class="card-body sa-table d-flex align-items-center justify-content-between">
                                                    <tbody>
                                                        <tr>
                                                            <td>Tên sản phẩm : </td>
                                                            <td class="text-muted text-end"><?=$info_review['tensp']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Giá sản phẩm : </td>
                                                            <td class="text-muted text-end"><?=$info_review['giasp']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Số lượng: </td>
                                                            <td class="text-muted text-end"><?=$info_review['soluong']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kích thước : </td>
                                                            <td class="text-muted text-end"><?=$info_review['size']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Màu : </td>
                                                            <td class="text-muted text-end"><?=$info_review['color']?></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                                <div class="row g-4">
                                                    <div class="col-sm-4">
                                                        <div class="mb-4">
                                                            <label for="rating" class="form-label">Điểm sao <span class="text-danger">(*)</span></label>
                                                                <select name="rating" id="rating" class="sa-select2 form-select <?=$valid_rating?>">
                                                                <?php
                                                                $option_rating = array('1 sao (RẤT TỆ)','2 sao (TỆ)','3 sao (BÌNH THƯỜNG)','4 sao (TỐT)','5 sao (RẤT TỐT)');
                                                                for($i=0;$i<count($option_rating);$i++)
                                                                {
                                                                    if($i==($rating-1))
                                                                    {
                                                                ?>
                                                                        <option selected value="<?=$i+1?>"><?=$option_rating[$i]?></option>
                                                                <?php
                                                                    }else
                                                                    {
                                                                ?>
                                                                    <option value="<?=$i+1?>"><?=$option_rating[$i]?></option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                                </select>
                                                        </div>
                                                        <div class="mb-4">
                                                                <label for="formFile-3-normal" class="form-label">Upload ảnh đánh giá</label>
                                                                <input name="image" value="image" type="file" class="form-control <?=$valid_image?>" id="formFile-3-normal"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="mb-4">
                                                            <label for="form-product/description" class="form-label">Nội dung đánh giá  <span class="text-danger">(*)</span></label>
                                                            <textarea  name="noidung" id="form-product/description" class="sa-quill-control form-control <?=$valid_noidung?>" rows="5"><?=$noidung?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                        </div>
</form> 
                    </div>
                </div>
            </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/feather-icons/feather.min.js"></script>
    <script src="vendor/simplebar/simplebar.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/highlight.js/highlight.pack.js"></script>
    <script src="vendor/quill/quill.min.js"></script>
    <script src="vendor/air-datepicker/js/datepicker.min.js"></script>
    <script src="vendor/air-datepicker/js/i18n/datepicker.en.js"></script>
    <script src="vendor/select2/js/select2.min.js"></script>
    <script src="vendor/fontawesome/js/all.min.js" data-auto-replace-svg="" async=""></script>
    <script src="vendor/chart.js/chart.min.js"></script>
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/js/dataTables.bootstrap5.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/fullcalendar/main.min.js"></script>
    <script src="js/stroyka.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/calendar.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/demo-chart-js.js"></script>
</body>