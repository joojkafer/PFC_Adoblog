<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start(); 
    
    require_once '../../script/connection.php';

    $result = $mysqli->query("SELECT * FROM tb_publicacao") or die($mysqli->error);
    $pubsList = $result-> fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Animais | Adoblog</title>
    <link rel="stylesheet" type="text/css" href="../../styles/pubpage.css">
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
                                <a class='nav-link active' href='doarform.php'> Doe </a>
                            </li>
                        ";
                    }else{
                        echo "
                            <li class='nav-item' style='padding-left:18px;'>
                                <a class='nav-link active' href='createpost.php'> Doe </a>
                            </li>
                        ";
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link active" href="pubpage.php"> Adote </a>
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
             
                <h2 style="position: relative; left: 30%;"> <b> Conheça os Animais: </b></h2>
                <br><br>
                <?php $i=0;
                foreach ($pubsList as $pub) : $i++;?>
                
                        <table class="table" data-toggle="modal" data-target="#myModal<?php echo $i?>">
                            <tr class="tr2">
                                <td class="tdContent" style="width: 10%; border: none;" rowspan="3" ><img src="../../uploads/img_animal/<?php echo $pub['pub_imagem'];?>"; class="img"></td>
                                <td class="tdContent" style="width: 10%; border: none; border-bottom: 2px solid black;" > <?php echo $pub['pub_nome']; ?> </td>
                            </tr>
                            <tr class="tr2">
                                <td style="width: 10%; border: none;" class="tdContent"> de <?php echo $pub['pub_cidade'];?> - <?php echo $pub['pub_estado'] ?> </td> 
                            </tr>
                            <tr class="tr2">
                                <td style="width: 30%;border: none; " class="tdContent"> <?php echo $pub['pub_descricao']; ?> </td>
                            </tr>
                        </table>
                        <br>

                        <div class="modal fade" id="myModal<?php echo $i?>" data-backdrop="false">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"> <?php echo $pub['pub_nome']; ?> </h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                
                                        <img src="../..//uploads/img_animal/<?php echo $pub['pub_imagem']; ?>" class="imgAnimal">
                                        <div class="conteudo-modal">
                                            <h4> <b> Informações do Animal: </b> </h4>
                                            <h5> <b> Nome: </b> <?php echo $pub['pub_nome']; ?> </h5>
                                            <h5> <b> Raça: </b> <?php echo $pub['pub_raca']; ?> </h5>
                                            <h5> <b> Raça: </b> <?php echo $pub['pub_sexo']; ?> </h5>
                                            <h5> <b> Idade: </b> <?php echo $pub['pub_idade']; ?> </h5>
                                            <h5> <b> Coloração: </b> <?php echo $pub['pub_cor']; ?> </h5>
                                            <h5> <b> Descrição: </b> <?php echo $pub['pub_descricao']; ?> </h5>
                                            <h4> <b> Informações de Contato e Endereço: </b> </h4>
                                            <h5> <b> Email: </b> <?php echo $pub['pub_email']; ?> </h5>
                                            <h5> <b> Telefone: </b> <?php echo $pub['pub_telefone']; ?> </h5>
                                            <h5> <b> Estado: </b> <?php echo $pub['pub_estado']; ?> </h5>
                                            <h5> <b> Cidade: </b> <?php echo $pub['pub_cidade']; ?> </h5>
                                        </div>
                                        
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                <?php  endforeach; ?>
                
        </div>
        
    </div>
    <div class="fadeIn footer">
        <footer class="container-fluid py-3" style="background: #A5EB78; height: 125%;">
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
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="../logs/registerong.php">Cadastre a sua!</a></li>
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="#">Página de ONG'S</a></li>
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