<!DOCTYPE HTML>
<html>
    <head>
    <link rel="stylesheet" href="css/main.css"></link>
    <link rel="stylesheet" href="css/reg.css"></link>
        <meta charset="utf-8">
    </head>
    <?php
        require 'php/databaseconnect.php';
        require 'php/user.php';
        session_start();
        $_SESSION["user"] = null;
        if (count($_POST) > 0){
            $login = cleanData($_POST["login"]);
            $password = cleanData($_POST["password"]);

            $user = $conn->prepare("SELECT `*` FROM `user` WHERE `login` = :login");
            $user->execute(["login"=>$login]);
            $user = $user ->fetch(PDO::FETCH_ASSOC);
            if($user){
                if (password_verify($password,$user['password'])){
                    $_SESSION["user"] = new User($user);
                    redirect("http://localhost/верстка");
                }
                else{
                    redirect("http://localhost/верстка/login.php?passNoVeri=true&login=".$login);
                }
            }
            else{
                redirect("http://localhost/верстка/login.php?logNoVeri=true");
            } 
        }
    ?>
    <body>
        <form class="block block-wrap" action="login.php" method="post">
            <div class="block block_auth">
                <div action="" class="content">
                    <div class="inputs">
                        <div class="line"><span class="title">Авторизация</span></div>
                        <div class="line">
                            <input name="login" type="text" id="login" required="required" value="<?php if(array_key_exists("login",$_GET)) {echo $_GET["login"];} ?>">
                            <label for="login">login</label>
                        </div>
                        <div class="line">
                            <input name="password" type="text" id="pass" required="required" value="<?php if(array_key_exists("password",$_GET)) {echo $_GET["password"];} ?>">
                            <label for="pass">password</label>
                        </div>
                        <div class="line">
                            <button type="">Войти</button>
                            <a href="registration.php">регистрация</a>
                        </div>
                        <?php
                        if(array_key_exists("logNoVeri",$_GET)){
                            echo("Такого пользователя нет");
                        }
                        else if (array_key_exists("passNoVeri",$_GET)){
                            echo("Пароль не правильный");
                        }
                            
                        ?>
                    </div>
                </div>
            </div>
        </form>
        <script>
            document.querySelectorAll(".line").forEach(input=>{
                input.addEventListener("mousedown",function () {
                    this.classList.remove("error");
                })
            })
        </script>
    </body>
</html>