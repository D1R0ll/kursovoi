<?php 
    require 'databaseconnect.php';
    session_start();
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $sql = "SELECT * FROM `user` WHERE `login` = '".$login."'";
    
    $d = $conn->prepare($sql);
    $d->execute();
    $user = $d->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($password,$user['password'])){
        $_SESSION["login"] = $user['login'];
        $_SESSION["password"] = $user['password'];
        $_SESSION["avatar"] = $user['img'];
        redirect("http://localhost/верстка");
    }
    else{
        redirect("http://localhost/верстка/login.php");
    }
?>