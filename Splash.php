<?php
 include_once("head.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fruit Road</title>
    <script>

    var adminStatus = false;

        function clockTick(){

            var currentTime = new Date ( );

            var currentHours = currentTime.getHours ( );
            var currentMinutes = currentTime.getMinutes ( );
            var currentSeconds = currentTime.getSeconds ( );

            if(currentHours > 12){currentHours = currentHours - 12};
            if(currentHours == 0){currentHours = 12};
            if(currentMinutes < 10){currentMinutes = '0'+currentMinutes};
            if(currentSeconds < 10){currentSeconds = '0'+currentSeconds};

            var displayTime = currentHours+':'+currentMinutes+':'+currentSeconds;

            var element = document.getElementById('clock');
            element.innerText = displayTime;
        }
        function AdminCheck(){
            if (adminStatus == false){
                admin.innerText ="  ";
            } ;
        }



    </script>

</head>

<style>

    #header{
        color: #9B7100;
        font-size: 3em;
    
    }
    body {
        font-family: 'Verdana';
        text-align: center;
        background-color: #FAB700;
    }
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;

    }
    li {
        display: inline;


    }
    a{
        font-weight: bold;
        font-size: 2.5em;
        color: #C79200;
        margin: .5em;
    }
    p{
        font-size: 3.5em;
        color: #C79200;
        margin: .5em;
    }

    #title{
        margin: 5px;
        font-size:2em;
        color: #C79200;

    }
    #image img,iframe{
        padding:3px;
        background-color: #C79200;


    }
    #clock{
        margin-top: 60px;
        font-size: 2em;
        clear:both;
        background-color: #FFD050;
        color: #C79200;
        margin-left:39%;
        margin-right:39%
    }
</style>


<body onload="clockTick(); setInterval(function(){clockTick();time() }, 1000 )">

<div>

     <image src="http://img3.wikia.nocookie.net/__cb20071019155930/uncyclopedia/images/7/7b/Dancing_banana.gif"  ></image>
     <p id ="title"> FRUITY ROAD</p>
</div>




<p id='header'> FRUITY ROAD BABAYY </p>






<p>
 WELCOME TO FRUIT ROAD YOUR PREMIER ONLINE FRUIT WHOLESALER!
WE HAVE ALL SORTS OF RARE AND TASTY FRUITS!
</p>
<p>
APPLES!
<image src="http://www.vegkitchen.com/wp-content/uploads/2013/04/Apples-in-a-basket.jpg"  ></image>

</p>

<p>
 DRAGONFRUIT!
<image src="http://0.tqn.com/y/thaifood/1/S/e/D/dragonfruit1_edited-1.jpg"  ></image>
</p>

<p>
 GRAPES!
<image id="image" src="http://images.santu.com/2876/grapes_13621922962518.jpg"  ></image>
</p>


<div id="clock" >0:00:00</div>
<div style= "background-color:#FFD050; color:#FFD050; font-size:.2em">i</div>
<div style= "background-color:#FFD050; clear:both; color: #C79200; font-size: 2em;text-align:center;  margin-left:35%; margin-right:35%; ">
    &copy; Fruit Road - 2014</div>
<div style= "background-color:#FFD050; color:#FFD050; font-size:.2em">i</div>





</body>
</html>
