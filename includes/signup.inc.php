<?php

if(isset($_POST['submit'])){

    include_once '../action.php';


    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $conf_pwd = mysqli_real_escape_string($conn, $_POST['conf_pwd']);

    //Error handlers
    //Empty fields
    if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) || empty($conf_pwd)){
        header("Location: ../signup.php?signup=error=emptyfield");
        exit();
    } else{
        //Check if input charachers are valid
        if(!preg_match("/^[a-zA-Z\s]*$/", $first) || !preg_match("/^[a-zA-Z\s]*$/", $last))  {
            header("Location: ../signup.php?signup=error=invalid");
            exit();
        } else {
            //Check if email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../signup.php?signup=error=email");
                exit();
                } else {
                    // Confirm Password
                    if($pwd !== $conf_pwd){
                        header("Location: ../signup.php?signup=error=password=not=match");
                        exit();
                } else {
                    $sql = "SELECT * from users WHERE user_uid='$uid'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck > 0){
                        header("Location: ../signup.php?signup=error=usertaken");
                        exit();
                    }
                }
            }
        }
    }

    //Password hashing
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    //Insert the user into the database
    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUE ('$first','$last','$email','$uid','$hashedPwd');";

    mysqli_query($conn, $sql);
    header("Location: ../login.php?signup=succes");
    exit();

} else {
    header("Location: ../index.php");
}