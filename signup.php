<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link type="text/css" rel="stylesheet" href="signup.css">
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

<div align="center" style="margin: 7% 0">
<form action="includes/signup.inc.php" method="post">
    <input type="text" name="first" placeholder="Firstname"><br>
    <input type="text" name="last" placeholder="Lastname"><br>
    <input type="text" name="email" placeholder="E-mail"><br>
    <input type="text" name="uid" placeholder="Username"><br>
    <input type="password" name="pwd" placeholder="Password"><br>
    <input type="password" name="conf_pwd" placeholder="Confirm Password"><br>
    <button type="submit" name="submit" style="width: 202px">Sign up</button>
</form>
</div>

</body>
</html>