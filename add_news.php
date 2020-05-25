<?php

session_start();

if(!isset($_SESSION['u_usertype']) || $_SESSION['u_usertype'] == 'user' || $_SESSION['u_usertype'] == 'admin'  ){
    header("Location: index.php?need=to=login=like=journalist");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="add_news.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Használtautók</title>
</head>
<body>


<div class="navbar">
    <ul class="navbar_ul">
        <li class="navbar_li"><a class="navbar_a" href="index.php">Kezdőlap</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#search">Keresés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Hírek</a></li>
        <li class="navbar_li"><a class="navbar_a" href="login.php">Bejelentkezés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#contact">Kapcsolat</a></li>
        <?php
        if(isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='user'){
            echo '<li class="navbar_li"><a class="navbar_a" href="add.php">Hírdetés feladás</a></li>';
        } elseif( isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='admin') {
            echo '<li class="navbar_li"><a class="navbar_a" href="admin/admin.php">Admin</a></li>';
        } elseif( isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='writer'){
            echo '<li class="navbar_li"><a class="navbar_a" href="add_news.php">Hír közzététele</a></li>';
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

<div style="margin: 0 10% 0 10%">
    <form action="./includes/add.news.inc.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Cím" style="width: 202px"><br>
        <input type="text" name="text"  style="width: 100%; height: 300px;"><br>
        <input type="file" name="file" accept="image/*" placeholder="Kép"><br><br>
        <button type="submit" name="submit" style="width: 100px">Közzétesz</button>
    </form>
</div>








