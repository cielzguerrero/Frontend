<?php
require('../includes/PHPMailer-master/src/PHPMailer.php');
require('../includes/PHPMailer-master/src/SMTP.php');
require('../includes/PHPMailer-master/src/Exception.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\Exception;
use League\OAuth2\Client\Provider\Google;
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $subject = $_POST["subject"];
        $mailFrom = $_POST["email"];
        $message = $_POST["message"];

        $mail = new PHPMailer();
        $mail->Host     = "smtp1.example.com;smtp2.example.com";
        $mail->Mailer   = "smtp";
        // $mail->isSMTP();
        // $mail->Host = 'smtp.gmail.com';
        // $mail->SMTPAuth = "true";
        // $mail->SMTPSecure = "tls";
        // $mail->AuthType = "XOAUTH2";
        // $mail->Port = "587";
        // $mail->Subject = $subject; //subject ng email natin
        // $mail->setFrom($mailFrom, "From : $name"); //kung kanino galing yung email
        // $mail->isHTML(true); //naka true para madesignan yung email body
        // $mail->Body = $message; // dito sa body pwede mo designan ng html at css yung body ng email natin
        // $mail->addAddress("grewardmanagement@gmail.com"); //kung kanino isesend yung email, wala nang problema dito
        // $mail->addReplyTo($mailFrom, "Reply");

        $mail->From = $mailFrom;
        $mail->FromName = $name;
        $mail->addAddress("grewardmanagement@gmail.com", "John Doe");     // Add a recipient

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body = $message;

                if ($mail->Send()) {
                    echo "<meta http-equiv='refresh' content='0'>";
                }
    }
?>