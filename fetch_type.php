<?php

$connect = mysqli_connect("localhost", "root", "", "usedcars");
$output = '';
$sql = "SELECT * FROM car_type WHERE brands_id = '".$_POST["brandsId"]."' ORDER BY type_name";
$result = mysqli_query($connect, $sql);
$output = '<option value="">Válassz típust</option>';
while($row = mysqli_fetch_array($result)){
    $output .= '<option value="'.$row['type_name'].'">'.$row['type_name'].'</option>';
}

echo $output;

?>

