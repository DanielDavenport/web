<?php

session_start();
$_SESSION['username'] = $_POST['username'];
header("Location: Splash.php");
?>
