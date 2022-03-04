<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar | Adoblog</title>
    <link rel="stylesheet" type="text/css" href="../styles/register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light py-3" style="background-color: #A5EB78;">
        <a class="navbar-brand" href="index.php"> 
            <img src="../images/logo.png"  class="thumbnail"  alt="Logo"> 
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto" style="border: 1px solid black;
                                                  border-radius: 8px;
                                                  padding-top: 0px;
                                                  padding-bottom: 0px;
                                                  margin-right: 10px;
                                                  margin-left: 10px;">
                <li class="nav-item active" style="padding-left:18px;">
                    <a class="nav-link active" href="index.php"> Adote </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="doarform.php"> Doe </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="ongpage.php"> ONG's </a>
                </li>
                <?php
                    if(!$_SESSION){
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link active' href='login.php'> Entrar </a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link active' href='registerong.php' style='padding-right:18px;'> Cadastrar </a>
                            </li>
                        ";
                    }else{ 
                        echo "
                            <li>
                                <a class='nav-link active' href='../script/logout.php'> Logout </a>
                            </li>
                        ";

                        echo "<li class='nav-item'> <a class='nav-link active' href='ongpage.php'>";
                            $email = $_SESSION['email'];
                            print_r($email); 
                        echo "</a> </li>";
                    }
                ?>
            </ul>
        </div>
    </nav>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">
                <img class="loguserimg" src="../images/user_icon_register.png" id="icon" alt="User Icon" />
            </div>
            <div>
                <b> INSIRA OS DADOS DA SUA ONG: </b>
            </div>
            <form method="POST">
            <?php 
            //função de inserção de dados diretamente no banco
                require_once '../script/connection.php';
                
                if(isset($_POST['register'])){
                    $nome = $_POST['nome'];
                    $razaosocial = $_POST['razaosocial'];
                    $email = $_POST['email'];
                    $cnpj = $_POST['cnpj'];
                    $estado = $_POST['estado'];
                    $cidade = $_POST['cidade'];
                    $senha = $_POST['senha'];

                    $resultemail = $mysqli->query("SELECT * FROM tb_ong WHERE ong_email='$email'") or die($mysqli->error());
                    $resultcnpj = $mysqli->query("SELECT * FROM tb_ong WHERE ong_cnpj='$cnpj'") or die($mysqli->error());
                    
                    //verificação de dados como 'email' e 'cnpj', afim de verificar se
                    //já são dados existentes no banco e impedir de cadastrar iguais
                    if(mysqli_num_rows($resultemail) == 1 || mysqli_num_rows($resultcnpj) == 1){
                        //header('Location:registerfail.php');
                        ?>

                        <script> 
                            alert('Email ou CNPJ já cadastrados, tente novamente com outros dados.');
                        </script>

                        <?php
                    }else{
                        $mysqli->query("INSERT INTO `tb_ong`(`ong_nome`, `ong_razaosocial`, `ong_email`, `ong_cnpj`, `ong_estado`, `ong_cidade`, `ong_senha`) 
                        VALUES ('$nome', '$razaosocial', '$email', '$cnpj', '$estado', '$cidade', '$senha')");

                        header('Location:registersuccess.php');
                    }
                }
            ?>
                
                <input type="text" id="nome" class="fadeIn second" name="nome" placeholder="Nome da ONG" required>
                <input type="text" id="razaosocial" class="fadeIn third" name="razaosocial" placeholder="Razão Social" required>
                <input type="text" id="email" class="fadeIn fourth" name="email" placeholder="Email" required>
                <input type="text" id="cnpj" class="fadeIn fifth" name="cnpj" placeholder="CNPJ" required>
                <input type="text" id="estado" class="fadeIn sixth" name="estado" placeholder="Estado da ONG" required>
                <input type="text" id="cidade" class="fadeIn seventh" name="cidade" placeholder="Cidade da ONG" required>
                <input type="text" id="senha" class="fadeIn eigth" name="senha" placeholder="Senha" required>
                <input type="submit" style="background-color:#A5EB78;"class="fadeIn nineth" name="register" value="Cadastrar">
            </form>
        </div>
    </div>

    <div class="fadeIn footer" class="footerMargin">
        <footer class="container-fluid py-3" style="background: #A5EB78;">
            <div class="row">
                <div class="col-6 col-md ft1" style="margin-left: 30px;">
                    <h5>Adote e/ou Doe</h5>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="#">Adote um animal</a></li>
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="doarform.php">Doe um animal</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md ft2">
                    <h5>Conheça as ONG'S</h5>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="#">Cadastre a sua!</a></li>
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="ongpage.php">Página de ONG'S</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md ft3">
                    <h5>Sobre</h5>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="#">Por que da ideia?</a></li>
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="#">Nossa equipe</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</body>