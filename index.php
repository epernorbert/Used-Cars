<?php
session_start();
include_once 'action.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Title</title>
</head>
<body>


<div class="navbar">
    <ul class="navbar_ul">
        <li class="navbar_li"><a class="navbar_a" href="index.php">Kezdőlap</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Keresés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Hírek</a></li>
        <li class="navbar_li"><a class="navbar_a" href="login.php">Bejelentkezés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Kapcsolat</a></li>
        <?php
            if(isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='user'){
                echo '<li class="navbar_li"><a class="navbar_a" href="add.php">Hírdetés feladás</a></li>';
            } elseif( isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='admin') {
                echo '<li class="navbar_li"><a class="navbar_a" href="admin/admin.php">Admin</a></li>';
            }
        ?>
    </ul>
</div>
<div  class="navbar_social">
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-google"></a><br>
    <a href="#" class="fa fa-instagram"></a>
    <a href="#" class="fa fa-twitter"></a>
</div><br>

<div style="clear: both">
    <?php
    if(isset($_SESSION['u_id'])){
        echo '<form action="includes/logout.inc.php" method="POST">
                        <button type="submit" name="submit" style="float:left; font-size: 15px;">Logout</button>
                    </form>';
        echo '<div style="padding: 5px; font-size: 20px;">' . '<a href="profile.php" style="text-decoration: none; color: blue;">' . $_SESSION['u_uid'] . '</a>'  . '</div>' .
            '<style type="text/css"> 
                    .navbar_social{
                        margin: 2% 0 0 0;
                     }               
                </style>';
    }

    ?>
</div>


<div class="wraper">

    <div style="color: white; text-align: right; padding: 5% 10% 19% 0">
        <p>Valami szöveg az autórol</p>
        <p>Valami szöveg az autórol</p>
        <p>Valami szöveg az autórol</p>
        <p>Valami szöveg az autórol</p>
    </div>

</div>

<div class="search" align="center">
    <form action="search.php" method="POST">
        <input type="text" name="brand" placeholder="Márka" style="width: 120px"/>
        <input type="text" name="type" placeholder="Tipus" style="width: 120px"/>
        <input type="number" name="min_price" placeholder="min ár" style="width: 120px">
        <input type="number" name="max_price" placeholder="max ár" style="width: 120px">
        <input type="number" name="date_start" placeholder="évjárat(tól)" style="width: 120px;">
        <input type="number" name="date_end"  placeholder="évjárat(ig)" style="width: 120px;">
        <input type="number" name="min_cm3" placeholder="min cm3" style="width: 120px">
        <input type="number" name="max_cm3" placeholder="max cm3" style="width: 120px">
        <input type="number" name="min_hp" placeholder="min le" style="width: 120px">
        <input type="number" name="max_hp" placeholder="max le" style="width: 120px">
        <label>
            <select id="fueltype" name="fueltype" style="width: 125px">Üzemanyag:
                <option disabled selected value style="display: none">Üzemanyag</option>
                <option value="dizel">dizel</option>
                <option value="benzin">benzin</option>
            </select>
        </label>
        <button type="submit" name="submit-search" style="width: 120px; background-color: blue; cursor: pointer;">Keresés</button>
    </form>
</div>

<div class="brand" style="font-size: 20px; margin: 0 10% 5% 10%; border-bottom: 1px solid blue" >
    <ul class="brand_ul">
        <li class="brand_li"><a class="brand_a" href="brands.php?brand=audi" style="color: black"> Audi</a></li>
        <li class="brand_li"><a class="brand_a" href="brands.php?brand=mercedes" style="color: black">Mercedes</a></li>
        <li class="brand_li"><a class="brand_a" href="brands.php?brand=bmw" style="color: black">Bmw</a></li>
        <li class="brand_li"><a class="brand_a" href="brands.php?brand=volkswagen" style="color: black">Volkswagen</a></li>
        <li class="brand_li"><a class="brand_a" href="brands.php?brand=opel" style="color: black">Opel</a></li>
        <li class="brand_li"><a class="brand_a" href="brands.php?brand=renault" style="color: black">Renault</a></li>
    </ul>
</div>


<div style="margin: 0 0 0 10%; width: 55%;  float: left;">
    <?php


        $sql = "SELECT * from cars;";
        $result = mysqli_query($conn, $sql);
        $resultcheck = mysqli_num_rows($result);

        $i=0;

        if($resultcheck > 0){
            while($row = mysqli_fetch_assoc($result)){
                 if( $i < 12 /*listázás szabályozása*/){
                echo '<div class="index_db">' . '<p style="margin: 3px 0;" >'  . $row['marka'] . " " . $row['tipus'] . '</p>' . $row['ar'] . "€" . " " . $row['évjárat']  .  '<div style="border: 2px solid black;"> <a href="advertisement.php?car_id='.$row['car_id'].'" > <img class="image" src=uploads/' .$row['kep']  .' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;" > </a> </div> ' . '</div>';
                $i++;
                }
             }

        }

    ?>



</div>

<div style="margin: 0 10% 5% 0; border: 2px solid black; display: inline-block; width: 23%; float: right;">
    <h1>dasadsds</h1>
    <h1>dasadsds</h1>
    <h1>dasadsds</h1>
    <h1>dasadsds</h1>
    <h1>dasadsds</h1>
    <h1>dasadsds</h1>
    <h1>dasadsds</h1>
    <h1>dasadsds</h1>
    <h1>dasadsds</h1>

</div>


<div style="clear: both; margin: 5% 10% 0 10%; background: rgb(2,0,36);padding: 20px ;
background-image: linear-gradient(to bottom, #113c7e, #0b3060, #0c2444, #0d1828, #04070d); height: 450px">
    <div style="float: left">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d362281.8538956186!2d20.142414908230165!3d44.81490282615904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aa3d7b53fbd%3A0x1db8645cf2177ee4!2zQmVsZ3LDoWQ!5e0!3m2!1shu!2srs!4v1585771244197!5m2!1shu!2srs"width="600" height="450" frameborder="0" style="border:2px solid black;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>

    <div style="text-align: center; padding-top: 10%">
        <p>Kapcsolati adatok</p>
        <p>Kapcsolati adatok</p>
        <p>Kapcsolati adatok</p>
        <p>Kapcsolati adatok</p>
    </div>
</div>




</body>
</html>