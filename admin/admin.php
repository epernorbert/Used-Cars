<?php

session_start();

include '../action.php';

if(!isset($_SESSION['u_usertype']) || $_SESSION['u_usertype'] == 'user'  ){
    header("Location: ../index.php?need=to=login=admin");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin page</title>
    <link type="text/css" rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


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
<div  class="navbar_social">
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-google"></a><br>
    <a href="#" class="fa fa-instagram"></a>
    <a href="#" class="fa fa-twitter"></a>
</div><br>


<h1 style="margin: 0 10%">Admin page</h1><br>

<?php

include '../action.php';

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);

    if($resultcheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            //echo '<div style="margin: 0 10%">' . $row['user_id'] .  " " . $row['user_uid'] . " " . $row['user_first'] . " " . $row['user_last'] .  " " . $row['user_email'] . " " . $row['user_usertype']  . '</div>';


            echo '<div style="margin: 0 10%">
                        <table border="1">                        
                        <tr>
                            <td width="50px" style="background-color: green;"><a style="color: black; text-decoration: none;" href=check_advertisement.php?user_id=' . $row['user_id'].'>'.$row['user_id'].'</a></td>
                            <td width="150px">'.$row['user_uid'].'</td>
                            <td width="100px">'.$row['user_first'].'</td>
                            <td width="100px">'.$row['user_last'].'</td>
                            <td width="300px">'.$row['user_email'].'</td>
                            <td width="50px">'.$row['user_usertype'].'</td>                                               
                        </tr>                       
                       </table>
                 </div>';

        }
    }


?><br>


<form action="../includes/logout.inc.php" method="POST" style="margin: 0 10%">
    <button type="submit" name="submit">Logout</button>
</form>

</body>
</html>
