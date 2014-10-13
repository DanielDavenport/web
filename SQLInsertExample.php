<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

//connect
$mysqli=mysqli_connect("csdb.wheaton.edu","kayley_lane", "82606", "Csci371FruitRoad");
if (mysqli_connect_error())
    die("Failed to connect - " . mysqli_connect_error());

// Find out last inserted ID
$LastID = mysqli_insert_id($mysqli);
echo "Last interted id is $LastID <br>";

$nextID = $LastID+1;

// Insert row
$QryStr = "INSERT INTO Products (pid, name, shortDescription, longDescription, thumbnailUrl, imageUrl, price, weight) VALUES ('$nextID', 'Apple', 'A plump apple', 'Need to pass a class? An apple a day keeps the F away! Comes in red, purple, and orange!', 'http://nutrionomics.com/images/Fruit_a_to_z/fruit_a_z_apple.jpg', 'http://www.syracusenewtimes.com/wp-content/uploads/2014/09/apple-e1382039006457.jpg', '.5', '.4')";

mysqli_query($mysqli,$QryStr) or
    die("Failed query - $QryStr\n" . mysqli_error($mysqli));

//display
$QryStr = "SELECT * FROM Products";
$Results = mysqli_query($mysqli, $QryStr) or
    die("Failed Query $QryStr: " . mysqli_error($mysqli));

echo "<TABLE><TR><TH>Product Name</TH><TH>Product ID</TH></TR>";
while ($Object = mysqli_fetch_object($Results))
    echo "<TR><TD>". (is_null($Object->name) ? "&nbsp;here" : $Object->name) . "</TD><TD>$Object->pid</TD></TR>";
echo "</TABLE>";

?>
