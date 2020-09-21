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
    <link type="text/css" rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>
<body>

<div > <img  style="float: left; display: inline-block; margin-top: 2%; margin-left: 10%;" src="peugeot_208/logohd.jpg" height="75"> </div>
<div class="navbar">
    <ul class="navbar_ul" >
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


</body>
</html>

<?php
include 'action.php';
?>

<?php
    
    // Search
    $max_price = $_GET['max_price'];            
    $date_start = $_GET['date_start'];            
    $fueltype = $_GET['fueltype'];
    $type = $_GET['type'];    

    // Got brand id and I need brand name for search (fetch_type.php)
    $brand_id = $_GET['brand'];               
    $sql_brand = "SELECT brands_name FROM car_brands WHERE brands_id = '$brand_id'";
    $result_brand = mysqli_query($conn, $sql_brand);    
    $row = mysqli_fetch_assoc($result_brand);  
    $brands_name =  $row['brands_name'];

    // Advanced search

    if(isset($_GET['min_price'])){
        $min_price = $_GET['min_price'];            
    } else {
        $min_price = "";    
    }

    if(isset($_GET['max_hp'])){
        $max_hp = $_GET['max_hp'];            
    } else {
        $max_hp = "";    
    }

    if(isset($_GET['min_hp'])){
        $min_hp = $_GET['min_hp'];            
    } else {
        $min_hp = "";    
    }

    if(isset($_GET['date_end'])){
        $date_end = $_GET['date_end'];            
    } else {
        $date_end = "";    
    }

    if(isset($_GET['max_cm3'])){
        $max_cm3 = $_GET['max_cm3'];            
    } else {
        $max_cm3 = "";    
    }

    if(isset($_GET['min_cm3'])){
        $min_cm3 = $_GET['min_cm3'];            
    } else {
        $min_cm3 = "";    
    }

    if(isset($_GET['min_price'])){
        $min_price = $_GET['min_price'];            
    } else {
        $min_price = "";    
    }

    if(isset($_GET['body_style'])){
        $body_style = $_GET['body_style'];            
    } else {
        $body_style = "";    
    }

    if(isset($_GET['colour'])){
        $color = $_GET['colour'];            
    } else {
        $color = "";    
    }

    if(isset($_GET['weight_start'])){
        $weight_start = $_GET['weight_start'];            
    } else {
        $weight_start = "";    
    }

    if(isset($_GET['weight_end'])){
        $weight_end = $_GET['weight_end'];            
    } else {
        $weight_end = "";    
    }

    if(isset($_GET['mileage_start'])){
        $mileage_start = $_GET['mileage_start'];            
    } else {
        $mileage_start = "";    
    }

    if(isset($_GET['mileage_end'])){
        $mileage_end = $_GET['mileage_end'];            
    } else {
        $mileage_end = "";    
    }

    if(isset($_GET['euro'])){
        $euro = $_GET['euro'];            
    } else {
        $euro = "";    
    }

    if(isset($_GET['transmission'])){
        $transmission = $_GET['transmission'];            
    } else {
        $transmission = "";    
    }


    
    
    // define how many results you want per page
    $results_per_page = 18;

    // find out the number of results stored in database
    $sql="SELECT * from cars JOIN car_images ON cars.car_id=car_images.car_id WHERE
            (ar<='$max_price' OR '$max_price' LIKE '') AND
            (ar>='$min_price' OR '$min_price' LIKE '') AND
            (loero<='$max_hp' OR '$max_hp' LIKE '') AND
            (loero>='$min_hp' OR '$min_hp' LIKE '') AND
            (kobcenti<='$max_cm3' OR '$max_cm3' LIKE '') AND
            (kobcenti>='$min_cm3' OR '$min_cm3' LIKE '') AND
            (évjárat<='$date_end' OR '$date_end' LIKE '') AND
            (évjárat>='$date_start' OR '$date_start' LIKE '') AND
            (uzemanyag LIKE '$fueltype' OR '$fueltype' LIKE '') AND
            (marka LIKE '$brands_name' OR '$brands_name' LIKE '') AND
            (tipus LIKE '$type' OR '$type' LIKE '') AND
            (body_style LIKE '$body_style' OR '$body_style' LIKE '') AND
            (weight<='$weight_end' OR '$weight_end' LIKE '') AND
            (weight>='$weight_start' OR '$weight_start' LIKE '') AND            
            (mileage<='$mileage_end' OR '$mileage_end' LIKE '') AND
            (mileage>='$mileage_start' OR '$mileage_start' LIKE '') AND
            (euro LIKE '$euro' OR '$euro' LIKE '') AND
            (transmission LIKE '$transmission' OR '$transmission' LIKE '') AND
            (colour LIKE '$color' OR '$color' LIKE '')
            GROUP BY user_id ORDER BY cars.car_id DESC";

    $result = mysqli_query($conn, $sql);
    $number_of_results = mysqli_num_rows($result);

    // determine number of total pages available
    $number_of_pages = ceil($number_of_results/$results_per_page);

    // determine which page number visitor is currently on
    if (!isset($_GET['page'])) {
      $page = 1;
    } else {
      $page = $_GET['page'];
    }

    // determine the sql LIMIT starting number for the results on the displaying page
    $this_page_first_result = ($page-1)*$results_per_page;

    // retrieve selected results from database and display them on page
    $sql="SELECT * FROM cars JOIN car_images ON cars.car_id=car_images.car_id WHERE 
                (ar<='$max_price' OR '$max_price' LIKE '') AND
                (ar>='$min_price' OR '$min_price' LIKE '') AND
                (loero<='$max_hp' OR '$max_hp' LIKE '') AND
                (loero>='$min_hp' OR '$min_hp' LIKE '') AND
                (kobcenti<='$max_cm3' OR '$max_cm3' LIKE '') AND
                (kobcenti>='$min_cm3' OR '$min_cm3' LIKE '') AND
                (évjárat<='$date_end' OR '$date_end' LIKE '') AND
                (évjárat>='$date_start' OR '$date_start' LIKE '') AND
                (uzemanyag LIKE '$fueltype' OR '$fueltype' LIKE '') AND
                (marka LIKE '$brands_name' OR '$brands_name' LIKE '') AND
                (tipus LIKE '$type' OR '$type' LIKE '') AND
                (body_style LIKE '$body_style' OR '$body_style' LIKE '') AND
                (weight<='$weight_end' OR '$weight_end' LIKE '') AND
                (weight>='$weight_start' OR '$weight_start' LIKE '') AND  
                (mileage<='$mileage_end' OR '$mileage_end' LIKE '') AND
                (mileage>='$mileage_start' OR '$mileage_start' LIKE '') AND   
                (euro LIKE '$euro' OR '$euro' LIKE '') AND
                (transmission LIKE '$transmission' OR '$transmission' LIKE '') AND           
                (colour LIKE '$color' OR '$color' LIKE '')
                GROUP BY user_id ORDER BY cars.car_id DESC
                LIMIT " . $this_page_first_result . ',' .  $results_per_page;

    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    if($queryResult > 0){
    
    echo '<div style="width: 100%; overflow: auto;" >';
    while($row = mysqli_fetch_assoc($result)){
            if($row['uzemanyag'] == 'Elektromos'){
                echo '<div style="margin-left: 10%; margin-right: 9%;">' . '<div class="index_db" style=" float: left; background-color: #91D184;">' . '<p style="margin: 3px 0;" >'  . $row['marka'] . " " . $row['tipus'] . '</p>' . $row['ar'] . "€" . " " . $row['évjárat']  .  '<div style="border: 2px solid black;"> <a href="advertisement.php?car_id='.$row['car_id'].'" > <img class="image" src=uploads/' .$row['image_name']  .' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;" > </a> </div> ' . '</div>' . '</div>';
             } else {
                 echo '<div style="margin-left: 10%; margin-right: 9%;">' . '<div class="index_db" style=" float: left;">' . '<p style="margin: 3px 0;" >'  . $row['marka'] . " " . $row['tipus'] . '</p>' . $row['ar'] . "€" . " " . $row['évjárat']  .  '<div style="border: 2px solid black;"> <a href="advertisement.php?car_id='.$row['car_id'].'" > <img class="image" src=uploads/' .$row['image_name']  .' style="display: block; object-fit: cover;/* nagyítás, egyforma képek */ width: 146px; height: 93px;" > </a> </div> ' . '</div>' . '</div>';
            }
        }
    echo '</div>';    

    // display the links to the pages
    echo '<div style="text-align: center; margin: 20px; 0" >';
        $active="";
        for ($page=1;$page<=$number_of_pages;$page++) {       
            if($page == $_GET['page']){
                $active='class="active"';
            } else {
                $active='';
            }  
                         
            echo '<div class="pagination" > <a '.$active.'  href="search.php?page=' . $page . 
                            '&max_price='.$max_price.
                            '&date_start='.$date_start.
                            '&fueltype='.$fueltype.
                            '&brand='.$brand_id.
                            '&type='.$type.
                            '&min_price='.$min_price.
                            '&max_hp='.$max_hp.
                            '&min_hp='.$min_hp.
                            '&max_cm3='.$max_cm3.
                            '&min_cm3='.$min_cm3.
                            '&body_style='.$body_style.
                            '&colour='.$color.
                            '&weight_start='.$weight_start.
                            '&weight_end='.$weight_end.
                            '&mileage_start='.$mileage_start.
                            '&mileage_end='.$mileage_end.
                            '&transmission='.$transmission.
                            '&euro='.$euro.
                            '&date_end='.$date_end.'  ">' . $page . '</a>  </div>';    
            
        }        
    echo '</div>';
} else {    
    echo  '<div>
                 <script>                                                  
                          alert("A keresésnek nincs eredménye!");
                          location.href="index.php";
                 </script> 
           </div>';
}

?>






