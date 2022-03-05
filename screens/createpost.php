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
        <div id="formContent">
            <div>
                <b style="margin:20px;"> NOVA PUBLICAÇÃO: </b>
            </div>
            <form>
                <input type="text" id="login" class="fadeIn second" name="titulo" placeholder="Título">
                <input type="text" id="password" class="fadeIn third" name="descricao" placeholder="Descrição">
                <input type="submit" style="background-color:#A5EB78;"class="fadeIn fourth" value="CRIAR PUBLICAÇÃO">
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