
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

//Redirect to index if useri sn't logged in
session_start();
if (!(isset($_SESSION['UserName']) || isset($LoginPage)))
header("Location: http://cs.wheaton.edu/~kayley.lane/index.php");

//connect
$mysqli=mysqli_connect("csdb.wheaton.edu","kayley_lane", "82606", "Csci371FruitRoad");
if (mysqli_connect_error())
    die("Failed to connect - " . mysqli_connect_error());

?>
