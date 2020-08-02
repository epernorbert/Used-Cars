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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <form action="includes/add.inc.php" method="post" enctype="multipart/form-data" >
        <div style="float:left">
            <select name="brand" id="brand">
                <option value="">Válassz márkát</option>
                <?php echo load_brands(); ?>
            </select><br>
            <select name="type" id="type">
                <option value="">Válassz típust</option>
            </select><br>
            <input type="number" name="year" placeholder="Évjárat"><br>
            <input type="number" name="price" placeholder="Ár"><br>
            <label>üzemanyag típusa: </label><br>
            <input type="radio" id="dizel" name="fuel" value="Dizel">
                <label for="dizel">Dizel</label><br>
            <input type="radio" id="benzin" name="fuel" value="Benzin">
                <label for="benzin">Benzin</label><br>
            <input type="radio" id="electric" name="fuel" value="Elektromos">
                <label for="electric">Elektromos</label><br>
            <input type="number" name="cm3" placeholder="Köbcenti"><br>
            <input type="number" name="hp" placeholder="Lóerő"><br>
            <input type="file" id="files" name="files[]" multiple><br>
        </div>
        <div style="display: inline-block; float: left;">
            <select id="body_style" name="body_style">
                <option value="">Kivitel</option>
                <option value='Ferdehátú'>Ferdehátú</option>
                <option value='Kombi'>Kombi</option>
                <option value='Pickup'>Pickup</option>
                <option value='Sedan'>Sedan</option>
                <option value='Terepjáró'>Terepjáró</option>
                <option value='Városi terepjáró'>Városi terepjáró</option>
                <option value='Coupe'>Coupe</option>
            </select><br>
            <input type='number' name='mileage' id="mileage" placeholder="Kilóméteróra állás"><br>
            <select name='euro' id='euro'>
                <option value=''>Környezetvédelmi besorolás</option>
                <option value='euro 1'>Euro 1</option>
                <option value='euro 2'>Euro 2</option>
                <option value='euro 3'>Euro 3</option>
                <option value='euro 4'>Euro 4</option>
                <option value='euro 5'>Euro 5</option>
                <option value='euro 6'>Euro 6</option>
                </select><br>
            <select name='colour' id='colour'>
                <option value="">Szín</option>
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
                <option value='' >Sebességváltó</option>
                <option value='Manuális - 4'>Manuális - 4</option>
                <option value='Manuális - 5'>Manuális - 5</option>
                <option value='Manuális - 6'>Manuális - 6</option>
                <option value='Manuális - 7'>Manuális - 7</option>
                <option value='Automata - 4'>Automata - 4</option>
                <option value='Automata - 5'>Automata - 5</option>
                <option value='Automata - 6'>Automata - 6</option>
                <option value='Automata - 7'>Automata - 7</option>
                </select><br>
            <input type='number' name='weight' placeholder="Súly"><br>
            <input type='text' name='identification_number' placeholder="Alvázszám"><br>
            <textarea rows='10' cols='22' name='description'>Rövid leírás</textarea><br>
            <div><button style="width: 100px" type="submit" name="submit" value="upload">Feltölt</button><br></div>
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