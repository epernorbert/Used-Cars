<?php


    if(isset($_POST['submit'])){

        include '../action.php';

        $GLOBALS['user_uid'] = mysqli_real_escape_string($conn, $_POST['username']);
        $GLOBALS['user_first'] = mysqli_real_escape_string($conn, $_POST['first']);
        $GLOBALS['user_last'] = mysqli_real_escape_string($conn, $_POST['last']);
        $GLOBALS['user_email'] = mysqli_real_escape_string($conn, $_POST['email']);
        $GLOBALS['user_usertype'] = mysqli_real_escape_string($conn, $_POST['usertype']);

        $sql = "UPDATE users SET user_uid='{$GLOBALS['user_uid']}', user_first='{$GLOBALS['user_first']}', user_last='{$GLOBALS['user_last']}', user_email='{$GLOBALS['user_email']}', user_usertype='{$GLOBALS['user_usertype']}' WHERE user_id='{$_GET['user_id']}'";

        mysqli_query($conn, $sql);   

        // detect user_id
        $user_id = $_GET['user_id'];

        header("Location:check_advertisement.php?user_id=$user_id");        
    }

