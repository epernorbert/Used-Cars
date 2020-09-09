<?php

session_start();

include '../action.php';

if(!isset($_SESSION['u_usertype']) || $_SESSION['u_usertype'] == 'user' || $_SESSION['u_usertype'] == 'writer'  ){
    header("Location: ../index.php?ERROR=need=to=login=admin");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin page</title>
    <link type="text/css" rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- Jquery for bootstrap table -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"></script>
    <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" >
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
</head>
<body>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

<div> <img  style="float: left; display: inline-block; margin-top: 2%; margin-left: 10%; " src="../peugeot_208/logohd.jpg" height="75"> </div>
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



<?php

include '../action.php';

    
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);

    echo '<div style="margin: 0 10%;">';
    echo '<table class="table table-fluid" id="myTable" >    
                    <thead>
                        <tr>
                            <th>Sorszám</th>
                            <th>User Id</th>
                            <th>Felhasználónév</th>
                            <th>Keresztnév</th>
                            <th>Vezetéknév</th>
                            <th>E-mail</th>
                            <th>Jogosúltság</th>
                        </tr>
                    </thead>';

    $i = 0;
    if($resultcheck > 0){
        while($row = mysqli_fetch_assoc($result)){            
            $i++;
            echo  '<tr>                   
                        <td>'.$i.'</td>
                        <td style="background-color: green;"><a style="color: black; text-decoration: none;" href=check_advertisement.php?user_id=' . $row['user_id'].'>'.$row['user_id'].'</a></td>
                        <td>'.$row['user_uid'].'</td>
                        <td>'.$row['user_first'].'</td>
                        <td>'.$row['user_last'].'</td>
                        <td>'.$row['user_email'].'</td>
                        <td>'.$row['user_usertype'].'</td>                                               
                        </a>
                    </tr>';

        }
    }
    echo '</div>';


?><br>


</body>
</html>
