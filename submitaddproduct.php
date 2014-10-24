<!-- Add a single product to the database. -->
<?php
    include_once "head.php";

    $pname = addslashes($_POST['aname']);
    $pprice = addslashes($_POST['aprice']);
    $pweight = addslashes($_POST['aweight']);
    $picon = addslashes($_POST['aicon']);
    $pimage = addslashes($_POST['aimage']);
    $pshort = addslashes($_POST['ashort']);
    $plong = addslashes($_POST['along']);

    if( !isset( $_POST['aname']) )
        header("Location: /");

    // Insert row
    $QryStr = "INSERT INTO Products (name, shortDescription, longDescription, thumbnailUrl, imageUrl, price, weight) 
    VALUES ('$pname', '$pshort', '$plong', '$picon', '$pimage', '$pprice', '$pweight')";

    mysqli_query($mysqli,$QryStr) or
        die("Failed query - $QryStr\n" . mysqli_error($mysqli));

    header("Location: editproducts.php");

?>
