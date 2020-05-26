<?php

session_start();

if(isset($_POST['submit'])){

    include_once '../action.php';

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $text = mysqli_real_escape_string($conn, $_POST['text']);

    if(empty($title) || empty($text)){
        header("Location: ../add_news.php?empty=fields");
        exit();
    }

    // current user who logged in
    $user_id = $_SESSION['u_id'];


    $sql = "INSERT INTO news (user_id, news_title, news_text) VALUE ( '$user_id', '$title', '$text');";
    mysqli_query($conn, $sql);

    header("Location: ../add_news.php?insert=success");
    exit();


}


?>