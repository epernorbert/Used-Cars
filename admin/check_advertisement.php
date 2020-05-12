<?php

session_start();

if(!isset($_SESSION['u_id']) || $_SESSION['u_usertype'] == 'user'){

    header("Location: ../index.php?=you=need=to=login");

}?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin page</title>
        <link type="text/css" rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>


<div class="navbar">
    <ul class="navbar_ul">
        <li class="navbar_li"><a class="navbar_a" href="../index.php">Kezdőlap</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Keresés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Hírek</a></li>
        <li class="navbar_li"><a class="navbar_a" href="../login.php">Bejelentkezés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Kapcsolat</a></li>
        <?php
        if(isset($_SESSION['u_id'])){
            echo '<li class="navbar_li"><a class="navbar_a" href="admin.php">Admin</a></li>';
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




<?php

include '../action.php';

$sql = "SELECT * from cars WHERE user_id='{$_GET['user_id']}'";

$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

if(isset($row['marka'])){

    echo '<div style="margin: 0 0 0 10%">';
    echo $row['marka'] . " " . $row['tipus'] . " " . $row['uzemanyag'] . " " . $row['ar'] . "€" . " " . $row['évjárat'] . " " .
         $row['kobcenti'] . "cm3" . " " . $row['loero'] . "hp" .
        '<img src=../uploads/'.$row['kep'].' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;" >
        <img src=../uploads/'.$row['image_2'].' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;" >
        <img src=../uploads/'.$row['image_3'].' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;" >
        <img src=../uploads/'.$row['image_4'].' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;" >
        <img src=../uploads/'.$row['image_5'].' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;" >' . "<br>" ;
        echo '<button onclick="confirm_delete()" style="background-color: red; cursor: pointer;">Hírdetés Törlés</button>';
        echo '<button onclick="confirm_delete_car()" style="background-color: red; cursor: pointer; margin-left: 50px">Profil törlése</button>';
    echo '</div>';

} else {
    echo '<div style="margin: 0 0 0 10%">';
    echo "Nincs hírdetés!";
    echo '<button onclick="confirm_delete_car()" style="background-color: red; cursor: pointer; margin-left: 50px">Profil törlése</button>';
    echo '</div>';
}

?>

<script>
    function confirm_delete() {
        var r = confirm("Biztos törli a hírdetést?");
        if (r == true) {
            location.href = "../includes/delete.inc.php?<?php echo "user_id=" . $_GET['user_id'] ?>";
        }
    }

    function confirm_delete_car() {
        var r = confirm("Biztos törli a felhasználót?");
        if (r == true) {
            location.href = "../includes/delete.car.inc.php?<?php echo "user_id=" . $_GET['user_id'] ?>";
        }
    }


</script>
