<?php

session_start();

if(isset($_POST['submit'])){

    include '../action.php';

    $GLOBALS['marka'] = mysqli_real_escape_string($conn, $_POST['marka']);
    $GLOBALS['tipus'] = mysqli_real_escape_string($conn, $_POST['tipus']);
    $GLOBALS['évjárat'] = mysqli_real_escape_string($conn, $_POST['évjárat']);
    $GLOBALS['ar'] = mysqli_real_escape_string($conn, $_POST['ar']);
    $GLOBALS['kobcenti'] = mysqli_real_escape_string($conn, $_POST['kobcenti']);
    $GLOBALS['loero'] = mysqli_real_escape_string($conn, $_POST['loero']);


    $sql = "UPDATE cars SET marka='{$GLOBALS['marka']}', tipus='{$GLOBALS['tipus']}', évjárat='{$GLOBALS['évjárat']}', ar='{$GLOBALS['ar']}', kobcenti='{$GLOBALS['kobcenti']}', loero='{$GLOBALS['loero']}' WHERE user_id='{$_SESSION['u_id']}'  ";

    mysqli_query($conn, $sql);

    header("Location: ../profile.php?update=success");

}

