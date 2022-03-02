<?php

// função de deletar do banco (no caso concluir)
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM tb_animalform WHERE anm_id=$id") or die($mysqli->error());
    }

?>