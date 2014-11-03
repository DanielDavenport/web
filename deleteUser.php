<?php
include_once "head.php";
$name = $_POST["delete"];
$QryStr = "DELETE FROM User WHERE name ='" . $name . "'";
$Results = mysqli_query($mysqli, $QryStr) or
    die("Failed Query $QryStr: " . mysqli_error($mysqli));
include_once "editUsers.php";
?>
