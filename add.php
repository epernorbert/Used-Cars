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
        if(isset($_SESSION['u_id'])){
            echo '<li class="navbar_li"><a class="navbar_a" href="add.php">Hírdetés feladás</a></li>';
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

<div style="margin: 2% 10% 0 10%">
    <h1>Hírdetés feladása</h1>
    <form action="includes/add.inc.php" method="post" enctype="multipart/form-data" name="vform" id="vform">
        <div style="float:left">
            <select name="brand" id="brand">
                <option value="" hidden="">Márka</option>
                <?php echo load_brands(); ?>
            </select><br>
            <select name="type" id="type">
                <option value="">Típus</option>
            </select><br>
            <input type="number" name="year" id="year" placeholder="Évjárat" required="" oninput="year_input()"><br>
            <input type="number" name="price" id="price" placeholder="Ár (€)" required="" oninput="price_input()"><br>
            <select name='fuel' id='fuel'>
                <option value='' hidden="">üzemanyag típusa</option>
                <option value='Dizel'>Dizel</option>
                <option value='Benzin'>Benzin</option>
                <option value='Elektromos'>Elektromos</option>
            </select><br>
            <input type="number" name="cm3" id="cm3" placeholder="Köbcenti" required="" oninput="cm3_input()"><br>
            <input type="number" name="hp" id="hp" placeholder="Lóerő" required="" oninput="hp_input()"><br>
            <input type="file" id="files" accept="image/*" name="files[]" multiple onchange="fileValidation()"><br>            
        </div>     

        <script>
            
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
                if(files.length > 10){
                    error_image_number = true;
                    alert("Maximum 9 fájl engedélyezett!.");
                }else{
                    error_image_number = false;                    
                }               
            });
            

        </script>

        <div style="display: inline-block; float: left;">
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
            <input type='number' name='mileage' id="mileage" placeholder="Kilóméteróra állás" required="" oninput="mileage_input()"><br>
            <select name='euro' id='euro'>
                <option value=''  hidden="">Környezetvédelmi besorolás</option>
                <option value='euro 1'>Euro 1</option>
                <option value='euro 2'>Euro 2</option>
                <option value='euro 3'>Euro 3</option>
                <option value='euro 4'>Euro 4</option>
                <option value='euro 5'>Euro 5</option>
                <option value='euro 6'>Euro 6</option>
                </select><br>
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
                </select><br>
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
            <input type='number' name='weight' id="weight" placeholder="Súly (Kg)" required="" oninput="weight_input()"><br>
            <input type='text' name='identification_number' id="id_number" placeholder="Alvázszám" oninput="id_number_input()"><br>
            <textarea rows='10' cols='22' name='description' id="description" oninput="description_input()">Rövid leírás</textarea><br>
            <div><button style="width: 100px" type="submit" name="submit" id="submit" value="upload">Feltölt</button><br></div>
        </div>
        <div>
            <input type="checkbox" name="chkl[ ]" value="Tempomat">Tempomat<br />
            <input type="checkbox" name="chkl[ ]" value="Klima">Klima<br />
            <input type="checkbox" name="chkl[ ]" value="Napfénytető">Napfénytető<br />
            <input type="checkbox" name="chkl[ ]" value="Centrálzár">Centrálzár<br />
            <input type="checkbox" name="chkl[ ]" value="Riasztó">Riasztó<br />
            <input type="checkbox" name="chkl[ ]" value="Led Fényszóró">Led Fényszóró<br />
            <input type="checkbox" name="chkl[ ]" value="Xenon fényszóró">Xenon fényszóró<br />
            <input type="checkbox" name="chkl[ ]" value="Tolatóradar">Tolatóradar<br />
            <input type="checkbox" name="chkl[ ]" value="Multifunkcionális kormány">Multifunkcionális kormány<br />
            <input type="checkbox" name="chkl[ ]" value="Kartámasz">Kartámasz<br />
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


            
            //Image validation
            /**************************************************************************************************/
            /**************************************************************************************************/


            /*(function($) {
                $.fn.checkFileType = function(options) {
                    var defaults = {
                        allowedExtensions: [],
                        success: function() {},
                        error: function() {}
                    };
                    options = $.extend(defaults, options);

                    return this.each(function() {

                        $(this).on('change', function() {
                            var value = $(this).val(),
                                file = value.toLowerCase(),
                                extension = file.substring(file.lastIndexOf('.') + 1);

                            if ($.inArray(extension, options.allowedExtensions) == -1) {
                                options.error();
                                $(this).focus();
                            } else {
                                options.success();

                            }

                        });

                    });
                };

            })(jQuery);

            $(function() {
                $('#files').checkFileType({
                    allowedExtensions: ['jpg', 'jpeg'],
                    success: function() {
                        error_image = false;
                        alert('Success');
                    },
                    error: function() {
                        error_image = true;
                        alert('Error');
                    }
                });

            });*/

            


            /*$('#files').change(function(){
                var files = $(this)[0].files;
                if(files.length > 10){
                    alert("you can select max 10 files.");
                }else{
                    alert("correct, you have selected less than 10 files");                    
                }               
            });*/


            

           


            /*var files = document.getElementsByName('files[]'); 
            for (var i = 0, j = files.length; i < j; i++) {
                var file = files[i];
                // do stuff with your file
                console.log(files);
            }*/


            
        

            /**************************************************************************************************/
            /**************************************************************************************************/



            
            function check_brand(){
                var brand = $("#brand").val();

                if(brand === ''){
                    $("#brand").css("border-bottom","2px solid #F90A0A");
                    error_brand = true;
                } else {
                    $("#brand").css("border-bottom","2px solid green");
                }
            }

            function check_type(){
                var type = $("#type").val();

                if(type === ''){
                    $("#type").css("border-bottom","2px solid #F90A0A");
                    error_type = true;
                } else {
                    $("#type").css("border-bottom","2px solid green");
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
                }
            }

            function check_price(){
                var price = $("#price").val();

                if(price === ''){
                    $("#price").css("border-bottom","2px solid #F90A0A");
                    error_price = true;
                } else {
                    $("#price").css("border-bottom","2px solid green");
                }
            }

            function check_fuel(){
                var fuel = $("#fuel").val();

                if(fuel === ''){
                    $("#fuel").css("border-bottom","2px solid #F90A0A");
                    error_fuel = true;
                } else {
                    $("#fuel").css("border-bottom","2px solid green");
                }

            }

            function check_cm3(){
                var cm3 = $("#cm3").val();

                if(cm3 === ''){
                    $("#cm3").css("border-bottom","2px solid #F90A0A");
                    error_cm3 = true;
                } else {
                    $("#cm3").css("border-bottom","2px solid green");
                }
            }

            function check_hp(){
                var hp = $("#hp").val();

                if(hp === ''){
                    $("#hp").css("border-bottom","2px solid #F90A0A");
                    error_hp = true;
                } else {
                    $("#hp").css("border-bottom","2px solid green");
                }
            }

            function check_body_style(){
                var body_style = $("#body_style").val();

                if(body_style === ''){
                    $("#body_style").css("border-bottom","2px solid #F90A0A");
                    error_body_style = true;
                } else {
                    $("#body_style").css("border-bottom","2px solid green");
                }
            }

            function check_mileage(){
                var mileage = $("#mileage").val();

                if(mileage === ''){                    
                    $("#mileage").css("border-bottom","2px solid #F90A0A");
                    error_mileage = true;
                } else {                    
                    $("#mileage").css("border-bottom","2px solid green");
                }
            }

            function check_euro(){
                var euro = $("#euro").val();

                if(euro === ''){
                    $("#euro").css("border-bottom","2px solid #F90A0A");
                    error_euro = true;
                } else {
                    $("#euro").css("border-bottom","2px solid green");
                }
            }

            function check_colour(){
                var colour = $("#colour").val();

                if(colour === ''){
                    $("#colour").css("border-bottom","2px solid #F90A0A");
                    error_colour = true;
                } else {
                    $("#colour").css("border-bottom","2px solid green");
                }
            }

            function check_transmission(){
                var transmission = $("#transmission").val();

                if(transmission === ''){
                    $("#transmission").css("border-bottom","2px solid #F90A0A");
                    error_transmission = true;
                } else {
                    $("#transmission").css("border-bottom","2px solid green");
                }
            }

            function check_weight(){
                var weight = $("#weight").val();

                if(weight === ''){;
                    $("#weight").css("border-bottom","2px solid #F90A0A");
                    error_weight = true;
                } else {                    
                    $("#weight").css("border-bottom","2px solid green");
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
                check_fuel();
                check_body_style();
                check_euro();
                check_colour();
                check_transmission();
                check_id_number();
                fileValidation();
            
                
                if(error_brand === false && error_type === false && error_year === false && error_fuel === false && error_body_style === false && error_euro === false && error_colour === false && error_transmission === false && error_id_number === false && error_image === false && error_image_number === false) {
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
