<?php

session_start();
include '../action.php';

if($_SESSION['u_usertype'] == 'user'){

    $sql = "DELETE FROM cars where car_id='{$_GET['car_id']}'";
    $result = mysqli_query($conn, $sql);
    header("Location: ../profile.php?delete=success");

}elseif($_SESSION['u_usertype'] == 'admin'){

    $sql = "DELETE FROM cars where user_id='{$_GET['user_id']}'";
    $result = mysqli_query($conn, $sql);
    header("Location: ../admin/admin.php?advertisement=delete=successssss");
}
