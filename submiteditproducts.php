<?php
    include_once "head.php";

    $allresults = array( array() );

    $pid = $_POST['fpid'];
    $pname = $_POST['fname'];
    $pprice = $_POST['fprice'];
    $pweight = $_POST['fweight'];
    $picon = $_POST['ficon'];
    $pimage = $_POST['fimage'];
    $pshort = $_POST['fshort'];
    $plong = $_POST['flong'];
    $total = 0;

    $i=0;
    foreach($pid as $pno){
        $allresults[$i][0] = $pno;
        $i++;
        $total++;
    }
    $i=0;
    foreach($pname as $name){
        $allresults[$i][1] = addslashes($name);
        $i++;
    }
    $i=0;
    foreach($pprice as $price){
        $allresults[$i][2] = $price;
        $i++;
    }
    $i=0;
    foreach($pweight as $weight){
        $allresults[$i][3] = $weight;
        $i++;
    }
    $i=0;
    foreach($picon as $icon){
        $allresults[$i][4] = addslashes($icon);
        $i++;
    }
    $i=0;
    foreach($pimage as $image){
        $allresults[$i][5] = addslashes($image);
        $i++;
    }
    $i=0;
    foreach($pshort as $short){
        $allresults[$i][6] = addslashes($short);
        $i++;
    }
    $i=0;
    foreach($plong as $long){
        $allresults[$i][7] = addslashes($long);
        $i++;
    }

    $i=0;
    for($z = 0; $z < $total; $z++){
        $allresults[$z][8] = 0;
    }
    if(isset($_POST['delete'])){
        $pdelete = $_POST['delete'];
        foreach($pdelete as $del){
            $allresults[$del][8] = 1;
            $i++;
        }
    }

    $z=0;
    foreach ($allresults as $i => $row)
    {
        //UPDATE DELETE FIELD TOO WHEN MADE.
        $QryStr = "UPDATE Products SET name = '$row[1]', price = '$row[2]', weight='$row[3]', thumbnailUrl='$row[4]', imageUrl='$row[5]', shortDescription='$row[6]', longDescription='$row[7]' WHERE pid = '$row[0]'";
        mysqli_query($mysqli,$QryStr) or
                    die("Failed query - $QryStr\n" . mysqli_error($mysqli));
    }

    header("Location: /");

?>
