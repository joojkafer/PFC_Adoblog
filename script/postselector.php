<?php
    require_once 'connection.php';

    $result = $mysqli->query("SELECT * FROM tb_publicacao ORDER BY pub_id DESC LIMIT 9;") or die($mysqli->error);
    $postsList = $result-> fetch_all(MYSQLI_ASSOC);

    $row1 = $postsList[0];
    $row2 = $postsList[1];
    $row3 = $postsList[2];
    $row4 = $postsList[3];
    $row5 = $postsList[4];
    $row6 = $postsList[5];
    $row7 = $postsList[6];
    $row8 = $postsList[7];
    $row9 = $postsList[8];

    /*
    //row1
    $result = $mysqli->query("SELECT * FROM tb_publicacao ORDER BY pub_id DESC LIMIT 1;") or die($mysqli->error());
    $row1 = $result->fetch_array();

    //row2
    $result = $mysqli->query("SELECT * FROM tb_publicacao ORDER BY pub_id DESC LIMIT 2;") or die($mysqli->error());
    $row2 = $result->fetch_array();

    //row3
    $result = $mysqli->query("SELECT * FROM tb_publicacao ORDER BY pub_id DESC LIMIT 3;") or die($mysqli->error());
    $row3 = $result->fetch_array();

    //row4
    $result = $mysqli->query("SELECT * FROM tb_publicacao ORDER BY pub_id DESC LIMIT 4;") or die($mysqli->error());
    $row4 = $result->fetch_array();

    //row5
    $result = $mysqli->query("SELECT * FROM tb_publicacao ORDER BY pub_id DESC LIMIT 5;") or die($mysqli->error());
    $row5 = $result->fetch_array();

    //row6
    $result = $mysqli->query("SELECT * FROM tb_publicacao ORDER BY pub_id DESC LIMIT 6;") or die($mysqli->error());
    $row6 = $result->fetch_array();

    //row7
    $result = $mysqli->query("SELECT * FROM tb_publicacao ORDER BY pub_id DESC LIMIT 7;") or die($mysqli->error());
    $row7 = $result->fetch_array();

    //row8
    $result = $mysqli->query("SELECT * FROM tb_publicacao ORDER BY pub_id DESC LIMIT 8;") or die($mysqli->error());
    $row8 = $result->fetch_array();

    //row9
    $result = $mysqli->query("SELECT * FROM tb_publicacao ORDER BY pub_id DESC LIMIT 9;") or die($mysqli->error());
    $row9 = $result->fetch_array();
    
    */


?>