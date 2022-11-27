<?php 
    require 'databaseconnect.php';
    session_start();
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

    $_SESSION["id"] = $user['id'];  
    $_SESSION["login"] = $login;
    $_SESSION["password"] = $password;
    $_SESSION["avatar"] = $user['img'];
    $_SESSION["isAdmin"] = $user['isAdmin'];

    echo($_SESSION["avatar"]);
    redirect("http://localhost/верстка");
?>