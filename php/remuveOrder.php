<?php
    require 'databaseconnect.php';
    require 'user.php';
    session_start();

    $sth = $conn->query('DELETE FROM `product_order` WHERE `user_id` = '.$_SESSION["user"]->id.' AND `product_id` = '.$_GET["id"]);
?>