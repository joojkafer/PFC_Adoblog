<?php

    require_once 'connection.php';

// função de deletar do banco
    if(isset($_GET['deleteform'])){
        $id = $_GET['deleteform'];
        $mysqli->query("DELETE FROM tb_animalform WHERE anm_id=$id") or die($mysqli->error());
    }

    if(isset($_GET['deletepost'])){
        $id = $_GET['deletepost'];
        $mysqli->query("DELETE FROM tb_publicacao WHERE pub_id=$id") or die($mysqli->error());
    }

    if(isset($_GET['deleteong'])){
        $id = $_GET['deleteong'];
        $mysqli->query("DELETE FROM tb_ong WHERE ong_id=$id") or die($mysqli->error());
    }

?>