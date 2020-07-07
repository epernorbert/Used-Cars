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

    //news image at index.php
    $file = $_FILES['image']['name'];
    $filetmp = $_FILES['image']['tmp_name'];

    // uniq image name with image_name_time
    $new_file_name = time()."_".$file;
    move_uploaded_file($filetmp, '../news_image/'.$new_file_name);

    // current user who logged in
    $user_id = $_SESSION['u_id'];

    $sql = "INSERT INTO news (user_id, news_title, news_text, news_image) VALUE ( '$user_id', '$title', '$text', '$new_file_name');";
    mysqli_query($conn, $sql);

    header("Location: ../add_news.php?insert=success");
    exit();


}


?>