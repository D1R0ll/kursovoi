<!DOCTYPE HTML>
<html>
    <head>
    <link rel="stylesheet" href="css/main.css"></link>
    <link rel="stylesheet" href="css/reg.css"></link>
        <meta charset="utf-8">
    </head>
    <?php
        session_start();

    ?>
    <body>
        <!-- <div class="blur">
            <form class="block" action="login.php" method="post">
                <input name = "login" type="text" placeholder="login">
                <input name = "password" type="text" placeholder="password">
                <button type="submit" style="border:1px solid black">login</button>
            </form>
        </div> -->
        <form class="block block-wrap" action="php/loginController.php" method="post">
            <div class="block block_auth">
                <div action="" class="content">
                    <div class="inputs">
                        <div class="line"><span class="title">Авторизация</span></div>
                        <div class="line <?php if ($_GET["login"]) {echo "error";} ?>">
                            <input name="login" type="text" id="login" required="required">
                            <label for="login">login</label>
                        </div>
                        <div class="line <?php if ($_GET["password"]) {echo "error";} ?>">
                            <input name="password" type="text" id="pass" required="required">
                            <label for="pass">password</label>
                        </div>
                        <div class="line">
                            <button type="">Войти</button>
                            <a href="registration.php">регистрация</a>
                        </div>
                    </div>
                    <?php echo $_GET["notFound"]; ?>
                </div>
            </div>
        </form>
        <div class="bg">
            <div class="blur"></div>
            <canvas></canvas>
        </div>
        <script>
            document.querySelectorAll(".line").forEach(input=>{
                input.addEventListener("mousedown",function () {
                    this.classList.remove("error");
                })
            })
        </script>
        <script src="js/API.js"></script>
        <script src="js/perlinNoise.js"></script>
        <script type="text/javascript" src=js/bgForRegAndAuth.js?<?=$cur_time;?>></script>
        
    </body>
</html>