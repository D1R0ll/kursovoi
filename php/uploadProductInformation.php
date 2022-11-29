<?php
    require 'databaseconnect.php';
    session_start();

    $result = $conn->query("SELECT model,price from `product`")->fetch(PDO::FETCH_ASSOC);
    echo(json_encode($result,JSON_UNESCAPED_UNICODE));