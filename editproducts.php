

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<?php include_once "head.php" ?>
   
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<title> blonic original character do not steal </title>
<link rel="shortcut icon" href="http://i1144.photobucket.com/albums/o488/incarce
rempb/Icons/MonsterGirls/tinycyclops.png">

 <!-- JQUERY -->
<script src="http://code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $("#submiteditproducts").button();
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

.icon:hover{
    cursor: crosshair;
}
    
</style><meta http-equiv="x-dns-prefetch-control" content="off"/><script type="text/javascript" src="http://assets.tumblr.com/assets/scripts/tumblelog.js?_v=83c002e9bd947a7c3a044efdde3ef9c0"></script><meta http-equiv="x-dns-prefetch-control
" content="off"/></head>

<body>
<div id="contain2">
<div id="title">Edit Products</div>
<div id="underneath">
<!-- SHOULD LINK TO ADMIN EDIT PAGE! -->
<a href="/">back</a> </div>
<?php
include_once "getproducts.php";

//Display products.
    echo "<FORM action='submiteditproducts.php' METHOD='POST' id='editproductform'><TABLE ALIGN='center' style'font-size:10px'><TR>";
    $i = 0;
    foreach($result as $Object){
        $iden = $Object->pid; 
        echo "<input type='text' name='fpid[]' style='display:none' value='$iden'>";
        echo "<TD>";
        echo "<BR><img src='" . $Object -> thumbnailUrl . "' width='100px' align='left' class='icon'></TD><TD>";
        echo "<TABLE><TR><TD>";
        $name = (is_null($Object->name) ? "&nbsp;here" : $Object->name);
        echo "<label for='fname'>Name:</label></TD><TD>";
        echo "<input type='text' name='fname[]' id='fname' class ='text ui-widget-content ui-corner-all' maxlength='50' value='" . $name ."'>";
        echo "</TD></TR><TR><TD>
                <label for='fname'>Price:</label></TD><TD>
                <input type='text' name='fprice[]' id='fprice' class ='text ui-widget-content ui-corner-all' maxlength='10' value='" 
                . ($Object->price) . "'></input>";
        echo "</TD></TR><TR><TD>
                <label for='fweight'>Weight:</label></TD><TD>
                <input type='text' name='fweight[]' id='fweight' class ='text ui-widget-content ui-corner-all' maxlength='10' value='" 
                . ($Object->weight) . "'></input>";
        echo "</TD></TR><TR><TD>
                <label for='ficon'>Icon:</label></TD><TD>
                <input type='text' name='ficon[]' id='ficon' class ='text ui-widget-content ui-corner-all' value='" 
                . ($Object->thumbnailUrl) . "'></input>";
        echo "</TD></TR><TR><TD>
                <label for='fimage'>Image:</label></TD><TD>
                <input type='text' name='fimage[]' id='fimage' class ='text ui-widget-content ui-corner-all' value='" 
                . ($Object->imageUrl) . "'></input>";
        echo "</TD></TR><TR><TD>
                <label for='fshort'>Desc(Short):</label></TD><TD>
                <input type='text' class ='text ui-widget-content ui-corner-all' name='fshort[]' id='fshort' value='" . $Object -> shortDescription . "'></TD></TR>";
        echo "</TD></TR><TR><TD>
                <label for='flong'>Desc(Long):</label></TD><TD>
                <input type='text' class ='text ui-widget-content ui-corner-all' name='flong[]' id='flong' value='" . $Object -> longDescription . "'></TD></TR>";        
        echo "<TR><TD>
            <input type='checkbox' name='delete[]' id='delete' value='$iden'><b>Delete?</b><br>";
        echo "</TR></TD></TABLE>";

        echo "</TD>";
        //Line break after every i fruit.
        $i++;
        if($i % 3 == 0) echo "</TR><TR>";
    }
    echo "</TABLE>";
    echo "<button id='submiteditproducts'>SUBMIT</button>";
    echo "</FORM>";

?>
</div>

</body>
</html>
