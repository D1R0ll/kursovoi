<?php 
    require 'databaseconnect.php';
    require 'user.php';
    session_start();
    $_SESSION["user"] = null;
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $sql = "SELECT `login` FROM `user`";

    $sth = $conn->prepare($sql);
    $sth->execute(array());
    $names = $sth->fetchAll(PDO::FETCH_COLUMN);

    foreach($names as $name){
        if ($name == $login || empty($login)){
            redirect("http://localhost/верстка/registration.php");
            exit();
        }
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sth = $conn->prepare("INSERT INTO `user` SET `login` = '".$login."' , `password` = '".$password."'");
    $sth->execute(array());

    $sql = "SELECT * FROM `user` WHERE `login` = '".$login."'";
    $d = $conn->prepare($sql);
    $d->execute();
    $user = $d->fetch(PDO::FETCH_ASSOC);
    
    $_SESSION["user"] = new User($user);

    redirect("http://localhost/верстка");
?>