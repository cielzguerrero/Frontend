<?php
if (isset($_POST['addmember'])){
    $time = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $activity = "Added New Profile";
    $profile_name = $_POST['pname'];
    $full_name = $_POST['fname'];
    $pstatus = $_POST['sname'];
    $user_name = $_POST['uname'];
    $pass_word = $_POST['pass'];
    $dc = date('Y-m-d');
    $email = $_POST['email'];
    $contact = $_POST['pcontact'];
    $address = $_POST['paddress'];
    if(isset($_FILES['image']['name'])) {

        $image_name = $_FILES['image']['name'];

        //Rename Image
        $extension = end(explode('.', $image_name));
        $image_name = "Profile-". rand(000, 999). "." .$extension;

        $sourcepath = $_FILES['image']['tmp_name'];
        $destinationpath = "images/profile/".$image_name;

        $upload = move_uploaded_file($sourcepath, $destinationpath);

        if($upload == FALSE) {
            $_SESSION['upload'] = "<div class='message warning'>Failed To Upload Image. Try Again Later.</div>";
            header("Location: members.php");

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
        
        header("Location: members.php");
    } else {
        $_SESSION['add'] = "<div class='message warning'>Failed To Add User. Try Again Later.</div>";
        header("Location: members.php");
    }
}

if (isset($_POST['addnews'])) {
    $time = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $activity = "Added New News";
    $newstitle = $_POST['newsname'];
    $ndescription = $_POST['newsdesc'];
    $ncontent = $_POST['newscontent'];
    $newstime = date("Y-m-d H:i:s");
    $originalposter = $_SESSION['fullname'];
   if(isset($_FILES['image']['name'])) {

       $image_name = $_FILES['image']['name'];

       //Rename Image
       $extension = end(explode('.', $image_name));
       $image_name = "News-". rand(000, 999). "." .$extension;

       $sourcepath = $_FILES['image']['tmp_name'];
       $destinationpath = "images/news/".$image_name;

       $upload = move_uploaded_file($sourcepath, $destinationpath);

       if($upload == FALSE) {
           $_SESSION['upload'] = "<div class='message warning'>Failed To Upload Image. Try Again Later.</div>";
           header("Location: carousel.php");

           die();
       }

   } else {

       $image_name = "";

   }
   
   $sql = "INSERT INTO news (news_title, news_description, news_content, news_img, datetime, postedby) VALUES ('$newstitle', '$ndescription', '$ncontent', '$image_name', '$newstime', '$originalposter')";
   $result = mysqli_query($conn, $sql);
   if($result == TRUE) {
       $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
       $result = mysqli_query($conn, $log);
       $_SESSION['add'] = "<div class='message success'>New User Added Successfully!</div>";
       
       header("Location: carousel.php");
   } else {
       $_SESSION['add'] = "<div class='message warning'>Failed To Add User. Try Again Later.</div>";
       header("Location: carousel.php");
   }
}

if (isset($_POST['addgarbagetype'])) {
    $time = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $activity = "Added New Garbage Type";
    $garbagename = $_POST['gname'];
    $points = $_POST['gpoints'];
   if(isset($_FILES['image']['name'])) {

       $image_name = $_FILES['image']['name'];

       //Rename Image
       $extension = end(explode('.', $image_name));
       $image_name = "GarbageType-". rand(000, 999). "." .$extension;

       $sourcepath = $_FILES['image']['tmp_name'];
       $destinationpath = "images/garbage/".$image_name;

       $upload = move_uploaded_file($sourcepath, $destinationpath);

       if($upload == FALSE) {
           $_SESSION['upload'] = "<div class='message warning'>Failed To Upload Image. Try Again Later.</div>";
           header("Location: garbagetype.php");

           die();
       }

   } else {

       $image_name = "";

   }
   
   $sql = "INSERT INTO garbagetype (garbage_Name, garbage_Points, garbage_Img) VALUES ('$garbagename', '$points', '$image_name')";
   $result = mysqli_query($conn, $sql);
   if($result == TRUE) {
       $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
       $result = mysqli_query($conn, $log);
       $_SESSION['add'] = "<div class='message success'>New User Added Successfully!</div>";
       
       header("Location: garbagetype.php");
   } else {
       $_SESSION['add'] = "<div class='message warning'>Failed To Add User. Try Again Later.</div>";
       header("Location: garbagetype.php");
   }
}

if (isset($_POST['addprize'])) {
    $time = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $activity = "Added New Prize";
    $prizen = $_POST['pname'];
    $description = $_POST['pdesc'];
    $peso = $_POST['ppeso'];
    $price = $_POST['ppoints'];
   if(isset($_FILES['image']['name'])) {

       $image_name = $_FILES['image']['name'];

       //Rename Image
       $extension = end(explode('.', $image_name));
       $image_name = "Prize-". rand(000, 999). "." .$extension;

       $sourcepath = $_FILES['image']['tmp_name'];
       $destinationpath = "images/prize/".$image_name;

       $upload = move_uploaded_file($sourcepath, $destinationpath);

       if($upload == FALSE) {
           $_SESSION['upload'] = "<div class='message warning'>Failed To Upload Image. Try Again Later.</div>";
           header("Location: carousel.php");

           die();
       }

   } else {

       $image_name = "";

   }
   
   $sql = "INSERT INTO prizes (prizename,pesos, pdescription, points, prize_img) VALUES ('$prizen', '$peso', '$description',  '$price', '$image_name')";
   $result = mysqli_query($conn, $sql);
   if($result == TRUE) {
       $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
       $result = mysqli_query($conn, $log);
       $_SESSION['add'] = "<div class='message success'>New User Added Successfully!</div>";
       
       header("Location: carousel.php");
   } else {
       $_SESSION['add'] = "<div class='message warning'>Failed To Add User. Try Again Later.</div>";
       header("Location: carousel.php");
   }
}
?>