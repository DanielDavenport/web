
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?fam
ily=Oswald">
<link rel="shortcut icon" href="http://s25.postimg.org/atayg9upn/image.png">
<title>We love you!</title> 
<?php

include_once "head.php";

//Is everything necessary to make the SQL Query included or did the user get here from the wrong page?
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

<style type="text/css">

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

                if(isset($_SESSION['username']))
                {
                    $sesid = session_id();

                } else {
                    $sesid = 11;
                }

                //NOTE: By this point, there should already be a MyCart value with the sessionId in the table. 
                //The following is just in case.
                $result = mysqli_query($mysqli, "SELECT * FROM MyCart WHERE sessionId = $sesid") or
                    die("Failed Query: " . mysqli_error($mysqli));
                if(mysqli_num_rows($result)<=0){
                    mysqli_query($mysqli, "INSERT INTO MyCart (sessionId) VALUES ($sesid)") or
                    die("Failed Query: " . mysqli_error($mysqli));
                }

                $QryStr = "INSERT INTO CartDetails (pid, sessionId, numberProduct, price) 
                VALUES (($Product->pid), $sesid, $quantity, ($Product->price))
                ON DUPLICATE KEY UPDATE numberProduct = (numberProduct + $quantity);";
                echo "<BR>";
                mysqli_query($mysqli,$QryStr) or
                    die("Failed query - $QryStr\n" . mysqli_error($mysqli));
                echo "<center>
                <h3>Thank you for your purchase!</h3>";
                echo "<b>ITEM:</b>" . ($Product->name) . " | <b>QUANTITY:</B> $quantity <BR><BR><BR>";
                echo "<img src='http://img4.wikia.nocookie.net/__cb20140901153102/villains/images/2/29/783564-seryu.png' width='500px'>";

            }

            function goAway(){
                echo "<center>
                <h3>You're not supposed to be here?!";
                echo "<BR><a href='/'>BACK</a></h3><BR>";
                echo "<img src='http://38.media.tumblr.com/4779af3321681dae15d8e157f0282c08/tumblr_na5qkjpLT11txsff9o5_r2_500.gif' width='500px'>";
            }

        ?>

    </center>

</body>
</html>
