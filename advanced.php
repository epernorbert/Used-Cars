<?php
    session_start();
    include_once 'action.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <link type="text/css" rel="stylesheet" href="css/advanced.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>RészletesKeresés</title>
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

<div style="margin: 0 10%;">
    <form action="search.php" method="GET"> 
        <div >               
             <table style="width: 58%; float: left;">          
                <tr>
                    <td class="data">Általános&nbspadatok</td>
                </tr>
                <tr>                
                    <td colspan="3" style="border-bottom: 2px solid #565057;"></td>
                </tr>   
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
                    <td class="data">Finanszírozás</td>
                </tr>
                <tr>                                                       
                    <td  colspan="2" style="border-bottom: 2px solid #565057;"></td>                
                </tr>
                <tr>
                    <td>
                        <input type='number' name='min_price' id='min_price' placeholder='Minimum ár (€)' onkeypress='return event.charCode >= 48' oninput='check_min_price()'>
                    </td>        
                    <td>
                        <input type="number" name="max_price" placeholder="Maximum ár (€)" id="max_price" onkeypress="return event.charCode >= 48" oninput="check_max_price()" min="1">
                    </td>
                </tr> 
                <tr>
                    <td class="data">Karosszéria</td>
                </tr>
                <tr>                
                    <td colspan="4" style="border-bottom: 2px solid #565057;"></td>
                </tr>  
                <tr>
                    <td>
                        <select id="body_style" name="body_style">
                            <option value=""  hidden="">Kivitel</option>
                            <option value='Ferdehátú'>Ferdehátú</option>
                            <option value='Kombi'>Kombi</option>
                            <option value='Pickup'>Pickup</option>
                            <option value='Sedan'>Sedan</option>
                            <option value='Terepjáró'>Terepjáró</option>
                            <option value='Városi terepjáró'>Városi terepjáró</option>
                            <option value='Coupe'>Coupe</option>
                        </select>
                    </td>
                    <td>
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
                        </select>
                    </td>
                    <td>
                        <input type='number' name='weight_start' id="weight_start" placeholder="Súly (tól)" oninput="weight_input()">
                    </td>
                    <td>
                        <input type='number' name='weight_end' id="weight_end" placeholder="Súly (ig)" oninput="weight_input()">
                    </td>
                </tr>
                <tr>
                    <td class="data">Gyártási év</td>
                </tr>
                <tr>                
                    <td colspan="2" style="border-bottom: 2px solid #565057; font-size: 22px;  "></td>
                </tr>                
                <tr>
                    <td>
                        <input type="number" name="date_start" placeholder="Évjárat(tól)" id="date_start" onkeypress="return event.charCode >= 48" oninput="check_min_year()" >
                    </td>
                    <td>
                        <input type='number' name='date_end' id='date_end' placeholder='Évjárat(ig)' onkeypress='return event.charCode >= 48' oninput='check_date_end()' >
                    </td> 
                </tr> 
            </table>
        </div>      
        <table class="engin_data" align="right" style="width: 40%;" >
            <tr>
                <td class="data">Motor adatok</td>
            </tr>    
            <tr>                
                <td colspan="4" style="border-bottom: 2px solid #565057; "></td>
            </tr>           
            <tr>
                <td>
                    <input type='number' name='max_hp' id='max_hp' placeholder='Maximum lóerő' onkeypress='return event.charCode >= 48  ' oninput='check_max_hp()'>
                </td>
                <td>
                    <input type='number' name='min_hp' id='min_hp' placeholder='Minimum lóerő' onkeypress='return event.charCode >= 48' oninput='check_min_hp()'>
                </td>
            </tr>
            <tr>    
                <td>
                    <input type='number' name='max_cm3' id='max_cm3' placeholder='Maximum köbcenti' onkeypress='return event.charCode >= 48' oninput='check_max_cm3()'>
                </td>
                <td>
                    <input type='number' name='min_cm3' id='min_cm3' placeholder='Minimum köbcenti' onkeypress='return event.charCode >= 48' oninput='check_min_cm3()'>
                </td>
            </tr>         
            <tr>
                <td>
                    <input type='number' name='mileage_start' id='mileage_start' placeholder='Kilométeróra állása(tól)' onkeypress='return event.charCode >= 48'>
                </td>
                <td>
                    <input type='number' name='mileage_end' id='mileage_end' placeholder='Kilométeróra állása(ig)' onkeypress='return event.charCode >= 48'>
                </td>
            </tr>
            <tr>    
                <td>                    
                    <select name='euro' id='euro'>
                        <option value='' hidden="">Környezetvédelmi osztály</option>
                        <option value='euro 1'>Euro 1</option>
                        <option value='euro 2'>Euro 2</option>
                        <option value='euro 3'>Euro 3</option>
                        <option value='euro 4'>Euro 4</option>
                        <option value='euro 5'>Euro 5</option>
                        <option value='euro 6'>Euro 6</option>
                    </select>
                </td>
                <td> 
                    <select name='transmission' id='transmission'>
                        <option value='' hidden="">Sebességváltó</option>
                        <option value='Manuális - 4'>Manuális - 4</option>
                        <option value='Manuális - 5'>Manuális - 5</option>
                        <option value='Manuális - 6'>Manuális - 6</option>
                        <option value='Manuális - 7'>Manuális - 7</option>
                        <option value='Automata - 4'>Automata - 4</option>
                        <option value='Automata - 5'>Automata - 5</option>
                        <option value='Automata - 6'>Automata - 6</option>
                        <option value='Automata - 7'>Automata - 7</option>
                    </select>
                </td>                
            </tr>
                <tr>
                    <td colspan="6" align="center" >
                        <button type="submit" name="submit-search">Keresés
                        </button>
                    </td>
                </tr>    
         </table>   
         <input type="hidden" name="page" value="1" >       
    </form>
</div>    


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