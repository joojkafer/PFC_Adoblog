<?php
    session_start();
    if(!$_SESSION){
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Criar Postagem | Adoblog</title>
    <link rel="stylesheet" type="text/css" href="../styles/createpost.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
    function buttonNext(){
        document.getElementById("formContent").style.display = "none";
        document.getElementById("formContentContato").style.display = "block";
    }
    function buttonBack(){
        document.getElementById("formContent").style.display = "block";
        document.getElementById("formContentContato").style.display = "none";
    }
    </script>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light py-3" style="background-color: #A5EB78;">
        <a class="navbar-brand" href="index.php"> 
            <img src="../images/logo.png"  class="thumbnail"  alt="Logo"> 
        </a>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto" style="border: 1px solid black;
                                                  border-radius: 8px;
                                                  padding-top: 0px;
                                                  padding-bottom: 0px;
                                                  margin-right: 10px;
                                                  margin-left: 10px;">
                <li class="nav-item">
                    <a class="nav-link active" href="ongpage.php" style="padding-left:18px;"> ONG's </a>
                </li>
                <li>
                    <a class="nav-link active" href="../script/logout.php"> Logout </a>
                </li>
                <li class="nav-item"> 
                    <a class="nav-link active" href="ongpage.php" style="padding-right:18px;">
                        <?php
                            $nome = $_SESSION['login'];
                            print_r($nome); 
                        ?>
                    </a> 
                </li>
            </ul>
        </div>
    </nav>

    <div class="wrapper fadeInDown">
        <div id="formContent" style="min-width: 40%; min-height: 575px;" class="fadeIn first">
            <div>
                <br>
                <b style="margin:20px;" class="fadeIn second"> PREENCHA COM OS DADOS DO ANIMAL: </b>
            </div>

            <?php
                require_once '../script/connection.php';

                if(isset($_POST['create'])){
                    $nome = $_POST['nome'];
                    $raca = $_POST['raca'];
                    $cor = $_POST['cor'];
                    $idade = $_POST['idade'];
                    $descricao = $_POST['descricao'];
                    $estado = $_POST['estado'];
                    $cidade = $_POST['cidade'];
                    $telefone = $_POST['telefone'];
                    $email = $_POST['email'];

                    $mysqli->query("INSERT INTO `tb_publicacao`(`pub_nome`, `pub_raca`, `pub_cor`, `pub_idade`, `pub_descricao`, `pub_estado`, `pub_cidade`, `pub_telefone`, `pub_email`) 
                    VALUES ('$nome', '$raca', '$cor', '$idade', '$descricao', '$estado', '$cidade', '$telefone', '$email')");

                    header('Location: index.php');
                }
            ?>

            <form method="POST">
                <input type="text" id="nome" class="fadeIn second" name="nome" placeholder="Nome" style="width: 60%" required>
                <input type="text" id="raca" class="fadeIn second" name="raca" placeholder="Raça" style="width: 60%" required>
                <input type="text" id="cor" class="fadeIn third" name="cor" placeholder="Coloração" style="width: 60%" required>
                <input type="text" id="idade" class="fadeIn third" name="idade" placeholder="Idade" style="width: 60%" required>
                <input type="text" id="descricao" class="fadeIn third" name="descricao" placeholder="Descrição" style="height: 10em; width: 80%;" required>

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
                                                margin: 5px 20px 40px 20px;" class="fadeIn third"
                onclick="buttonNext()">
                PRÓXIMO
                </button>
            
    </div>

        <div id="formContentContato" style="min-width: 40%; min-height: 400px; display: none;" class="fadeIn first">
            <div>
                <br>
                <b style="margin:20px;" class="fadeIn second"> PREENCHA COM OS DADOS DE ENDEREÇO E CONTATO: </b>
            </div>
            
                <input type="text" id="estado" class="fadeIn second" name="estado" placeholder="Estado" style="width: 60%" required>
                <input type="text" id="cidade" class="fadeIn second" name="cidade" placeholder="Cidade" style="width: 60%" required>
                <input type="text" id="telefone" class="fadeIn third" name="telefone" placeholder="Telefone" style="width: 60%" required>
                <input type="text" id="email" class="fadeIn third" name="email" placeholder="Email" style="width: 60%" required><br>
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
                                                margin: 5px 20px 40px 20px;" class="fadeIn third"
                onclick="buttonBack()">
                VOLTAR
                </button>
                <input type="submit" style="background-color:#A5EB78;"class="fadeIn fourth" name="create" value="CRIAR POSTAGEM">
            </form>
        </div>
    </div>

    <div class="fadeIn footer">
        <footer class="container-fluid py-3" style="background: #A5EB78;">
            <div class="row">
                <div class="col-6 col-md ft1" style="margin-left: 30px;">
                    <h5>Adote e/ou Doe</h5>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="index.php">Adote um animal</a></li>
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="doarform.php">Doe um animal</a></li>
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
        </footer>
    </div>
</body>