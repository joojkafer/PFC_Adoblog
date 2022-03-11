<?php
    require_once '../script/loginadmfilter.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard Postform | Adoblog</title>
    <link rel="stylesheet" type="text/css" href="../styles/admctrl.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "80%" 
        }
    </script>
</head>

<body onload="zoom()">
    <nav class="navbar navbar-expand-lg navbar-light py-3" style="background-color: #A5EB78;">
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
                <li class="nav-item active" style="padding-left:18px;">
                    <a class="nav-link active" href="index.php"> Adote </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="doarform.php"> Doe </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="ongpage.php"> ONG's </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="admcontrol.php"> Dashboard </a>
                </li>
                <li class="nav-item">
                    <a class= "nav-link active" href="../script/logout.php"> Logout </a>
                </li>
                <li class="nav-item" style="padding-right: 18px;">
                    <a class="nav-link active" href="">
                        <?php
                            $nome = $_SESSION['login'];
                            print_r($nome);
                        ?>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <?php require_once '../script/connection.php'; 
          require_once '../script/formctrl.php';?>
    
    <?php
        $mysqli = new mysqli('localhost', 'root', '', 'adoblog') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM tb_animalform") or die($mysqli->error);

        //pre_r($result);
    ?>

    <div style="min-height: 102vh;">
        <table class="table">
            <thead>
                <tr>
                    <th> Nome </th>
                    <th> Raça </th>
                    <th> Cor </th>
                    <th> Idade </th>
                    <th> Descrição </th>
                    <th> Estado </th>
                    <th> Cidade </th>
                    <th> Telefone </th>
                    <th> Email </th>
                    <th> Imagem
                    <th colspan="2"> Funções </th>
                </tr>
            </thead>
            
            <?php while($row = $result->fetch_assoc()):?>
        
            <tr>
                <td> <?php echo $row['anm_nome']; ?> </td>
                <td> <?php echo $row['anm_raca']; ?> </td>
                <td> <?php echo $row['anm_cor']; ?> </td>
                <td> <?php echo $row['anm_idade']; ?> </td>
                <td> <?php echo $row['anm_descricao']; ?> </td>
                <td> <?php echo $row['anm_estado']; ?> </td>
                <td> <?php echo $row['anm_cidade']; ?> </td>
                <td> <?php echo $row['anm_telefone']; ?> </td>
                <td> <?php echo $row['anm_cidade']; ?> </td>
                <td> <?php echo $row['anm_imagem']?></td>
                <td>
                    <a href="createpost.php" class="btn btn-info mx-2"> Criar Post </a> 
                    <a href="admformcontrol.php?delete=<?php echo $row['anm_id']; ?>" class="btn btn-info mx-2" style="width: 103px"> Concluir </a>  
                </td>
            </tr>
        <?php endwhile; ?>
        </table>
    </div> 

    <div>
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
            </div>
        </footer>
    </div>
</body>