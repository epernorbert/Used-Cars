<?php

session_start();

if(isset($_POST['submit'])){
    include '../action.php';    

    $_SESSION['u_first'] = mysqli_real_escape_string($conn, $_POST['u_first']);
    $_SESSION['u_last'] = mysqli_real_escape_string($conn, $_POST['u_last']);
    $_SESSION['u_email'] = mysqli_real_escape_string($conn, $_POST['u_email']);
    $_SESSION['u_telephone'] = mysqli_real_escape_string($conn, $_POST['u_telephone']);


    $sql = "UPDATE users SET user_first='{$_SESSION['u_first']}', user_last='{$_SESSION['u_last']}', u_email='{$_SESSION['u_email']}, user_telephone='{$_SESSION['u_telephone']}' WHERE user_uid='masodik';";


    mysqli_query($conn, $sql);

    header("Location: ../profile.php?update=success");

}