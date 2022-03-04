<?php
    require_once '../script/verifylogdoacao.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulário de Doação | Adoblog</title>
    <link rel="stylesheet" type="text/css" href="../styles/doarform.css">
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
                    <a class="nav-link active" href="ongpage.php"> ONG's </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="login.php"> Entrar </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="registerong.php" style="padding-right:18px;"> Cadastrar </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">
                <img class="loguserimg" src="../images/form_icon_register.png" id="icon" alt="User Icon" />
            </div>
            <div>
                <b> PREENCHA OS CAMPOS ABAIXO COM SEUS <br> RESPECTIVOS DADOS E DO ANIMAL: </b>
            </div>
            <form method="POST">
            <?php 
            //função de adição de dados do "formulário para criação de post" no banco
                require_once '../script/connection.php';
                
                if(isset($_POST['sendform'])){
                    $nome = $_POST['nome'];
                    $raca = $_POST['raca'];
                    $cor = $_POST['cor'];
                    $idade = $_POST['idade'];
                    $descricao = $_POST['descricao'];
                    $estado = $_POST['estado'];
                    $cidade = $_POST['cidade'];
                    $telefone = $_POST['telefone'];
                    $email = $_POST['email'];

                    $mysqli->query("INSERT INTO `tb_animalform`(`anm_nome`, `anm_raca`, `anm_cor`, `anm_idade`, `anm_descricao`, `anm_estado`, `anm_cidade`, `anm_telefone`, `anm_email`) 
                    VALUES ('$nome', '$raca', '$cor', '$idade', '$descricao', '$estado', '$cidade', '$telefone', '$email')");

                    header('Location:doarformsuccess.php');
                }
            ?>

                <input type="text" id="nome" class="fadeIn second" name="nome" placeholder="Nome da animal" required>
                <input type="text" id="raca" class="fadeIn third" name="raca" placeholder="Raça" required>
                <input type="text" id="cor" class="fadeIn fourth" name="cor" placeholder="Cor" required>
                <input type="text" id="idade" class="fadeIn fifth" name="idade" placeholder="Idade do animal" required>
                <input type="text" id="descricao" class="fadeIn sixth" name="descricao" placeholder="Descrição da publicação" required>
                <input type="text" id="estado" class="fadeIn seventh" name="estado" placeholder="Estado" required>
                <input type="text" id="cidade" class="fadeIn eigth" name="cidade" placeholder="Cidade" required>
                <input type="text" id="telefone" class="fadeIn nineth" name="telefone" placeholder="Telefone" required>
                <input type="text" id="email" class="fadeIn ten" name="email" placeholder="Email" required>

                <input type="submit" style="background-color:#A5EB78;"class="fadeIn eleven" name="sendform" value="ENVIAR FORMULÁRIO">
            </form>
        </div>
    </div>

    <div class="fadeIn footer">
        <footer class="container-fluid py-3" style="background: #A5EB78; margin-top:30px;">
            <div class="row">
                <div class="col-6 col-md ft1" style="margin-left: 30px;">
                    <h5>Adote e/ou Doe</h5>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="index.php">Adote um animal</a></li>
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="#">Doe um animal</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md ft2">
                    <h5>Conheça as ONG'S</h5>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="registerong.php">Cadastre a sua!</a></li>
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