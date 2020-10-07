<?php
    session_start();

    if(!isset($_SESSION['u_uid'])){
        header("Location: index.php?error=user");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil page</title>
    <link type="text/css" rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


<div class="echo">    
    <div class="personal_data">Személyes adatok: </div>
</div>


<div class="personal_data_echo">
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
            <td>Telefonszám: </td>
            <td><?php echo $_SESSION['u_telephone']?></td>
        </tr>
        <tr>
            <td>Város: </td>
            <td><?php echo $_SESSION['u_city']?></td>
        </tr>
        <tr>
            <td>
                <button style="height: 28px; font-size: 15px; width: 100px; cursor: pointer;" onclick="change()">Módosít</button>
            </td>
        </tr>
    </table><br>
</div>

<!-- Javascript personal data update display here -->
<div id="form" style="font-size: 20px; display: inline-block; margin: 0 0 0 3%;"></div>


<?php

    include 'action.php';

    $advertisement = "SELECT * FROM users JOIN cars ON users.user_id=cars.user_id WHERE users.user_id='{$_SESSION['u_id']}'";
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
            $GLOBALS['body_style'] = $row['body_style'];
            $GLOBALS['mileage'] = $row['mileage'];
            $GLOBALS['euro'] = $row['euro'];
            $GLOBALS['colour'] = $row['colour'];
            $GLOBALS['transmission'] = $row['transmission'];
            $GLOBALS['weight'] = $row['weight'];
            $GLOBALS['identification_number'] = $row['identification_number'];
            $GLOBALS['description'] = $row['description'];
        }
    }

?>

<script>

    // Personal data update
    function change() {
        document.getElementById("form").innerHTML = 
            "<form class='personal_data_update' action='includes/update.inc.php' method='post'> " +
                "<input style='margin-top: 34px;' type='text' name='u_first' value='<?php echo $_SESSION['u_first']; ?>'> <br>" + 
                "<input type='text' name='u_last' value='<?php echo $_SESSION['u_last']; ?>'> <br>" + 
                "<input type='text' name='u_email' value='<?php echo $_SESSION['u_email']; ?>'> <br>" + 
                "<input type='number' name='u_telephone' value='<?php echo $_SESSION['u_telephone']; ?>'> <br>" + 
                "<select id='city' name='city' >" + 
                    "<option value='<?php echo $_SESSION['u_city']; ?>' ><?php echo $_SESSION['u_city']; ?></option>" +
                    "<option value='Budapest'>Budapest</option>" +
                    "<option value='Debrecen'>Debrecen</option>" +
                    "<option value='Kecskemét'>Kecskemét</option>" +
                    "<option value='Szeged'>Szeged</option>" +
                    "<option value='Szombathely'>Szombathely</option>" +
                "</select> <br>" +
                "<button style='height: 28px; font-size: 15px; width: 100px; cursor: pointer;' type='submit' name='submit' value='save'>Mentés" +                    
             "</form>";
    }
</script>

<script>

    // Cars data update
    function cars(){
        document.getElementById("cars").innerHTML =
            '<div style="margin: 13px 15px 0 0;" class="car_update" >' +
                "<form action='includes/update.car.inc.php' method='post' > <br> " +
                    "<input type='number' name='évjárat' id='year' oninput='year_input()' value='<?php echo $GLOBALS['évjárat']; ?>'> <br> " +
                    "<input type='number' name='ar' id='price' oninput='price_input()' value='<?php echo $GLOBALS['ar']; ?>'> <br>" +
                    "<select name='fuel_type' id='fuel_type'>" +
                        "<option value='<?php echo $GLOBALS['uzemanyag']; ?>' ><?php echo $GLOBALS['uzemanyag']; ?></option>" +
                        "<option value='Benzin'>Benzin</option>" +
                        "<option value='Dizel'>Dizel</option>" +
                        "<option value='Elektromos'>Elektromos</option>" +
                    "</select><br>" +
                    "<input type='number' name='kobcenti' id='cm3' oninput='cm3_input()' value='<?php echo $GLOBALS['kobcenti']; ?>'> <br> " +
                    "<input type='number' name='loero' id='hp' oninput='hp_input()' value='<?php echo $GLOBALS['loero']; ?>'> <br> " +
                    "<select name='body_style' id='body_style'>" +
                       "<option value='<?php echo $GLOBALS['body_style']; ?>' ><?php echo $GLOBALS['body_style']; ?></option>" +
                       "<option value='Ferdehátú'>Ferdehátú</option>" +
                       "<option value='Kombi'>Kombi</option>" +
                       "<option value='Pickup'>Pickup</option>" +
                       "<option value='Sedan'>Sedan</option>" +
                       "<option value='Terepjáró'>Terepjáró</option>" +
                       "<option value='Városi terepjáró'>Városi terepjáró</option>" +
                       "<option value='Coupe'>Coupe</option>" +
                    "</select><br>" +
                    "<input type='number' name='mileage' id='mileage' oninput='mileage_input()' value='<?php echo $GLOBALS['mileage']; ?>'> <br>" +
                    "<select name='euro' id='euro'>" +
                        "<option value='<?php echo $GLOBALS['euro']; ?>' ><?php echo $GLOBALS['euro']; ?></option>" +
                        "<option value='euro 1'>Euro 1</option>" +
                        "<option value='euro 2'>Euro 2</option>" +
                        "<option value='euro 3'>Euro 3</option>" +
                        "<option value='euro 4'>Euro 4</option>" +
                        "<option value='euro 5'>Euro 5</option>" +
                        "<option value='euro 6'>Euro 6</option>" +
                    "</select><br>" +
                    "<select name='colour' id='colour'>" +
                        "<option value='<?php echo $GLOBALS['colour']; ?>' ><?php echo $GLOBALS['colour']; ?></option>" +
                        "<option value='Fehér'>Fehér</option>" +
                        "<option value='Szürke'>Szürke</option>" +
                        "<option value='Fekete'>Fekete</option>" +
                        "<option value='Kék'>Kék</option>" +
                        "<option value='Lila'>Lila</option>" +
                        "<option value='Bíbor'>Bíbor</option>" +
                        "<option value='Piros'>Piros</option>" +
                        "<option value='Rózsaszín'>Rózsaszín</option>" +
                        "<option value='Barna'>Barna</option>" +
                        "<option value='Narancssárga'>Narancssárga</option>" +
                        "<option value='Sárga'>Sárga</option>" +
                        "<option value='Zöld'>Zöld</option>" +
                    "</select><br>" +
                    "<select name='transmission' id='transmission'>" +
                        "<option value='<?php echo $GLOBALS['transmission']; ?>' ><?php echo $GLOBALS['transmission']; ?></option>" +
                        "<option value='Manuális - 4'>Manuális - 4</option>" +
                        "<option value='Manuális - 5'>Manuális - 5</option>" +
                        "<option value='Manuális - 6'>Manuális - 6</option>" +
                        "<option value='Manuális - 7'>Manuális - 7</option>" +
                        "<option value='Automata - 4'>Automata - 4</option>" +
                        "<option value='Automata - 5'>Automata - 5</option>" +
                        "<option value='Automata - 6'>Automata - 6</option>" +
                        "<option value='Automata - 7'>Automata - 7</option>" +
                    "</select><br>" +
                    "<input type='number' name='weight' id='weight' oninput='weight_input()' value='<?php echo $GLOBALS['weight']; ?>'> <br>" +
                    "<input type='text' name='identification_number' id='identification_number' oninput='identification_number_input()' value='<?php echo $GLOBALS['identification_number']; ?>'> <br>" +
                    "<textarea name='description' id='description' onkeydown='if(event.keyCode == 13) return false;'  oninput='description_input()' ><?php echo $GLOBALS['description']; ?></textarea> <br>" +
                    "<button type='submit' name='submit' value='save' style='height: 28px; font-size: 15px; width: 100px; cursor: pointer;' > Mentés " +                    
                "</form>" + 
            '</div>';
    }
</script>

<script type="text/javascript">

    // Regex for car data inputs

    function description_input(){
        var description = document.getElementById("description").value;
        var regex = /^[0-9a-zA-ZÁÉÍÓÖŐÚÜŰáéíóöőúüű,.-\s\(\)]*$/;
        if(!regex.test(description)){
            document.getElementById("description").value = description.slice(0, description.length-1)                    
        } else if(description.length > 200){
            var limit = description.slice(0, 200);
            document.getElementById("description").value = limit;
        }
    }

    function year_input(){
        var year = document.getElementById("year").value;
        var regex = /^[1-9]{1,4}/;
        if(!regex.test(year)){
            document.getElementById("year").value = '';
        } else if(year.length > 4){
            var limit = year.slice(0, 4);
            document.getElementById("year").value = limit;
        }
    }

    function price_input(){
        var price = document.getElementById("price").value;
        var regex = /^[1-9]/;
        if(!regex.test(price)){
            document.getElementById("price").value = '';
        } else if(price.length > 10){
            var limit = price.slice(0, 10);
            document.getElementById("price").value = limit;
        }
    }

    function cm3_input(){
        var cm3 = document.getElementById("cm3").value;
        var regex = /^[1-9]/;
        if(!regex.test(cm3)){
            document.getElementById("cm3").value = '';
        } else if(cm3.length > 4){
            var limit = cm3.slice(0, 4);
            document.getElementById("cm3").value = limit;
        }
    }


    function hp_input(){
        var hp = document.getElementById("hp").value;
        var regex = /^[1-9]/;
        if(!regex.test(hp)){
            document.getElementById("hp").value = '';
        } else if(hp.length > 4){
            var limit = hp.slice(0, 4);
            document.getElementById("hp").value = limit;
        }
    }

    function mileage_input(){
        var mileage = document.getElementById("mileage").value;
        var regex = /^[1-9]/;
        if(!regex.test(mileage)){
            document.getElementById("mileage").value = '';
        } else if(mileage.length > 7){
            var limit = mileage.slice(0, 7);
            document.getElementById("mileage").value = limit;
        }
    }

    function weight_input(){
        var weight = document.getElementById("weight").value;
        var regex = /^[1-9-]/;
        if(!regex.test(weight)){
            document.getElementById("weight").value = '';
        } else if(weight.length > 4){
            var limit = weight.slice(0, 4);
            document.getElementById("weight").value = limit;
        }
    }

    function identification_number_input(){
        var id_number = document.getElementById("identification_number").value;
        var regex = /^[0-9a-zA-Z]*$/;
        if(!regex.test(id_number)){
            document.getElementById("identification_number").value = '';
        } else if(id_number.length > 17){
            var limit = id_number.slice(0, 17);
            document.getElementById("identification_number").value = limit;
        }
    }

</script>

<?php
    if(!isset($GLOBALS['car_id'])){
        echo '<div style="margin: 0 10%; font-size: 20px; clear: both;">Nincs hírdetése!</div>';
    } else {
        echo  '<div style="clear: both;">
                  <div class="advertisement" >Hírdetés: </div>
               </div>
              
               <div class="car_data_div">
                    <table class="car_data" >
                        <tr>
                            <td style="width: 60%;" >Márka: </td>
                            <td style="width: 25%;">'.$GLOBALS['marka'].'</td>
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
                            <td>'.$GLOBALS['ar'].' € </td>
                        </tr>
                        <tr>
                            <td>Üzemanyag:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td>
                            <td>'.$GLOBALS['uzemanyag'].'</td>
                        </tr>
                        <tr>
                            <td>Köbceni: </td>
                            <td>'.$GLOBALS['kobcenti'].' Cm3</td>
                        </tr>
                        <tr>
                            <td>Lóerő: </td>
                            <td>'.$GLOBALS['loero'].' Lóerő</td>
                        </tr>
                        <tr>
                            <td>Kivitel: </td>
                            <td>'.$GLOBALS['body_style'].'</td>
                        </tr>
                        <tr>
                            <td>Kilóméter óra állása: </td>
                            <td>'.$GLOBALS['mileage'].' Km</td>
                        </tr>
                        <tr>
                            <td>Környezetvédelmi osztály: </td>
                            <td>'.$GLOBALS['euro'].'</td>
                        </tr>
                        <tr>
                            <td>Szín: </td>
                            <td>'.$GLOBALS['colour'].'</td>
                        </tr>
                        <tr>
                            <td>Sebességváltó típusa: </td>
                            <td>'.$GLOBALS['transmission'].'</td>
                        </tr>
                        <tr>
                            <td>Saját tömeg: </td>
                            <td>'.$GLOBALS['weight'].' Kg</td>
                        </tr>
                        <tr>
                            <td>Alvázszám: </td>
                            <td>'.$GLOBALS['identification_number'].'</td>
                        </tr>
                        <tr>
                            <td colspan="2" >
                                <div class="short_description_div" >
                                    <div class="short_description">Rövid leírás: </div>
                                </div>
                            </td>
                        </tr>                   
                        <tr>                                              
                            <td colspan="2" style="text-align: justify;" >'.$GLOBALS['description'].'</td>
                        </tr>                        
                        <tr>
                            <td>
                                <button class="cars_update_button" onclick="cars()">Módosít
                                </button>
                            </td>
                            <td>
                                <button  onclick="confirm_delete()" class="confirm_delete">Hírdetés törlése
                                </button>
                            </td>
                        </tr>
                    </table>
               </div>

            <div id="cars" style="margin: 33px 0 0 0; float: left;"></div>';
        }
?>

<?php

    if(isset($GLOBALS['car_id'])){
        $sql_img = "SELECT image_name FROM car_images WHERE car_id='{$GLOBALS['car_id']}'";
        $result_img = mysqli_query($conn, $sql_img);
        $resultcheck_img = mysqli_num_rows($result_img);

        echo '<div class="image">';
            while($row_img = mysqli_fetch_assoc($result_img)) {
                echo '<div>
                        <img src=uploads/' . $row_img['image_name'] . '>
                      </div>';
            }
        echo '</div>';    
    }
?>

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