<?php
$name = ""; $email = ""; $subject = ""; $message = "";
$h_alert = '<div class="text-danger">
    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
        <circle cx="12" cy="12" r="10"></circle> <line x1="12" y1="16" x2="12" y2="12"></line> <line x1="12" y1="8" x2="12.01" y2="8"></line>
    </svg> Lỗi !';
$f_alert = '</div>';
if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(!empty($_POST['name']))
    {
        $name = $_POST['name'];
    }
    else
    {
        $_SESSION['alert'] .= "<br>Vui lòng điền họ và tên.";
    }
    if(!empty($_POST['email']))
    {
        $email = $_POST['email'];
    }
    else
    {
        $_SESSION['alert'] .= "<br>Vui lòng điền địa chỉ email.";
    }
    if(!empty($_POST['subject']))
    {
        $subject = $_POST['subject'];
    }
    else
    {
        $_SESSION['alert'] .= "<br>VUi lòng điền tiêu đề.";
    }
    if(!empty($_POST['message']))
    {
        $message = $_POST['message'];
    }
    else
    {
        $_SESSION['alert'] .= "<br>Vui lòng điền nội dung.";
    }
    if($_SESSION['alert'] == "" && $name !== "" && $email !== "" && $subject !== "" && $message !== "") 
    {
        contact($name,$email,$subject,$message);
        $h_alert = '<div class="text-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
            <circle cx="12" cy="12" r="10"></circle> <line x1="12" y1="16" x2="12" y2="12"></line> <line x1="12" y1="8" x2="12.01" y2="8"></line>
        </svg> ';
        $_SESSION['alert'] = "Thư của bạn đã được gửi đi, theo dõi thông báo để nhận câu trả lời !";
    }
}
?>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Trang chủ</a>
                    <span class="breadcrumb-item active">Liên hệ</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Điền thông tin liên hệ</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <div class="mb-4">
                        <?php
                            if($_SESSION['alert']== "")
                                {
                                    echo $_SESSION['alert'];
                                }else{
                                    echo $h_alert.$_SESSION['alert'].$f_alert;
                                }
                        ?>
                    </div>
                    <form action="index.php?act=contact" method="post" name="sentMessage" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" value="<?=$name?>" name="name" class="form-control" id="name" placeholder="Họ và tên, ví dụ: Nguyễn Văn A"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" value="<?=$email?>" name="email" class="form-control" placeholder="Địa chỉ email, ví dụ: abc@gmail.com"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" value="<?=$subject?>" name="subject" class="form-control" placeholder="Tiêu đề của liên hệ / thắc mắc"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea name="message" value="<?=$message?>" class="form-control" rows="6" id="message" placeholder="Nội dung liên hệ / thắc mắc">
                            </textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">
                                Gửi thư đi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                    <iframe style="width: 100%; height: 250px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31349.979053892443!2d106.57662791417121!3d10.830634204190149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752bce41e13229%3A0xe0ee4f2d36b1ea3f!2sTan%20Thoi%20Nhat%2C%20District%2012%2C%20Ho%20Chi%20Minh%20City%2C%20Vietnam!5e0!3m2!1sen!2s!4v1702265705596!5m2!1sen!2s"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="bg-light p-30 mb-3">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i><?=$info['web_address']?></p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i><?=$info['web_email']?></p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i><?=$info['web_phone']?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->