<?php

include_once "head.php";

$_SESSION['fullname'] = $_POST['fullname'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['shipAddress'] = $_POST['shipAddress'];
$_SESSION['billAddress'] = $_POST['billAddress'];
$_SESSION['password'] = $_POST['password'];

    if( $pname == "" || ctype_space ($pname) ) 
        header("Location: editproducts.php");
    else{
        // Insert row
        $QryStr = "INSERT INTO Customer (password, shipAddress, billAddress, email, name) 
        VALUES ($_SESSION['password'], $_SESSION['shipAddress'], $_SESSION['billAddress'], $_SESSION['email'], $_SESSION['fullname'])";
        mysqli_query($mysqli,$QryStr) or
            die("Failed query - $QryStr\n" . mysqli_error($mysqli));
       header("Location: Splash.php");
    }


?>
