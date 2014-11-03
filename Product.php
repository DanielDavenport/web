<!-- JQUERY -->
<script src="//code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script
><script src="//code.jquery.com/ui/1.10.4/jquery-ui.js" type="text/javascript"></script>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php
include_once "head.php";
?>

<title> Buy me! </title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<link rel="shortcut icon" href="http://ecigepoch.com/images/mango-ejuicem.png">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?fam
ily=Oswald">
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='st
ylesheet' type='text/css'>

<style type="text/css">

::-webkit-scrollbar-thumb:vertical {background-color:#ffffff;height:15px;}
::-webkit-scrollbar {height:0px;width:1px;background-color:#ffffff;}

a:link { color: #000000; text-decoration: none}
a:visited { color: #000000; text-decoration: none}
a:hover { color: #2c2c2c; text-decoration:none}
a:active { color: #000000; text-decoration: none}

body{
    background-color:#ffffff;
    font-family: verdana;
    color:#2f2f2f;
    font-size: 11px;
}

#contain2{
    text-align: center; 
    margin-top:50px;
    font-size:10px;
    color:#3d3d3d;
    padding-top:10px;
    padding-left:10px;
    padding-right:10px;
    padding-bottom:10px;
    background-color: transparent;
}
    
#contain2 img{
    max-width:  500px;    
}

#contain2 h2{
    font-family:Lato;
    font-size:16px;
    letter-spacing:-1px;
    text-transform:uppercase;
    font-style:italic;
}

#title{
    font-family:Lato;
    font-size:20px;
    letter-spacing:2px;
    text-transform:uppercase;
    text-decoration:underline;
}

#underneath{
    font-family:verdana;
    font-size:9px;
    letter-spacing:2px;
    text-transform:uppercase;
}
#underneath a{
    color:#000000;
}

#underneath a:hover{
    font-style:italic;
}
h1{
    font-size:14px; font-style:italic; font-family:georgia;
    padding-top:2px; padding-bottom:2px;
    text-align:center;
    color:#cccccc;
    display: inline;
}
h3{
    font-family:oswald;
    text-align:center;
    font-size:24px;
    color:#000000;
}

#longDescription{
   max-height: 400px; width: 300px; overflow: auto;
   font-size: 11px; color: #757575;
}
</style></head>
<body>

<div id="contain2">

<div id="title">Product</div>
<div id="underneath">
<a href="Splash.php">home</a></div>

<?php

if(isset($_GET['productid']))
{
    $productid = $_GET['productid'];

} else {
    $productid = 0;
}

$QryStr = "SELECT * FROM Products WHERE pid = $productid";
$Results = mysqli_query($mysqli, $QryStr) or
    die("Failed Query $QryStr: " . mysqli_error($mysqli));

$Product = mysqli_fetch_object($Results);
echo "<TABLE ALIGN='CENTER'><TR><TD>";
echo "<BR><IMG SRC='" . ($Product->imageUrl) . "'>";
echo "</TD><TD style='padding-left:20px'>";
echo "<H3>" . ($Product->name) . "</H3><div class='divider'></div>";
echo ($Product->shortDescription) . "<div class='divider'></div>";
echo"<H1>Price:</H1> $" . ($Product->price) . "<div class='divider'></div>";
echo"<H1>Weight:</H1> " . ($Product->weight) . " kg. <div class='divider'></div>";
echo "<H1>Product Details:</H1><DIV ID='longDescription'>" . $Product->longDescription . "</DIV> <div class='divider'></div>";

//ProductID invisible to post variable to next page?
echo "  <form id = 'buyer' action='addtocart.php' method='POST' style='float:right'>
        <CENTER>
        <Input type='text' name='productid' value='$productid' style='display:none'>";
?>

<img src='http://www.inmotionhosting.com/support/images/stories/icons/ecommerce/empty-cart-dark.png' width='50px' align='right'>
<label for='addtocart'>Qty:</label>
<INPUT type='number' name='quantity' id='addtocart' class ='text ui-widget-content ui-corner-all' style='width:50px;' min='1'  max='9999' value='1' ><br>
<INPUT type='submit' id='addOrder'style='font-size:10px; color:#666666' value='ADD TO CART' onclick="return confirm('Are you sure you want to add this to your cart?');"> 
</CENTER>
</form>
</TD></TR></TABLE>
</div>
</body>
</html>
