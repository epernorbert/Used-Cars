<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
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

</body>
</html>

<?php

include 'action.php';

$sql = "SELECT * from cars where car_id='{$_GET['car_id']}'";

$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

echo '<div style="margin-left: 10%">' . $row['marka'] . " " . $row['tipus'] . " " . $row['uzemanyag'] . " " . $row['ar'] . "€" . " " . $row['évjárat'] . " " .
    $row['kobcenti'] . "cm3" . " " . $row['loero'] . "hp" .
    '<img src=uploads/'.$row['kep'].' style="display: block; object-fit: cover;/*nagyítás, egyforma képek */ width: 146px; height: 93px;"> 
     <img src=uploads/'.$row['image_2'].' style="display: block; object-fit: cover;/*nagyítás, egyforma képek */ width: 146px; height: 93px;">
     <img src=uploads/'.$row['image_3'].' style="display: block; object-fit: cover;/*nagyítás, egyforma képek */ width: 146px; height: 93px;">
     <img src=uploads/'.$row['image_4'].' style="display: block; object-fit: cover;/*nagyítás, egyforma képek */ width: 146px; height: 93px;">
     <img src=uploads/'.$row['image_5'].' style="display: block; object-fit: cover;/*nagyítás, egyforma képek */ width: 146px; height: 93px;">' . '</div>'  . "<br>" ;

