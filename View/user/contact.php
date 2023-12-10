<?php
$name = ""; $email = ""; $subject = ""; $message = "";
$h_alert = '<div class="text-danger">
    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
        <circle cx="12" cy="12" r="10"></circle> <line x1="12" y1="16" x2="12" y2="12"></line> <line x1="12" y1="8" x2="12.01" y2="8"></line>
    </svg> ';
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
<!-- Contact Start -->
<div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Liên hệ & thắc mắc</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form action="index.php?act=contact" method="post" name="sentMessage">
                        <div class="control-group">
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
                        <div class="control-group">
                            <input type="text" value="<?=$name?>" name="name" class="form-control" id="name" placeholder="Họ và tên, ví dụ: Nguyễn Văn A" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" value="<?=$email?>" name="email" class="form-control" placeholder="Địa chỉ email, ví dụ: abc@gmail.com"
                                />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" value="<?=$subject?>" name="subject" class="form-control" placeholder="Tiêu đề của liên hệ / thắc mắc"
                                />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea name="message" value="<?=$message?>" class="form-control" rows="6" id="message" placeholder="Nội dung liên hệ / thắc mắc"
                                 ></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit">GỬI THƯ</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
                <p>Justo sed diam ut sed amet duo amet lorem amet stet sea ipsum, sed duo amet et. Est elitr dolor elitr erat sit sit. Dolor diam et erat clita ipsum justo sed.</p>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Store 1</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
                <div class="d-flex flex-column">
                    <h5 class="font-weight-semi-bold mb-3">Store 2</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->