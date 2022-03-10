<?php
    require_once "connection.php";

    $queryp1 = "SELECT * WHERE MAX(pub_id) FROM tb_publicacao";
    $resultp1 = mysqli_query($mysqli, $queryp1);
    $rowp1 = mysqli_num_rows($resultp1);

?>