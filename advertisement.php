<?php

include 'action.php';

$sql = "SELECT * from cars where car_id='{$_GET['car_id']}'";

$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

echo $row['marka'] . " " . $row['tipus'] . " " . $row['uzemanyag'] . " " . $row['ar'] . "€" . " " . $row['évjárat'] . " " .
    $row['kobcenti'] . "cm3" . " " . $row['loero'] . "hp" .
    '<img src=uploads/'.$row['kep'].' style="display: block; object-fit: cover;/*nagyítás, egyforma képek */ width: 146px; height: 93px;"> 
    <img src=uploads/'.$row['image_2'].' style="display: block; object-fit: cover;/*nagyítás, egyforma képek */ width: 146px; height: 93px;">
     <img src=uploads/'.$row['image_3'].' style="display: block; object-fit: cover;/*nagyítás, egyforma képek */ width: 146px; height: 93px;">
     <img src=uploads/'.$row['image_4'].' style="display: block; object-fit: cover;/*nagyítás, egyforma képek */ width: 146px; height: 93px;">
     <img src=uploads/'.$row['image_5'].' style="display: block; object-fit: cover;/*nagyítás, egyforma képek */ width: 146px; height: 93px;">'  . "<br>" ;

