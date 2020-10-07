<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>
<body>

<div> 
    <img class="logo" src="peugeot_208/logohd.jpg" height="75"> 
</div>
<div class="navbar">
    <ul>
        <li><a href="index.php">Kezdőlap</a></li>
        <li><a href="#">Keresés</a></li>
        <li><a href="news.php">Hírek</a></li>
        <li><a href="login.php">Bejelentkezés</a></li>
        <li><a href="#">Kapcsolat</a></li>
        <?php
            if(isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='user'){
                echo '<li><a href="add.php">Hírdetés feladás</a></li>';
            } elseif( isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='admin') {
                echo '<li><a href="admin/admin.php">Admin</a></li>';
            } elseif( isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='writer'){
                echo '<li><a href="add_news.php">Hír közzététele</a></li>';
            }
        ?>
    </ul>
</div>

<img src="peugeot_208/login_bg1.jpg" class="background">
<div align="center" class="form_main">
    <form action="includes/login.inc.php" method="post">

        <?php

            if(isset($_GET['uid'])){
                $uid = $_GET['uid'];
                echo '<div>';
                    echo '<i class="fa fa-user icon"></i>';
                    echo '<input id="uid" type="text" name="uid" placeholder="Felhasználónév" value="'.$uid.'" class="username_input" required=""><br>';
                echo '</div>';
            } else {
                echo '<div>';
                  echo '<i class="fa fa-user icon"></i>';
                  echo '<input id="uid" type="text" name="uid" placeholder="Felhasználónév" required="" style="height: 25px; position: relative; right: 3px;"><br>';
                echo '</div>';
            }
            
        ?>
        
        <div>
            <i class="fa fa-key icon"></i>
            <input id="pwd" type="password" name="pwd" placeholder="Jelszó" required="" class="password_input" ><br>    
        </div>
        <button type="submit" name="submit" class="login_button">Bejelentkezés</button><br>
        <button class="signup_button"> 
            <a href="signup.php">Regisztráció </a>
        </button>
        
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