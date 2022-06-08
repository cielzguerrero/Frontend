<?php
header("Content-type:application/json;");
include_once("function.php");
$conn = connect();

$array = array("name" => "bruh");



if(isset($_GET['limit']))
{
    $users = display_users($conn, $_GET['limit']);
    echo json_encode($users);
}
if(isset($_GET['id']))
{
    $user = get_single_user($conn, $_GET['id']);
    echo json_encode($user);
}
if(isset($_GET['search'])){
    $users = search_user($conn, $_GET['search']);
    echo json_encode($users);
}
if(isset($_POST['submit'])){
    $result = add_user($conn, $_POST);
    echo json_encode($result);
}
if($_SERVER['REQUEST_METHOD'] == "DELETE"){
    //$result = delete_user($conn, $id);
    $result = "okayz";
    echo json_encode($result);
}
?>