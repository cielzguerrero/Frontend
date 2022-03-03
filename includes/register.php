<?php
if (isset($_POST['registersubmit'])){
    $time = date("Y-m-d H:i:s");
    $username = $_POST['rprofilename'];
    $activity = "Has Registered";
    $profile_name = $_POST['rprofilename'];
    $full_name = $_POST['rfullname'];
    $pstatus = $_POST['rstatus'];
    $user_name = $_POST['rusername'];
    $pass_word = $_POST['rpassword'];
    $dc = date('Y-m-d');
    $email = $_POST['remail'];
    $contact = $_POST['rcontact'];
    $address = $_POST['raddress'];
    if(isset($_FILES['image']['name'])) {

        $image_name = $_FILES['image']['name'];

        //Rename Image
        $extension = end(explode('.', $image_name));
        $image_name = "Profile-". rand(000, 999). "." .$extension;

        $sourcepath = $_FILES['image']['tmp_name'];
        $destinationpath = "admin/images/profile/".$image_name;

        $upload = move_uploaded_file($sourcepath, $destinationpath);

        if($upload == FALSE) {
            $_SESSION['upload'] = "<div class='message warning'>Failed To Upload Image. Try Again Later.</div>";
            echo "<meta http-equiv='refresh' content='0'>";

            die();
        }

    } else {

        $image_name = "";

    }
    $sql = "INSERT INTO members (profilename, fullname, status, username, password, datecreated, email, address, contact, img_name) VALUES ('$profile_name','$full_name', '$pstatus', '$user_name', '$pass_word', '$dc', '$email', '$address', '$contact', '$image_name')";
    $result = mysqli_query($conn, $sql);
    if($result == TRUE) {
        $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
        $result = mysqli_query($conn, $log);
        $_SESSION['add'] = "<div class='message success'>New User Added Successfully!</div>";
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        $_SESSION['add'] = "<div class='message warning'>Failed To Add User. Try Again Later.</div>";
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
?>