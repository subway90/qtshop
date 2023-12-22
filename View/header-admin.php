<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$datenow = date('Y-m-d');
$timenow = date('Y-m-d H:i:s');
$number_second_now = strtotime($timenow);
$auth_image = array('image/jpeg','image/jpg', 'image/png');
$bool_name = 2;
$name = "";
$price = "";
$mount = "";
$sale = 0;
$decribe = "";
$short_decribe = "";
$hinhsp = "";
$valid_image = 2;
$size = "";
$color = "";
$code = "";
$title = "";
$slug = "";
$tipforslug = "";
$amount = "";
$condition = "";
$number = "";
$status = 2; //mặc định hiển thị cho tất cả upload | Trạng thái bình thường
$id_cate = 1;
$date_setup = "";
$datestart = "";
$dateend = "";
$_SESSION['valid_name_link'] = '';
$arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
</svg>';
$h_alert = '<div class="alert alert-sa-danger-card alert-sa-has-icon alert-dismissible fade show" role="alert">
<div class="alert-sa-icon">
    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
        <circle cx="12" cy="12" r="10"></circle> <line x1="12" y1="16" x2="12" y2="12"></line> <line x1="12" y1="8" x2="12.01" y2="8"></line>
    </svg>
</div>
<div class="alert-sa-content">';
$f_alert = '</div>
<button type="button" class="sa-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        include "./../Model/xl_sanpham.php";
        include "./../Model/xl_search.php";
        include "./../Model/xl_news.php";
        $info = select_infomation_web();
        $load_user = load_user($_SESSION['dangnhap'][0][1]);
        if(isset($_REQUEST['feedback'])) 
        {
            $user = $_REQUEST['user'];
            $id_dh = $_REQUEST['dh'];
            $all_detail_checkout = detail_of_order($id_dh);
            $count_feedback = count($all_detail_checkout);
            for($i=0;$i<$count_feedback;$i++)
            {
                $id_ct = $all_detail_checkout[$i]['id_ct'];
                $id_sp = $all_detail_checkout[$i]['id_sp'];
                upload_new_feedback($user,$id_sp,$id_ct,$id_dh);
            }
        }
        if (isset($_REQUEST['update'])) 
        {
            $update = $_REQUEST['update'];
            $stt = $_REQUEST['stt'];
            if(isset($_REQUEST['dh']))
            {
                $dh = $_REQUEST['dh'];
                if($update==0)//thay đổi trạng thái thanh toán
                {
                    update_order_checkout($stt,$dh);
                }
                if($update==1)//thay đổi trạng thái đơn hàng
                {
                    update_order_delivery($stt,$dh);
                }
                if($update==2)//hủy đơn/ khôi phục đơn
                {
                    update_order_status($stt,$dh);
                }
            }
            if(isset($_REQUEST['slide']))
            {
                if($stt == 1)
                {
                    $stt = 2;
                }elseif($stt == 2 || $stt == 3)
                {
                    $stt = 1;
                }else
                {
                    $stt = 3;
                }
                $slide = $_REQUEST['slide'];
                update_slide_status($stt,$slide);
            }

            
        }
        if (isset($_REQUEST['del'])) 
        {
            $id = $_REQUEST['id'];
            if ($_REQUEST['del'] == 1) {
                if($_REQUEST['stt'] == 1)
                {
                    on_product($id);
                }else{
                    off_product($id);
                }
            }
            if($_REQUEST['del'] == 2) {
                if($_REQUEST['stt'] == 1)
                {
                    on_cate($id);
                }else{
                    off_cate($id);
                }
            }
            if($_REQUEST['del'] == 3) {
                if($_REQUEST['stt'] == 1)
                {
                    on_slide($id);
                }if($_REQUEST['stt'] == 3)
                {
                    in_slide();
                }
                else{
                    off_slide($id);
                }
            }
            if($_REQUEST['del'] == 4) {
                if($_REQUEST['stt'] == 1)
                {
                    on_cate_v1($id);
                }else{
                    off_cate_v1($id);
                }
            }
            if($_REQUEST['del'] == 5) {
                if($_REQUEST['stt'] == 3)
                {
                    on_review($id);
                }elseif($_REQUEST['stt'] == 2){
                    off_review($id);
                }elseif($_REQUEST['stt'] == 1){
                    restart_review($id);
                }
            }
            
        }
        if(isset($_REQUEST['edit']))
        {
            $edit = $_REQUEST['edit'];
            if($edit == 0){
                $id = $_REQUEST['id'];
                $sp = mot_sanpham("sanpham",$id);
            }
            if($edit == 1)
            {
                $masp = $_POST['masp'];
                $tensp = $_POST['tensp'];
                $giasale = $_POST['giasale'];
                $giagoc = $_POST['giagoc'];
                $slsp = $_POST['slsp'];
                $short_decribe = $_POST['short_decribe'];
                $decribe = $_POST['decribe'];
                $loaihang = $_POST['loaihang'];
                $size = $_POST['size'];
                $color = $_POST['color'];
                $hinhsp = $_POST['hinh_cu'];
                if(isset($_FILES['hinh_moi'])){  
                    if( $_FILES['hinh_moi']['name'] != ""){
                        $hinhsp = basename($_FILES['hinh_moi']['name']) ;
                        $path = __DIR__ . './../View/img/';
                        $target_file = $path . $hinhsp;
                        move_uploaded_file($_FILES['hinh_moi']['tmp_name'], $target_file);
                        // unlink("./../View/img/".$_POST['hinh_cu'] );
                    }
                }
                if($giasale>$giagoc)
                {
                    $giagoc = $giasale;
                    $sale = 0;
                }else
                {
                    $sale = floor((1-($giasale/$giagoc))*100);
                }
                capnhatsp("sanpham", $masp, $tensp, $giasale, $giagoc, $decribe,$short_decribe, $slsp, $hinhsp,$loaihang, $sale, $size, $color);

            }
            if($edit == 2)
            {
                $v1 = $_POST['v1'];
                $name_cate = $_POST['name_cate'];
                $decribe_cate = $_POST['decribe_cate'];
                $id_cate = $_POST['id_cate'];
                $image_cate = $_POST['hinh_cu'];
                if(isset($_FILES['hinh_moi'])){  
                    if( $_FILES['hinh_moi']['name'] != ""){
                        $image_cate = basename($_FILES['hinh_moi']['name']) ;
                        $path = __DIR__ . './../View/img/';
                        $target_file = $path . $image_cate;
                        move_uploaded_file($_FILES['hinh_moi']['tmp_name'], $target_file);
                        // unlink("./../View/img/".$_POST['hinh_cu'] );
                    }
                }
                upload_cate($name_cate,$decribe_cate,$id_cate,$image_cate,$v1);
                // header('Location: index.php?act=admin-category');

            }
            if($edit == 3){
                $id_ct = $_REQUEST['id_ct'];
                $order = donhang_chitiet($id_ct);
            }
            if($edit == 4){
                $id = $_REQUEST['id'];
                $s_cate = select_cate($id);
            }
            if($edit == 5){
                $id = $_REQUEST['id'];
                $s_cate_v1 = select_one_cate_v1($id);
            }
            if($edit == 6)
            {
                $level = $_POST['level'];
                $name_cate = $_POST['name_cate_v1'];
                $decribe_cate = $_POST['decribe_cate_v1'];
                $id_cate = $_POST['id_cate_v1'];
                $image_cate = $_POST['hinh_cu'];
                if(isset($_FILES['hinh_moi'])){  
                    if( $_FILES['hinh_moi']['name'] != ""){
                        $image_cate = basename($_FILES['hinh_moi']['name']) ;
                        $path = __DIR__ . './../View/img/';
                        $target_file = $path . $image_cate;
                        move_uploaded_file($_FILES['hinh_moi']['tmp_name'], $target_file);
                        // unlink("./../View/img/".$_POST['hinh_cu'] );
                    }
                }
                upload_cate_v1($name_cate,$decribe_cate,$id_cate,$image_cate,$level);
                // header('Location: index.php?act=admin-category');

            }
            if($edit == 7) 
            {
                $id = $_REQUEST['id'];
                $verify_edit_slide = 0;
                $title1 = $_POST['title1'];
                $title2 = $_POST['title2'];
                $link = $_POST['link'];
                $name_link = $_POST['name_link'];
                if(!empty($link) && empty($name_link))
                {
                    $verify_edit_slide = 1;
                    $_SESSION['alert'] = "<div class='alert alert-sa-danger-card'>Vui lòng nhập tên button (Vì có địa chỉ link)</div>";
                    $_SESSION['valid_name_link'] = 'is-invalid';
                }
                $status = $_POST['status'];
                $background = $_POST['background'];
                $image = $_POST['hinh_cu'];
                if(isset($_FILES['hinh_moi']))
                {  
                    if($_FILES['hinh_moi']['name'] != "")
                    {
                        if(in_array($_FILES['hinh_moi']['type'],$auth_image) === false)
                        {
                            $verify_edit_slide = 1;
                            $_SESSION['alert'] = "<div class='alert alert-sa-danger-card'>Vui lòng chọn đúng file ảnh (.png/ .jpg/ .jpeg/ .gif)</div>";
                        }
                        else
                        {
                            if($_FILES['hinh_moi']['size'] >= 5120000) // đơn vị: byte
                            {
                                $verify_edit_slide = 1;
                                $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Vui lòng chọn file ảnh có kích thước dưới 5MB</div>";
                            }else
                            { 
                                $image = $_FILES['hinh_moi']['name'];
                                $path = __DIR__ . './../View/img/';
                                $target_file = $path . $image;
                                move_uploaded_file($_FILES['hinh_moi']['tmp_name'], $target_file);
                            }
                        }
                    }
                }
                if($verify_edit_slide == 0)
                {
                    edit_slide($id,$title1,$title2,$image,$link,$name_link,$status,$background);
                    $_SESSION['alert'] = "<div class='alert alert-sa-danger-card'><span class='text-success'>Sửa thành công slide</span></div>";
                }
            }
            if($edit == 8)
            {
                $id_news = $_REQUEST['id'];
                $verify_news = 0;
                $user_submit = $_SESSION['dangnhap'][0][0];
                $date_setup = $_POST['date_setup'];
                $id_cate = $_POST['id_cate'];
                $status = $_POST['status'];
                $title = $_POST['title'];
                $slug = $_POST['slug'];
                $image_title = $_FILES['image_title']['name'];
                $decribe = $_POST['decribe'];
                if(!empty($date_setup))
                {
                    if(strtotime($date_setup)>=strtotime($datenow))
                    {
                        $valid_date_setup = "is-valid";
                    }else
                    {
                        $valid_date_setup = "is-invalid";
                        $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Không thể hẹn ngày ở quá khứ</div>";
                    }
                }else
                {
                    $date_setup = $_POST['old_date_setup'];
                    $valid_date_setup = "";
                }
                if(!empty($title))
                {
                    $verify_news++;
                    $valid_title = "is-valid";
                    $tipforslug = CreateSlug($title);
                }else
                {
                    $valid_title = "is-invalid";
                    $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Vui lòng nhập tiêu đề bài viết</div>";
                }
                if(!empty($slug))
                {
                    $verify_slug = SelectOneNews($slug);
                    if(empty($verify_slug))
                    {
                        $verify_news++;
                        $valid_slug = "is-valid";
                    }else
                    {
                        $valid_slug = "is-invalid";
                        $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Đường dẫn này đã tồn tại</div>";
                    }
                    
                }else
                {
                    $valid_slug = "is-invalid";
                    $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Vui lòng nhập đường dẫn bài viết</div>";
                }
                if(!empty($decribe))
                {
                    $verify_news++;
                    $valid_decribe = "is-valid";
                }else
                {
                    $valid_decribe = "is-invalid";
                    $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Vui lòng nhập nội dung bài viết</div>";
                }
                if($_FILES['image_title']['name'] != "")
                {
                    if(in_array($_FILES['image_title']['type'],$auth_image) === false)
                    {
                        $valid_image_title = "is-invalid";
                        $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Vui lòng chọn đúng file ảnh (.png/ .jpg/ .jpeg/ .gif)</div>";
                    }
                    else
                    {
                        if($_FILES['image_title']['size'] >= 5120000) // đơn vị: byte
                        {
                            $valid_image_title = "is-invalid";
                            $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Vui lòng chọn file ảnh có kích thước dưới 5MB</div>";
                        }else
                        {
                            $valid_image_title = "is-valid";
                            $path = __DIR__ . './../View/img/';
                            $target_file = $path . $image_title;
                            move_uploaded_file($_FILES['image_title']['tmp_name'], $target_file);
                        }
                    }
                }else
                {
                    $image_title = $_POST['old_image_title'];
                }
                if($verify_news == 3)
                {
                    UpdateNews($id_cate,$title,$slug,$image_title,$decribe,$id_user,$status,$date_setup);
                    $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'><span class='text-success'>Chỉnh sửa thành công.</span></div>";
                }
            }
        }

        if(isset($_REQUEST['upload']))
        {
            $upload = $_REQUEST['upload'];
            if($upload == 0)
            {
                    $v1 = $_POST['v1'];
                    $name = $_POST['name'];
                    $decribe = $_POST['decribe'];
                    if(isset($_FILES['image']))
                    {
                        $image = basename($_FILES['image']['name']);
                        $path = __DIR__ . './../View/img/';
                        $target_file = $path . $image;
                        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                        themloai($name,$v1,$decribe,$image);
                    }
            }
            if($upload == 1)
            {
                $bool = 0;
                $id_loai = $_POST['id_loai'];
                if(!empty($_POST['name']))
                {
                    $bool++;
                    $name = $_POST['name'];
                    $valid_name = "is-valid";
                }else{
                    $_SESSION['alert'] .= 'Tên chưa được nhập.<br>';
                    $valid_name = "is-invalid";
                }
                if(!empty($_POST['price']))
                {
                    $bool++;
                    $valid_price = "is-valid";
                    $price = $_POST['price'];
                }else{
                    $_SESSION['alert'] .= 'Giá Gốc chưa được nhập.<br>';
                    $valid_price = "is-invalid";
                }
                if(!empty($_POST['sale']))
                {
                    $sale = $_POST['sale'];
                    if($sale<=$price)
                    {
                        $bool++;
                        $ptsale = round((1-($sale/$price))*100);
                        $valid_sale = "is-valid";
                        $sale = $_POST['sale'];
                    }else
                    {
                        $valid_sale = "is-invalid";
                        $_SESSION['alert'] .= 'Giá Sale không được lớn hơn Giá Gốc.<br>';
                    }
                }else{
                    $bool++;
                    $sale = $price;
                    $ptsale = 0;
                    $valid_sale = "is-valid";
                }
                if(!empty($_POST['mount']))
                {
                    $bool++;
                    $valid_mount = "is-valid";
                    $mount = $_POST['mount'];
                }else{
                    $_SESSION['alert'] .= 'Số lượng chưa được nhập.<br>';
                    $valid_mount = "is-invalid";
                }
                if(!empty($_POST['size']))
                {
                    $bool++;
                    $valid_size = "is-valid";
                    $size = $_POST['size'];
                }else{
                    $_SESSION['alert'] .= 'Size sản phẩm chưa được nhập.<br>';
                    $valid_size = "is-invalid";
                }
                if(!empty($_POST['color']))
                {
                    $bool++;
                    $valid_color = "is-valid";
                    $color = $_POST['color'];
                }else{
                    $_SESSION['alert'] .= 'Màu sản phẩm chưa được nhập.<br>';
                    $valid_color = "is-invalid";
                }
                if(!empty($_POST['short_decribe']))
                {
                    $bool++;
                    $valid_short_decribe = "is-valid";
                    $short_decribe = $_POST['short_decribe'];
                }else{
                    $_SESSION['alert'] .= 'Ghi chú ngắn chưa được nhập.<br>';
                    $valid_short_decribe = "is-invalid";
                }
                if(!empty($_POST['decribe']))
                {
                    $bool++;
                    $valid_decribe = "is-valid";
                    $decribe = $_POST['decribe'];
                }else{
                    $_SESSION['alert'] .= 'Ghi chú chưa được nhập.<br>';
                    $valid_decribe = "is-invalid";
                }
                if($_FILES['image']['name'] !== "")
                {
                    if(in_array($_FILES['image']['type'],$auth_image) === false)
                    {
                        $_SESSION['alert'] .= 'Vui lòng chọn đúng file ảnh (png/ jpg/ jpeg).<br>';
                    }
                    else{
                        if($_FILES['image']['size'] >= 5120000) // đơn vị: byte
                        {
                            $_SESSION['alert'] .= 'Vui lòng chọn đúng file ảnh dưới 5MB.<br>';
                        }
                        else{ //thành công
                            // $hinhsp = basename($_FILES['image']['name']);
                            $valid_image = 1;
                            $bool++;
                            $hinhsp = $_FILES['image']['name'];
                            $path = __DIR__ . './../View/img/';
                            $target_file = $path . $hinhsp;
                            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                            }
                        }
                    }
                else
                {
                    $_SESSION['alert'] .= 'Hình ảnh chưa được nhập.<br>';
                }
                if($bool == 9)
            {
            $_SESSION['alert'] .= 'Sản phẩm đã đăng thành công !';
            themsp($id_loai, $name, $price, $sale, $decribe, $short_decribe, $mount, $ptsale, $hinhsp, $color, $size);
            }
            }
            if($upload == 2)
            {
                $status = $_POST['status'];
                $name = $_POST['name'];
                $decribe = $_POST['decribe'];
                // if(isset($_FILES['image']))
                // {
                //     $image = basename($_FILES['image']['name']);
                //     $path = __DIR__ . './../View/img/';
                //     $target_file = $path . $image;
                //     move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                // }
                AddCateNews($status,$name,$decribe);
            }
            if($upload == 3)
            {
                $level = $_POST['level'];
                $name = $_POST['name'];
                $decribe = $_POST['decribe'];
                if(isset($_FILES['image']))
                {
                    $image = basename($_FILES['image']['name']);
                    $path = __DIR__ . './../View/img/';
                    $target_file = $path . $image;
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                    themloaiv1($name,$level,$decribe,$image);
                }
            }
            if($upload == 4)
            {
                $verify_voucher = 0;
                $status = $_POST['status'];
                if(!empty($_POST['code']))
                {
                    $verify_voucher++;
                    $code = str_replace(['"',"'",',','.','@','#','!',' ','}','{','[',']'],'',$_POST['code']);
                }else
                {
                    $_SESSION['alert'] .= 'Mã voucher chưa được nhập.<br>';
                }
                if(!empty($_POST['condition']))
                {
                $condition = $_POST['condition'];
                }else
                {
                    $condition = 0;
                }
                if(!empty($_POST['number']))
                {
                $number = $_POST['number'];
                }else
                {
                    $number = 0;
                }
                if(!empty($_POST['amount']))
                {
                    $verify_voucher++;
                    $amount = $_POST['amount'];
                }else
                {
                    $_SESSION['alert'] .= 'Số lượng chưa được nhập.<br>';
                }
                if(!empty($_POST['decribe']))
                {
                    $decribe = $_POST['decribe'];
                }else
                {
                    $decribe = 'trống';
                }
                if(!empty($_POST['datestart']))
                {
                    $datestart = $_POST['datestart'];
                    if(similar_text($datestart,"yyyy/mm/dd hh:mm:ss")==5)
                    {
                        if(strtotime($datestart)>$number_second_now)
                        {
                        $verify_voucher++;
                        }else
                        {
                        $_SESSION['alert'] .= 'Không thể nhập ngày bắt đầu ở quá khứ.<br>';
                        }
                    }else
                    {
                        $_SESSION['alert'] .= 'Ngày bắt đầu nhập chưa đúng định dạng.<br>';
                    }
                }else
                {
                    $_SESSION['alert'] .= 'Ngày bắt đầu chưa được nhập.<br>';
                }
                if(!empty($_POST['dateend']))
                {
                    $dateend = $_POST['dateend'];
                    if(similar_text($dateend,"yyyy/mm/dd hh:mm:ss")==5)
                    {
                        if(strtotime($dateend)>$number_second_now)
                        {
                        $verify_voucher++;
                        }else
                        {
                        $_SESSION['alert'] .= 'Không thể nhập ngày kết thúc ở quá khứ.<br>';
                        }
                    }else
                    {
                        $_SESSION['alert'] .= 'Ngày kết thúc nhập chưa đúng định dạng.<br>';
                    }
                }else
                {
                    $_SESSION['alert'] .= 'Ngày kết thúc chưa được nhập.<br>';
                }
                if($verify_voucher==4)
                {
                themvoucher($code,$condition,$number,$datestart,$dateend,$amount,$status,$decribe);
                }
            }else
            {
                $code = "";
            }
            if($upload == 5)
            {
                $verify_news = 0;
                $id_user = $_SESSION['dangnhap'][0][0];
                $date_setup = $_POST['date_setup'];
                $id_cate = $_POST['id_cate'];
                $status = $_POST['status'];
                $title = $_POST['title'];
                $slug = $_POST['slug'];
                $image_title = $_FILES['image_title']['name'];
                $decribe = $_POST['decribe'];
                if(!empty($date_setup))
                {
                    if(strtotime($date_setup)>=strtotime($datenow))
                    {
                        $valid_date_setup = "is-valid";
                    }else
                    {
                        $valid_date_setup = "is-invalid";
                        $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Không thể hẹn ngày ở quá khứ</div>";
                    }
                }else
                {
                    $valid_date_setup = "";
                }
                if(!empty($title))
                {
                    $verify_news++;
                    $valid_title = "is-valid";
                    $tipforslug = CreateSlug($title);
                }else
                {
                    $valid_title = "is-invalid";
                    $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Vui lòng nhập tiêu đề bài viết</div>";
                }
                if(!empty($slug))
                {
                    $verify_slug = SelectOneNews($slug);
                    if(empty($verify_slug))
                    {
                        $verify_news++;
                        $valid_slug = "is-valid";
                    }else
                    {
                        $valid_slug = "is-invalid";
                        $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Đường dẫn này đã tồn tại</div>";
                    }
                    
                }else
                {
                    $valid_slug = "is-invalid";
                    $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Vui lòng nhập đường dẫn bài viết</div>";
                }
                if(!empty($decribe))
                {
                    $verify_news++;
                    $valid_decribe = "is-valid";
                }else
                {
                    $valid_decribe = "is-invalid";
                    $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Vui lòng nhập nội dung bài viết</div>";
                }
                if($_FILES['image_title']['name'] != "")
                {
                    if(in_array($_FILES['image_title']['type'],$auth_image) === false)
                    {
                        $valid_image_title = "is-invalid";
                        $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Vui lòng chọn đúng file ảnh (.png/ .jpg/ .jpeg/ .gif)</div>";
                    }
                    else
                    {
                        if($_FILES['image_title']['size'] >= 5120000) // đơn vị: byte
                        {
                            $valid_image_title = "is-invalid";
                            $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Vui lòng chọn file ảnh có kích thước dưới 5MB</div>";
                        }else
                        {
                            $verify_news++;
                            $valid_image_title = "is-valid";
                            $path = __DIR__ . './../View/img/';
                            $target_file = $path . $image_title;
                            move_uploaded_file($_FILES['image_title']['tmp_name'], $target_file);
                        }
                    }
                }else
                {
                    $valid_image_title = "is-invalid";
                    $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'>Vui lòng nhập hình ảnh bài viết</div>";
                }
                if($verify_news == 4)
                {
                    AddNews($id_cate,$title,$slug,$image_title,$decribe,$id_user,$status,$date_setup);
                    $_SESSION['alert'] .= "<div class='alert alert-sa-danger-card'><span class='text-success'>Tạo bài viết thành công</span></div>";
                }
            }
        }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title><?=$info[1]?> | Quản lí</title>
    <!-- icon -->
    <link rel="icon" type="image/png" href="./../View/img/<?=$info[2]?>" />
    <!-- fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href="./../template/admin_t/vendor/bootstrap/css/bootstrap.ltr.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/highlight.js/styles/github.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/simplebar/simplebar.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/quill/quill.snow.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/air-datepicker/css/datepicker.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/select2/css/select2.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/datatables/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/vendor/fullcalendar/main.min.css" />
    <link rel="stylesheet" href="./../template/admin_t/css/style.css" />
    <!-- cdn google -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->
    
</head>

<body>
    <!-- sa-app -->
    <div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
        <!-- sa-app__sidebar -->
        <div class="sa-app__sidebar">
            <div class="sa-sidebar">
                <div class="sa-sidebar__header">
                    <a class="sa-sidebar__logo" href="index.php?act=admin-dashboard">
                        <!-- logo -->
                        <div class="sa-sidebar-logo">
                            <span class="h5 mb-0 text-uppercase text-primary bg-dark px-2">Thời trang</span>
                            <span class="h5 mb-0 text-uppercase text-dark bg-white px-2 ml-n1">QT</span>
                        </div>
                        <!-- logo / end -->
                    </a>
                </div>
                <div class="sa-sidebar__body" data-simplebar="">
                    <ul class="sa-nav sa-nav--sidebar" data-sa-collapse="">
                        <li class="sa-nav__section">
                            <ul class="sa-nav__menu sa-nav__menu--root">
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="index.php?act=admin-dashboard" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-tachometer-alt"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí doanh thu</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="index.php?act=admin-products" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-box"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí sản phẩm</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                    data-sa-collapse-item="sa-nav__menu-item--open"><a href="#" class="sa-nav__link"
                                        data-sa-collapse-trigger="">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-boxes"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí loại hàng</span>
                                            <span class="sa-nav__arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                                                <path d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z">
                                                </path>
                                                </svg></span></a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
                                        <li class="sa-nav__menu-item"><a href="index.php?act=admin-category-v1"
                                                class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Loại hàng mẹ (Lv1)</span></a></li>
                                        <li class="sa-nav__menu-item"><a href="index.php?act=admin-category"
                                                class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Loại hàng con (Lv2)</span></a></li>
                                    </ul>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="index.php?act=admin-accounts" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí tài khoản</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="index.php?act=admin-orders" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-shopping-cart"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí hóa đơn</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="index.php?act=admin-slide" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <!-- <i class="fas fa-shopping-cart"></i> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                                                <path d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2 C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2 C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3 C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z" ></path>
                                            </svg>
                                        </span>
                                        <span class="sa-nav__title">Quản lí slide</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="index.php?act=admin-review" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <!-- <i class="fas fa-shopping-cart"></i> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                                                <path d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2 C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2 C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3 C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z" ></path>
                                            </svg>
                                        </span>
                                        <span class="sa-nav__title">Quản lí đánh giá</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="index.php?act=admin-voucher" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <!-- <i class="fas fa-shopping-cart"></i> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                                                <path d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2 C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2 C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3 C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z" ></path>
                                            </svg>
                                        </span>
                                        <span class="sa-nav__title">Quản lí Voucher</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="index.php?act=admin-infomation" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <!-- <i class="fas fa-shopping-cart"></i> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                                                <path d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2 C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2 C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3 C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z" ></path>
                                            </svg>
                                        </span>
                                        <span class="sa-nav__title">Quản lí thông tin WEBSITE</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="index.php?act=admin-cate-news" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <!-- <i class="fas fa-shopping-cart"></i> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                                                <path d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2 C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2 C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3 C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z" ></path>
                                            </svg>
                                        </span>
                                        <span class="sa-nav__title">Loại tin tức</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="index.php?act=admin-news" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <!-- <i class="fas fa-shopping-cart"></i> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                                                <path d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2 C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2 C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3 C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z" ></path>
                                            </svg>
                                        </span>
                                        <span class="sa-nav__title">Bài viết</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sa-app__sidebar-shadow"></div>
            <div class="sa-app__sidebar-backdrop" data-sa-close-sidebar=""></div>
        </div>
        <!-- sa-app__sidebar / end -->
        <!-- sa-app__content -->
        <div class="sa-app__content">
            <!-- sa-app__toolbar -->
            <div class="sa-toolbar sa-toolbar--search-hidden sa-app__toolbar">
                <div class="sa-toolbar__body">
                    <div class="sa-toolbar__item">
                        <button class="sa-toolbar__button" type="button" aria-label="Menu" data-sa-toggle-sidebar="">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <div class="sa-toolbar__item">
                        Hệ thống quản lí QT
                    </div>
                    <div class="mx-auto"></div>

                    <div class="dropdown sa-toolbar__item">
                        <button class="sa-toolbar-user" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                            data-bs-offset="0,1" aria-expanded="false">
                            <span class="sa-toolbar-user__avatar sa-symbol sa-symbol--shape--rounded">
                                <img src="./../View/img/<?=$load_user[0]['image']?>" width="64" height="64">
                            </span>
                            <span class="sa-toolbar-user__info">
                                <span class="sa-toolbar-user__title">
                                <?=$load_user[0]['fullname']?>
                                </span>
                                <span class="sa-toolbar-user__subtitle">
                                <?=$_SESSION['dangnhap'][0][4]?>
                                </span>
                            </span>
                        </button>
                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="index.php">Trang chủ</a>
                                <a class="dropdown-item text-danger" href="index.php?act=logout">Thoát</a>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sa-toolbar__shadow"></div>
            </div>

                 
            
    