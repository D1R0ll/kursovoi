<?php
    require 'databaseconnect.php';
    session_start();
    // $sql ="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='product'";
    $sql = 'SELECT * FROM `product` limit 1';

    $data = $conn->prepare($sql);
    $data->execute();
    
    $data = $data->fetch(PDO::FETCH_ASSOC);
    $columns = [];
    foreach($data as $key => $value){
        // var_dump($key);
        // echo("<br>");
        array_push($columns,$key);
    }
    echo json_encode($columns);
