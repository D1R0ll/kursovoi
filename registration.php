<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="css/reg.css">
        <meta charset="utf-8">
    </head>
    <?php
        require 'php/databaseconnect.php';
        require 'php/user.php';
        session_start();
        $_SESSION["user"] = null;
        $sth = $conn->prepare("SELECT `login` FROM `user`");
        $sth->execute();
        $names = $sth->fetchAll(PDO::FETCH_COLUMN);
        if (count($_POST) > 0){
            $login = cleanData($_POST["login"]);
            $password = cleanData($_POST["password"]);
            
            if (empty($login)){
                redirect("http://localhost/верстка/registration.php?password=".$password."&logUnCorrect=true");
            }
            else if(empty($password)){
                redirect("http://localhost/верстка/registration.php?login=".$login."&assUnCorrect=true");
            }
            else{
                $sth = $conn->prepare("SELECT `login` FROM `user` WHERE `login` = :login");
                $sth->execute(["login"=>$login]);
                if(!$sth->fetch()){
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $sth = $conn->prepare("INSERT INTO `user` SET `login` = :login , `password` = :password");
                    $sth->execute(["login"=>$login,"password"=>$password]);

                    $sth = $conn->prepare("SELECT `*` FROM `user` WHERE `login` = :login");
                    $sth->execute(["login"=>$login]);
                    $_SESSION["user"] = new User($sth->fetch(PDO::FETCH_ASSOC));

                    redirect("http://localhost/верстка");
                }
                else{
                    redirect("http://localhost/верстка/registration.php?userIs=true");
                }
            }
        }

    ?>
    <body>
        <form class="block block-wrap" action="registration.php" method="post">
            <div class="block block_auth">
                <div action="" class="content">
                    <div class="inputs">
                        <div class="line"><span class="title">Регистрация</span></div>
                        <div class="line">
                            <input name="login" <?php if(array_key_exists("logUnCorrect",$_GET)) {echo "class='error'";} ?> type="text" id="login" required="required" value="<?php if(array_key_exists("login",$_GET)) {echo $_GET["login"];} ?>">
                            <label for="login">login</label>
                        </div>
                        <div class="line">
                            <input name="password" <?php if(array_key_exists("passUnCorrect",$_GET)) {echo "class='error'";} ?> type="text" id="pass" required="required" value="<?php if(array_key_exists("password",$_GET)) {echo $_GET["password"];} ?>">
                            <label for="pass">password</label>
                        </div>
                        <div class="line">  
                            <button type="submit">Зарегистрироваться</button>
                            <a href="login.php">войти</a>
                        </div>
                        <?php
                            if (array_key_exists("userIs",$_GET)){
                                echo("Такой пользователь уже есть");
                            }
                        ?>
                    </div>
                </div>
            </div>
        </form>
        <script>
            document.querySelectorAll("input").forEach(input=>{
                input.addEventListener("mousedown",function () {
                    this.classList.remove("error");
                })
            })
        </script>
    </body>
</html>