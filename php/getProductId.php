<?php
    require 'databaseconnect.php';
    session_start();
    $tovar = $conn->query("SELECT * FROM `product` where `id`=".$_POST["id"]);
    echo(json_encode($tovar->fetch(PDO::FETCH_ASSOC),JSON_UNESCAPED_UNICODE));