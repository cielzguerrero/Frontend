<?php
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $subject = $_POST["subject"];
        $mailFrom = $_POST["email"];
        $message = $_POST["message"];


        $to = "ramoresaldrinpup@gmail.com";
        $headers = $name;
        $txt = "You have receive an email from: ".$name."".$message;


        mail($to, $subject, $message, $headers);

        header("Location:../mainPage/ContactUs.php?Mail sent succesfully");
    }
?>