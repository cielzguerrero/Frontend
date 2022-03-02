<?php

session_start();

session_unset($_SESSION['username']);
session_unset($_SESSION['id']);
session_unset($_SESSION['fullname']);
session_unset($_SESSION['status']);

session_destroy();

header("Location: index.php");

?>