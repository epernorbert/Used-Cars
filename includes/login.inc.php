<?php

session_start();

if(isset($_POST['submit'])){

    include '../action.php';


    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);


    //Error handlers
    //Check if inputs are empty

    if(empty($uid) || empty($pwd)){
        header("Location: ../login.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * from users where user_uid='$uid' OR user_email='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1){
            header("Location: ../login.php?login=username");
            exit();
        } else {
            if($row = mysqli_fetch_assoc($result)){
                // De-hashing the password
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if($hashedPwdCheck == false){
                    header("Location: ../login.php?login=error&uid=$uid");
                    exit();
                } elseif ($hashedPwdCheck == true){
                    // Log in the user here
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_telephone'] = $row['user_telephone'];
                    $_SESSION['u_uid'] = $row['user_uid'];
                    $_SESSION['u_usertype'] = $row['user_usertype'];

                    $GLOBALS['keresztnev'] = $row['user_id'];

                    // Check user or admin
                    if($_SESSION['u_usertype'] == 'admin'){
                        header("Location: ../admin/admin.php");
                        exit();
                    } else {
                    header("Location: ../index.php?login=success");
                    exit();
                    }
                }
            }
        }
    }
} else {
    header("Location: ../login.php?login=error");
    exit();
}