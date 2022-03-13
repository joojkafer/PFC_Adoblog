<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Início | Adoblog</title>
    <link rel="stylesheet" type="text/css" href="../styles/index.css">
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
                <?php
                    if(!$_SESSION){
                        echo "
                            <li class='nav-item' style='padding-left:18px;'>
                                <a class='nav-link active' href='pub/doarform.php'> Doe </a>
                            </li>
                        ";
                    }else{
                        echo "
                            <li class='nav-item' style='padding-left:18px;'>
                                <a class='nav-link active' href='pub/createpost.php'> Doe </a>
                            </li>
                        ";
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link active" href="ong/ongpage.php"> ONG's </a>
                </li>
                <?php
                    if(!$_SESSION){
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link active' href='logs/login.php'> Entrar </a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link active' href='logs/registerong.php' style='padding-right:18px;'> Cadastrar </a>
                            </li>
                        ";
                    }else{ 
                        if($_SESSION['tipo'] == "ADMIN"){
                            echo "
                                <li class='nav-item'>
                                    <a class='nav-link active' href='adm/admcontrol.php'> Dashboard </a>
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
                                <a class='nav-link active' href='ong/ongprofile.php' style='padding-right:18px;'>";
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
        <div class="containerUltimosAnimais">
           <table>
           <tr>
            <td>
            <!-- Button to Open the Modal -->
                <button type="button" class="botaoAnimal" data-toggle="modal" data-target="#myModal">
                Animal 1
                </button>

                <!-- The Modal -->
                <div class="modal fade" id="myModal" data-backdrop="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">NOME DO ANIMAL</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        
                            <img src="../images/cachorro.png"  class="imgAnimal">
                        <div class="conteudo-modal">
                            <h4>Informações do Animal:</h4>
                            <h5>Nome:</h5>
                            <h5>Raça:</h5>
                            <h5>Idade:</h5>
                            <h5>Coloração:</h5>
                            <h5>Descrição:</h5>
                            <h4>Informações de Contato e Endereço:</h4>
                            <h5>Email:</h5>
                            <h5>Telefone:</h5>
                            <h5>Estado:</h5>
                            <h5>Cidade:</h5>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>

                    </div>
                </div>
                </div>
            </td>

            <td>
            <!-- Button to Open the Modal -->
            <button type="button" class="botaoAnimal data-toggle="modal" data-target="#myModal">
                Open modal
                </button>

                <!-- The Modal -->
                <div class="modal fade" id="myModal" data-backdrop="false">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>

                    </div>
                </div>
                </div>
            </td>

            <td>
            <!-- Button to Open the Modal -->
                <button type="button" class="botaoAnimal" data-toggle="modal" data-target="#myModal">
                Open modal
                </button>

                <!-- The Modal -->
                <div class="modal fade" id="myModal" data-backdrop="false">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                </div>
                </div>
            </td>
           </tr>

           <tr>
            <td>
            <!-- Button to Open the Modal -->
            <button type="button" class="botaoAnimal" data-toggle="modal" data-target="#myModal">
                Open modal
                </button>

                <!-- The Modal -->
                <div class="modal fade" id="myModal" data-backdrop="false">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                </div>
                </div>

            <td>
            <!-- Button to Open the Modal -->
            <button type="button" class="botaoAnimal" data-toggle="modal" data-target="#myModal">
                Open modal
                </button>

                <!-- The Modal -->
                <div class="modal fade" id="myModal" data-backdrop="false">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                </div>
                </div>
            </td>

            <td>
            <!-- Button to Open the Modal -->
                <button type="button" class="botaoAnimal" data-toggle="modal" data-target="#myModal">
                Open modal
                </button>

                <!-- The Modal -->
                <div class="modal fade" id="myModal" data-backdrop="false">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                </div>
                </div>
            </td>
           </tr>

           <tr>

            <td>
           <!-- Button to Open the Modal -->
           <button type="button" class="botaoAnimal" data-toggle="modal" data-target="#myModal">
                Open modal
                </button>

                <!-- The Modal -->
                <div class="modal fade" id="myModal" data-backdrop="false">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                </div>
                </div>

            <td>
            <!-- Button to Open the Modal -->
                <button type="button" class="botaoAnimal" data-toggle="modal" data-target="#myModal">
                Open modal
                </button>

                <!-- The Modal -->
                <div class="modal fade" id="myModal" data-backdrop="false">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                </div>
                </div>

            </td>
            <td>
            <!-- Button to Open the Modal -->
                <button type="button" class="botaoAnimal" data-toggle="modal" data-target="#myModal">
                Open modal
                </button>

                <!-- The Modal -->
                <div class="modal fade" id="myModal" data-backdrop="false">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Nome do Animal</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h5>Nome:</h5>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                </div>
                </div>
            </td>
           </tr>
           </table>
        </div>
        <div class="containerSobre" style="overflow: hidden;">
            <?php 
                require_once '../script/ongselectorname.php';
            ?>

            <img src="../uploads/img_ong/<?php echo $imagempadrao; ?>" style="border-radius: 50%; height: 35%; width: 30%; margin: 5%;">
            
            <b> <a href="ong/ongprofile.php" class='nav-link active' style="font-size: 250%; position: relative; float: right; right: 10%; top: 10%;">ONG <?php echo $row['ong_nome']; ?> </a> </b> 
            <h2 style="font-size: 150%; position: relative; top: -25%; left: 40%;">de <?php echo $row['ong_cidade'];?> — <?php echo $row['ong_estado'];?> </h2>
            
            <div class="textoContainer" style="height: 38%; top: 10%; border-bottom: none; ">
                 <div id="scroll-text" >
                    <?php
                        echo $row['ong_descricao'];
                    ?>
                 </div>
            </div>
        </div>
        <div class="containerMSG">
           <h1 class="tituloContainer"> <b> Sobre o Blog </b> </h1>
            <div class="textoContainer">
                    O Adoblog foi criado a partir da ideia de não ter um local próprio, único e pensando
                    para a adoção e doação de animais. Foi daí que decidimos criar o Adoblog, tendo em mente
                    a produção de algo funcional, rápido e seguro.
            </div>
        </div>

        

    </div>
    <div class="fadeIn footer">
        <footer class="container-fluid py-3" style="background: #A5EB78; height: 125%;">
            <div class="row">
                <div class="col-6 col-md ft1" style="margin-left: 30px;">
                    <h5>Adote e/ou Doe</h5>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="#">Adote um animal</a></li>
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="pub/doarform.php">Doe um animal</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md ft2">
                    <h5>Conheça as ONG'S</h5>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="logs/registerong.php">Cadastre a sua!</a></li>
                        <li class="nav-item"><a style="color: #303030;" class="nav-link active" href="ong/ongpage.php">Página de ONG'S</a></li>
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