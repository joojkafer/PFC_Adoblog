<?php 

    session_start();

    if($_SESSION){
        if($_SESSION['tipo'] != "ADMIN"){
            header('Location: ../../screens/index.php');
            exit();
        }
    }else{
        header('Location: ../../screens/sessionwarning.php');
        exit();
    }

?>
        
    