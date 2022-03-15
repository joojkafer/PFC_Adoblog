<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start(); 

    if(!$_SESSION || !isset($_SESSION['ong_id'])){
        header('Location: ../sessionwarning.php');
    }


    //função de adição de dados do "formulário para criação de post" no banco
    require_once '../../script/connection.php';
    
        $id = $_SESSION['ong_id'];
        $result = $mysqli->query("SELECT * FROM tb_ong WHERE ong_id=$id") or die($mysqli->error());
        
        if($result){
            $row = $result->fetch_array();

            $nome        = $row['ong_nome'] ?? $row['ong_nome'] ?? '';
            $razaosocial = $row['ong_razaosocial'] ?? $row['ong_razaosocial'] ?? '';
            $email       = $row['ong_email'] ?? $row['ong_email'] ?? '';
            $cnpj        = $row['ong_cnpj'] ?? $row['ong_cnpj'] ?? '';
            $estado      = $row['ong_estado'] ?? $row['ong_estado'] ?? '';
            $cidade      = $row['ong_cidade'] ?? $row['ong_cidade'] ?? '';
            $telefone    = $row['ong_telefone'] ?? $row['ong_telefone'] ?? '';
            $senha       = $row['ong_senha'] ?? $row['ong_senha'] ?? '';
            $descricao   = $row['ong_descricao'] ?? $row['ong_descricao'] ?? '';
            
        }

        if(isset($_POST['update'])){
            $nome        = $_POST['nome'];
            $razaosocial = $_POST['razaosocial'];
            $email       = $_POST['email'];
            $cnpj        = $_POST['cnpj'];
            $estado      = $_POST['estado'];
            $cidade      = $_POST['cidade'];
            $senha       = $_POST['senha'];
            $descricao   = $_POST['descricao'];

            $mysqli->query("UPDATE tb_ong SET 
                ong_nome=       '$nome', 
                ong_razaosocial='$razaosocial', 
                ong_email=      '$email', 
                ong_cnpj=       '$cnpj', 
                ong_estado=     '$estado', 
                ong_cidade=     '$cidade', 
                ong_senha=      '$senha',
                ong_descricao=  '$descricao'
            WHERE ong_id=$id") or die($mysqli->error);

            header('Location: ongprofile.php');
        }

    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar | Adoblog</title>
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
    <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #A5EB78; overflow: hidden">
        <a class="navbar-brand" href="../index.php"> 
            <img src="../../images/logo.png"  class="thumbnail"  alt="Logo"> 
        </a>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto" style="border: 1px solid black;
                                                  border-radius: 8px;
                                                  padding-top: 0px;
                                                  padding-bottom: 0px;
                                                  margin-right: 10px;
                                                  margin-left: 10px;">
                <?php
                    if(!$_SESSION){
                        echo "
                            <li class='nav-item' style='padding-left:18px;'>
                                <a class='nav-link active' href='../pub/doarform.php'> Doe </a>
                            </li>
                        ";
                    }else{
                        echo "
                            <li class='nav-item' style='padding-left:18px;'>
                                <a class='nav-link active' href='../pub/createpost.php'> Doe </a>
                            </li>
                        ";
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link active" href="../pub/pubpage.php"> Adote </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../ong/ongpage.php"> ONG's </a>
                </li>
                
                <?php
                    if(!$_SESSION){
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link active' href='../logs/login.php'> Entrar </a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link active' href='../logs/registerong.php' style='padding-right:18px;'> Cadastrar </a>
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
                                    print($nome); 
                        echo "  </a> 
                            </li>";
                    }
                ?>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Procurar..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
            </form>
        </div>
    </nav>

    <div class="wrapper fadeInDown">
        <div id="formContent" class="fadeIn first" style="min-width: 500px;">
            <div class="fadeIn first">
                <img class="loguserimg" src="../../images/user_icon_register.png" id="icon" alt="User Icon" />
            </div>
            
            <div>
                <b> EDITE OS DADOS DA SUA ONG: </b>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <input type="text" id="nome" class="fadeIn second" name="nome" placeholder="Nome da ONG" value="<?= $nome ?>" required>
                <input type="text" id="razaosocial" class="fadeIn third" name="razaosocial" placeholder="Razão Social" value="<?= $razaosocial ?>" required>
                <input type="text" id="email" class="fadeIn fourth" name="email" placeholder="Email" value="<?= $email ?>" required>
                <input type="text" id="cnpj" class="fadeIn fifth" name="cnpj" placeholder="CNPJ" value="<?= $cnpj ?>" required>
                <input type="password" id="senha" class="fadeIn sixth" name="senha" placeholder="Senha" value="<?= $senha ?>" required>
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
                        <input type="text" id="estado" class="fadeIn first" name="estado" placeholder="Estado da ONG" value=" <?= $estado ?> " required/>
                        <input type="text" id="cidade" class="fadeIn second" name="cidade" placeholder="Cidade da ONG" value=" <?= $cidade ?> " required >
                        <input type="text" id="telefone" class="fadeIn second" name="telefone" placeholder="Telefone da ONG" value=" <?= $telefone ?> " required>
                        <input type="text" id="descricao" class="fadeIn third" name="descricao" placeholder="Escreva Sobre Sua ONG" style="height: 10em; width: 85%;" value=" <?= $descricao ?> "><BR>
                        
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
                        
                        <input type="submit" style="background-color:#A5EB78; left: 45%; top: 88.5%; position: absolute;"class="fadeIn sixth" name="update" value="Atualizar">
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