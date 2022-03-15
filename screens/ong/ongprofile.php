<?php 
    session_start(); 

    require_once '../../script/connection.php';

    $id = "";
    $donodaong = false;

    if(isset($_GET['pfp'])){
        $id = $_GET['pfp'];

        if($id == $_SESSION['ong_id']){
            $donodaong = true;
        }

    } else {
        if(isset($_SESSION['ong_id'])){

            $id = $_SESSION['ong_id'];
            $donodaong = true;
        }

    }

    $result = $mysqli->query("SELECT * FROM tb_ong WHERE ong_id='$id'");
    $row = $result->fetch_array();

    $imagem = $row['ong_imagem'];
    
    if($imagem == "" || NULL){
    
        $imagempadrao = "imgpadrao.png";
    
    }else{
    
        $imagempadrao = $imagem;
    
    }

    // ANIMAIS PARA ADOCAO DA ONG

    $resultSet = $mysqli->query("SELECT * FROM tb_publicacao WHERE id_ong = $id");
    $listaAnimais = $resultSet->fetch_all(MYSQLI_ASSOC);

    // print('<pre>');
    // print_r($listaAnimais);
    // print('</pre>');

    //exit;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ONG's | Adoblog</title>
    <link rel="stylesheet" type="text/css" href="../../styles/ongprofile.css">
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
                    <a class="nav-link active" href="ongpage.php"> ONG's </a>
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
                                <a class='nav-link active' href='ongprofile.php' style='padding-right:18px;'>";
                                    print($row['ong_nome']); 
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
        <div class="containerPerfil">
                <h2 class="estadoOng"><?php echo $row['ong_estado']; ?><br>
                <?php echo $row['ong_cidade']; ?></h2> 
                <img src="../../uploads/img_ong/<?php echo $imagempadrao; ?>" class="Img"><br> 
                <h2 class="telefoneOng"><?php echo $row['ong_telefone']; ?> <br>
                <?php echo $row['ong_email']; ?> </h2>  

                    <?php if($donodaong): ?>
                        <a href="editarongpfp.php"> Editar </a>
                    <?php endif; ?>

                    <h1 class="nomeOng"> <b> <?php echo $row['ong_nome']; ?> </b> </h1>
                    <h2 class="descricaoOng"> <?php echo $row['ong_descricao']; ?> </h2>
                    

            <div class="containerAnimais">

                    <?php
                    $i=0;
                    $tablewidth = '33%;';
                    foreach($listaAnimais as $animal):;
                    if ($i >=4){
                        break;
                    }
                    $i++
                    ?>
                <table style="width: 33%; float: left; position: relative;">
                    <tr>
                        <td>
                        <button type="button" class="botaoAnimal" style="background-image: url(../../uploads/img_animal/<?php echo $animal['pub_imagem']; ?>); width: 100%;" data-toggle="modal" data-target="#myModal<?php echo $i?>">
                            <?php echo $animal['pub_nome']; ?>
                        </button>

                        <!-- The Modal -->
                        <div class="modal fade" id="myModal<?php echo $i?>" data-backdrop="false">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"> <?php echo $animal['pub_nome']; ?> </h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                        
                                    <img src="../../uploads/img_animal/<?php echo $animal['pub_imagem']; ?>" class="imgAnimal">
                                            <div class="conteudo-modal">
                                                <h4> <b> Informações do Animal: </b> </h4>
                                                <h5> <b> Nome: </b> <?php echo $animal['pub_nome']; ?> </h5>
                                                <h5> <b> Raça: </b> <?php echo $animal['pub_raca']; ?> </h5>
                                                <h5> <b> Sexo: </b> <?php echo $animal['pub_sexo']; ?> </h5>
                                                <h5> <b> Idade: </b> <?php echo $animal['pub_idade']; ?> </h5>
                                                <h5> <b> Coloração: </b> <?php echo $animal['pub_cor']; ?> </h5>
                                                <h5> <b> Descrição: </b> <?php echo $animal['pub_descricao']; ?> </h5>
                                                <h4> <b> Informações de Contato e Endereço: </b> </h4>
                                                <h5> <b> Email: </b> <?php echo $animal['pub_email']; ?> </h5>
                                                <h5> <b> Telefone: </b> <?php echo $animal['pub_telefone']; ?> </h5>
                                                <h5> <b> Estado: </b> <?php echo $animal['pub_estado']; ?> </h5>
                                                <h5> <b> Cidade: </b> <?php echo $animal['pub_cidade']; ?> </h5>
                                            </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                    <?php endforeach ?>
                   
            </table>
            </div>
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