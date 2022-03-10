<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start(); 
    
    require_once __DIR__ . '/../script/connection.php';

    $result = $mysqli->query("SELECT * FROM tb_ong") or die($mysqli->error);
    $ongsList = $result-> fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Início | Adoblog</title>
    <link rel="stylesheet" type="text/css" href="../styles/ongpage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head> 

<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #A5EB78; overflow: hidden">
        
        <a class="navbar-brand" href="index.php"> 
            <img src="../images/logo.png"  class="thumbnail"  alt="Logo"> 
        </a>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto" style="border: 1px solid black;
                                                  border-radius: 8px;
                                                  padding-top: 0px;
                                                  padding-bottom: 0px;
                                                  margin-right: 10px;
                                                  margin-left: 10px;">
                <?php if(!$_SESSION): ?>
                       
                    <li class='nav-item' style='padding-left:18px;'>
                        <a class='nav-link active' href='doarform.php'> Doe </a>
                    </li>

                <?php else: ?>
                    <li class='nav-item' style='padding-left:18px;'>
                        <a class='nav-link active' href='createpost.php'> Doe </a>
                    </li>
                <?php endif; ?>


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
                        if($_SESSION['tipo'] == "ADMIN"){
                            echo "
                                <li class='nav-item'>
                                    <a class='nav-link active' href='admcontrol.php'> Dashboard </a>
                                </li>
                            ";
                        }
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link active' href='../script/logout.php'> Logout </a>
                            </li>
                        ";

                        echo "
                            <li class='nav-item'> 
                                <a class='nav-link active' href='ongpage.php' style='padding-right:18px;'>";
                                    $nome = $_SESSION['login'];
                                    print_r($nome); 
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

    <div class="containerPrincipal fadeIn first">

        <div class="containerPaginas fadeIn first">
        <table class="table">
            <thead>
                <tr>
                    <th style="border-right: 1px solid blue;"> Imagem </th>
                    <th> Nome </th>
                    <th> Estado </th>
                    <th> Cidade </th>
                    <th> Descrição </th>
                </tr>
            </thead>
            
            <?php foreach ($ongsList as $ong) : ?>

                <tr class="tr2" onclick="window.location='index.php'">
                
                    <td class="tdimg">img</td>
                    <td style="width: 10%; "> <?php echo $ong['ong_nome']; ?> </td>
                    <td style="width: 10%; "> <?php echo $ong['ong_estado']; ?> </td>
                    <td style="width: 10%; "> <?php echo $ong['ong_cidade']; ?> </td>
                    <td style="width: 30%;  border-left: 1px solid blue;"> <?php echo $ong['ong_descricao']; ?> </td>
                </tr>
            
            <?php endforeach; ?>
              
        </table>
        </div>

        

    </div>
    <div class="fadeIn footer">
        <footer class="container-fluid py-3" style="background: #A5EB78; height: 125%;">
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
    </div>
</body>