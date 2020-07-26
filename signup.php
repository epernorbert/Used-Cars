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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
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



<div align="center" style="margin: 4% 0">
<form id="form" action="includes/signup.inc.php" name="form" method="post">
    <?php
        if(isset($_GET['first'])){
            $first = $_GET['first'];
            echo '<input type="text" name="firfst" id="first" placeholder="Keresztnév" value="'.$first.'"><br>';
        }
        else {
            echo '<input type="text" name="first" id="first" placeholder="Keresztnév" required=""><br>';
            echo '<div id="first_error"></div>';
        }

        if(isset($_GET['last'])){
            $last = $_GET['last'];
            echo '<input type="text" name="last" id="last" placeholder="Vezetéknév" value="'.$last.'"><br>';
        }
        else {
            echo '<input type="text" name="last" id="last" placeholder="Vezetéknév" required=""><br>';
            echo '<div id="last_error"></div>';
        }
    ?>

    <input type="text" name="email" id="email" placeholder="E-mail" required=""><br>
    <div id="email_error"></div>

    <?php
        if(isset($_GET['uid'])){
            $uid = $_GET['uid'];
            echo '<input type="text" name="uid" id="uid" placeholder="Felhasználónév" value="'.$uid.'"><br>';
        }
        else {
            echo '<input class="uid-class" type="text" name="uid" id="uid" placeholder="Felhasználónév" required=""><br>';
            echo '<div id="uid_error"></div>';
            echo '<span id="availability"></span>';
            echo '<div id="username_error"></div>';
        }
    ?>

    <script>

        $(document).ready(function(){
            $('#uid').blur(function () {
                var uid = $(this).val();
                $.ajax({
                    url:"check_user_taken.php",
                    method:"POST",
                    data:{user_uid:uid},
                    dataType:"text",
                    success:function(html){
                        $('#availability').html(html);
                    }
                });
            });
        });
    </script>

    <input type="password" name="pwd" id="pwd" placeholder="Jelszó" required=""><br>
    <div id="pwd_error"></div>
    <input type="password" name="conf_pwd" id="conf_pwd" placeholder="Jelszó ismét" required=""><br>
    <div id="conf_pwd_error"></div>
    <button type="submit" name="submit" id="submit" style="width: 202px;cursor: pointer;">Regisztráció</button>
</form>

    <script type="text/javascript">

        $(function () {

            $("#first_error").hide();
            $("#last_error").hide();
            $("#email_error").hide();
            $("#pwd_error").hide();
            $("#conf_pwd_error").hide();


            var error_fname = false;
            var error_lname = false;
            var error_email = false;
            var error_password = false;
            var error_confirm_password = false;


            $("#first").focusout(function(){
                check_fname();
            });

            $("#last").focusout(function() {
                check_lname();
            });

            $("#email").focusout(function() {
                check_email();
            });

            $("#pwd").focusout(function() {
                check_password();
            });

            $("#conf_pwd").focusout(function() {
                check_confirm_password();
            });


            function check_fname() {
                var pattern = /^[a-zA-Z]*$/;
                var fname = $("#first").val();
                if (pattern.test(fname) && fname !== '') {
                    if(fname.length > 20){
                        $("#first_error").html("Maximum 20 karakter!").css("color", "#F90A0A");
                        $("#first_error").show();
                        $("#first").css("border-bottom","2px solid #F90A0A");
                        error_fname = true;
                    } else {
                    $("#first_error").hide();
                    $("#first").css("border-bottom","2px solid #34F458");
                    }
                } else if(fname === ''){
                    $("#first_error").html("");
                    $("#first_error").show();
                    $("#first").css("border-bottom","2px solid #F90A0A");
                    error_fname = true;
                } else {
                    $("#first_error").html("A mező csak betűket tartalmazhat!").css("color", "#F90A0A");
                    $("#first_error").show();
                    $("#first").css("border-bottom","2px solid #F90A0A");
                    error_fname = true;
                }
            }

            function check_lname() {
                var pattern = /^[a-zA-Z]*$/;
                var lname = $("#last").val()
                if (pattern.test(lname) && lname !== '') {
                    if(lname.length > 20){
                        $("#last_error").html("Maximum 20 karakter!").css("color", "#F90A0A");
                        $("#last_error").show();
                        $("#last").css("border-bottom","2px solid #F90A0A");
                        error_lname = true;
                    } else {
                        $("#last_error").hide();
                        $("#last").css("border-bottom","2px solid #34F458");
                    }
                } else if(lname === ''){
                    $("#last_error").html("");
                    $("#last_error").show();
                    $("#last").css("border-bottom","2px solid #F90A0A");
                    error_lname = true;
                } else {
                    $("#last_error").html("A mező csak betűket tartalmazhat!").css("color", "#F90A0A");
                    $("#last_error").show();
                    $("#last").css("border-bottom","2px solid #F90A0A");
                    error_lname = true;
                }
            }

            function check_email() {
                var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var email = $("#email").val();
                if (pattern.test(email) && email !== '') {
                    $("#email_error").hide();
                    $("#email").css("border-bottom","2px solid #34F458");
                } else if(email === ''){
                    $("#email_error").html("");
                    $("#email_error").show();
                    $("#email").css("border-bottom","2px solid #F90A0A");
                    error_email = true;
                } else {
                    $("#email_error").html("Helytelen Email").css("color", "#F90A0A");
                    $("#email_error").show();
                    $("#email").css("border-bottom","2px solid #F90A0A");
                    error_email = true;
                }
            }

            function check_password() {
                var password_length = $("#pwd").val().length;
                var password = $("#pwd").val();
                var retype_password = $("#conf_pwd").val();

                if(password_length < 1){
                    $("#pwd_error").html("");
                    $("#pwd_error").show();
                    $("#pwd").css("border-bottom","2px solid #F90A0A");
                    error_password = true;
                }
                else if (password_length < 8) {
                    $("#pwd_error").html("Minimum 8 karakter!").css("color", "#F90A0A");
                    $("#pwd_error").show();
                    $("#pwd").css("border-bottom","2px solid #F90A0A");
                    error_password = true;
                } else if(password === retype_password){
                    $("#pwd_error").html("");
                    $("#pwd_error").show();
                    $("#conf_pwd_error").html("");
                    $("#conf_pwd_error").show();
                    $("#pwd").css("border-bottom","2px solid #34F458");
                    $("#conf_pwd").css("border-bottom","2px solid #34F458");
                } else if(retype_password === ''){
                    $("#pwd_error").html("");
                    $("#pwd_error").hide();
                    $("#conf_pwd_error").html("");
                    $("#conf_pwd_error").show();
                    $("#pwd").css("border-bottom","2px solid #34F458");
                    $("#conf_pwd").css("border-bottom","2px solid #F90A0A");
                    error_password = true;
                } else {
                    $("#pwd_error").html("");
                    $("#pwd_error").hide();
                    $("#conf_pwd_error").html("A jelszavak nem egyeznek!");
                    $("#conf_pwd_error").show();
                    $("#pwd").css("border-bottom","2px solid #F90A0A");
                    $("#conf_pwd").css("border-bottom","2px solid #F90A0A");
                    error_password = true;
                }

            }

            function check_confirm_password() {
                var password = $("#pwd").val();
                var retype_password = $("#conf_pwd").val();

                if (retype_password === ''){
                    $("#conf_pwd_error").html("");
                    $("#conf_pwd_error").show();
                    $("#conf_pwd").css("border-bottom","2px solid #F90A0A");
                } else if (password !== retype_password) {
                    $("#conf_pwd_error").html("A jelszavak nem egyeznek!").css("color", "#F90A0A");
                    $("#conf_pwd_error").show();
                    $("#conf_pwd").css("border-bottom","2px solid #F90A0A");
                    $("#pwd").css("border-bottom","2px solid #F90A0A");
                    error_confirm_password = true;
                } else if(retype_password.length < 8){
                    $("#conf_pwd_error").html("").css("color", "#F90A0A");
                    $("#conf_pwd_error").show();
                    $("#conf_pwd").css("border-bottom","2px solid #F90A0A");
                    $("#pwd").css("border-bottom","2px solid #F90A0A");
                    error_confirm_password = true;
                } else {
                    $("#conf_pwd_error").html("");
                    $("#conf_pwd_error").show();
                    $("#pwd").css("border-bottom","2px solid #34F458");
                    $("#conf_pwd").css("border-bottom","2px solid #34F458");
                }
            }



            $("#form").submit(function() {
                error_fname = false;
                error_lname = false;
                error_email = false;
                error_password = false;
                error_confirm_password = false;

                check_fname();
                check_lname();
                check_email();
                check_password();
                check_confirm_password();

                if (error_fname === false && error_lname === false && error_email === false && error_password === false && error_confirm_password === false) {
                    return true;
                } else {
                    alert("Kérem megfelelő adatokkal töltse ki a mezőket!");
                    return false;
                }

            });

        });

    </script>

    <?php

        if(!isset($_GET['signup'])){
            exit();
        }
        else{
            $signupCheck = $_GET['signup'];

            if($signupCheck == "char"){
                echo "<p class='error'>Invalid name!</p>";
                exit();
            }
            elseif($signupCheck == "email"){
                echo "<p class='error'>Invalid Email!</p>";
                exit();
            }
            elseif($signupCheck == "password"){
                echo "<p class='error'>Password dont match!</p>";
                exit();
            }
            elseif($signupCheck == "usertaken"){
                echo "<p class='error'>A felhasználónév foglalt!</p>";
                echo '
                    <style>
                        #uid{
                            border: 2px solid red;
                        }
                    </style>
                ';
                exit();
            }

        }

    ?>
</div>

</body>
</html>

