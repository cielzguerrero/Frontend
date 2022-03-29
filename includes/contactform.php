<?php
require('../includes/PHPMailer-master/src/PHPMailer.php');
require('../includes/PHPMailer-master/src/SMTP.php');
require('../includes/PHPMailer-master/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\Exception;
use League\OAuth2\Client\Provider\Google;

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $subject = $_POST["subject"];
    $mailFrom = $_POST["email"];
    $message = $_POST["message"];

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = "true";
    $mail->SMTPSecure = "tls";
    $mail->Port = "587";
    $mail->Username = "grewardmanagement@gmail.com";
    $mail->Password = "grewardmanagement123";
    $mail->isHTML(true);
    $mail->addAddress("grewardmanagement@gmail.com");
    $mail->addReplyTo($mailFrom);
    $mail->From = $mailFrom;
    $mail->FromName = $name;
    $mail->Subject = $subject;
    $mail->Body = $message;

    if ($mail->Send()) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
    $mail->smtpClose();
}
