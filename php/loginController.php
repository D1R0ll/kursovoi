<?php 
    require 'databaseconnect.php';
    require 'user.php';
    session_start();
    $_SESSION["user"] = null;
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    if (!isset($login) || $login == '') {
        redirect("http://localhost/верстка/login.php?login=1");
        return;
    }
    if (!isset($password) || $password == '') {
        redirect("http://localhost/верстка/login.php?password=1");
        return;
    }
    $user_data = $conn->prepare("SELECT * FROM `user` WHERE `login` = :login");
    $user_data->execute(["login"=>$login]);
    $user_data = $user_data->fetch(PDO::FETCH_ASSOC);

    if ($user_data && password_verify($password,$user_data['password'])){
        $_SESSION["user"] = new User($user_data);
        redirect("http://localhost/верстка");
    }
    else{
        redirect("http://localhost/верстка/login.php?notFound=<br>'пользователь не найден или неверный пароль'");
    }
?>