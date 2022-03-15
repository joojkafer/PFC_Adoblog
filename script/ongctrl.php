<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard ONG'S | Adoblog</title>
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
            $result = $mysqli->query("SELECT * FROM tb_ong WHERE ong_id=$id") or die($mysqli->error());
            
            if($result){
                $row = $result->fetch_array();

                $nome        = $row['ong_nome'];
                $razaosocial = $row['ong_razaosocial'];
                $email       = $row['ong_email'];
                $cnpj        = $row['ong_cnpj'];
                $estado      = $row['ong_estado'];
                $cidade      = $row['ong_cidade'];
                $telefone    = $row['ong_telefone'];
                $senha       = $row['ong_senha'];
                $descricao   = $row['ong_descricao']
                
                ?>
                <div style="position:relative; top: 50%;">
                    <div class="wrapper fadeInDown" style="position:absolute; max-height: 50%; z-index: 10040;">
                        <div id="formContent">
                            <div class="fadeIn first" style="position: relative; right: 1.5%;">
                                <img class="loguserimg" src="../../images/user_edit_register.png" id="icon" alt="User Icon" />
                            </div>
                            <div class="wrap-div">
                                <b> ATUALIZE OS DADOS DA SUA ONG: </b>
                            </div>
                            <form action="../adm/admongcontrol.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $id ?>">

                                <input type="text" id="nome" class="fadeIn second" name="nome" value="<?php echo $nome ?>" placeholder="Nome da ONG" required>
                                <input type="text" id="razaosocial" class="fadeIn third" name="razaosocial" value="<?php echo $razaosocial ?>" placeholder="Razão Social" required>
                                <input type="text" id="email" class="fadeIn fourth" name="email" value="<?php echo $email ?>" placeholder="Email" required>
                                <input type="text" id="cnpj" class="fadeIn fifth" name="cnpj" value="<?php echo $cnpj ?>" placeholder="CNPJ" required>
                                <input type="text" id="estado" class="fadeIn sixth" name="estado" value="<?php echo $estado ?>" placeholder="Estado da ONG" required>
                                <input type="text" id="cidade" class="fadeIn seventh" name="cidade" value="<?php echo $cidade ?>" placeholder="Cidade da ONG" required>
                                <input type="text" id="telefone" class="fadeIn seventh" name="telefone" value="<?php echo $telefone ?>" placeholder="Telefone da ONG" required>
                                <input type="text" id="senha" class="fadeIn eigth" name="senha" value="<?php echo $senha ?>" placeholder="Senha" required>
                                <input type="text" id="descricao" class="fadeIn third" name="descricao" placeholder="Escreva Sobre Sua ONG" style="height: 10em; width: 85%;"><BR>

                                <input type="submit" style="background-color:#A5EB78;"class="fadeIn nineth" name="update" value="Atualizar">
                            </form>
                    </div>
                </div>
                </div>
            <?php
            }
        }

        //função de atualizar, onde são colocados os novos valores no banco
        if(isset($_POST['update'])){
            $id          = $_POST['id'];
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
        }
    ?>
</body>