<?php
    session_start();
    
    if(!$_SESSION){
    
    }else{
        header('Location: ../screens/createpost.php');
        exit();
    }
?>