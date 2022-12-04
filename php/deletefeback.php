<?php
    require 'databaseconnect.php';
    session_start();

    $sth = $conn->query('DELETE FROM `feback` WHERE `id` = '.$_POST["id"]);