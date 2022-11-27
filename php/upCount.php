<?php

    require 'databaseconnect.php';
    require 'user.php';
    session_start();

    $sql = "UPDATE `product_order` SET `count` = ".$_POST["count"]." WHERE `user_id` = ".$_SESSION["user"]->id." AND `product_id` = ".$_POST["product_id"];
    
    $sth = $conn->query($sql);