<?php

session_start();
include '../action.php';

if($_SESSION['u_usertype'] == 'admin'){

    $sql = "DELETE FROM users where user_id='{$_GET['user_id']}'";
    $result = mysqli_query($conn, $sql);
    header("Location: ../admin/admin.php?user=delete=succes");
}