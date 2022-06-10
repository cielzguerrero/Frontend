<?php
error_reporting(0);

// ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // 
// ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // 
// ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // 
// ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // 
// ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // // ADD // 

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
           header("Location: waste.php");
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
       
       header("Location: waste.php");
   } else {
       $_SESSION['add'] = "<div class='message warning'>Failed To Add User. Try Again Later.</div>";
       header("Location: waste.php");
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

// EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // 
// EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // 
// EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // 
// EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // 
// EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // // EDIT // 

if (isset($_POST['editgarbagetype'])) {
    $time = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $activity = "Updated Garbage Type";
    $id = $_POST['id'];
    $garbagename = $_POST['gname'];
    $points = $_POST['gpoints'];
    $current_image = $_POST['current_image'];
    $image_name = $_POST['image'];
    if(isset($_FILES['image']['name'])){

        $image_name = $_FILES['image']['name'];

            if($image_name != ""){

                //Rename Image
                $extension = end(explode('.', $image_name));
                $image_name = "GarbageType-". rand(000, 999). "." .$extension;
    
                $sourcepath = $_FILES['image']['tmp_name'];
                $destinationpath = "images/garbage/".$image_name;
    
                $upload = move_uploaded_file($sourcepath, $destinationpath);
    
                if($upload == FALSE) {
                    $_SESSION['upload'] = "<div class='message warning'>Failed To Upload Image. Try Again Later.</div>";
                    header("Location: waste.php");
    
                    die();
                }

                if($current_image != "") {
                    $remove_path = "images/garbage/".$current_image;
                    $remove = unlink($remove_path);
    
                    if($remove == FALSE){
                        $_SESSION['remove'] = "<div class='message warning'>Failed To Remove Current Image. Try Again Later.</div>";
                        header("Location: waste.php");
                        die();
                    }
                }
            } else {
                $image_name = $current_image;
            }
        } else {
            $image_name = $current_image;
        }

    $sql = "UPDATE garbagetype SET garbage_Name = '$garbagename', garbage_Points = '$points', garbage_Img = '$image_name' WHERE garbage_ID = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $_SESSION['update'] = "<div class='message success'>Details Updated Successfully!</div>";
        $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
        $result = mysqli_query($conn, $log);
        header("Location: waste.php");
    } else {
        $_SESSION['update'] = "<div class='message warning'>Failed To Update Details. Try Again Later.</div>";
        header("Location: waste.php");
    }
}
if (isset($_POST['editmember'])){
    $time = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $activity = "Edited Profile";
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
    if(isset($_FILES['image']['name'])){
 
        $image_name = $_FILES['image']['name'];

            if($image_name != ""){

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

                if($current_image != "") {
                    $remove_path = "images/profile/".$current_image;
                    $remove = unlink($remove_path);
    
                    if($remove == FALSE){
                        $_SESSION['remove'] = "<div class='message warning'>Failed To Remove Current Image. Try Again Later.</div>";
                        header("Location: members.php");
                        die();
                    }
                }
            } else {
                $image_name = $current_image;
            }
        } else {
            $image_name = $current_image;
        }
    
    
        $sql = "UPDATE members SET profilename = '$profile_name', fullname = '$full_name', status = '$pstatus', username = '$user_name', password = '$pass_word', email = '$email', address = '$address', contact = '$contact', img_name = '$image_name' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
    
        if($result) {
            $_SESSION['update'] = "<div class='message success'>Details Updated Successfully!</div>";
            $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
            $result = mysqli_query($conn, $log);
            $tsql = "UPDATE deposits SET profileuser = '$profile_name', user = '$user_name', img_name = '$image_name' WHERE d_id = '$id'";
            $result = mysqli_query($conn, $tsql);
            header("Location: members.php");
        } else {
            $_SESSION['update'] = "<div class='message warning'>Failed To Update Details. Try Again Later.</div>";
            header("Location: members.php");
        }
}

if (isset($_POST['editnews'])) {
    $time = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $activity = "Updated News";
    $id = $_POST['id'];
    $newstitle = $_POST['newsname'];
    $description = $_POST['newsdesc'];
    $newscont = $_POST['newscontent'];
    $current_image = $_POST['current_image'];
    $image_name = $_POST['image'];
    $lastedited = date("Y-m-d H:i:s");
    if(isset($_FILES['image']['name'])){

        $image_name = $_FILES['image']['name'];

            if($image_name != ""){

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

                if($current_image != "") {
                    $remove_path = "images/news/".$current_image;
                    $remove = unlink($remove_path);
    
                    if($remove == FALSE){
                        $_SESSION['remove'] = "<div class='message warning'>Failed To Remove Current Image. Try Again Later.</div>";
                        header("Location: carousel.php");
                        die();
                    }
                }
            } else {
                $image_name = $current_image;
            }
        } else {
            $image_name = $current_image;
        }

    $sql = "UPDATE news SET news_title = '$newstitle', news_description = '$description', news_content = '$newscont', news_img = '$image_name' WHERE news_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $_SESSION['update'] = "<div class='message success'>Details Updated Successfully!</div>";
        $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
        $result = mysqli_query($conn, $log);
        header("Location: carousel.php");
    } else {
        $_SESSION['update'] = "<div class='message warning'>Failed To Update Details. Try Again Later.</div>";
        header("Location: carousel.php");
    }
}

if (isset($_POST['editprize'])) {
    $time = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $activity = "Updated Prize";
    $id = $_POST['id'];
    $prizen = $_POST['pname'];
    $description = $_POST['pdesc'];
    $peso = $_POST['ppeso'];
    $price = $_POST['ppoints'];
    $image_name = $_POST['image'];
    $current_image = $_POST['current_image'];
    if(isset($_FILES['image']['name'])){

       $image_name = $_FILES['image']['name'];

           if($image_name != ""){

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

               if($current_image != "") {
                   $remove_path = "images/prize/".$current_image;
                   $remove = unlink($remove_path);
   
                   if($remove == FALSE){
                       $_SESSION['remove'] = "<div class='message warning'>Failed To Remove Current Image. Try Again Later.</div>";
                       header("Location: carousel.php");
                       die();
                   }
               }
           } else {
               $image_name = $current_image;
           }
       } else {
           $image_name = $current_image;
       }

    $sql = "UPDATE prizes SET prizename = '$prizen', pesos = '$peso' , pdescription = '$description', points = '$price', prize_img = '$image_name' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $_SESSION['update'] = "<div class='message success'>Details Updated Successfully!</div>";
        $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
        $result = mysqli_query($conn, $log);
        header("Location: carousel.php");
    } else {
        $_SESSION['update'] = "<div class='message warning'>Failed To Update Details. Try Again Later.</div>";
        header("Location: carousel.php");
    }
}

// DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // // DELETE // DELETE // DELETE //
// DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // // DELETE // DELETE // DELETE //
// DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // // DELETE // DELETE // DELETE //
// DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // // DELETE // DELETE // DELETE //
// DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // DELETE // // DELETE // DELETE // DELETE //

if(isset($_POST['deletegarbage'])){
    $id = $_POST['gid'];
    $image_name = $_POST['gimg'];
    if ($image_name != "") {
        $path = "images/garbage/".$image_name;
        $remove = unlink($path);

        if ($remove == FALSE) {
            echo "<meta http-equiv='refresh' content='0'";
            die();
        }
    }
    $sql = "DELETE FROM garbagetype WHERE garbage_ID = $id";
    $result = mysqli_query($conn, $sql);

    if($result == TRUE) {
        $_SESSION['delete'] = "<div class='message success'>Removed Successfully!</div>";
        $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
        $result = mysqli_query($conn, $log);
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        $_SESSION['delete'] = "<div class='message warning'>Failed To Remove. Try Again Later.</div>";
    }
}

if(isset($_POST['deletenews']))
{
    $id = $_GET['ID'];
    $image_name = $_GET['Image_Name'];

    if ($image_name != "") {
        $path = "images/news/".$image_name;
        $remove = unlink($path);
    }
    $sql = "DELETE FROM news WHERE news_id = $id";
    $result = mysqli_query($conn, $sql);

    if($result == TRUE) {
        $_SESSION['delete'] = "<div class='message success'>Removed Successfully!</div>";
        $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
        $result = mysqli_query($conn, $log);
        header("Location: carousel.php");
    } else {
        $_SESSION['delete'] = "<div class='message warning'>Failed To Remove. Try Again Later.</div>";
    }
}

if(isset($_POST['deletemember']))
{

}

if(isset($_POST['deleteprize']))
{
    
}

if(isset($_POST['deletelog']))
{
    
}

if(isset($_POST['deletealllog']))
{
    
}

if(isset($_POST['deletetemplog']))
{
    
}

if(isset($_POST['deletealltemplog']))
{
    
}
?>