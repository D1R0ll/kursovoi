<?php

    require 'databaseconnect.php';
    require 'user.php';
    session_start();

    if ($_SESSION["user"]){
        $sth = $conn->query('SELECT `product_id` FROM `product_order` WHERE `user_id` = '.$_SESSION["user"]->id.' AND `product_id` = '.$_GET["id"]);
        $in_order = $sth->fetchAll(PDO::FETCH_COLUMN);
        if (empty($in_order)){
            $d = $conn->query("insert into `product_order` values(".$_SESSION["user"]->id." , ".$_GET["id"].",1)");
        }
    }
    else{
        echo("Войдите в аккаунт");
    }
   
?>