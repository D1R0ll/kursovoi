<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="css/reg.css">
        <meta charset="utf-8">
    </head>
    <?php
        require 'php/databaseconnect.php';
        session_start();
    ?>
    <body>
        <form class="block block-wrap" action="php/registrationController.php" method="post">
            <div class="block block_auth">
                <div action="" class="content">
                    <div class="inputs">
                        <div class="line"><span class="title">Регистрация</span></div>
                        <div class="line">
                            <input name="login" type="text" id="login" required="required">
                            <label for="login">login</label>
                        </div>
                        <div class="line">
                            <input name="password" type="text" id="pass" required="required">
                            <label for="pass">password</label>
                        </div>
                        <div class="line">  
                            <button type="submit">Зарегистрироваться</button>
                            <a href="login.php">войти</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="bg">
            <div class="blur"></div>
            <canvas></canvas>
        </div>
        <script src="js/API.js"></script>
        <script src="js/perlinNoise.js"></script>
        <script src="js/bgForRegAndAuth.js"></script>
    </body>
</html>