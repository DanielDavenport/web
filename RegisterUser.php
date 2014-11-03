<?php

session_start();
$_SESSION['fullname'] = $_POST['fullname'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];
header("Location: Splash.php");
?>
