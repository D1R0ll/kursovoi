<?php
    require 'databaseconnect.php';
    session_start();

    $sth = $conn->query('DELETE FROM `product_order` WHERE `product_id` = '.$_GET["id"]);
    $sth = $conn->query('DELETE FROM `product` WHERE `id` = '.$_GET["id"]);