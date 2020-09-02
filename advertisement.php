<?php
    //these two lines are due to the back button from advertisemet.php
    //header('Cache-Control: no cache'); //no cache
    //session_cache_limiter('private_no_expire'); // works
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

    //Car Data
    $sql = "SELECT * from cars where car_id='{$_GET['car_id']}'";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    
    echo '<div style="margin: 0 10% 0 10%;" >';
        echo '<div style=" float: left; width: 40%; font-size: 20px; ">';       
            echo'<table class="car_data" >                                    
                    <div style="font-size: 30px; text-align: center; ">
                        '.$row['marka'].' - '.$row['tipus'].' - '.$row['ar'].' € 
                    </div>
                        <br> 
                    <div style="border-bottom: 2px solid grey; " >
                        <div style="background-color: grey; display: inline-block; font-size: 24px; padding: 3px; " >Adatok: </div>
                    </div>                  
                    <tr>
                        <td style="width: 60%;" >Évjárat: </td>
                        <td style="width: 25%;" >'.$row['évjárat'].'</td>                        
                    </tr>
                    <tr>
                        <td>Üzemanyag:</td>
                        <td>'.$row['uzemanyag'].'</td>
                    </tr>
                    <tr>
                        <td>Köbceni: </td>
                        <td>'.$row['kobcenti'].' Cm3</td>
                    </tr>
                    <tr>
                        <td>Lóerő: </td>
                        <td>'.$row['loero'].' Lóerő</td>
                    </tr>
                    <tr>
                        <td>Kivitel: </td>
                        <td>'.$row['body_style'].'</td>
                    </tr>
                    <tr>
                        <td>Kilóméter óra állása: </td>
                        <td>'.$row['mileage'].' Km</td>
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
                        <td>'.$row['weight'].' Kg</td>
                    </tr>                     
                    <tr>
                        <td>Alvázszám: </td>
                        <td>'.$row['identification_number'].'</td>
                    </tr> 
                    <tr>
                        <td colspan="2" >
                            <div style="border-bottom: 2px solid grey; " >
                                <div style="background-color: grey; display: inline-block; font-size: 24px; padding: 3px; ">Rövid leírás: </div>
                            </div>
                        </td>
                    </tr>                   
                    <tr>                                              
                        <td colspan="2" style="text-align: justify;" >'.$row['description'].'</td>
                    </tr>
                    
            </table>';
            
        echo '</div>';    
                    

        //Car Images
        $sql_img = "select image_name from car_images where car_id='{$_GET['car_id']}'";
        $result_img = mysqli_query($conn, $sql_img);
        $resultcheck_img = mysqli_num_rows($result_img);

        echo '<div style=" float: right; width: 60%">';
            while($row_img = mysqli_fetch_assoc($result_img)) {
                echo '<div class="gallery">';
                    echo '<a href="uploads/'.$row_img['image_name'].'" data-lightbox="mygallery" > <img class="image" src=uploads/' .$row_img['image_name']. ' style="float:left; display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 200px; height: 125px; margin: 0 0 2% 2%;"> </a>';
                echo '</div>';

            }
        echo '</div>';
        

        //Car Extras            
        $sql_extras = "SELECT * FROM car_extras WHERE car_id='{$_GET['car_id']}'";
        $result_extras = mysqli_query($conn, $sql_extras);
        $resultcheck_extras = mysqli_num_rows($result_extras);        
        
            echo '<div style=" width:25%;  float: left; margin-left: 10px; margin-right: 10px; margin-top: 19px; padding: 5px; ">';                
                if($resultcheck_extras != 0){
                    echo '<div style="border-bottom: 2px solid grey;" >';
                        echo '<div style="font-size: 26px; background-color: grey; display: inline-block; padding: 3px; ">Felszereltség: </div>'; 
                    echo '</div>';
                    while($row_extras = mysqli_fetch_assoc($result_extras)){                          
                        echo '<table>
                                <tr>                                
                                    <td >'.$row_extras['extras'].'</td>
                                </tr>                        
                              </table>';                    
                    }

                } else {
                    
                }               
                
            echo '</div>';
        

        //User data
        $sql_user = "SELECT u.user_first, u.user_last, u.user_telephone FROM users u JOIN cars c ON u.user_id=c.user_id WHERE c.car_id='{$_GET['car_id']}'";
        $result_user = mysqli_query($conn, $sql_user);
        $resultcheck_user = mysqli_num_rows($result_user);


        if($resultcheck_extras == 0){
            echo '<div style=" margin-left: 12px; width: 40%; display: inline-block; ">';
        } else {
            echo '<div style=" display: inline-block; width: 25%; padding: 5px; margin-top: 19px; ">';
        }        
            echo '<div style="border-bottom: 2px solid grey;" >';
                echo '<div style="font-size: 26px; background-color: grey; display: inline-block; padding: 3px; ">Értékesítő adatai: </div>';
            echo '</div>';
            while($row_user = mysqli_fetch_assoc($result_user)){
                echo '<table>
                            <tr>
                                <td>Keresztnév: </td>
                                <td>'.$row_user['user_first'].'</td>
                            </tr>
                            <tr>
                                <td >Vezetéknév: </td>
                                <td >'.$row_user['user_last'].'</td>
                            </tr>
                            <tr>
                                <td >Telefonszám: </td>
                                <td >'.$row_user['user_telephone'].'</td>
                            </tr>
                      </table>';                
            }

            echo '</div>';   

        

    echo '</div>';


        

?>

</body>
</html>