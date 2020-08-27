<?php

    //$connect = mysqli_connect("localhost", "root", "", "usedcars");

    include 'action.php';

    $output = '';
    $sql = "SELECT * FROM car_type WHERE brands_id = '".$_POST["brandsId"]."' ORDER BY type_name";
    $result = mysqli_query($conn, $sql);
    $output = '<option value="" hidden="">Típus</option>';
    while($row = mysqli_fetch_array($result)){
        $output .= '<option value="'.$row['type_name'].'">'.$row['type_name'].'</option>';
    }

    echo $output;

?>

