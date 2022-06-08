<?php
define("USER_DATABASE", "test");
define("USER_TABLE", "userdata");
function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    $conn = new mysqli($servername, $username, $password, USER_DATABASE);

    if($conn->connect_error)
    {
        die("fuck you ".$conn->connect_error);
    } else {
        return $conn;
    }
}

function display_users($conn)
{
    $sql = "SELECT * FROM ".USER_TABLE." ORDER BY firstname ASC";
    $users = $conn->query($sql) or $conn->error;
    $num_rows = $users->num_rows;
    $rows = $users->fetch_all();

    if($num_rows > 0)
    {
        return $rows;
    } else {
        return false;
    }
}

function get_single_user($conn, $id){
    $sql = "SELECT * FROM ".USER_TABLE." WHERE id = $id";
    $user = $conn->query($sql) or $conn->error;
    $num_rows = $user->num_rows;
    $row = $user->fetch_assoc();
    
    if($num_rows . 0){
        return $row;
    }else{
        return false;
    }
}

function search_user($conn, $term){
    $sql = "SELECT * FROM ".USER_TABLE." WHERE firstname LIKE '%$term%'";
    $users = $conn->query($sql) or $conn->error;
    $num_rows = $users->num_rows;
    $row = $users->fetch_all();
    
    if($num_rows . 0){
        return $row;
    }else{
        return false;
    }
}

function add_user($conn, $data){
    $firstname = $conn->real_escape_string($data['first_name']);
    $lastname = $conn->real_escape_string($data['last_name']);
    $email = $conn->real_escape_string($data['email']);
    $gender = $conn->real_escape_string($data['gender']);

    $sql = "INSERT INTO ".USER_TABLE." (`first_name`, `last_name`, `email`, `gender`) VALUES ('$firstname','$lastname','$email','$gender')";
    
    if($conn->query($sql) === TRUE){
        return "success";
    }else{
        return $conn->error;
    }
    $conn->close();
}

function delete_user($conn, $id){
    $sql = "DELETE FROM".USER_TABLE."WHERE id = $id";

    if($conn->query($sql) === TRUE){
        return "pak u";
    }else{
        return $conn->error;
    }

    $conn->close();
}
?>