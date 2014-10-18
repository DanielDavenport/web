


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

$fail = FALSE;

if(isset($_POST['productid']))
{
    $productid = $_POST['productid'];

} else {
    $fail = TRUE;
}

if(isset($_POST['quantity']))
{
    $quantity = $_POST['quantity'];

} else {
    $fail = TRUE;
}

if($fail) goAway();
else addToCart();

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?fam
ily=Oswald">
<title>We love you!</title> 
    <style type="text/css">
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
h3{
    font-family:oswald;
    text-align:center;
    font-size:24px;
    color:#000000;
}

#navigation{
        font-size:16px;
    margin-bottom:100px;
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
    </style>
</head>

<body>

        <?php
            
            function addToCart(){
                global $quantity;
                global $productid;
                global $mysqli;
                $QryStr = "SELECT * FROM Products WHERE pid = $productid";
                $Results = mysqli_query($mysqli, $QryStr) or
                    die("Failed Query $QryStr: " . mysqli_error($mysqli));
                $Product = mysqli_fetch_object($Results);

                 // Add to database
                //NOTE: Add actual session id 
                $QryStr = "INSERT INTO CartDetails (pid, sessionId, numberProduct, price) 
                VALUES (($Product->pid), '6', $quantity, ($Product->price))
                ON DUPLICATE KEY UPDATE numberProduct = (numberProduct + $quantity);";
                echo "<BR>";
                mysqli_query($mysqli,$QryStr) or
                    die("Failed query - $QryStr\n" . mysqli_error($mysqli));

                echo "    
                <div id='navigation'>
                <a href='/'>home
                <img src='https://openclipart.org/image/800px/svg_to_png/14720/abadr_Highway.png' height='20px'></a>
                <a href='/'>account
                <img src='http://png-2.findicons.com/files/icons/1254/flurry_system/128/users.png' height='20px'></a>
                <a href='/'>products
                <img src='http://pngimg.com/upload/cherry_PNG623.png' height='20px'></a>
                <a href='/'>cart
                <img src='http://www.robmcintosh.ca/images/shoppingCart.png' height='20px'></a>
                </div>";
                echo "<center>
                <h3>Thank you for your purchase!</h3>";
                echo "<b>ITEM:</b>" . ($Product->name) . " | <b>QUANTITY:</B> $quantity <BR><BR><BR>";
                echo "<img src='http://img4.wikia.nocookie.net/__cb20140901153102/villains/images/2/29/783564-seryu.png' width='500px'>";

            }

            function goAway(){
                echo "<center><div style='margin-bottom:100px'></div>
                <h3>You're not supposed to be here?!";
                echo "<BR><a href='/'>BACK</a></h3><BR>";
                echo "<img src='http://38.media.tumblr.com/4779af3321681dae15d8e157f0282c08/tumblr_na5qkjpLT11txsff9o5_r2_500.gif' width='500px'>";
            }

        ?>

    </center>

</body>
</html>
