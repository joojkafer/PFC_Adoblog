<?php 
    session_start(); 
    if($_SESSION){
        if($_SESSION['tipo'] == "ADMIN"){

        }else{
            header('Location: ../sessionwarning.php');
            exit();
        }
    }

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //função de adição de dados do "formulário para criação de post" no banco
    require_once '../../script/connection.php';

    if(isset($_POST['register'])){

        $today = date("m.d.y hh:mm:ss:sss"); // e.g. "03.10.01"
        $fileHashNameBased = substr(hash('md5', $today), 0, 15) . basename($_FILES["foto_ong"]["name"]);

        $target_dir  = __DIR__ . "/../../uploads/img_ong/";
        $target_file = $target_dir . $fileHashNameBased;
        
        $uploadOk = 1;
        
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        move_uploaded_file($_FILES["foto_ong"]["tmp_name"], $target_file);

        $nome        = $_POST['nome'];
        $razaosocial = $_POST['razaosocial'];
        $email       = $_POST['email'];
        $cnpj        = $_POST['cnpj'];
        $estado      = $_POST['estado'];
        $cidade      = $_POST['cidade'];
        $telefone      = $_POST['telefone'];
        $senha       = $_POST['senha'];
        $descricao   = $_POST['descricao'];

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);  

        $resultemail = $mysqli->query("SELECT * FROM tb_ong WHERE ong_email='$email'") or die($mysqli->error());
        $resultcnpj = $mysqli->query("SELECT * FROM tb_ong WHERE ong_cnpj='$cnpj'") or die($mysqli->error());
        
        //verificação de dados como 'email' e 'cnpj', afim de verificar se
        //já são dados existentes no banco e impedir de cadastrar iguais
        if(mysqli_num_rows($resultemail) == 1 || mysqli_num_rows($resultcnpj) == 1){
            ?>

            <script> 
                alert('Email ou CNPJ já cadastrados, tente novamente com outros dados.');
            </script>

            <?php
        }else{
            $mysqli->query("INSERT INTO `tb_ong`(`ong_nome`, `ong_razaosocial`, `ong_email`, `ong_cnpj`, `ong_estado`, `ong_cidade`, `ong_telefone`, `ong_senha`, `ong_descricao`, `ong_imagem`) 
            VALUES ('$nome', '$razaosocial', '$email', '$cnpj', '$estado', '$cidade', '$telefone', '$senha','$descricao','$fileHashNameBased')");

            header('Location:registersuccess.php');
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar | Adoblog</title>
    <link rel="stylesheet" type="text/css" href="../../styles/register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
    function buttonNext(){
        document.getElementById("formContent").style.display = "none";
        document.getElementById("aux").style.display = "block";
    }
    function buttonBack(){
        document.getElementById("formContent").style.display = "block";
        document.getElementById("aux").style.display = "none";
    }
    </script>

</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light py-3" style="background-color: #A5EB78;">
        <a class="navbar-brand" href="../index.php"> 
            <img src="../../images/logo.png"  class="thumbnail"  alt="Logo"> 
        </a>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto" style="border: 1px solid black;
                                                  border-radius: 8px;
                                                  padding-top: 0px;
                                                  padding-bottom: 0px;
                                                  margin-right: 10px;
                                                  margin-left: 10px;">
                <li class="nav-item active" style="padding-left:18px;">
                    <a class="nav-link active" href="../index.php"> Adote </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../pub/doarform.php"> Doe </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../ong/ongpage.php"> ONG's </a>
                </li>
                <?php
                    if(!$_SESSION){
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link active' href='login.php' style='padding-right:18px;'> Entrar </a>
                            </li>
                        ";
                    }else{ 
                        if($_SESSION['tipo'] == "ADMIN"){
                            echo "
                                <li class='nav-item'>
                                    <a class='nav-link active' href='../adm/admcontrol.php'> Dashboard </a>
                                </li>
                            ";
                        }
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link active' href='../../script/logout.php'> Logout </a>
                            </li>
                        ";

                        echo "
                            <li class='nav-item'> 
                                <a class='nav-link active' href='../ong/ongprofile.php' style='padding-right:18px;'>";
                                    $nome = $_SESSION['login'];
                                    print_r($nome); 
                        echo "  </a> 
                            </li>";
                    }
                ?>
            </ul>
        </div>
    </nav>

    <div class="wrapper fadeInDown">
        <div id="formContent" class="fadeIn first" style="min-width: 500px;">
            <div class="fadeIn first">
                <img class="loguserimg" src="../../images/user_icon_register.png" id="icon" alt="User Icon" />
            </div>
            
            <div>
                <b> INSIRA OS DADOS DA SUA ONG: </b>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <input type="text" id="nome" class="fadeIn second" name="nome" placeholder="Nome da ONG" required>
                <input type="text" id="razaosocial" class="fadeIn third" name="razaosocial" placeholder="Razão Social" required>
                <input type="text" id="email" class="fadeIn fourth" name="email" placeholder="Email" required>
                <input type="text" id="cnpj" class="fadeIn fifth" name="cnpj" placeholder="CNPJ" required>
                <input type="password" id="senha" class="fadeIn sixth" name="senha" placeholder="Senha" required>
                <button type="button" style=" background-color: #A5EB78;
                                                border: none;
                                                color: white;
                                                padding: 15px 80px;
                                                text-align: center;
                                                text-decoration: none;
                                                display: inline-block;
                                                text-transform: uppercase;
                                                font-size: 13px;
                                                -webkit-box-shadow: 0 10px 30px 0 rgba(76, 81, 83, 0.4);
                                                box-shadow: 0 10px 30px 0 rgba(76, 81, 83, 0.4);
                                                -webkit-border-radius: 5px 5px 5px 5px;
                                                border-radius: 5px 5px 5px 5px;
                                                margin: 5px 20px 40px 20px;" class="fadeIn seventh"
                    onclick="buttonNext()">
                    PRÓXIMO
                </button>
                </div>
                <div id="aux" style="display: none;">
                    <div id="formContent" class="fadeIn first" style="min-width: 500px;">
                        <div class="fadeIn first">
                            <img class="loguserimg" src="../../images/user_icon_register.png" id="icon" alt="User Icon" />
                        </div>
                        <input type="text" id="estado" class="fadeIn first" name="estado" placeholder="Estado da ONG" required>
                        <input type="text" id="cidade" class="fadeIn second" name="cidade" placeholder="Cidade da ONG" required>
                        <input type="text" id="telefone" class="fadeIn second" name="telefone" placeholder="Telefone da ONG" required>
                        <input type="text" id="descricao" class="fadeIn third" name="descricao" placeholder="Escreva Sobre Sua ONG" style="height: 10em; width: 85%;"><BR>
                        
                        <b class="fadeIn fourth">SELECIONE UMA IMAGEM PARA A ONG: </b>
                        <input type="file" name="foto_ong" class="fadeIn fifth">
                        <button type="button" style=" background-color: #A5EB78;
                                                    border: none;
                                                    color: white;
                                                    padding: 15px 80px;
                                                    text-align: center;
                                                    text-decoration: none;
                                                    display: inline-block;
                                                    text-transform: uppercase;
                                                    font-size: 13px;
                                                    -webkit-box-shadow: 0 10px 30px 0 rgba(76, 81, 83, 0.4);
                                                    box-shadow: 0 10px 30px 0 rgba(76, 81, 83, 0.4);
                                                    -webkit-border-radius: 5px 5px 5px 5px;
                                                    border-radius: 5px 5px 5px 5px;
                                                    margin: 5px 20px 40px 20px;
                                                    right: 25%;
                                                    position: relative;" class="fadeIn sixth"
                                                    onclick="buttonBack()">
                                                    VOLTAR
                        </button>
                        
                        <input type="submit" style="background-color:#A5EB78; left: 45%; top: 88.5%; position: absolute;"class="fadeIn sixth" name="register" value="Cadastrar">
            </form>
                </div>
        </div>
    </div>

    <div class="fadeIn footer" class="footerMargin">
        <footer class="container-fluid py-3" style="background: #A5EB78;">
            <div class="row">
                <div class="col-6 col-md ft1" style="margin-left: 30px;">
                    <h5>Adote e/ou Doe</h5>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="../index.php">Adote um animal</a></li>
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="../pub/doarform.php">Doe um animal</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md ft2">
                    <h5>Conheça as ONG'S</h5>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="#">Cadastre a sua!</a></li>
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="../ong/ongpage.php">Página de ONG'S</a></li>
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