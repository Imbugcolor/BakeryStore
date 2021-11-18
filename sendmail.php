<?php

use PHPMailer\PHPMailer\PHPMailer;

//Gửi mail
include("./PHPMailer/src/PHPMailer.php");
include("./PHPMailer/src/Exception.php");
include("./PHPMailer/src/OAuth.php");
include("./PHPMailer/src/POP3.php");
include("./PHPMailer/src/SMTP.php");

$mail = new PHPMailer(true);

$alert = '';

if (isset($_POST['send'])) {
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    try {
        //Server settings
        $mail->SMTPDebug = false;
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'dinhhoangviet12a22019@gmail.com';
        $mail->Password   = 'Viet01212133721';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('dinhhoangviet12a22019@gmail.com');
        $mail->addAddress('dinhhoangviet12a22019@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Message Received (Contact Page)';
        $mail->Body    = '<h3> Name: ' . $name . ' <br> Email: ' . $email . ' <br>Message: ' . $message . ' </h3>';

        $mail->send();
        $alert = '<div class = "aleart-success" style="background-color: #01CE69; border-radius: 50px; color: #fff; padding:5px 10px; text-align:center;">
                    <span>Message Sent! Thank you for contacting us.</span>
                    </div>';
    } catch (Exception $e) {
        $alert = '<div class = "aleart-error" style="background-color: #FF4A52; border-radius: 50px; color: #fff; padding:5px 10px; text-align:center;">
                    <span>' . $e->getMessage() . '</span>
                    </div>';
    }
}
