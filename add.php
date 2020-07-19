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
    $connect = mysqli_connect("localhost", "root", "", "usedcars");
    $output = '';
    $sql = "SELECT * FROM car_brands ORDER BY brands_name";
    $result = mysqli_query($connect, $sql);
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

<div style="margin: 3% 0 0 10%">
    <h1>Hírdetés feladása</h1>
    <p>Töltsön ki minden mezőt a megfelelő adatokkal!</p>
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
            <input type="radio" id="dizel" name="fuel" value="Dizel">
            <label for="dizel">Dizel</label>
            <input type="radio" id="benzin" name="fuel" value="Benzin">
            <label for="benzin">Benzin</label>
            <input type="radio" id="electric" name="fuel" value="Elektromos">
            <label for="electric">Elektromos</label><br>
            <input type="number" name="cm3" placeholder="Köbcenti"><br>
            <input type="number" name="hp" placeholder="Lóerő"><br>
            <input type="file" id="files" name="files[]" multiple><br>
        </div>
        <div style="display: inline-block">
            <div align="center"><button style="width: 100px" type="submit" name="submit" value="upload">Feltölt</button><br></div>
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