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

    echo '<div style="margin: 1% 10% 0 10%;">';
        echo '<div style="float: left;">' .
                $row['marka']  . " " . $row['tipus']  . " " . $row['évjárat'] . " " . $row['ar'] . " " . "€" . "<br>" .
                $row['uzemanyag']  . "<br>" .
                $row['kobcenti'] . " " . "Cm3" . "<br>" .
                $row['loero'] . " " . "Le"  . "<br>" .
                $row['body_style'] .  "<br>" .
                $row['mileage'] . " " . "Km"  . "<br>" .
                $row['euro']  . "<br>" .
                $row['colour']  . "<br>" .
                $row['transmission']  . "<br>" .
                $row['weight'] . " " . "Kg" . "<br>" .
                $row['identification_number']  . "<br>" .
                $row['description'] . "<br>";


            $sql_extras = "SELECT * FROM car_extras WHERE car_id='{$_GET['car_id']}'";
            $result_extras = mysqli_query($conn, $sql_extras);
            $resultcheck_extras = mysqli_num_rows($result_extras);
            while($row_extras = mysqli_fetch_assoc($result_extras)){
                echo '<div>';
                    echo $row_extras['extras'];
                echo '</div>';
        }
        echo '</div>';


        $sql_img = "select image_name from car_images where car_id='{$_GET['car_id']}'";
        $result_img = mysqli_query($conn, $sql_img);
        $resultcheck_img = mysqli_num_rows($result_img);
        while($row_img = mysqli_fetch_assoc($result_img)) {

            echo '<div style="float: left;">
                        <img class="image" src=uploads/' .$row_img['image_name']  .' 
                        style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;" >
                  </div>';

        }
    echo '</div>';




?>