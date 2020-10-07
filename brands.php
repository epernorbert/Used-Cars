<?php
    /*//these two lines are due to the back button from advertisemet.php
    header('Cache-Control: no cache'); //no cache
    session_cache_limiter('private_no_expire'); // works
    //session_cache_limiter('public'); // works too*/    
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/brands.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Brands</title>
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

    include 'action.php';

    $sql = "SELECT * FROM cars JOIN car_images ON cars.car_id=car_images.car_id WHERE marka='{$_GET['brand']}' GROUP BY user_id;";

    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    if($queryResult > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo '<div style="margin-left: 10%">' . 
                    '<div class="index_db">' . 
                        '<p style="margin: 3px 0;" >'  . 
                            $row['marka'] . " " . 
                            $row['tipus'] . 
                        '</p>' . 
                        $row['ar'] . "€" . " " . 
                        $row['évjárat']  .  
                            '<div style="border: 2px solid black;"> 
                                <a href="advertisement.php?car_id='.$row['car_id'].'" > 
                                    <img class="image" src=uploads/' .$row['image_name'] .'> 
                                </a> 
                            </div> ' . 
                     '</div>' . 
                '</div>';
        }

    } else {
        echo '<div style="background-color: red;">
                 <script>                                                  
                          alert("A keresésnek nincs eredménye!");
                          location.href="index.php";
                 </script> 
             </div>';
    }

?>

</body>
</html>



