<?php

    require 'databaseconnect.php';
    require 'user.php';
    session_start();

    if ($_POST["content"]){

        $stmt = $conn->prepare("INSERT INTO `feback` (`author` , `tovar` , `content` , `date` , `emiss`) VALUES ('".$_SESSION["user"]->login."','".$_POST["tovar"]."','".$_POST["content"]."','".$_POST["date"]."','".$_POST["emiss"]."') ");
        $stmt->execute();
        echo($conn->lastInsertId());
    }