<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

//Redirect to index if userisn't logged in
session_start();
if (!(isset($_SESSION['username']) || isset($LoginPage)))
header("Location: Login.html");

//Will definitely be set, just for testing purposes.
if((isset($_SESSION['username'])))
    $username = $_SESSION['username'];
else $username = "Username";

echo "<div id='welcome'>
    Welcome back,
    <div id='welcometitle'>$username!</div>
    <a href='Login.html' style='font-size:9px; color:#cccccc'>Not you?</a>
    </div>";

//connect
$mysqli=mysqli_connect("csdb.wheaton.edu","kayley_lane", "82606", "Csci371FruitRoad");
if (mysqli_connect_error())
    die("Failed to connect - " . mysqli_connect_error());

echo "<img src='https://31.media.tumblr.com/98cb398bf85e6a4838a18b57a763a3c7/tumblr_inline_ndpd2dbrBJ1s8o8qm.png' align='left' height='75px'>
      <div id='navigation'>      
          <div style='padding-right:315px;'>
            <a href='Splash.php' title='Go back to the splash page.'>Home
            <img src='http://www.wpclipart.com/signs_symbol/shapes/Road_ribbon_T.png'></a>
            <a href='Splash.php' title='Edit your account settings.'>My Account
            <img src='http://png-2.findicons.com/files/icons/1254/flurry_system/128/users.png'></a>
            <a href='Products.php' title='Shop for delicious fruit.'>Products
            <img src='http://img-fotki.yandex.ru/get/6521/136487634.71c/0_af09e_64e2ef9c_L'></a>
            <a href='Splash.php' title='View and edit your cart or check out.'>Cart
            <img src='http://www.robmcintosh.ca/images/shoppingCart.png'></a>
	    <a href='Admin.php' title='admin only'>Admin</a>
          </div>
      </div> ";

echo "<a href='Splash.php'><div id='bottomlogo'><img src='https://31.media.tumblr.com/ebed233fbab7fed04641d3ff77307760/tumblr_inline_ndp93rb9xv1s8o8qm.png'></div></a>";
?>

<style type="text/css">
::-webkit-scrollbar-thumb:vertical {background-color:#ffffff;height:15px;}
::-webkit-scrollbar {height:0px;width:1px;background-color:#ffffff;}

a:link { color: #000000; text-decoration: none}
a:visited { color: #000000; text-decoration: none}
a:hover { color: #2c2c2c; text-decoration:none}
a:active { color: #000000; text-decoration: none}
    
#welcome{
    text-align: right;
    font-family: Arial;
    font-size: 11px;
    color:#5d5d5d;   
}
#welcometitle{
    color: #000000;
    font-size: 14px;
    display: inline;
    font-weight: bold;
}
#navigation{
    width: 100%;
    height: 75px;
    text-align: center;
    background: #FAB700; /* old browsers */
    background: -moz-linear-gradient(top, #C79200 0%, #FAB700 100%); /* firefox */
    border-top: 1px solid #FAB700;
    border-bottom: 1px solid #FAB700;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#C79200), color-stop(100%,#FAB700)); /* webkit */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#C79200', endColorstr='#FAB700',GradientType=0 ); /* ie */
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
    white-space: nowrap;
}
    
#navigation a{
    line-height: 77px;
    margin-left: 45px;
    color: black; -webkit-transition:all .2s ease-in-out;
    -o-transition:all .2s;
    -moz-transition:all .2s;
    -ms-transition:all .2s;
    font-family: Arial;
    font-size:20px;
    font-weight: bold;
    border-bottom:  #ffffff dotted 1px;
    letter-spacing: -1px;
}
    
#navigation a:hover{
    color: #000000; -webkit-transition:all .2s ease-in-out;
    -o-transition:all .2s;
    -moz-transition:all .2s;
    -ms-transition:all .2s;
}
    
#navigation img{
    height: 30px;
}
    
#bottomlogo{
    position: fixed;
    bottom: 5px; right:  5px;     
}
#bottomlogo img{
    height: 50px;
}
</style>
