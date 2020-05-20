<?php

session_start();

if(!isset($_SESSION['u_usertype']) || $_SESSION['u_usertype'] == 'user' || $_SESSION['u_usertype'] == 'admin'  ){
    header("Location: index.php?need=to=login=like=news=writer");
}

echo "itt fogja feladni az ujságíró a hírdetéseket";
?>