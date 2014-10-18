<!-- JQUERY -->
<script src="//code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script
>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js" type="text/javascript"></script>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

//Redirect to index if useri sn't logged in
//session_start();
//if (!(isset($_SESSION['UserName']) || isset($LoginPage)))
//header("Location: http://cs.wheaton.edu/~kayley.lane/index.php");

//connect
$mysqli=mysqli_connect("csdb.wheaton.edu","kayley_lane", "82606", "Csci371FruitRoad");
if (mysqli_connect_error())
    die("Failed to connect - " . mysqli_connect_error());

?>


<head>
<title> blonic original character do not steal </title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<link rel="shortcut icon" href="http://i1144.photobucket.com/albums/o488/incarce
rempb/Icons/MonsterGirls/tinycyclops.png">
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


.section{
    display:inline-block;
    width:710px; padding:5px 5px 5px 5px; background:transparent;
    height:700px; overflow-x:auto; overflow-y:auto;
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

.divider{
        width: 300px;
        margin-top: 5px;
        margin-bottom: 5px;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-color: #cccccc;
}
    
 #navigation{
    font-size:16px;
    width: 100%;
    height: 25px;
    padding-top: 5px;
    text-align: center;
    background-color: #000000;
    -webkit-border-bottom-right-radius: 50px;
-webkit-border-bottom-left-radius: 50px;
-moz-border-radius-bottomright: 50px;
-moz-border-radius-bottomleft: 50px;
border-bottom-right-radius: 50px;
border-bottom-left-radius: 50px;     
}
    
#navigation a{
        margin-left: 35px;
        color: #cccccc;
        font-family: Verdana;
        font-style: italic;
    }
    
#navigation a:hover{
        color: #ffffff;
    }


</style></head>

<body>

    <div id="navigation">
    
        <a href="/">home
        <img src="https://openclipart.org/image/800px/svg_to_png/14720/abadr_Highway.png" height="20px"></a>
        <a href="/">account
        <img src="http://png-2.findicons.com/files/icons/1254/flurry_system/128/users.png" height="20px"></a>
        <a href="/">products
        <img src="http://pngimg.com/upload/cherry_PNG623.png" height="20px"></a>
        <a href="/">cart
        <img src="http://www.robmcintosh.ca/images/shoppingCart.png" height="20px"></a>
    
    </div>

<div id="contain2">

<div id="title">Product</div>
<div id="underneath">
<a href="/">home</a></div>

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

echo "<form id = 'buyer' action='addtocart.php' method='POST' style='float:right'>

        <CENTER>
        <img src='http://www.inmotionhosting.com/support/images/stories/icons/ecommerce/empty-cart-dark.png' width='50px' align='right'>
        <label for='addtocart'>Qty:</label>
        <INPUT type='number' name='quantity' id='addtocart' class ='text ui-widget-content ui-corner-all' style='width:50px;' min='1'  max='9999' value='1' ><br>
        <button><div style='font-size:10px; color:#666666'>ADD TO CART.</div></button> 
        <Input type='text' name='productid' value='$productid' style='display:none'>
        </CENTER>

      </form>";

echo "</TD></TR></TABLE>";

?>



</div>



</body>
</html>
