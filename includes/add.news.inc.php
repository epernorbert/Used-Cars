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

    //check image validition
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    // accept image type
    $allowed = array('jpg', 'jpeg', 'bmp');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 6000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../news_image/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $sql = "INSERT INTO news (user_id, news_title, news_text, news_image) VALUE ( '$user_id', '$title', '$text', '$fileNameNew');";
                mysqli_query($conn, $sql);

                header("Location: ../add_news.php?insert=success");
                exit();

            }
            header("Location: ../add_news.php?file=is=to=big");
            exit();
        }
        header("Location: ../add_news.php?There=was=an=error=uploading=your=file");
        exit();
    }
    header("Location: ../add_news.php?you=cant=upload=this=files=of=this=type");
    exit();
}


?>