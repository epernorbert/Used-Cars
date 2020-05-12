<?php

session_start();
if(!isset($_SESSION['u_uid'])){
    header("Location: index.php?need=to=login=user");
    exit();
} elseif(isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='admin') {
    header("Location: index.php?you=are=admin");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hírdetés feladása</title>
    <link type="text/css" rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        if(isset($_SESSION['u_id'])){
            echo '<li class="navbar_li"><a class="navbar_a" href="add.php">Hírdetés feladás</a></li>';
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

<div style="margin: 3% 0 0 10%">
    <h1>Hírdetés feladása</h1>
    <p>Töltsön ki minden mezőt a megfelelő adatokkal!</p>
    <form action="includes/add.inc.php" method="post" enctype="multipart/form-data" >
        <div style="float:left">
            <input type="text" name="brand" placeholder="Márka"><br>
            <input type="text" name="type" placeholder="Típus"><br>
            <input type="number" name="year" placeholder="Évjárat"><br>
            <input type="number" name="price" placeholder="Ár"><br>
            <input type="radio" id="dizel" name="fuel" value="Dizel">
            <label for="dizel">Dizel</label>
            <input type="radio" id="benzin" name="fuel" value="Benzin">
            <label for="benzin">Benzin</label><br>
            <input type="number" name="cm3" placeholder="Köbcenti"><br>
            <input type="number" name="hp" placeholder="Lóerő"><br>
        </div>
        <div style="display: inline-block">
            <input type="file" name="file" placeholder="Kép" accept="image/*" ><br>
            <input type="file" name="file_2" placeholder="Kép" accept="image/*" ><br>
            <input type="file" name="file_3" placeholder="Kép" accept="image/*" ><br>
            <input type="file" name="file_4" placeholder="Kép" accept="image/*" ><br>
            <input type="file" name="file_5" placeholder="Kép" accept="image/*" ><br>
            <div align="center"><button style="width: 100px" type="submit" name="submit" value="upload">Feltölt</button><br></div>
        </div>
    </form>
</div>

</body>
</html>