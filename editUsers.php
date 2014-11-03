
<?php include_once "head.php" ?>
<title> Edit Users </title>
<?php
$products = array();
$result = array();
$QryStr = "SELECT * FROM User";


$Results = mysqli_query($mysqli, $QryStr) or
    die("Failed Query $QryStr: " . mysqli_error($mysqli));

while ($Obj = mysqli_fetch_object($Results)){
        array_push($products, $Obj);
}
echo "<p> USERS</p>";

$result = $products;
 echo "<p> ----------------- </p>";
foreach($result as $Object){
	$name = $Object -> name;
	echo "<FORM METHOD='POST' ACTION='deleteUser.php'> <p>" . $name ."</p> <INPUT TYPE='submit' VALUE='Delete'> <input type='hidden' name='delete' value='" . $name ."'></FORM>";
}
 echo "<p> ----------------- </p>";
?>
