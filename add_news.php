<?php
    session_start();
    if(!isset($_SESSION['u_usertype']) || $_SESSION['u_usertype'] == 'user' || $_SESSION['u_usertype'] == 'admin'){
        header("Location: index.php?error=writer");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/add_news.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Használtautók</title>
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body>

<div class="logo_div"> 
    <img class="logo" src="peugeot_208/logohd.jpg" height="75"> 
</div>
<div class="navbar">
    <ul>
        <li><a href="index.php">Kezdőlap</a></li>
        <li><a href="#">Keresés</a></li>
        <li><a href="#">Hírek</a></li>
        <li><a href="login.php">Bejelentkezés</a></li>
        <li><a href="#">Kapcsolat</a></li>
        <?php
            if(isset($_SESSION['u_id'])){
                echo '<li class="navbar_li"><a class="navbar_a" href="add_news.php">Hír közzététele</a></li>';
            }
        ?>
    </ul>
</div>

<div class="content">
    <form action="./includes/add.news.inc.php" method="post" enctype="multipart/form-data" id="news_form">
        <input type="text" name="title" placeholder="Cím" style="width: 50%"><br><br>
        <label for="news_form">
            <textarea name="text" id="text" form="news_form">Szöveg...</textarea><br>
        </label>
        <input type="file" name="image">
        <button type="submit" name="submit" style="width: 100px">Közzétesz</button>
    </form>
    <script>
        var editor = CKEDITOR.replace ('text', {
            extraPlugins: 'filebrowser',
            filebrowserBrowseUrl: 'browser.php',
            filebrowserUploadMethod: 'form',
            filebrowserUploadUrl: 'includes/upload_news_image.php'
        });
    </script>
</div>








