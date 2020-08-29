<?php

session_start();

if(!isset($_SESSION['u_id']) || $_SESSION['u_usertype'] == 'user'){

    header("Location: ../index.php?=you=need=to=login");

}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin page</title>
    <link type="text/css" rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


<div class="navbar">
    <ul class="navbar_ul">
        <li class="navbar_li"><a class="navbar_a" href="../index.php">Kezdőlap</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Keresés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Hírek</a></li>
        <li class="navbar_li"><a class="navbar_a" href="../login.php">Bejelentkezés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Kapcsolat</a></li>
        <?php
        if(isset($_SESSION['u_id'])){
            echo '<li class="navbar_li"><a class="navbar_a" href="admin.php">Admin</a></li>';
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

<style>
    .uid div{
        margin-bottom: 8px;
    }
    .user-input{
        margin-bottom: 2px;
    }
    .user-data{
        padding-left: 94px;
    }

</style>


<?php

    include '../action.php';

    //User data
    $sql_user = "SELECT * FROM users WHERE  user_id = '{$_GET['user_id']}'";
    $result_user = mysqli_query($conn, $sql_user);
    $result_check_user = mysqli_num_rows($result_user);
    $row_user = mysqli_fetch_assoc($result_user);

    $GLOBALS['user_uid'] = $row_user['user_uid'];
    $GLOBALS['user_first'] = $row_user['user_first'];
    $GLOBALS['user_last'] = $row_user['user_last'];
    $GLOBALS['user_email'] = $row_user['user_email'];
    $GLOBALS['user_usertype'] = $row_user['user_usertype'];

    echo '<div style="margin: 0 10% 0 10%;">';

        echo '<div class="uid" style=" float: left; margin: 0 2% 1% 0; ">' .
                 '<table>
                        <tr>
                           <td>Username: </td>
                           <td class="user-data">'. $row_user['user_uid']. '</td>
                        </tr>
                        <tr>
                           <td>Vezetéknév: </td>
                           <td class="user-data">'. $row_user['user_first'] .'</td>
                        </tr>
                        <tr>
                           <td>Keresztnév: </td>
                           <td class="user-data">'. $row_user['user_last'] .'</td>
                        </tr>
                        <tr>
                           <td>Email: </td>
                           <td class="user-data">'. $row_user['user_email'] .'</td>
                        </tr>
                        <tr>
                           <td>Jogosúltság: </td>
                           <td class="user-data">'. $row_user['user_usertype'] .'</td>
                        </tr>
                 </table>';

                  echo '<button onclick="user_update()">Módosít</button>';

        echo '</div>';

        echo '<div id="update"></div>';

        if($GLOBALS['user_usertype'] === 'writer'){

            //news
            $sql_news = "SELECT n.news_image, n.news_title, u.user_id FROM news n JOIN users u ON n.user_id=u.user_id WHERE u.user_id = '{$_GET['user_id']}'";
            $result_news = mysqli_query($conn, $sql_news);
            $resultcheck_news = mysqli_num_rows($result_news);


            if($resultcheck_news > 0){
                while($row_news = mysqli_fetch_assoc($result_news)){
                    echo  '<div style="border: 1px solid black; display: inline-block";>
                                <a href="../news.php?news_title='.$row_news['news_title'].'"><img src=../news_image/' .$row_news['news_image']  .' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px; float:left;" >' . $row_news['news_title'] . 
                                '</a>' .
                          '</div>';
                }

            }


        } elseif($GLOBALS['user_usertype'] === 'user') {

            //Car data
            $sql = "SELECT * from cars WHERE user_id='{$_GET['user_id']}';";
            $result = mysqli_query($conn, $sql);
            $resultcheck = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);

            if(isset($row['marka'])){

                echo '<div style="clear: both; float: left;">';

                    echo '<table style="float: left; margin: 0 4% 2% 0;">
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
                    <td>Üzemanyag: </td>
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

                        //Car images
                        $sql_img = "select image_name from car_images where car_id='{$row['car_id']}'";
                        $result_img = mysqli_query($conn, $sql_img);
                        $resultcheck_img = mysqli_num_rows($result_img);

                            while($row_img = mysqli_fetch_assoc($result_img)) {
                                echo '<div style="float:left; margin: 0 2% 2% 0;"> 
                                         <img class="image" src=../uploads/' . $row_img['image_name'] . ' 
                                         style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;">
                                      </div>';
                            }

                            echo '<div style="clear: both; margin-bottom: 1%;">
                                      <button onclick="confirm_delete()" style="background-color: red; cursor: pointer;">Hírdetés Törlés</button>';
                                       echo '<button onclick="confirm_delete_car()" style="background-color: red; cursor: pointer; margin-left: 50px">Profil törlése</button>
                                  </div>';

                echo '</div>';

            } else {
                echo '<div>';
                     echo "Nincs hírdetés!";
                     echo '<button onclick="confirm_delete_car()" style="background-color: red; cursor: pointer; margin-left: 50px">Profil törlése</button>';
                echo '</div>';
            }

        echo '</div>';
        }

        


        

?>

<script>

    function user_update() {
        document.getElementById("update").innerHTML = "<form action='admin.update.php?user_id=<?php echo "{$_GET['user_id']}" ?>' method='POST'>" +
            "<input class='user-input' name='username' type='text' value='<?php echo $GLOBALS['user_uid']; ?>' ><br>" +
            "<input class='user-input' name='first' type='text' value='<?php echo $GLOBALS['user_first']; ?>' ><br>" +
            "<input class='user-input' name='last' type='text' value='<?php echo $GLOBALS['user_last']; ?>' ><br>" +
            "<input class='user-input' name='email' type='text' value='<?php echo $GLOBALS['user_email']; ?>' ><br>" +
            "<input class='user-input' name='usertype' type='text' value='<?php echo $GLOBALS['user_usertype']; ?>' ><br>" +
            "<button class='user-input' type='submit' name='submit'>Mentés<br>" +
            "</form>";
    }

    function confirm_delete() {
        var r = confirm("Biztos törli a hírdetést?");
        if (r == true) {
            location.href = "../includes/delete.inc.php?<?php echo "user_id=" . $_GET['user_id'] ?>";
        }
    }

    function confirm_delete_car() {
        var r = confirm("Biztos törli a felhasználót?");
        if (r == true) {
            location.href = "../includes/delete.car.inc.php?<?php echo "user_id=" . $_GET['user_id'] ?>";
        }
    }


</script>
