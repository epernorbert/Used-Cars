<?php
    session_start();
    include_once 'action.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/news.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Hírek</title>
    <!-- CKEditor link -->
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>

<div> 
    <img class="logo" src="peugeot_208/logohd.jpg" height="75"> 
</div>
<div class="navbar">
    <ul>
        <li><a href="index.php">Kezdőlap</a></li>
        <li><a href="#">Keresés</a></li>
        <li><a href="news.php">Hírek</a></li>
        <li><a href="login.php">Bejelentkezés</a></li>
        <li><a href="#">Kapcsolat</a></li>
        <?php
            if(isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='user'){
                echo '<li><a href="add.php">Hírdetés feladás</a></li>';
            } elseif( isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='admin') {
                echo '<li><a href="admin/admin.php">Admin</a></li>';
            } elseif( isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='writer'){
                echo '<li><a href="add_news.php">Hír közzététele</a></li>';
            }
        ?>
    </ul>
</div>

<?php

    $title = $_GET['news_title'];
    $sql = "SELECT * FROM news WHERE news_title = '$title'";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);

    if( $resultcheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo '<div class="news_display">' . 
                     '<div>' . 
                         $row['news_title'] . 
                     '</div>' . '<br>' . 
                         $row['news_text'] . 
                 '</div>';
        }
    }

?>