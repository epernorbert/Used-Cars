<?php
//these two lines are due to the back button from advertisemet.php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="search.css">
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
?>

<?php

if(isset($_POST['submit-search'])){
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $max_price = mysqli_real_escape_string($conn, $_POST['max_price']);
    $date_start = mysqli_real_escape_string($conn, $_POST['date_start']);


    // impode - array to string conversation. Ha NULL akkor hivát jelez, azért kell az IF.
    if($brand > 0){
        $sql_brand = "SELECT brands_name FROM car_brands WHERE brands_id = '$brand'";
        $result_brand = mysqli_query($conn, $sql_brand);
        $query_brand = mysqli_num_rows($result_brand);
        $brand_name_array = mysqli_fetch_assoc($result_brand);
        $brand_name = implode($brand_name_array);
    } else {
        $brand_name = "";
    }
    

    
    if(isset($_POST['date_end'])){
        $date_end = mysqli_real_escape_string($conn, $_POST['date_end']);
    } else {
        $date_end = "";
    }

    if(isset($_POST['min_price'])){
        $min_price = mysqli_real_escape_string($conn, $_POST['min_price']);
    } else {
        $min_price = "";
    }

    if(isset($_POST['min_cm3'])){
        $min_cm3 = mysqli_real_escape_string($conn, $_POST['min_cm3']);
    } else {
        $min_cm3 = "";
    }

    if(isset($_POST['max_cm3'])){
        $max_cm3 = mysqli_real_escape_string($conn, $_POST['max_cm3']);
    } else {
        $max_cm3 = "";
    }

    if(isset($_POST['max_hp'])){
        $max_hp = mysqli_real_escape_string($conn, $_POST['max_hp']);
    } else {
        $max_hp = "";
    }

    if(isset($_POST['min_hp'])){
        $min_hp = mysqli_real_escape_string($conn, $_POST['min_hp']);
    } else {
        $min_hp="";
    }


    if(isset($_POST['fueltype'])){

        $fueltype = mysqli_real_escape_string($conn, $_POST['fueltype']);

        $sql = "SELECT * from cars JOIN car_images ON cars.car_id=car_images.car_id WHERE
        (marka LIKE '$brand_name' OR '$brand_name' LIKE '') AND 
        (tipus LIKE '$type' OR '$type' LIKE '') AND 
        (ar >= '$min_price' AND ( ar <= '$max_price' OR '$max_price' LIKE '')) AND 
        (évjárat >= '$date_start' AND ( évjárat <= '$date_end' OR '$date_end' LIKE '')) AND 
        uzemanyag LIKE '$fueltype' AND 
        (kobcenti >= '$min_cm3' AND ( kobcenti <='$max_cm3' OR '$max_cm3' LIKE '')) AND 
        (loero >= '$min_hp' AND ( loero <= '$max_hp' OR '$max_hp' LIKE '')) GROUP BY user_id;";

    } else {
        $sql = "SELECT * from cars JOIN car_images ON cars.car_id=car_images.car_id WHERE
        (marka LIKE '$brand_name' OR '$brand_name' LIKE '') AND 
        (tipus LIKE '$type' OR '$type' LIKE '') AND 
        (ar >= '$min_price' AND ( ar <= '$max_price' OR '$max_price' LIKE '')) AND 
        (évjárat >= '$date_start' AND ( évjárat <= '$date_end' OR '$date_end' LIKE '')) AND 
        (kobcenti >='$min_cm3' AND ( kobcenti <='$max_cm3' OR '$max_cm3' LIKE '')) AND 
        (loero >= '$min_hp' AND ( loero <= '$max_hp' OR '$max_hp' LIKE '')) GROUP BY user_id;";
    }

}

$result = mysqli_query($conn, $sql);
$queryResult = mysqli_num_rows($result);

if($queryResult > 0){
    while($row = mysqli_fetch_assoc($result)){
        if($row['uzemanyag'] == 'Elektromos'){
            echo '<div style="margin-left: 10%; margin-right: 9%;">' . '<div class="index_db" style=" float: left; background-color: #91D184;">' . '<p style="margin: 3px 0;" >'  . $row['marka'] . " " . $row['tipus'] . '</p>' . $row['ar'] . "€" . " " . $row['évjárat']  .  '<div style="border: 2px solid black;"> <a href="advertisement.php?car_id='.$row['car_id'].'" > <img class="image" src=uploads/' .$row['image_name']  .' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;" > </a> </div> ' . '</div>' . '</div>';
         } else {
             echo '<div style="margin-left: 10%; margin-right: 9%;">' . '<div class="index_db" style=" float: left;">' . '<p style="margin: 3px 0;" >'  . $row['marka'] . " " . $row['tipus'] . '</p>' . $row['ar'] . "€" . " " . $row['évjárat']  .  '<div style="border: 2px solid black;"> <a href="advertisement.php?car_id='.$row['car_id'].'" > <img class="image" src=uploads/' .$row['image_name']  .' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;" > </a> </div> ' . '</div>' . '</div>';
        }
    }
} else {
    echo  '<div style="background-color: red;">
                 <script>                                                  
                          alert("A keresésnek nincs eredménye!");
                          location.href="index.php";
                 </script> 
           </div>';
}

?>






