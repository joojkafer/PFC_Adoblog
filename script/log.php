<?php 
    session_start();
    include('connection.php');

    //verifica se os campos estão vazios a fim de evitar formas de burlar o sistema
    if(empty($_POST['email']) || empty($_POST['senha'])){
        header('Location:../screens/login.php');
        exit();
    }

    //obtenção dos dados enviados pelo form através do post a fim de evitar SQL Injection
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);

    //criação da query para selecionar dados do banco caso existam os dados enviados via POST
    $queryong = "SELECT ong_email FROM tb_ong WHERE ong_email='$email' AND ong_senha='$senha'";
    $resultong = mysqli_query($mysqli, $queryong);
    $rowong = mysqli_num_rows($resultong);
    
    //verificação de login verificando se é adm ou ong, e se existe executa a criação da SESSION
    if($rowong != 1){
        $queryadm = "SELECT adm_email FROM tb_admin WHERE adm_email='$email' AND adm_senha='$senha'";;
        $resultadm = mysqli_query($mysqli, $queryadm);
        $rowadm = mysqli_num_rows($resultadm);

        if($rowadm == 1){
            $_SESSION['email'] = $email;
            header('Location:../screens/index.php');
            exit();
        }else{
            header('Location:../screens/loginerror.php');
        }
    }else{
        if($rowong == 1){
            $_SESSION['email'] = $email;
            header('Location:../screens/index.php');
            exit();
        }else{
            header('Location:../screens/loginerror.php');
        }
    }

    //verificação se a linha selecionada existe e criação da SESSION
    /*if($rowong == 1){
        $_SESSION['email'] = $email;
        header('Location:../screens/index.php');
        exit();
    }else{
        header('Location:../screens/loginerror.php');
    }*/
    
?>