<?php
    //função de seleção aleatória para ong recomendada na index
    require_once 'connection.php';

    $result = $mysqli->query("SELECT MAX(ong_id) FROM tb_ong") or die($mysqli->error());

    $row = $result->fetch_array();
    $id = $row['MAX(ong_id)'];
    //echo $id;
    
    $nmrrand = rand(1, $id);
    //echo $nmrrand;

    $resultid = $mysqli->query("SELECT ong_id FROM tb_ong WHERE ong_id=$nmrrand") or die($mysqli->error());
    while(mysqli_num_rows($resultid) != 1){
        //echo " - Não Encontrado. ";
        //echo $nmrrand;
        $resultid = $mysqli->query("SELECT ong_id FROM tb_ong WHERE ong_id=$nmrrand") or die($mysqli->error());

        $nmrrand = rand(1, $id);
    }

    $result = $mysqli->query("SELECT * FROM tb_ong WHERE ong_id=$nmrrand") or die($mysqli->error());

    $row = $result->fetch_array();
    $nome = $row['ong_nome'];
    $imagem = $row['ong_imagem'];

    if($imagem == "" || NULL){
        //$a = "aaaaaaaaaaaa";
        $imagempadrao = "imgpadrao.png";
    }else{
        $imagempadrao = $imagem;
    }
    
    //echo $nome;
    //print_r($result->fetch_assoc());
?>