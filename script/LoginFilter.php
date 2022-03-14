<?php 

    session_start();

    if($_SESSION){
        if($_SESSION['tipo'] != "ADMIN"){
            header('Location: ../screens/index.php');
            exit();
    }else{
        header('Location: ../screens/sairsessaowarning.php');
        exit();
    }

    /*class LoginFilter
    {


        public static function filter(string $userPermissionNecesary, string $urlWhenPermissionDenied){

            $type = $_SESSION['tipo'];

            if($userPermissionNecesary == "ADMIN"){
                
                if($userPermissionNecesary != $type) {
                    header('location: ' . $urlWhenPermissionDenied);
                }

            }


        }*/
        
    