
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waste Management</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="clogin">
    <section class="login">
        <div class="login-container">
            <h2 class="text-center text-white">Login</h2>
            <br>
            <br>
            <form action="" class="text-center" method="post">
            <input type="text" name="username" id="username" placeholder="Username" autocomplete="off" required>
            <br>
            <br>
            <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
            <br>
            <br>
            <input type="submit" name="submit" value="Login" class="btn-primary">
            </form>
            <br>
            <?php

include ('connections/connection.php');

if(isset($_POST['submit'])){

    $username = mysqli_real_escape_string($conn, $_POST['username']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']); 

    $sql = "SELECT * FROM members WHERE username = '$username' AND password = '$password'";
    
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $fullname = $row['fullname'];
    $status = $row['status'];
    $id = $row['id'];
    if ($count == 1) {
        if ($status == "Admin")
        {
        $_SESSION['login'] = "<div class='message success'>Logged In Successfully!</div>";
        $_SESSION['username'] = $username;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['status'] = $status;
        header("Location: admin/index.php");  
        }
        else if($status == "Member")
        {
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            header("Location: main.php");
        }
    } else {
        $_SESSION['login'] = "<div class='message warning'>Incorrect Username or Password.</div>";
    }
}

if (isset($_SESSION['login'])){

    echo $_SESSION['login'];
    unset($_SESSION['login']);
}

?>
        </div>
    </section>
</div>
</article>
</body>
</html>