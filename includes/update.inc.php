<?php

session_start();

if(isset($_POST['submit'])){
    include '../action.php';


    /*$u_first = mysqli_real_escape_string($conn, $_POST['u_first']);
    $u_last = mysqli_real_escape_string($conn, $_POST['u_last']);
    $u_email = mysqli_real_escape_string($conn, $_POST['u_email']);*/

    $_SESSION['u_first'] = mysqli_real_escape_string($conn, $_POST['u_first']);
    $_SESSION['u_last'] = mysqli_real_escape_string($conn, $_POST['u_last']);
    $_SESSION['u_email'] = mysqli_real_escape_string($conn, $_POST['u_email']);


    $sql = "UPDATE users SET user_first='{$_SESSION['u_first']}', user_last='{$_SESSION['u_last']}', u_email='{$_SESSION['u_email']}' WHERE user_uid='eperdavid';";


    mysqli_query($conn, $sql);

    header("Location: ../profile.php?update=success");

}