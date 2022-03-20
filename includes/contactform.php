<?php
require('../includes/PHPMailer-master/src/PHPMailer.php');
require('../includes/PHPMailer-master/src/SMTP.php');
require('../includes/PHPMailer-master/src/Exception.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
    if(isset($_POST["submit"])){
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
        $mail->Username = "grewardsmanagement@gmail.com"; //ito yung gamit kong email pang send
        $mail->Password = "grewardsmanagement123!"; //password ng email ko
        $mail->Subject = $subject; //subject ng email natin
        $mail->setFrom($mailFrom,"From : $name <$mailFrom> "); //kung kanino galing yung email
        $mail->isHTML(true); //naka true para madesignan yung email body
        $mail->Body = $message; // dito sa body pwede mo designan ng html at css yung body ng email natin
        $mail->addAddress("grewardsmanagement@gmail.com"); //kung kanino isesend yung email, wala nang problema dito

                if ($mail->Send()) {
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                $mail->smtpClose();
    }
?>