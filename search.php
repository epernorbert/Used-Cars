<?php
include 'action.php';
?>

<?php

if(isset($_POST['submit-search'])){
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $min_price = mysqli_real_escape_string($conn, $_POST['min_price']);
    $max_price = mysqli_real_escape_string($conn, $_POST['max_price']);
    $date_start = mysqli_real_escape_string($conn, $_POST['date_start']);
    $date_end = mysqli_real_escape_string($conn, $_POST['date_end']);
    $min_cm3 = mysqli_real_escape_string($conn, $_POST['min_cm3']);
    $max_cm3 = mysqli_real_escape_string($conn, $_POST['max_cm3']);
    $min_hp = mysqli_real_escape_string($conn, $_POST['min_hp']);
    $max_hp = mysqli_real_escape_string($conn, $_POST['max_hp']);



    if(isset($_POST['fueltype'])){

        $fueltype = mysqli_real_escape_string($conn, $_POST['fueltype']);

        $sql = "SELECT * from cars WHERE
        (marka LIKE '$brand' OR '$brand' LIKE '') AND 
        (tipus LIKE '$type' OR '$type' LIKE '') AND 
        (ar >= '$min_price' AND ( ar <= '$max_price' OR '$max_price' LIKE '')) AND 
        (évjárat >= '$date_start' AND ( évjárat <= '$date_end' OR '$date_end' LIKE '')) AND 
        uzemanyag LIKE '$fueltype' AND 
        (kobcenti >= '$min_cm3' AND ( kobcenti <='$max_cm3' OR '$max_cm3' LIKE '')) AND 
        (loero >= '$min_hp' AND ( loero <= '$max_hp' OR '$max_hp' LIKE ''))";

    } else {
        $sql = "SELECT * from cars WHERE
        (marka LIKE '$brand' OR '$brand' LIKE '') AND 
        (tipus LIKE '$type' OR '$type' LIKE '') AND 
        (ar >= '$min_price' AND ( ar <= '$max_price' OR '$max_price' LIKE '')) AND 
        (évjárat >= '$date_start' AND ( évjárat <= '$date_end' OR '$date_end' LIKE '')) AND 
        (kobcenti >='$min_cm3' AND ( kobcenti <='$max_cm3' OR '$max_cm3' LIKE '')) AND 
        (loero >= '$min_hp' AND ( loero <= '$max_hp' OR '$max_hp' LIKE ''))";
    }

}

$result = mysqli_query($conn, $sql);
$queryResult = mysqli_num_rows($result);

if($queryResult > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo $row['marka'] . " " . $row['tipus'] . " " . $row['uzemanyag'] . " " . $row['ar'] . "€" . " " . $row['évjárat'] . " " . $row['kobcenti'] . "cm3" . " " . $row['loero'] . "hp" . " " .  '<img class="image" src=uploads/' .$row['kep']  .' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;" >' .  "<br>" ;
    }
} else{
    echo "There ara no result matchin your search!";
}

?>




