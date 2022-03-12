<?php
    session_start();
    if(!$_SESSION){
        
    }else{
        if($_SESSION['tipo'] == "ADMIN"){

        }else{
            header('Location: ../screens/pub/createpost.php');
            exit();
        }
    }
?>