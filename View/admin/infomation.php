<?php
if(!defined('_CODE'))
{
        require_once('404.html'); exit;
}
if(isset($_REQUEST['edit_info']))
{
        $bool = 0;
        if(!empty($_POST['web_name']))
        {
            $bool++;
            $web_name = $_POST['web_name'];
            $valid_web_name = "is-valid";
        }else{
            $_SESSION['alert'] .= 'Tiêu đề chưa được nhập.<br>';
            $valid_web_name = "is-invalid";
        }
        if($_FILES['image_logo']['name'] !== "")
        {
            $auth_image = array('image/jpeg','image/jpg', 'image/png');
            if(in_array($_FILES['image_logo']['type'],$auth_image) === false)
            {
                $_SESSION['alert'] .= 'Vui lòng chọn đúng file ảnh (png/ jpg/ jpeg).<br>';
            }
            else{
                if($_FILES['image_logo']['size'] >= 5120000) // đơn vị: byte
                {
                    $_SESSION['alert'] .= 'Vui lòng chọn đúng file ảnh dưới 5MB.<br>';
                }
                else{ 
                    $bool++;
                    $image_logo = $_FILES['image_logo']['name'];
                    $path = __DIR__ . './../View/img/';
                    $target_file = $path . $image_logo;
                    move_uploaded_file($_FILES['image_logo']['tmp_name'], $target_file);
                    }
                }
            }
        else
        {
            $image_logo = $info[3];
        }
        if(!empty($_POST['web_phone']))
        {
            $bool++;
            $web_phone = $_POST['web_phone'];
            $valid_web_phone = "is-valid";
        }else{
            $_SESSION['alert'] .= 'SĐT chưa được nhập.<br>';
            $valid_web_phone = "is-invalid";
        }
        if(!empty($_POST['web_email']))
        {
            $bool++;
            $web_email = $_POST['web_email'];
            $valid_web_email = "is-valid";
        }else{
            $_SESSION['alert'] .= 'Email chưa được nhập.<br>';
            $valid_web_email = "is-invalid";
        }
        if(!empty($_POST['web_introduct']))
        {
            $bool++;
            $web_introduct = $_POST['web_introduct'];
            $valid_web_introduct = "is-valid";
        }else{
            $_SESSION['alert'] .= 'Giới thiệu chưa được nhập.<br>';
            $valid_web_introduct = "is-invalid";
        }
        if(!empty($_POST['web_address']))
        {
            $bool++;
            $web_address = $_POST['web_address'];
            $valid_web_address = "is-valid";
        }else{
            $_SESSION['alert'] .= ' chưa được nhập.<br>';
            $valid_web_address = "is-invalid";
        }
        if(!empty($_POST['link_fanpage']))
        {
            $bool++;
            $link_fanpage = $_POST['link_fanpage'];
            $valid_link_fanpage = "is-valid";
        }else{
            $_SESSION['alert'] .= 'Tên chưa được nhập.<br>';
            $valid_link_fanpage = "is-invalid";
        }
        if(!empty($_POST['link_twitter']))
        {
            $bool++;
            $link_twitter = $_POST['link_twitter'];
            $valid_link_twitter = "is-valid";
        }else{
            $_SESSION['alert'] .= 'Tên chưa được nhập.<br>';
            $valid_link_twitter = "is-invalid";
        }
        if(!empty($_POST['link_instagram']))
        {
            $bool++;
            $link_instagram = $_POST['link_instagram'];
            $valid_link_instagram = "is-valid";
        }else{
            $_SESSION['alert'] .= 'Tên chưa được nhập.<br>';
            $valid_link_instagram = "is-invalid";
        }
        if(!empty($_POST['bank_name1']))
        {
            $bool++;
            $bank_name1 = $_POST['bank_name1'];
            $valid_bank_name1 = "is-valid";
        }else{
            $_SESSION['alert'] .= 'Tên chưa được nhập.<br>';
            $valid_bank_name1 = "is-invalid";
        }
        if(!empty($_POST['bank_user1']))
        {
            $bool++;
            $bank_user1 = $_POST['bank_user1'];
            $valid_bank_user1 = "is-valid";
        }else{
            $_SESSION['alert'] .= 'Tên chưa được nhập.<br>';
            $valid_bank_user1 = "is-invalid";
        }
        if(!empty($_POST['bank_user1']))
        {
            $bool++;
            $bank_user1 = $_POST['bank_user1'];
            $valid_bank_user1 = "is-valid";
        }else{
            $_SESSION['alert'] .= 'Tên chưa được nhập.<br>';
            $valid_bank_user1 = "is-invalid";
        }
        if($bool == 12)
    {
    $h_alert = '<div class="alert alert-sa-success-card alert-sa-has-icon alert-dismissible fade show" role="alert">
                    <div class="alert-sa-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
                            <circle cx="12" cy="12" r="10"></circle> <line x1="12" y1="16" x2="12" y2="12"></line> <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                    </div>
                <div class="alert-sa-content">';
    $f_alert = '</div>
                    <button type="button" class="sa-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    $_SESSION['alert'] .= 'Sản phẩm đã đăng thành công !';
    echo'SUCCESS';
    }
    }
?>

    <!-- template -->
<div id="top" class="sa-app__body">
<form action="index.php?act=admin-infomation&edit_info" method="post" enctype="multipart/form-data">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="index.php?act=admin-dashboard">Quản lí</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Thông tin website</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Cập nhật thông tin</h1>
                                    
                                </div>
                                <div class="col-auto d-flex"><a href="index.php?act=admin-dashboard" class="btn btn-secondary me-3">Quay về</a>
                                <button class="btn btn-primary" type="submit" >Lưu</button></div>
                            </div>
                            <div class="mt-5">
                                <?php
                                if($_SESSION['alert']== "")
                                {
                                    echo $_SESSION['alert'];
                                }else{
                                    echo $h_alert.$_SESSION['alert'].$f_alert;
                                }
                           ?>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div class="card">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Thông tin</h2>
                                            </div>
                                            <div class="mb-4"><label class="form-label">Tiêu đề website</label>
                                                    <input type="text" name="web_name" class="form-control <?=$valid_web_name?>" id="form-category/name" placeholder="Nhập tiêu đề website" value="<?=$info[1]?>" />
                                            </div>
                                            <div class="mb-4"><label class="form-label">Số điện thoại</label>
                                                    <input type="text" name="web_phone" class="form-control <?=$valid_web_phone?>" value="<?=$info[4]?>" placeholder="Nhập số điện thoại"  />
                                            </div>
                                            <div class="mb-4"><label class="form-label">Email</label>
                                                    <input type="text" name="web_email" class="form-control <?=$valid_web_email?>" value="<?=$info[5]?>" placeholder="Nhập địa chỉ email"  />
                                            </div>
                                            <div class="mb-4"><label class="form-label">Giới thiệu</label><textarea name="web_introduce" class=" form-control <?=$valid_web_introduct?>"
                                                    rows="3"><?=$info[6]?></textarea>
                                            </div>
                                            <div class="mb-4"><label class="form-label">Địa chỉ</label>
                                                    <input type="text" name="web_address" class="form-control <?=$valid_web_address?>" value="<?=$info[7]?>" placeholder="Nhập địa chỉ shop"  />
                                            </div>
                                            <div class="mb-4"><label class="form-label">Link fanpage</label>
                                                    <input type="text" name="link_fanpage" class="form-control <?=$valid_link_fanpage?>" value="<?=$info[8]?>" placeholder="Nhập Link fanpage shop"  />
                                            </div>
                                            <div class="mb-4"><label class="form-label">Link twiteer</label>
                                                    <input type="text" name="link_twitter"  class="form-control <?=$valid_link_twitter?>" value="<?=$info[9]?>" placeholder="Nhập Link fanpage shop"  />
                                            </div>
                                            <div class="mb-4"><label class="form-label">Link instagram</label>
                                                    <input type="text" name="link_instagram"  class="form-control <?=$valid_link_instagram?>" value="<?=$info[10]?>" placeholder="Nhập Link fanpage shop"  />
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card w-100">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Thông tin ngân hàng</h2>
                                            </div>
                                            <div class="mb-4"><label class="form-label">Tên ngân hàng</label>
                                                    <input type="text" name="web_bank_name1" class="form-control <?=$valid_web_bank_name1?>" value="<?=$info[11]?>" placeholder="Nhập tên ngân hàng"  />
                                            </div>
                                            <div class="mb-4"><label class="form-label">Số tài khoản</label>
                                                    <input type="text" name="web_bank_id1" class="form-control <?=$valid_web_bank_id1?>" value="<?=$info[12]?>" placeholder="Nhập tên ngân hàng"  />
                                            </div>
                                            <div class="mb-4"><label class="form-label">Chủ tài khoản</label>
                                                    <input type="text" name="web_bank_user1" class="form-control <?=$valid_web_bank_user1?>" value="<?=$info[13]?>" placeholder="Nhập tên ngân hàng"  />
                                            </div>
                                            <div class="mt-4 mb-n2">
                                                <!-- <a href="index.php?act=404" class="me-3 pe-2">Thêm thông tin ngân hàng mới -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Ảnh logo</h2>
                                            </div>
                                                <div class="form-control ">
                                                <div class="max-w-20x">
                                                    <img src="./../View/img/<?=$info[3]?>" id="image" class="w-100 h-auto" width="320" height="320" alt="" /></div>
                                                </div>
                                                <div class="mt-4 mb-n2">
                                                    <a href="#" class="me-3 pe-2">
                                                            <input disabled type="text" class="mb-4 form-control" value="<?=$info[2]?>" placeholder="Link image"  />

                                                            <input type="file" id="imageFile" name="image_logo" onchange="chooseFile(this)" class="form-control  <?=$valid_image_logo?>"
                                                            accept="image/jpeg, image/png, image/gif" >

                                                    </a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
</div>
</form>
<script>
    function chooseFile(fileInput)
    {
        if(fileInput.files && fileInput.files[0])
        {
            var reader = new FileReader();
            reader.onload =function (e)
                                        {
                                            $('#image').attr('src',e.target.result);
                                        }
                                        reader.readAsDataURL(fileInput.files[0])
        }
    }
</script>

