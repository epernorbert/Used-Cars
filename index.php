<?php
session_start();
include_once 'action.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link type="text/css" rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Használtautók</title>
</head>
<body>

<div > <img  style="float: left; display: inline-block; margin-top: 2%; margin-left: 10%;" src="peugeot_208/logohd.jpg" height="75"> </div>
<div class="navbar">
    <ul class="navbar_ul">        
        <li class="navbar_li"><a class="navbar_a" href="index.php">Kezdőlap</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#search">Keresés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="">Hírek</a></li>
        <li class="navbar_li"><a class="navbar_a" href="login.php">Bejelentkezés</a></li>
        <li class="navbar_li"><a class="navbar_a" href="#contact">Kapcsolat</a></li>
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


<div style="clear: both; margin: 0 10%;" >
    <?php
    if(isset($_SESSION['u_id'])){
        echo '<form action="includes/logout.inc.php" method="POST">
                  <button type="submit" name="submit" style="float:left; margin-right: 5px; font-size: 15px; cursor:pointer; font-size: 16px;">Kijelentkezés</button>
              </form>';
        echo '<div style="padding: 5px; font-size: 20px;">' . '<a href="profile.php" style="text-decoration: none; color: blue; font-size: 23px;">' . $_SESSION['u_uid'] . '</a>'  . '</div>' .
                  '<style type="text/css"> 
                    .navbar{
                        margin: 2% 0 4px 0;
                    }               
                </style>';
    }

    ?>
</div>


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


<?php
    $sql = "SELECT * FROM cars";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);    
?> 


<div class="search" id="search">

    <form action="search.php" method="GET">
        <div style=" border-radius: 10px 10px 0 0;  background-color: white; margin: 0 10%; width: 20%; font-size: 22px; padding: 1% 1% 0 1%;" ><?php echo $resultcheck; ?> autó található az oldalon</div>
        <div style="font-size: 22px;  margin: 0 10% 0 10%; width: 20%; padding: 1% 1% 0 1%; background-color: white; " >Keressen az ajánlatok között</div>
        <div  style="background-color: white; display: inline-block; padding: 1%; margin: 0 10%; width: 28%; border-radius: 0 10px 10px 10px; ">        
         <table>                 
             <tr>                
                <td>                    
                    <select name="brand" id="brand">
                       <option value="">Márka</option>
                           <?php echo load_brands(); ?>
                    </select>
                </td>
                <td>
                    <select name="type" id="type" >
                        <option value="">Típus</option>
                    </select>
                </td>
             </tr>  
             <tr>
                <td><input type="number" name="max_price" placeholder="Maximum ár (€)" id="max_price" onkeypress="return event.charCode >= 48" oninput="check_max_price()" min="1"></td>
                <td>
                    <label>
                        <select id="fueltype" name="fueltype">Üzemanyag:
                            <option value="" style="display: none">Üzemanyag</option>
                            <option value="dizel">dizel</option>
                            <option value="benzin">benzin</option>
                            <option value="elektromos">elektromos</option>
                        </select>
                    </label>
                </td>
             </tr>
             <tr>   
                <td><input type="number" name="date_start" placeholder="Évjárat (tól)" id="date_start" onkeypress="return event.charCode >= 48" oninput="check_min_year()" ></td>                
                <td><input type='number' name='mileage_end' id='mileage_end' placeholder='Futott kilóméter (ig)' onkeypress='return event.charCode >= 48'  ></td>
              </tr>   
                <input type="hidden" name="page" value="1" >
                <td colspan="2">
                    <button type="submit" name="submit-search" style="width: 100%; background-color: blue; cursor: pointer; color: white">Keresés</button>
                </td>
                <tr>
                    <td align="center" colspan="2"  ><a class="advanced" style="text-decoration: none; font-size: 20px; display: inline-block; padding: 5px; padding-bottom: 0; color: black;" href="advanced.php">Részletes keresés</a></td>
                </tr>
         </table>  
         </div> 

    </form>
    
    
    
</div>

<script type="text/javascript">
    
    //Check input fields in SEARCH

    function check_min_year(){
        var date_start = document.getElementById("date_start").value;
        var regex = /^[1-9]/;
        if(!regex.test(date_start)){
            document.getElementById("date_start").value = '';
        } else if(date_start.length > 4){
            var limit = date_start.slice(0, 4);
            document.getElementById("date_start").value = limit;
        }
    }

    function check_max_price(){
        var max_price = document.getElementById("max_price").value;
        var regex = /^[1-9]/;
        if(!regex.test(max_price)){
            document.getElementById("max_price").value = '';
        } else if(max_price.length > 10){
            var limit = max_price.slice(0, 10);
            document.getElementById("max_price").value = limit;
        }
    }

    function check_max_hp() {
            var max_hp = document.getElementById("max_hp").value;
        var regex = /^[1-9]/;
        if(!regex.test(max_hp)){
            document.getElementById("max_hp").value = '';
        } else if(max_hp.length > 4){
            var limit = max_hp.slice(0, 4);
            document.getElementById("max_hp").value = limit;
        }
    }

    function check_min_hp(){
        var min_hp = document.getElementById("min_hp").value;
        var regex = /^[1-9]/;
        if(!regex.test(min_hp)){
            document.getElementById("min_hp").value = '';
        } else if(min_hp.length > 4){
            var limit = min_hp.slice(0, 4);
            document.getElementById("min_hp").value = limit;
        }
    }

    function check_min_price(){
        var min_price = document.getElementById("min_price").value;
        var regex = /^[1-9]/;
        if(!regex.test(min_price)){
            document.getElementById("min_price").value = '';
        } else if(min_price.length > 10){
            var limit = min_price.slice(0, 10);
            document.getElementById("min_price").value = limit;
        }
    }

    function check_date_end(){
        var date_end = document.getElementById("date_end").value;
        var regex = /^[1-9]/;
        if(!regex.test(date_end)){
            document.getElementById("date_end").value = '';
        } else if(date_end.length > 4){
            var limit = date_end.slice(0, 4);
            document.getElementById("date_end").value = limit;
        }
    }

    function check_max_cm3(){
        var max_cm3 = document.getElementById("max_cm3").value;
        var regex = /^[1-9]/;
        if(!regex.test(max_cm3)){
            document.getElementById("max_cm3").value = '';
        } else if(max_cm3.length > 4){
            var limit = max_cm3.slice(0, 4);
            document.getElementById("max_cm3").value = limit;
        }
    }

    function check_min_cm3(){
        var min_cm3 = document.getElementById("min_cm3").value;
        var regex = /^[1-9]/;
        if(!regex.test(min_cm3)){
            document.getElementById("min_cm3").value = '';
        } else if(min_cm3.length > 4){
            var limit = min_cm3.slice(0, 4);
            document.getElementById("min_cm3").value = limit;
        }
    }


</script>



<div class="top_brands">Népszerű márkák</div>
<div class="brand" style="font-size: 20px; margin: 0 10% 4% 10%; border-bottom: 1px solid blue; border-top: 1px solid blue;">
    <ul class="brand_ul">    
        <li class="brand_li"><a class="brand_a" href="brands.php?brand=audi" style="color: black"> Audi</a></li>
        <li class="brand_li"><a class="brand_a" href="brands.php?brand=mercedes" style="color: black">Mercedes</a></li>
        <li class="brand_li"><a class="brand_a" href="brands.php?brand=bmw" style="color: black">Bmw</a></li>
        <li class="brand_li"><a class="brand_a" href="brands.php?brand=volkswagen" style="color: black">Volkswagen</a></li>
        <li class="brand_li"><a class="brand_a" href="brands.php?brand=opel" style="color: black">Opel</a></li>
        <li class="brand_li"><a class="brand_a" href="brands.php?brand=renault" style="color: black">Renault</a></li>
    </ul>
</div>


<div style="margin: 0 0 0 10%; width: 55%; float: left;">
    <?php
        $sql = "SELECT c.marka, c.tipus, c.évjárat, c.ar, c.uzemanyag, ci.image_name, c.car_id, ci.car_id from cars c JOIN car_images ci ON c.car_id=ci.car_id GROUP BY user_id ORDER BY c.car_id desc;";
        $result = mysqli_query($conn, $sql);
        $resultcheck = mysqli_num_rows($result);
        $i=0;
        if($resultcheck > 0){
            while($row = mysqli_fetch_assoc($result)){
                 if( $i < 12 /*listázás szabályozása*/){
                    if($row['uzemanyag'] == 'Elektromos'){
                        echo '<div class="index_db" style="background-color: #a3d698;">' . '<p style="margin: 3px 0;" >'  . $row['marka'] . " " . $row['tipus'] . '</p>' . $row['ar'] . "€" . " " . $row['évjárat']  .  '<div style="border: 2px solid black;"> <a href="advertisement.php?car_id='.$row['car_id'].'" > <img class="image" src=uploads/' .$row['image_name']  .' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;" > </a> </div> ' . '</div>';
                            $i++;  
                    } else {
                        echo '<div class="index_db">' . '<p style="margin: 3px 0;" >'  . $row['marka'] . " " . $row['tipus'] . '</p>' . $row['ar'] . "€" . " " . $row['évjárat']  .  '<div style="border: 2px solid black;"> <a href="advertisement.php?car_id='.$row['car_id'].'" > <img class="image" src=uploads/' .$row['image_name']  .' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;" > </a> </div> ' . '</div>';
                        $i++;
                    }
                }
             }
        }
    ?>
</div>

<div style="margin: 0 10% 5% 0; border: 2px solid black; display: inline-block; width: 23%; height: 538px; float: right;">
    <?php

        $sql = "SELECT news_image, news_title FROM news";
        $result = mysqli_query($conn, $sql);
        $resultcheck = mysqli_num_rows($result);
        $newsDisplay = 0;


        if($resultcheck > 0){
            while($row = mysqli_fetch_assoc($result)){
                if($newsDisplay < 5 /*control how many news display*/){
                    echo  '<div class="news" style="border: 1px solid black; margin-top: 3px; display: inline-block; background-color:white;";>' . 
                            '<a href="news.php?news_title='.$row['news_title'].'" class="newsLink" >' .
                                '<img src=news_image/' .$row['news_image']  .' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 165px; height: 102px; float:left;" >' . 
                               '<div>' . $row['news_title'] . '</div>' . 
                            '</a>' .
                       '</div>';
                       $newsDisplay++;
                }
            }
        }


    ?>
</div>


<div style="clear: both; margin: 5% 10% 0 10%; background: rgb(2,0,36);padding: 20px ;
background-image: linear-gradient(to bottom, #113c7e, #0b3060, #0c2444, #0d1828, #04070d); height: 450px" id="contact">
    <div style="float: left">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d362281.8538956186!2d20.142414908230165!3d44.81490282615904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aa3d7b53fbd%3A0x1db8645cf2177ee4!2zQmVsZ3LDoWQ!5e0!3m2!1shu!2srs!4v1585771244197!5m2!1shu!2srs"width="600" height="450" frameborder="0" style="border:2px solid black;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>

    <div style="text-align: center; padding-top: 10%; color: white;">
        <p>Beograd, 1234</p>
        <p>Tel.: 024/123-456</p>
        <p>Email: usedcar@gmail.com</p>
        <p>Fax: Nincs :)</p>
    </div>
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