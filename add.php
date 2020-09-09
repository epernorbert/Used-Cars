<?php

session_start();
if(!isset($_SESSION['u_uid'])){
    header("Location: index.php?ERROR=need=to=login=user");
    exit();
} elseif(isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='admin') {
    header("Location: index.php?ERROR=you=are=admin");
    exit();
} elseif(isset($_SESSION['u_id']) && $_SESSION['u_usertype']=='writer') {
    header("Location: index.php?ERROR=you=are=writer");
    exit();
}

?>


<?php
function load_brands(){
    include 'action.php';
    $output = '';
    $sql = "SELECT * FROM car_brands ORDER BY brands_name";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $output .='<option value="'.$row['brands_id'].'">'.$row['brands_name'].'</option>';
    }

    return $output;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hírdetés feladása</title>
    <link type="text/css" rel="stylesheet" href="add.css">
    <!-- social media buttons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ez már nem tudom miért kell -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- select option error handlers -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- form validate use -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <!-- file upload text hide -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>

<body>


<div style="position: relative; bottom: 23px;" > <img  style="float: left; display: inline-block; margin-top: 0; margin-left: 10%;" src="peugeot_208/logohd.jpg" height="75"> </div>
<div style="position: relative; bottom: 23px;" class="navbar">
    <ul class="navbar_ul">
        <li class="navbar_li"><a class="navbar_a" href="index.php">Kezdőlap</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Keresés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Hírek</a></li>
        <li class="navbar_li"><a class="navbar_a" href="login.php">Bejelentkezés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#">Kapcsolat</a></li>
        <?php
        if(isset($_SESSION['u_id'])){
            echo '<li class="navbar_li"><a class="navbar_a" href="add.php">Hírdetés feladás</a></li>';
        }
        ?>
    </ul>
</div>



<div style="position: absolute; left: 0px; top: 135px; z-index: -1; width: 100%; height: 300px; background-image: linear-gradient(to bottom, #113c7e, #0b3060, #0c2444, #0d1828, #04070d); "></div>

<div style="margin: 0 10% 0 10%">    
    <form action="includes/add.inc.php" method="post" enctype="multipart/form-data" name="vform" id="vform">
        <div id="container">
            <div id="left" style="width: 25%">
                <label class="star" for="brand" >*</label>
                <select name="brand" id="brand">                    
                    <option value="" hidden="">Márka</option>
                    <?php echo load_brands(); ?>
                </select><br>
                <label class="star" for="type" >*</label> 
                <select name="type" id="type">
                    <option value="">Típus</option>
                </select><br>
                <label class="star" for="year" >*</label>
                <input type="number" name="year" id="year" placeholder="Évjárat"   oninput="year_input()"><br>
                <label class="star" for="price" >*</label>
                <input type="number" name="price" id="price" placeholder="Ár (€)"  oninput="price_input()"><br>
                <label class="star" for="fuel" >*</label>
                <select name='fuel' id='fuel'>
                    <option value='' hidden="">üzemanyag típusa</option>
                    <option value='Dizel'>Dizel</option>
                    <option value='Benzin'>Benzin</option>
                    <option value='Elektromos'>Elektromos</option>
                </select><br>
                <label class="star" for="cm3" >*</label>
                <input type="number" name="cm3" id="cm3" placeholder="Köbcenti"  oninput="cm3_input()"><br>
                <label class="star" for="hp" >*</label>
                <input type="number" name="hp" id="hp" placeholder="Lóerő" oninput="hp_input()"><br>
                <label class="star" for="body_style" >*</label>
                <select id="body_style" name="body_style">
                    <option value=""  hidden="">Kivitel</option>
                    <option value='Ferdehátú'>Ferdehátú</option>
                    <option value='Kombi'>Kombi</option>
                    <option value='Pickup'>Pickup</option>
                    <option value='Sedan'>Sedan</option>
                    <option value='Terepjáró'>Terepjáró</option>
                    <option value='Városi terepjáró'>Városi terepjáró</option>
                    <option value='Coupe'>Coupe</option>
                </select><br>
                <label style="position: relative; top: 7px;" for="files">Képek feltöltése(maximum 9 file)</label><br>
                <label class="star" for="files" >*</label>
                <input  style="position: relative; left: 18px; " type="file" id="files" accept="image/*" name="files[]" class="hidden" multiple onchange="fileValidation()"><br>                                      
            </div>     

            <script>

                //File upload text hide while empty
                $(function () {
                     $('input[type="file"]').change(function () {
                          if ($(this).val() != "") {
                                 $(this).css('color', '#333');
                          }else{
                                 $(this).css('color', 'transparent');
                          }
                     });
                })
                
                //Image error handler

                var error_image = false;

                function isImage(image) {
                  const ext = ['.jpg', '.png'];
                  return ext.some(el => image.endsWith(el));
                }

                function fileValidation() {
                  let files = document.getElementById('files');
                  for (let i = 0; i < files.files.length; ++i) {
                    let fname = files.files.item(i).name;
                    if (!isImage(fname)) {
                      error_image = true;                    
                      alert("Csak jpg és png formátum engedélyezett!");
                      //$("#files").css("border-bottom","2px solid #F90A0A");
                      return false;
                    } else {
                        error_image = false;
                    }
                  }
                }

                var error_image_number = false;
                $('#files').change(function(){
                    var files = $(this)[0].files;
                    if( files.length < 1){
                        error_image_number = true;
                        alert("Minimum 1 képet töltsön fel a járműről!");
                    } else if(files.length > 10){
                        error_image_number = true;
                        alert("Maximum 9 fájl engedélyezett!.");
                    }else{
                        error_image_number = false;                    
                    }               
                });
                

            </script>

            <div id="center" style="width: 25%"> 
            <label class="star" for="mileage" >*</label>          
                <input type='number' name='mileage' id="mileage" placeholder="Kilóméteróra állás"  oninput="mileage_input()"><br>
                <label class="star" for="euro" >*</label>
                <select name='euro' id='euro'>
                    <option value=''  hidden="">Környezetvédelmi besorolás</option>
                    <option value='euro 1'>Euro 1</option>
                    <option value='euro 2'>Euro 2</option>
                    <option value='euro 3'>Euro 3</option>
                    <option value='euro 4'>Euro 4</option>
                    <option value='euro 5'>Euro 5</option>
                    <option value='euro 6'>Euro 6</option>
                    </select><br>
                <label class="star" for="colour" >*</label>
                <select name='colour' id='colour'>
                    <option value=""  hidden="">Szín</option>
                    <option value='Fehér'>Fehér</option>
                    <option value='Szürke'>Szürke</option>
                    <option value='Fekete'>Fekete</option>
                    <option value='Lila'>Lila</option>
                    <option value='Bíbor 5'>Bíbor 5</option>
                    <option value='Piros'>Piros</option>
                    <option value='Rózsaszín'>Rózsaszín</option>
                    <option value='Barna'>Barna</option>
                    <option value='Narancssárga'>Narancssárga</option>
                    <option value='Sárga'>Sárga</option>
                    <option value='Zöld'>Zöld</option>
                    <option value='Kék'>Kék</option>
                    </select><br>
                <label class="star" for="transmission" >*</label>
                <select name='transmission' id='transmission'>
                    <option value=''  hidden="">Sebességváltó</option>
                    <option value='Manuális - 4'>Manuális - 4</option>
                    <option value='Manuális - 5'>Manuális - 5</option>
                    <option value='Manuális - 6'>Manuális - 6</option>
                    <option value='Manuális - 7'>Manuális - 7</option>
                    <option value='Automata - 4'>Automata - 4</option>
                    <option value='Automata - 5'>Automata - 5</option>
                    <option value='Automata - 6'>Automata - 6</option>
                    <option value='Automata - 7'>Automata - 7</option>
                    </select><br>
                <label class="star" for="weight" >*</label>    
                <input type='number' name='weight' id="weight" placeholder="Súly (Kg)"  oninput="weight_input()"><br>
                <input type='text' name='identification_number' id="id_number" placeholder="Alvázszám" oninput="id_number_input()" style="position: relative; right: 0px;" >                
                <textarea  name='description' id="description" onkeydown='if(event.keyCode == 13) return false;' oninput="description_input()">Rövid leírás</textarea><br>                
            </div>
            <div id="right" style="width: 25%;">
                <div><input type="checkbox" name="chkl[ ]" value="Tempomat">Tempomat</div>
                <div><input type="checkbox" name="chkl[ ]" value="Klima">Klima</div>
                <div><input type="checkbox" name="chkl[ ]" value="Napfénytető">Napfénytető</div>
                <div><input type="checkbox" name="chkl[ ]" value="Centrálzár">Centrálzár</div>
                <div><input type="checkbox" name="chkl[ ]" value="Riasztó">Riasztó</div>
                <div><input type="checkbox" name="chkl[ ]" value="Led Fényszóró">Led Fényszóró</div>
                <div><input type="checkbox" name="chkl[ ]" value="Xenon fényszóró">Xenon fényszóró</div>
                <div><input type="checkbox" name="chkl[ ]" value="Tolatóradar">Tolatóradar</div>
                <div><input type="checkbox" name="chkl[ ]" value="Multifunkcionális kormány">Multifunkcionális kormány</div>
                <div><input type="checkbox" name="chkl[ ]" value="Kartámasz">Kartámasz</div>
                <div><div><button style=" font-size: 17px; margin: 20px 35px; cursor: pointer; width: 202px; height: 33px;" type="submit" name="submit" id="submit" value="upload">Feltölt</button><br></div>
            </div>
        </div>        
    </form>
</div>

</body>
</html>

<script type="text/javascript">

    //Imputs extensions

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

    function id_number_input(){
        var id_number = document.getElementById("id_number").value;
        var regex = /^[0-9a-zA-Z]*$/;
        if(!regex.test(id_number)){
            document.getElementById("id_number").value = '';
        } else if(id_number.length > 17){
            var limit = id_number.slice(0, 17);
            document.getElementById("id_number").value = limit;
        }
    }

    function description_input(){
        var description = document.getElementById("description").value;
        var regex = /^[0-9a-zA-ZÁÉÍÓÖŐÚÜŰáéíóöőúüű,.-\s\(\)]*$/;
        if(!regex.test(description)){
            document.getElementById("description").value = description.slice(0, description.length-1);                        
        } else if(description.length > 200){
            var limit = description.slice(0, 200);
            document.getElementById("description").value = limit;
        }
    }
    



    $(function () {

            //$("#error_year").hide();

            var error_brand = false;
            var error_type = false;
            var error_year = false;            
            var error_price = false;
            var error_fuel = false;             
            var error_cm3 = false;            
            var error_hp = false;   
            var error_body_style = false;                              
            var error_mileage = false;  
            var error_euro = false;         
            var error_colour = false;         
            var error_transmission = false;          
            var error_weight = false;            
            var error_id_number = false;              


            $("#brand").focusout(function() {
                check_brand();
            }); 

            $("#type").focusout(function() {
                check_type();
            });        

            $("#year").focusout(function() {
                check_year();
            });

            $("#price").focusout(function() {
                check_price();
            });

            $("#fuel").focusout(function() {
                check_fuel();
            });

            $("#cm3").focusout(function() {
                check_cm3();
            });

            $("#hp").focusout(function() {
                check_hp();
            });

            $("#body_style").focusout(function() {
                check_body_style();
            });

            $("#mileage").focusout(function() {
                check_mileage();
            });

            $("#euro").focusout(function() {
                check_euro();
            });

            $("#colour").focusout(function() {
                check_colour();
            });

            $("#transmission").focusout(function() {
                check_transmission();
            });            

            $("#weight").focusout(function() {
                check_weight();
            });

            $("#id_number").focusout(function() {
                check_id_number();
            });        
        

            
            function check_brand(){
                var brand = $("#brand").val();

                if(brand === ''){
                    $("#brand").css("border-bottom","2px solid #F90A0A");
                    error_brand = true;
                } else {
                    $("#brand").css("border-bottom","2px solid green");
                    error_brand = false;
                }
            }

            function check_type(){
                var type = $("#type").val();

                if(type === ''){
                    $("#type").css("border-bottom","2px solid #F90A0A");
                    error_type = true;
                } else {
                    $("#type").css("border-bottom","2px solid green");
                    error_type = false;
                }
            }

            function check_year() {
                
                var year = $("#year").val();
                if(year === ''){
                    $("#year").css("border-bottom","2px solid #F90A0A");
                    error_year = true;
                } else if(year < 1930 || year > new Date().getFullYear() ){
                    alert("Helytelen évjárat!" + "\n(1930 - " + new Date().getFullYear() + ")");
                    $("#year").css("border-bottom","2px solid #F90A0A");
                    error_year = true;
                } else {                    
                    $("#year").css("border-bottom","2px solid green");
                    error_year = false;
                }
            }

            function check_price(){
                var price = $("#price").val();

                if(price === ''){
                    $("#price").css("border-bottom","2px solid #F90A0A");
                    error_price = true;
                } else {
                    $("#price").css("border-bottom","2px solid green");
                    error_price = false;
                }
            }

            function check_fuel(){
                var fuel = $("#fuel").val();

                if(fuel === ''){
                    $("#fuel").css("border-bottom","2px solid #F90A0A");
                    error_fuel = true;
                } else {
                    $("#fuel").css("border-bottom","2px solid green");
                    error_fuel = false;
                }

            }

            function check_cm3(){
                var cm3 = $("#cm3").val();

                if(cm3 === ''){
                    $("#cm3").css("border-bottom","2px solid #F90A0A");
                    error_cm3 = true;
                } else {
                    $("#cm3").css("border-bottom","2px solid green");
                    error_cm3 = false;
                }
            }

            function check_hp(){
                var hp = $("#hp").val();

                if(hp === ''){
                    $("#hp").css("border-bottom","2px solid #F90A0A");
                    error_hp = true;
                } else {
                    $("#hp").css("border-bottom","2px solid green");
                    error_hp = false;
                }
            }

            function check_body_style(){
                var body_style = $("#body_style").val();

                if(body_style === ''){
                    $("#body_style").css("border-bottom","2px solid #F90A0A");
                    error_body_style = true;
                } else {
                    $("#body_style").css("border-bottom","2px solid green");
                    error_body_style = false;
                }
            }

            function check_mileage(){
                var mileage = $("#mileage").val();

                if(mileage === ''){                    
                    $("#mileage").css("border-bottom","2px solid #F90A0A");
                    error_mileage = true;
                } else {                    
                    $("#mileage").css("border-bottom","2px solid green");
                    error_mileage = false;
                }
            }

            function check_euro(){
                var euro = $("#euro").val();

                if(euro === ''){
                    $("#euro").css("border-bottom","2px solid #F90A0A");
                    error_euro = true;
                } else {
                    $("#euro").css("border-bottom","2px solid green");
                    error_euro = false;
                }
            }

            function check_colour(){
                var colour = $("#colour").val();

                if(colour === ''){
                    $("#colour").css("border-bottom","2px solid #F90A0A");
                    error_colour = true;
                } else {
                    $("#colour").css("border-bottom","2px solid green");
                    error_colour = false;
                }
            }

            function check_transmission(){
                var transmission = $("#transmission").val();

                if(transmission === ''){
                    $("#transmission").css("border-bottom","2px solid #F90A0A");
                    error_transmission = true;
                } else {
                    $("#transmission").css("border-bottom","2px solid green");
                    error_transmission = false;
                }
            }

            function check_weight(){
                var weight = $("#weight").val();

                if(weight === ''){;
                    $("#weight").css("border-bottom","2px solid #F90A0A");
                    error_weight = true;
                } else {                    
                    $("#weight").css("border-bottom","2px solid green");
                    error_weight = false;
                }
            }

            function check_id_number(){
                var id_number = $("#id_number").val();

                if(id_number === ''){
                    $("#id_number").css("border-bottom","");
                } else if (id_number.length < 17) {
                    alert("Helytelen alvázszám formátum!\n(17 karakter szükséges)")
                    $("#id_number").css("border-bottom","2px solid #F90A0A");
                    error_id_number = true;
                } else {
                    $("#id_number").css("border-bottom","2px solid green");
                    error_id_number = false;
                }
            }

            $("#vform").submit(function() {

                error_brand = false;
                error_type = false;
                error_year = false;            
                error_fuel = false;                             
                error_body_style = false;                                                
                error_euro = false;         
                error_colour = false;         
                error_transmission = false;                                  
                error_id_number = false;
                error_image === false;

                check_brand();
                check_type();
                check_year();
                check_price();
                check_fuel();
                check_cm3();
                check_hp();
                check_body_style();
                check_mileage();
                check_euro();
                check_colour();
                check_transmission();
                check_weight();
                check_id_number();
                fileValidation();
            
                
                if(error_brand === false && error_type === false && error_year === false && error_fuel === false && error_body_style === false && error_euro === false && error_colour === false && error_transmission === false && error_id_number === false && error_image === false && error_image_number === false && error_weight === false) {
                    alert("A hírdetés feladása sikeres volt!")
                    return true;
                } else {
                    alert("Kérem megfelelő adatokkal töltse ki a mezőket!");
                    return false;
                }

            });

        });





</script>



<script>
    $(document).ready(function(){
        $('#brand').change(function(){
            var brands_id = $(this).val();
            $.ajax({
                url:"fetch_type.php",
                method:"POST",
                data:{brandsId:brands_id},
                dataType:"text",
                success:function(data){
                    $('#type').html(data);
                }
            });
        });
    });
</script>
