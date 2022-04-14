<?php
if (isset($_POST['submit'])) {
    $time = date("Y-m-d H:i:s");
    $username = $rows['username'];
    $activity = $rows['profilename'] . " Edited their Profile";
    $profile_name = $_POST['pname'];
    $dc = date('Y-m-d');
    $full_name = $_POST['fname'];
    $pstatus = $_POST['sname'];
    $user_name = $_POST['uname'];
    $pass_word = $_POST['pass'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $current_image = $_POST['current_image'];
    $image_name = $_POST['image'];
    $address = $_POST['paddress'];
    $contact = $_POST['pcontact'];
    if (isset($_FILES['image']['name'])) {

        $image_name = $_FILES['image']['name'];

        if ($image_name != "") {

            //Rename Image
            $extension = end(explode('.', $image_name));
            $image_name = "Profile-" . rand(000, 999) . "." . $extension;

            $sourcepath = $_FILES['image']['tmp_name'];
            $destinationpath = "../admin/images/profile/" . $image_name;

            $upload = move_uploaded_file($sourcepath, $destinationpath);

            if ($upload == FALSE) {
                $_SESSION['upload'] = "<div class='message warning'>Failed To Upload Image. Try Again Later.</div>";
                echo "<meta http-equiv='refresh' content='0'>";
                die();
            }

            if ($current_image != "") {
                $remove_path = "../admin/images/profile/" . $current_image;
                $remove = unlink($remove_path);

                if ($remove == FALSE) {
                    $_SESSION['remove'] = "<div class='message warning'>Failed To Remove Current Image. Try Again Later.</div>";
                    echo "<meta http-equiv='refresh' content='0'>";
                    die();
                }
            }
        } else {
            $image_name = $current_image;
        }
    } else {
        $image_name = $current_image;
    }
    $sql = "UPDATE members SET profilename = '$profile_name', fullname = '$full_name', username = '$user_name' , password = '$pass_word' , email = '$email', contact = '$contact' , address = '$address', img_name = '$image_name' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['update'] = "<div class='message success'>Details Updated Successfully!</div>";
        $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
        $result = mysqli_query($conn, $log);
        $tsql = "UPDATE deposits SET profileuser = '$profile_name', user = '$user_name', img_name = '$image_name' WHERE d_id = '$id'";
        $result = mysqli_query($conn, $tsql);
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        $_SESSION['update'] = "<div class='message warning'>Failed To Update Details. Try Again Later.</div>";
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
