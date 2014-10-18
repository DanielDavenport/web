
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
   
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<title> blonic original character do not steal </title>
<link rel="shortcut icon" href="http://i1144.photobucket.com/albums/o488/incarce
rempb/Icons/MonsterGirls/tinycyclops.png">

 <!-- JQUERY -->
<script src="http://code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js" type="text/javascript"></script>

<script type="text/javascript">

    $(function () {

    });


</script>
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
font-family: arial;
color:#2f2f2f;
}


#contain2{
margin-left:auto; margin-right:auto;
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
<a href="/">home</a> | <a href="/ask">ask</a><br><div style="text-transform:lowercase; letter-spacing:1.5px"></div></div>


<?php

$products = array();
$result = array();
$searchtext = "";
$displaytext = "";

$QryStr = "SELECT * FROM Products";
$Results = mysqli_query($mysqli, $QryStr) or
    die("Failed Query $QryStr: " . mysqli_error($mysqli));


while ($Obj = mysqli_fetch_object($Results)){
        array_push($products, $Obj);
}
$result = $products;

if(isset($_GET['search']))
{
    $search = $_GET['search'];
    if($search == "" || ctype_space ($search)){
        unset($search);
    }
    else{
        $searchtext = $search;
        search();
    }
}

if(isset($_GET['displaymode']))
{
    $displaymode = $_GET['displaymode'];
    $displaytext = $displaymode;
    fixMode();

} else {
    $displaymode = "standard";
}


function fixMode(){
    global $result;
    global $products;
    global $displaymode;
    if (strcmp ( $displaymode , "standard" ) == 0){
        
    }else if(strcmp ( $displaymode , "alphabetical" ) == 0){
        $result = sortArrayofObjectByProperty( $result, "name" );
    }else if(strcmp ( $displaymode , "reversedalphabetical" ) == 0){
        $result = array_reverse (sortArrayofObjectByProperty( $result, "name" ));
    }else if(strcmp ( $displaymode , "price" ) == 0){
        $result = sortArrayofObjectByProperty( $result, "price" );
    }else if(strcmp ( $displaymode , "weight" ) == 0){
        $result = sortArrayofObjectByProperty( $result, "weight" );
    }else{
        unset($displaymode);
    }
}


function search(){
    global $result;
    global $products;
    $result = array();
    global $search;
    foreach($products as $Object){
        //Find all occurances of the search string in our product database. 
        if(strpos(strtolower ($Object->name), strtolower($search)) !== FALSE){
            array_push($result, $Object);
        }
    }
}

//Display the search form.

$sortoptions = array(
    "standard" => "Mysterious",
    "alphabetical" => "Alphabetical (A-Z)",
    "reversedalphabetical" => "Alphabetical (Z-A)",
    "price" => "Price",
    "weight" => "Weight"
);


echo "<BR><form id = 'searcher' action='' method='get'>

    <fieldset>
        <label for='searchbar'>Search:</label>
        <input type='text' name='search' id='searchbar' class ='text ui-widget-content ui-corner-all' maxlength='40' value='" . $searchtext . "'>

        <label for='displaymode'>Sort by:</label>
        <select name='displaymode' id='displaymode' class='text ui-widget-content ui-corner-all'>";


foreach( $sortoptions as $var => $interest ){
    $isselected = "";
    if(strcmp ( $var , $displaytext ) == 0){
        $isselected = "selected = 'selected'";
     }
                echo "<option value = '$var' $isselected> $interest </option>";
        }
echo "
        </select>

        <button id='searchbutton'  class ='text ui-widget-content ui-corner-all' >Go!</button>
    </fieldset>

</form> ";


//Display products.
    echo "<TABLE ALIGN='center'><TR>";
    $i = 0;
    global $result;
    foreach($result as $Object){
        $iden = $Object->pid; 
        echo "<TD><CENTER>";
        echo "<BR><a href='PHPPage.php?productid=" . $iden ."'><img src='" . $Object -> thumbnailUrl . "' width='100px' align='left' class='icon'></a></TD><TD>";
        echo (is_null($Object->name) ? "&nbsp;here" : $Object->name);
        echo "<BR><B> $" . ($Object->price) . "</B>";
        echo "<BR><div class='shortDescription'>" . $Object -> shortDescription . "</div>";
        echo "</TD></CENTER>";
        $i++;
        if($i % 4 == 0) echo "</TR><TR>";
    }
    echo "</TABLE>";

/**
* Sort one array of objects by one of the object's property
*
* @param mixed $array, the array of objects
* @param mixed $property, the property to sort with
* @return mixed, the sorted $array
* by http://www.mabishu.com/blog/2011/02/03/sort-an-array-of-objects-by-one-of-the-object-property-with-php/
*/
function sortArrayofObjectByProperty( $array, $property )
{
    $cur = 1;
    $stack[1]['l'] = 0;
    $stack[1]['r'] = count($array)-1;

    do
    {
        $l = $stack[$cur]['l'];
        $r = $stack[$cur]['r'];
        $cur--;

        do
        {
            $i = $l;
            $j = $r;
            $tmp = $array[(int)( ($l+$r)/2 )];

            // split the array in to parts
            // first: objects with "smaller" property $property
            // second: objects with "bigger" property $property
            do
            {
                while( $array[$i]->{$property} < $tmp->{$property} ) $i++;
                while( $tmp->{$property} < $array[$j]->{$property} ) $j--;

                // Swap elements of two parts if necesary
                if( $i <= $j)
                {
                    $w = $array[$i];
                    $array[$i] = $array[$j];
                    $array[$j] = $w;

                    $i++;
                    $j--;
                }

            } while ( $i <= $j );

            if( $i < $r ) {
                $cur++;
                $stack[$cur]['l'] = $i;
                $stack[$cur]['r'] = $r;
            }
            $r = $j;

        } while ( $l < $r );

    } while ( $cur != 0 );

    return $array;

}


?>



</div>



</body>
</html>
