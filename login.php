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
        <li class="navbar_li"><a class="navbar_a" href="news.php">Hírek</a></li>
        <li class="navbar_li"><a class="navbar_a" href="login.php">Bejelentkezés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Kapcsolat</a></li>
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

<div align="center" style="margin: 7% 0;">
<form action="includes/login.inc.php" method="post">

    <?php
    if(isset($_GET['uid'])){
        $uid = $_GET['uid'];
        echo '<input id="uid" type="text" name="uid" placeholder="Felhasználónév" value="'.$uid.'" style="border-bottom: 2px solid #34F458;" required=""><br>';
    } else {
        echo '<input id="uid" type="text" name="uid" placeholder="Felhasználónév" required=""><br>';
    }
    ?>

    <input id="pwd" type="password" name="pwd" placeholder="Jelszó" required=""><br>
    <button type="submit" name="submit" class="login-button" style="cursor: pointer; width: 202px;">Bejelentkezés</button><br>
    <button style="width: 202px;"> <a href="signup.php" style="text-decoration: none; color: black;">Regisztráció </a></button>
    <?php

    if(isset($_GET['login'])){

        $loginCheck = $_GET['login'];

        if($loginCheck == 'empty'){
            echo '<div class="error">Üres mező!</div>';
            exit();
        } else if($loginCheck == 'username'){
            echo '<div class="error">Nincs ilyen felhasználó!</div>';
            echo '<script>
                        document.getElementById("uid").style.borderBottomColor = "#F90A0A";
                        document.getElementById("pwd").style.borderBottomColor = "#F90A0A";
                  </script>';
            exit();
        } else if($loginCheck == 'error'){
            echo '<div class="error">Téves jelszó!</div>';
            exit();
        }
    }

    if(isset($_GET['signup'])){
        $signupCheck = $_GET['signup'];
        if($signupCheck == 'success'){
            echo '<div style="color: green;">Sikeres regisztráció<br>Jelentkezzen be!</div>';
        }

    }


    ?>
</form>
</div>


</body>
</html>