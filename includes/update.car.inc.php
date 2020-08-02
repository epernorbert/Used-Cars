<?php

session_start();

if(isset($_POST['submit'])){

    include '../action.php';

    $GLOBALS['évjárat'] = mysqli_real_escape_string($conn, $_POST['évjárat']);
    $GLOBALS['ar'] = mysqli_real_escape_string($conn, $_POST['ar']);
    $GLOBALS['fuel_type'] = mysqli_real_escape_string($conn, $_POST['fuel_type']);
    $GLOBALS['kobcenti'] = mysqli_real_escape_string($conn, $_POST['kobcenti']);
    $GLOBALS['loero'] = mysqli_real_escape_string($conn, $_POST['loero']);
    $GLOBALS['body_style'] = mysqli_real_escape_string($conn, $_POST['body_style']);
    $GLOBALS['mileage'] = mysqli_real_escape_string($conn, $_POST['mileage']);
    $GLOBALS['euro'] = mysqli_real_escape_string($conn, $_POST['euro']);
    $GLOBALS['colour'] = mysqli_real_escape_string($conn, $_POST['colour']);
    $GLOBALS['transmission'] = mysqli_real_escape_string($conn, $_POST['transmission']);
    $GLOBALS['weight'] = mysqli_real_escape_string($conn, $_POST['weight']);
    $GLOBALS['identification_number'] = mysqli_real_escape_string($conn, $_POST['identification_number']);
    $GLOBALS['description'] = mysqli_real_escape_string($conn, $_POST['description']);


    $sql = "UPDATE cars SET évjárat='{$GLOBALS['évjárat']}', ar='{$GLOBALS['ar']}', uzemanyag='{$GLOBALS['fuel_type']}', kobcenti='{$GLOBALS['kobcenti']}', loero='{$GLOBALS['loero']}', body_style='{$GLOBALS['body_style']}', mileage='{$GLOBALS['mileage']}', euro='{$GLOBALS['euro']}', colour='{$GLOBALS['colour']}', transmission='{$GLOBALS['transmission']}', weight='{$GLOBALS['weight']}', identification_number='{$GLOBALS['identification_number']}', description='{$GLOBALS['description']}' WHERE user_id='{$_SESSION['u_id']}'  ";

    mysqli_query($conn, $sql);

    header("Location: ../profile.php?update=success");

}

