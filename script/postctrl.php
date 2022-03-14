<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard Posts | Adoblog</title>
    <link rel="stylesheet" type="text/css" href="../styles/ongctrl.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <?php 
        $id = 0;
        //$update = false;

        //função de deletar do banco
        require_once 'delete.php';

        //função de capturar os valores e recolocá-los nos campos do form
        if(isset($_GET['edit'])){
            $id = $_GET['edit'];
            $result = $mysqli->query("SELECT * FROM tb_publicacao WHERE pub_id=$id") or die($mysqli->error());
                
            if($result){
                $row = $result->fetch_array();
            
                $nome      = $row['pub_nome'];
                $raca      = $row['pub_raca'];
                $sexo      = $row['pub_sexo'];
                $cor       = $row['pub_cor'];
                $idade     = $row['pub_idade'];
                $descricao = $row['pub_descricao'];
                $estado    = $row['pub_estado'];
                $cidade    = $row['pub_cidade'];
                $telefone  = $row['pub_telefone'];
                $email    = $row['pub_email'];
                $imagem    = $row['pub_imagem'];   
            }
                
            ?>
            <div style="position:relative; top: 50%;">
                <div class="wrapper fadeInDown" style="position:absolute; max-height: 50%; z-index: 10040;">
                    <div id="formContent">
                        <div class="fadeIn first" style="position: relative; right: 1.5%;">
                            <img class="loguserimg" src="../../images/user_edit_register.png" id="icon" alt="User Icon" />
                        </div>
                        <div class="wrap-div">
                            <b> ATUALIZE OS DADOS DA PUBLICAÇÃO: </b>
                        </div>
                        <form action="../adm/admpostcontrol.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
            
                            <input type="text" class="fadeIn second" name="nome" value="<?php echo $nome ?>" placeholder="Nome do animal">
                            <input type="text" class="fadeIn third" name="raca" value="<?php echo $raca ?>" placeholder="Raça">
                            <input type="text" class="fadeIn third" name="sexo" value="<?php echo $sexo ?>" placeholder="Sexo">
                            <input type="text" class="fadeIn fourth" name="cor" value="<?php echo $cor ?>" placeholder="Coloração">
                            <input type="text" class="fadeIn fifth" name="idade" value="<?php echo $idade ?>" placeholder="Idade do animal" required>
                            <input type="text" class="fadeIn sixth" name="descricao" value="<?php echo $descricao ?>" placeholder="Descrição" required>
                            <input type="text" class="fadeIn seventh" name="estado" value="<?php echo $estado ?>" placeholder="Estado" required>
                            <input type="text" class="fadeIn eigth" name="cidade" value="<?php echo $cidade ?>" placeholder="Cidade" required>
                            <input type="text" class="fadeIn nineth" name="telefone" value="<?php echo $telefone ?>" placeholder="Telefone" required>
                            <input type="text" class="fadeIn ten" name="email" value="<?php echo $email ?>" placeholder="Email" required>
                            <input type="text" class="fadeIn ten" name="imagem" value="<?php echo $imagem ?>" placeholder="Imagem">
                                    
                            <b class="fadeIn ten">SELECIONE UMA IMAGEM PARA O ANIMAL: </b>
                            <input type="file" name="foto_animal" class="fadeIn ten" value="<?php echo $imagem ?>">
                                    
                            <input type="submit" style="background-color:#A5EB78;"class="fadeIn ten" name="update" value="Atualizar">
                        </form>
                    </div>
                </div>
            </div>
            <?php
            }
    
        //função de atualizar, onde são colocados os novos valores no banco
        if(isset($_POST['update'])){
            $id        = $_POST['id'];
            $nome      = $_POST['nome'];
            $raca      = $_POST['raca'];
            $cor       = $_POST['cor'];
            $idade     = $_POST['idade'];
            $descricao = $_POST['descricao'];
            $estado    = $_POST['estado'];
            $cidade    = $_POST['cidade'];
            $telefone  = $_POST['telefone'];
            $email     = $_POST['email'];
            $imagem    = $_POST['imagem'];

            $mysqli->query("UPDATE tb_publicacao SET 
                pub_nome=      '$nome', 
                pub_raca=      '$raca', 
                pub_cor=       '$cor', 
                pub_idade=     '$idade', 
                pub_descricao= '$descricao', 
                pub_estado=    '$estado', 
                pub_cidade=    '$cidade',
                pub_telefone=  '$telefone', 
                pub_email=     '$email', 
                pub_imagem=    '$imagem'
            WHERE pub_id=$id") or die($mysqli->error);
        }
    ?>
</body>