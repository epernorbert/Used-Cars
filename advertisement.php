<?php
    //these two lines are due to the back button from advertisemet.php
    header('Cache-Control: no cache'); //no cache
    session_cache_limiter('private_no_expire'); // works
    //session_cache_limiter('public'); // works too
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="advertisemen.css">
    <link type="text/css" rel="stylesheet" href="lightbox-image/lightbox.min.css">
    <script type="text/javascript" src="lightbox-image/lightbox-plus-jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Hirdetés</title>
</head>
<body>

<div class="navbar">
    <ul class="navbar_ul">
        <li class="navbar_li"><a class="navbar_a" href="index.php">Kezdőlap</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Keresés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="news.php">Hírek</a></li>
        <li class="navbar_li"><a class="navbar_a" href="login.php">Bejelentkezés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Kapcsolat</a></li>
        <?php
        if(isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='user'){
            echo '<li class="navbar_li"><a class="navbar_a" href="add.php">Hírdetés feladás</a></li>';
        } elseif( isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='admin') {
            echo '<li class="navbar_li"><a class="navbar_a" href="admin/admin.php">Admin</a></li>';
        } elseif( isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='writer'){
            echo '<li class="navbar_li"><a class="navbar_a" href="add_news.php">Hír közzététele</a></li>';
        }
        ?>
    </ul>
</div>
<div  class="navbar_social">
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-google"></a><br>
    <a href="#" class="fa fa-instagram"></a>
    <a href="#" class="fa fa-twitter"></a>
</div><br>


<?php

    include 'action.php';

    $sql = "SELECT * from cars where car_id='{$_GET['car_id']}'";

    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    


    echo '<div style="margin: 0 10% 0 10%;" >';
        echo '<div style="background-color: brown; float: left; width: 40%;">';       
            echo'<table>
                    <tr>
                        <td>Márka: </td>
                        <td>'.$row['marka'].'</td>
                    </tr>
                    <tr>
                        <td>Típus: </td>
                        <td>'.$row['tipus'].'</td>
                    </tr>
                    <tr>
                        <td>Évjárat: </td>
                        <td>'.$row['évjárat'].'</td>
                    </tr>
                    <tr>
                        <td>Ár: </td>
                        <td>'.$row['ar'].'</td>
                    </tr>
                    <tr>
                        <td>Üzemanyag:</td>
                        <td>'.$row['uzemanyag'].'</td>
                    </tr>
                    <tr>
                        <td>Köbceni: </td>
                        <td>'.$row['kobcenti'].'</td>
                    </tr>
                    <tr>
                        <td>Lóerő: </td>
                        <td>'.$row['loero'].'</td>
                    </tr>
                    <tr>
                        <td>Kivitel: </td>
                        <td>'.$row['body_style'].'</td>
                    </tr>
                    <tr>
                        <td>Kilóméter óra állása: </td>
                        <td>'.$row['mileage'].'</td>
                    </tr>
                    <tr>
                        <td>Környezetvédelmi osztály: </td>
                        <td>'.$row['euro'].'</td>
                    </tr>
                    <tr>
                        <td>Szín: </td>
                        <td>'.$row['colour'].'</td>
                    </tr>
                    <tr>
                        <td>Sebességváltó típusa: </td>
                        <td>'.$row['transmission'].'</td>
                    </tr>
                    <tr>
                        <td>Saját tömeg: </td>
                        <td>'.$row['weight'].'</td>
                    </tr>
                    <tr>
                        <td>Alvázszám: </td>
                        <td>'.$row['identification_number'].'</td>
                    </tr>
                    <tr>
                        <td>Rövid leírás: </td>
                        <td>'.$row['description'].'</td>
                    </tr>
            </table>';
        echo '</div>';    
                    

        $sql_img = "select image_name from car_images where car_id='{$_GET['car_id']}'";
        $result_img = mysqli_query($conn, $sql_img);
        $resultcheck_img = mysqli_num_rows($result_img);

        echo '<div style="background-color: red; float: right; width: 60%">';
            while($row_img = mysqli_fetch_assoc($result_img)) {
                echo '<div class="gallery">';
                    echo '<a href="uploads/'.$row_img['image_name'].'" data-lightbox="mygallery" > <img class="image" src=uploads/' .$row_img['image_name']. ' style="float:left; display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 200px; height: 125px; margin: 0 0 2% 2%;"> </a>';
                echo '</div>';

            }
        echo '</div>';

            
        $sql_extras = "SELECT * FROM car_extras WHERE car_id='{$_GET['car_id']}'";
        $result_extras = mysqli_query($conn, $sql_extras);
        $resultcheck_extras = mysqli_num_rows($result_extras);

        echo '<div style="background-color: yellow; clear: both;">';
            echo '<div style="font-size: 25px;">Felszereltség: </div>';
            while($row_extras = mysqli_fetch_assoc($result_extras)){    
                    echo $row_extras['extras'] . '<br>';
            }
        echo '</div>';
        

    echo '</div>';
        

?>

</body>
</html>