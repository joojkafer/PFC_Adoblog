<?php
    //encerra caso exista
    session_start();
    session_destroy();
    header('Location: ../screens/logs/login.php');
    exit();
?>

