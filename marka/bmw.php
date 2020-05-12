<?php
include '../action.php';

$sql = "select * from cars where marka LIKE 'bmw'";

$result = mysqli_query($conn, $sql);
$queryResult = mysqli_num_rows($result);

if($queryResult > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo $row['marka'] . " " . $row['tipus'] . " " . $row['uzemanyag'] . " " . $row['ar'] . "€" . " " . $row['évjárat'] . " " .
            $row['kobcenti'] . "cm3" . " " . $row['loero'] . "hp" . '<img src=../uploads/'.$row['kep'].' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;" >' .  "<br>" ;
    }
} else{
    echo "There ara no result matchin your search!";
}