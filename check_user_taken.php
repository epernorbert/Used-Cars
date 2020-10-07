<?php

// Script ckeck username is already exist in database

include 'action.php';

if(isset($_POST['user_uid'])){
    $sql = "SELECT * FROM users WHERE user_uid = '".$_POST["user_uid"]."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo '<div style="color: #F90A0A;">A felhasználónév foglalt</div>';
        echo '<script>
                document.getElementById("uid").style.borderBottomColor = "#F90A0A";             
              </script>';
    } else if(!preg_match("/^[a-zA-Z0-9]*$/", $_POST['user_uid'])){
        echo '<div style="color: red">A mező csak betűket és számokat tartalmazhat!</div>';
        echo '<script>
                 document.getElementById("uid").style.borderBottomColor = "#F90A0A";   
              </script>';
    } else if($_POST['user_uid'] == ''){
        //empty field
        echo '<script>
                 document.getElementById("uid").style.borderBottomColor = "#F90A0A";   
              </script>';
    } else if(strlen($_POST['user_uid']) > 20){
        echo '<div style="color: red">Maximum 20 karakter!</div>';
        echo '<script>
                 document.getElementById("uid").style.borderBottomColor = "#F90A0A";   
              </script>';
    } else{
        echo '<script>
                document.getElementById("uid").style.borderBottomColor = "#34F458";
              </script>';

    }
}

?>