<?php

//$connect = mysqli_connect("localhost", "root", "", "usedcars");
include 'action.php';

if(isset($_POST['user_uid'])){
    $sql = "SELECT * FROM users WHERE user_uid = '".$_POST["user_uid"]."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo '<div>A felhasználónév foglalt</div>';
        echo '<script>
                document.getElementById("uid").style.borderBottomColor = "#F90A0A";             
              </script>';
    }
    else{
        echo '<script>
                document.getElementById("uid").style.borderBottomColor = "#34F458";
              </script>';

    }
}

?>