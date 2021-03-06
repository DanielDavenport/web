<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<?php include_once "head.php" ?>
   
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<title> Edit Products </title>

 <!-- JQUERY -->
<script src="http://code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $("#submiteditproducts").button();
        $("#submitaddproduct").button();
        $("#showaddproduct").button();
        $("#showeditproducts").button();
        $("#addproductform").hide();

        $("#showaddproduct").click(function () {
            $("#addproductform").toggle(300);
        });
        $("#showeditproducts").click(function () {
            $("#editproductsform").toggle(300);
        });
        $("#bottomlogo").append("<div id='bottomscroll'>Scroll Down</div>");
        $("#bottomscroll").click(function () {
            window.scrollTo(0,document.body.scrollHeight);
        });

    });
</script>
    <!-- CSS -->
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

#bottomscroll{
    background-color:#cccccc; border-radius:50px; text-align:center; padding-top:2px; padding-bottom:2px; margin-top:2px; font-size:10px; text-transform:uppercase; font-weight:bold;
}

#bottomscroll:hover{
    cursor: crosshair;
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
    
#contain2 label, input{
    font-size: 11px; 
}


.title{
    font-family:Lato;
    font-size:20px;
    letter-spacing:2px;
    text-transform:uppercase;
    text-decoration:underline;
}

.underneath{
    font-family:verdana;
    font-size:9px;
    letter-spacing:2px;
    text-transform:uppercase;
}
    
.underneath a{
    color:#000000;
}

.underneath a:hover{
    font-style:italic;
}

    
</style><meta http-equiv="x-dns-prefetch-control" content="off"/><script type="text/javascript" src="http://assets.tumblr.com/assets/scripts/tumblelog.js?_v=83c002e9bd947a7c3a044efdde3ef9c0"></script><meta http-equiv="x-dns-prefetch-control
" content="off"/></head>

<body>
<div id="contain2">
<div class="title"> Add Products</div>
<div class="underneath">
<!-- SHOULD LINK TO ADMIN EDIT PAGE! -->
<a href="Splash.php">back</a> </div>
<button id="showaddproduct">SHOW/HIDE</button>

<FORM action="submitaddproduct.php" METHOD="POST" id="addproductform">
    <TABLE ALIGN="center" style="font-size:10px"><TR><td>
<label>Name:</label></TD><TD>
<input type="text" name="aname" class ='text ui-widget-content ui-corner-all' maxlength='50'></TD></TR><TR><TD>
<label>Price:</label></TD><TD>
<input type="text" name="aprice" class ='text ui-widget-content ui-corner-all' maxlength='10'></TD></TR><TR><TD>
<label>Weight:</label></TD><TD>
<input type="text" name="aweight" class ='text ui-widget-content ui-corner-all' maxlength='10'></TD></TR><TR><TD>
<label>Icon URL:</label></TD><TD>
<input type="text" name="aicon" class ='text ui-widget-content ui-corner-all'></TD></TR><TR><TD>  
<label>Image URL:</label></TD><TD>
<input type="text" name="aimage" class ='text ui-widget-content ui-corner-all'></TD></TR><TR><TD>        
<label>Desc(Short):</label></TD><TD>
<input type="text" name="ashort" class ='text ui-widget-content ui-corner-all'></TD></TR><TR><TD>          
<label>Desc(Long):</label></TD><TD>
<textarea rows="4" style="resize: none; width:136px;" name="along" class ='text ui-widget-content ui-corner-all'></textarea>
    </td></tr></TABLE>
    <button id="submitaddproduct">Add Product</button>
</FORM>

<br><br><div class="title">Edit Products</div>
<div class="underneath">
<!-- SHOULD LINK TO ADMIN EDIT PAGE! -->
<a href="Splash.php">back</a> </div>
<button id="showeditproducts">SHOW/HIDE</button>
<div id="editproductsform">
<?php

$QryStr = "SELECT * FROM Products";
include_once "getproducts.php";

//Display products.
    echo "<FORM action='submiteditproducts.php' METHOD='POST'><TABLE ALIGN='center' style'font-size:10px'><TR>";
    $i = 0;
    foreach($result as $Object){
        if($Object->inStock == '1'){
	 $selected = "checked";
	 $permissions = "readonly";
        }
        else{
	 $selected = "";
	 $permissions = "";
        }

        $iden = $Object->pid; 
        echo "<input type='text' name='fpid[]' style='display:none' value='$iden'>";
        echo "<TD>";
        echo "<BR><img src='" . $Object -> thumbnailUrl . "' width='100px' align='left' class='icon'></TD><TD>";
        echo "<TABLE><TR><TD>";
        $name = htmlspecialchars((is_null($Object->name) ? "&nbsp;here" : $Object->name));
        $shortDescription = htmlspecialchars(($Object -> shortDescription));
        $longDescription = htmlspecialchars(($Object -> longDescription));
        echo "<label for='fname'>Name:</label></TD><TD>";
        echo '<input type="text" name="fname[]" id="fname" class ="text ui-widget-content ui-corner-all" maxlength="50" value="' . $name .'" $permissions>';
        echo "</TD></TR><TR><TD>
                <label for='fname'>Price:</label></TD><TD>
                <input type='text' name='fprice[]' id='fprice' class ='text ui-widget-content ui-corner-all' maxlength='10' value='" 
                . ($Object->price) . "' $permissions></input>";
        echo "</TD></TR><TR><TD>
                <label for='fweight'>Weight:</label></TD><TD>
                <input type='text' name='fweight[]' id='fweight' class ='text ui-widget-content ui-corner-all' maxlength='10' value='" 
                . ($Object->weight) . "' $permissions></input>";
        echo "</TD></TR><TR><TD>
                <label for='ficon'>Icon:</label></TD><TD>
                <input type='text' name='ficon[]' id='ficon' class ='text ui-widget-content ui-corner-all' value='" 
                . ($Object->thumbnailUrl) . "' $permissions></input>";
        echo "</TD></TR><TR><TD>
                <label for='fimage'>Image:</label></TD><TD>
                <input type='text' name='fimage[]' id='fimage' class ='text ui-widget-content ui-corner-all' value='" 
                . ($Object->imageUrl) . "' $permissions></input>";
        echo '</TD></TR><TR><TD>
                <label for="fshort">Desc(Short):</label></TD><TD>
                <input type="text" class ="text ui-widget-content ui-corner-all" name="fshort[]" id="fshort" value="' . $shortDescription . '" $permissions></TD></TR>';
        echo '</TD></TR><TR><TD>
                <label for="flong">Desc(Long):</label></TD><TD>
                <input type="text" class ="text ui-widget-content ui-corner-all" name="flong[]" id="flong" value="' . $longDescription . '" $permissions></TD></TR>';        
        echo "<TR><TD>
            <input type='checkbox' name='delete[]' id='delete' value='$i' $selected><b>Delete?</b><br>";
        echo "</TR></TD></TABLE>";

        echo "</TD>";
        //Line break after every i fruit.
        $i++;
        if($i % 3 == 0) echo "</TR><TR>";
    }
    echo "</TABLE>";
    echo "<button  id='submiteditproducts'>SUBMIT</button>";
    echo "</FORM>";


?>
</div></div>

</body>
</html>
