<?php

session_start();

if(!isset($_SESSION['u_uid'])){
    header("Location: index.php?need=to=login=user");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil page</title>
    <link type="text/css" rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<div class="navbar">
    <ul class="navbar_ul">
        <li class="navbar_li"><a class="navbar_a" href="index.php">Kezdőlap</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Keresés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Hírek</a></li>
        <li class="navbar_li"><a class="navbar_a" href="login.php">Bejelentkezés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Kapcsolat</a></li>
        <?php
        if(isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='user'){
            echo '<li class="navbar_li"><a class="navbar_a" href="add.php">Hírdetés feladás</a></li>';
        } elseif( isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='admin') {
            echo '<li class="navbar_li"><a class="navbar_a" href="admin/admin.php">Admin</a></li>';
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

<div class="echo" style="font-size: 20px;">
    <div>
        <h3>Személyes adatok: </h3>
    </div>


    <div style=" margin: 0 0 0 10%; padding: 0; float: left; font-size: 20px;">
        <table>
            <tr>
                <td>Felhasználónév: </td>
                <td><?php echo $_SESSION['u_uid']?></td>
            </tr>
            <tr>
                <td>Vezetéknév :</td>
                <td><?php echo $_SESSION['u_first']?></td>
            </tr>
            <tr>
                <td>Keresztnév: </td>
                <td><?php echo $_SESSION['u_last']?></td>
            </tr>
            <tr>
                <td>E-mail: </td>
                <td><?php echo $_SESSION['u_email']?></td>
            </tr>
            <tr>
                <td>
                    <button onclick="change()">modosit</button>
                </td>
            </tr>
        </table><br>
    </div>
    <div id="form" style="font-size: 20px; display: inline-block; margin: 0 0 0 3%;"></div>


    <?php

    include 'action.php';

    $advertisement = "select * from users JOIN cars ON users.user_id=cars.user_id WHERE users.user_id='{$_SESSION['u_id']}'";
    $result = mysqli_query($conn, $advertisement);
    $resultcheck = mysqli_num_rows($result);

    if($resultcheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            $GLOBALS['car_id'] = $row['car_id'];
            $GLOBALS['marka'] = $row['marka'];
            $GLOBALS['tipus'] = $row['tipus'];
            $GLOBALS['évjárat'] = $row['évjárat'];
            $GLOBALS['ar'] = $row['ar'];
            $GLOBALS['uzemanyag'] = $row['uzemanyag'];
            $GLOBALS['kobcenti'] = $row['kobcenti'];
            $GLOBALS['loero'] = $row['loero'];
            $GLOBALS['kep'] = $row['kep'];
            $GLOBALS['image_2'] = $row['image_2'];
            $GLOBALS['image_3'] = $row['image_3'];
            $GLOBALS['image_4'] = $row['image_4'];
            $GLOBALS['image_5'] = $row['image_5'];
        }
    }


    ?>

    <script>
        function change() {
            document.getElementById("form").innerHTML = "<form action='includes/update.inc.php' method='post' ><br>  <input type='text' name='u_first' value='<?php echo $_SESSION['u_first']; ?>'><br> <input type='text' name='u_last' value='<?php echo $_SESSION['u_last']; ?>'><br> <input type='text' name='u_email' value='<?php echo $_SESSION['u_email']; ?>'><br> <button type='submit' name='submit' value='save'>mentés </form>";
        }
    </script>
    <script>
        function cars(){
            document.getElementById("cars").innerHTML = "<form action='includes/update.car.inc.php' method='post' > <input type='text' name='marka' value='<?php echo $GLOBALS['marka']; ?>'> <br> <input type='text' name='tipus' value='<?php echo $GLOBALS['tipus']; ?>'> <br> <input type='number' name='évjárat' value='<?php echo $GLOBALS['évjárat']; ?>'> <br> <input type='number' name='ar' value='<?php echo $GLOBALS['ar']; ?>'> <br><br> <input type='number' name='kobcenti' value='<?php echo $GLOBALS['kobcenti']; ?>'> <br> <input type='number' name='loero' value='<?php echo $GLOBALS['loero']; ?>'> <br> <button type='submit' name='submit' value='save'> mentés </form>";
        }
    </script>

    <?php
    if(!isset($GLOBALS['car_id'])){
        echo '<div style="clear: both;">Nincs hírdetése!</div>';
    } else {
        echo '<div style="clear: both;">
                  <h3>Hírdetés:</h3>
              </div>
              
              <div style="clear: both; float: left; margin: 0 2% 0 10%">
        <table>
            <tr>
                <td>Márka: </td>
                <td>'.$GLOBALS['marka'].'</td>
            </tr>
            <tr>
                <td>Típus: </td>
                <td>'.$GLOBALS['tipus'].'</td>
            </tr>
            <tr>
                <td>Évjárat: </td>
                <td>'.$GLOBALS['évjárat'].'</td>
            </tr>
            <tr>
                <td>Ár: </td>
                <td>'.$GLOBALS['ar'].'</td>
            </tr>
            <tr>
                <td>Üzemanyag:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td>
                <td>'.$GLOBALS['uzemanyag'].'</td>
            </tr>
            <tr>
                <td>Köbceni: </td>
                <td>'.$GLOBALS['kobcenti'].'</td>
            </tr>
            <tr>
                <td>Lóerő: </td>
                <td>'.$GLOBALS['loero'].'</td>
            </tr>
            <tr>
                <td><button onclick="cars()">módosít</button></td>
                <td><button onclick="confirm_delete()" style="background-color: red">hírdetés törlése</button></td>
            </tr>
        </table>
    </div>
    <div id="cars" style=" margin: 0px; float: left;"></div>
    <div style="display: inline-block; margin: 0 10px 10px 10px;"><img src=uploads/'. $GLOBALS['kep'] .' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;"></div>
    <div style="display: inline-block; margin: 0 10px 10px 10px;"><img src=uploads/'. $GLOBALS['image_2'] .' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;"></div>
    <div style="display: inline-block; margin: 0 10px 10px 10px;"><img src=uploads/'. $GLOBALS['image_3'] .' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;"></div>
    <div style="display: inline-block; margin: 0 10px 10px 10px;"><img src=uploads/'. $GLOBALS['image_4'] .' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;"></div>
    <div style="display: inline-block; margin: 0 10px 10px 10px;"><img src=uploads/'. $GLOBALS['image_5'] .' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;"></div>';


        }

    ?>







</div>

<script>
    function confirm_delete() {
        var r = confirm("Biztos törli a hírdetést?");
        if (r == true) {
            location.href = "includes/delete.inc.php?<?php echo "car_id=" . $GLOBALS['car_id'] ?>";
        }
    }
</script>



</body>
</html>