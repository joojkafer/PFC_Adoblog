<?php
    //verifica sessão e encerra caso exista
    session_start();
    session_destroy();
    header('Location: ../screens/login.php');
    exit();
?>

