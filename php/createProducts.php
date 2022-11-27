<?php
    require 'databaseconnect.php';
    session_start();
    $sql = "SELECT `id`,`model`,`img`,`discription`,`price` FROM `product` ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC),JSON_UNESCAPED_UNICODE);
    
