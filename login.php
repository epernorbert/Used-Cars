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

<div > <img  style="float: left; display: inline-block; margin-top: 2%; margin-left: 10%;" src="peugeot_208/logohd.jpg" height="75"> </div>
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


    
    <img src="peugeot_208/login_bg1.jpg" style="position: absolute; left: 0px; top: 129px; z-index: -1; width: 100%; filter: blur(4px);  ">
    <div align="center" style="margin: 6% 38%;  background-color: white; display: inline-block; width: 290px;  padding: 10px 0 10px 0; ">
    <form action="includes/login.inc.php" method="post">

        <?php
            if(isset($_GET['uid'])){
                $uid = $_GET['uid'];
                echo '<div>';
                    echo '<i class="fa fa-user icon" style="background-color: green; padding: 8px;  position: relative; left: 8px; bottom: 1px; "></i>';
                    echo '<input id="uid" type="text" name="uid" placeholder="Felhasználónév" value="'.$uid.'" style="border-bottom: 2px solid #34F458; height: 25px; position: relative; right: 3px;" required=""><br>';
                echo '</div>';
            } else {
                echo '<div>';
                  echo '<i class="fa fa-user icon" style="background-color: green; padding: 8px;  position: relative; left: 8px; bottom: 1px; "></i>';
                  echo '<input id="uid" type="text" name="uid" placeholder="Felhasználónév" required="" style="height: 25px; position: relative; right: 3px; " ><br>';
                echo '</div>';
            }
        ?>
        
        <div>
            <i class="fa fa-key icon" style="background-color: green; padding: 8px; position: relative; left: 10px; bottom: 1px; "></i>
        <input id="pwd" type="password" name="pwd" placeholder="Jelszó" required="" style="height: 25px; position: relative; right: 5px; " ><br>    
        </div>
        <button type="submit" name="submit" class="login-button" style="cursor: pointer; width: 85%; position: relative; right: 3px; height: 33px;">Bejelentkezés</button><br>
        <button style="width: 85%; position: relative; right: 3px; height: 33px; "> <a href="signup.php" style="text-decoration: none; color: black;">Regisztráció </a></button>
        
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