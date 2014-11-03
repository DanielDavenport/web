<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php include_once "head.php" ?>
   
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<title> An Assortment of Fruits </title>
<link rel="shortcut icon" href="http://www.juicebeauty.com/store/media/juice-beauty/ingredients/organic-pomegranate.jpg">

 <!-- JQUERY -->
<script src="http://code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?fam
ily=Oswald">
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='st
ylesheet' type='text/css'>
<style type="text/css">

body{
    background-color:#ffffff;
    font-family: arial;
    color:#2f2f2f;
}

#contain2{
    margin-left:auto; margin-right:auto;
    text-align: center; 
    font-size:10px;
    color:#3d3d3d;
    padding-top:10px;
    padding-left:10px;
    padding-right:10px;
    padding-bottom:10px;
    background-color: transparent;
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
    border-radius:50px;
    padding-top:2px; padding-bottom:2px;
    text-align:center;
    width:240px; margin-left:5px;
    color:#cccccc;
    background-color: #2f2f2f;
}

h3{
    font-family:oswald;
    text-align:center;
    font-size:24px;
    color:#000000;
}

.icon:hover{
    cursor: crosshair;
}
    
.shortDescription{
   height: 50px; width: 70px; overflow: auto;
   font-size: 10px; color: #757575;
}   


</style><meta http-equiv="x-dns-prefetch-control" content="off"/><script type="text/javascript" src="http://assets.tumblr.com/assets/scripts/tumblelog.js?_v=83c002e9bd947a7c3a044efdde3ef9c0"></script><meta http-equiv="x-dns-prefetch-control
" content="off"/></head>

<body>
<div id="contain2">
<div id="title">Products</div>
<div id="underneath">
<a href="Splash.php">home</a> </div>
<?php
$QryStr = "SELECT * FROM Products WHERE inStock = '0'";
include_once "getproducts.php";

//Display products.
    echo "<TABLE ALIGN='center'><TR>";
    $i = 0;
    global $result;
    foreach($result as $Object){
        $iden = $Object->pid; 
        echo "<TD><CENTER>";
        echo "<BR><a href='Product.php?productid=" . $iden ."'><img src='" . $Object -> thumbnailUrl . "' width='100px' align='left' class='icon'></a></TD><TD>";
        echo (is_null($Object->name) ? "&nbsp;here" : $Object->name);
        echo "<BR><B> $" . ($Object->price) . "</B>";
        echo "<BR><div class='shortDescription'>" . $Object -> shortDescription . "</div>";
        echo "</TD></CENTER>";
        $i++;
        if($i % 4 == 0) echo "</TR><TR>";
    }
    echo "</TABLE>";

?>
</div>

</body>
</html>
