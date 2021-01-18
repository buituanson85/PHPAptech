<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'buituanson85@gmail.com'; // Gmail address which you want to use as SMTP server
        $mail->Password = 'tuanson85'; // Gmail address Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';

        $mail->setFrom('buituanson85@gmail.com'); // Gmail address which you used as SMTP server
        $mail->addAddress('buituanson85@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $message</h3>";

        $mail->send();
        $alert = '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';
    } catch (Exception $e){
        $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
    }
}
//    if (isset($_REQUEST['submit'])){
//        //checking for empty fields
//        if (($_REQUEST['name'] == "") || ($_REQUEST['subject'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['message'] == "")){
//            //msg displayed if required field missing
//            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Điền vào tất cả các trường </div>';
//        }else{
//            $name = $_REQUEST['name'];
//            $subject = $_REQUEST['subject'];
//            $email = $_REQUEST['email'];
//            $message = $_REQUEST['message'];
//
//            $mailTo = "sonbtth2002012@fpt.edu.vn";
//            $headers = "From: ".$email;
//            $txt = "You have rêcived an email from ".$name. ".\n\n".$message;
//            mail ($mailTo, $subject, $txt, $headers);
//            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Gửi thành công </div>';
//        }
//    }
?>
<!--        Start 1st colum-->
<div class="col-md-8">
    <form action="" method="post">
        <input type="text" required="" class="form-control" name="name" placeholder="Nhập họ và tên"><br>
        <input type="text" required="" class="form-control" name="subject" placeholder="Nhập môn học"><br>
        <input type="email" required="" class="form-control" name="email" placeholder="Nhập email"><br>
        <textarea class="form-control" name="message" style="height: 150px;" placeholder="Tôi có thể giúp gì bạn?"></textarea><br>
        <input type="submit" class="btn btn-primary" value="Gửi" name="submit"><br><br>
<!--        --><?php //if(isset($msg)) {echo $msg; } ?>
    </form>
</div>
<!--        end 1st colum-->
