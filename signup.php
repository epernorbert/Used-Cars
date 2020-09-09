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

<div> <img  style="float: left; display: inline-block; margin-top: 2%; margin-left: 10%; " src="peugeot_208/logohd.jpg" height="75"> </div>
<div class="navbar" style="margin-bottom: 6%;" >
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

<div align="center" style="margin: 3% 27%; background-color: white; display: inline-block; width: 565px; padding: 10px 6px;">
<form id="form" action="includes/signup.inc.php" name="form" method="post">
    <div style="float:left; margin-right: 20px; ">
        <?php
            if(isset($_GET['first'])){
                $first = $_GET['first'];
                echo '<div>';
                    echo '<i class="fa fa-user" style="background-color: green; padding: 8px; position: relative; left: 11px; bottom: 1px; " ></i>';
                    echo '<input type="text" name="first" id="first" placeholder="Keresztnév" value="'.$first.'"><br>';
                echo '</div>';            
            }
            else {
                echo '<div>';
                    echo '<i class="fa fa-user" style="background-color: green; padding: 8px; position: relative; left: 11px; bottom: 1px; " ></i>';
                    echo '<input type="text" name="first" id="first" placeholder="Keresztnév" required=""><br>';
                echo '</div>';    
                echo '<div id="first_error"></div>';
            }

            if(isset($_GET['last'])){
                $last = $_GET['last'];
                echo '<div>';
                    echo '<i class="fa fa-user" style="background-color: green; padding: 8px; position: relative; left: 11px; bottom: 1px;  " ></i>';
                    echo '<input type="text" name="last" id="last" placeholder="Vezetéknév" value="'.$last.'"><br>';
                echo '</div>';
            }
            else {
                echo '<div>';
                    echo '<i class="fa fa-user" style="background-color: green; padding: 8px; position: relative; left: 11px; bottom: 1px;  " ></i>';
                    echo '<input type="text" name="last" id="last" placeholder="Vezetéknév" required=""><br>';
                echo '</div>';    
                echo '<div id="last_error"></div>';
            }
        ?>

        <div>
            <i class="fa fa-envelope" style="background-color: green; padding: 8px; position: relative; left: 13px; bottom: 1px;  " ></i>
            <input type="text" name="email" id="email" placeholder="E-mail" required="" style="position: relative; right: 2px;" ><br>
        </div>
        <div id="email_error"></div>

        <?php
            if(isset($_GET['uid'])){
                $uid = $_GET['uid'];
                echo '<div>';
                    echo '<i class="fa fa-user-o" style="background-color: green; padding: 8px; position: relative; left: 11px; bottom: 1px;  "></i>';
                    echo '<input type="text" name="uid" id="uid" placeholder="Felhasználónév" value="'.$uid.'"><br>';
                echo '</div>';    
            }
            else {
                echo '<div>';
                    echo '<i class="fa fa-user-o" style="background-color: green; padding: 8px; position: relative; left: 11px; bottom: 1px;  "></i>';
                    echo '<input class="uid-class" type="text" name="uid" id="uid" placeholder="Felhasználónév" required=""><br>';
                echo '</div>';    
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
    </div>

    <div>
        <div >
            <i class="fa fa-key" style="background-color: green; padding: 8px; position: relative; left: 15px; bottom: 1px; "></i>
            <input type="password" name="pwd" id="pwd" placeholder="Jelszó" required=""><br>
        <div>
        <div id="pwd_error"></div>
        <div>
            <i class="fa fa-key" style="background-color: green; padding: 8px; position: relative; left: 15px; bottom: 1px; "></i>
            <input type="password" name="conf_pwd" id="conf_pwd" placeholder="Jelszó ismét" required=""><br>
        </div>
        <div id="conf_pwd_error"></div>
        <div>
            <i class="fa fa-phone-square" style="background-color: green; padding: 8px; position: relative; left: 15px; bottom: 1px; "></i>
            <input type="number" name="telephone" id="telephone" placeholder="Telefonszám" required="" oninput="telephone_check()"><br>
        <div>
        <div id="telephone_error"></div>
        <div>
            <i class="fa fa-building" style="background-color: green; padding: 8px; position: relative; left: 5px; "></i>
            <select style="text-align: center;  font-size: 14px; width: 202px; height: 35px; margin-top: 10px; " >
                <option value="" hidden="">Város</option>
                <option value="Budapest">Budapest</option>
                <option value="Debrecen">Debrecen</option>
                <option value="Kecskemét">Kecskemét</option>
                <option value="Szeged">Szeged</option>            
                <option value="Szombathely">Szombathely</option>
            </select>
        <div>
    <div>
    <div style="clear: both;">
        <button type="submit" name="submit" id="submit" style="width: 202px;cursor: pointer; height: 33px; ">Regisztráció</button>
    </div>
</form>

    <script type="text/javascript">

        function telephone_check(){
            var telephone = document.getElementById("telephone").value;
            var regex = /^[0-9]/;
            if(!regex.test(telephone)){
                document.getElementById("telephone").value = '';
            } else if(telephone.length > 10){
                var limit = telephone.slice(0, 10);
                document.getElementById("telephone").value = limit;
            }
        }


        $(function () {

            $("#first_error").hide();
            $("#last_error").hide();
            $("#email_error").hide();
            $("#pwd_error").hide();
            $("#conf_pwd_error").hide();
            $("#telephone_error").hide();


            var error_fname = false;
            var error_lname = false;
            var error_email = false;
            var error_password = false;
            var error_confirm_password = false;
            var error_telephone = false;


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

            $("#telephone").focusout(function() {
                check_telephone();
            });


            function check_fname() {
                var pattern = /^[a-zA-Z\sÁÉÍÓÖŐÚÜŰáéíóöőúüű]*$/;
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
                var pattern = /^[a-zA-Z\sÁÉÍÓÖŐÚÜŰáéíóöőúüű]*$/;
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
                    $("#conf_pwd_error").html("A jelszavak nem egyeznek!").css("color", "#F90A0A");
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

            function check_telephone(){
                var telephone = $("#telephone").val();
                if(telephone.length < 6){
                    $("#telephone").css("border-bottom","2px solid #F90A0A");
                    $("#telephone_error").html("Minimum 6 karakter!").css("color", "#F90A0A");
                    $("#telephone_error").show();
                    error_telephone = true;
                } else {
                    $("#telephone").css("border-bottom","2px solid #34F458");
                    $("#telephone_error").html("");
                }
            }



            $("#form").submit(function() {
                error_fname = false;
                error_lname = false;
                error_email = false;
                error_password = false;
                error_confirm_password = false;
                error_telephone = false;

                check_fname();
                check_lname();
                check_email();
                check_password();
                check_confirm_password();
                check_telephone();

                if (error_fname === false && error_lname === false && error_email === false && error_password === false && error_confirm_password === false && error_telephone === false) {
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

