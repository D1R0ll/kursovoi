    <?php 
    
        require 'user.php';
        session_start();
        $img = "img/user_default.jpg";
        $login = "гость";
        $isAdmin = 0;
        if(!empty($_SESSION["user"])){
            $img = $_SESSION["user"]->img;
            $login = $_SESSION["user"]->login;
            $isAdmin = $_SESSION["user"]->isAdmin;
        }
      
    ?>
    <div class="header-wrap">
        <div class="header">
            <div class="title header-el"><a href="index.php"><p style="color:#0c830c;"><b>G</b></p><p>räfikkärte</p></a></div>
            <form class="search header-el" action="php/search.php" method="post">
                <input type="text" name="search" placeholder="введите поиск" value="<?php if ($_GET["search"]){echo(trim($_GET["search"]));} ?>">
                <button>
                    <xml version="1.0" ><svg class="header-svg" enable-background="new 0 0 32 32" id="Glyph" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M27.414,24.586l-5.077-5.077C23.386,17.928,24,16.035,24,14c0-5.514-4.486-10-10-10S4,8.486,4,14  s4.486,10,10,10c2.035,0,3.928-0.614,5.509-1.663l5.077,5.077c0.78,0.781,2.048,0.781,2.828,0  C28.195,26.633,28.195,25.367,27.414,24.586z M7,14c0-3.86,3.14-7,7-7s7,3.14,7,7s-3.14,7-7,7S7,17.86,7,14z" id="XMLID_223_"/></svg>
                </button>
                
            </form>
            <div class="market header-el bgOnHover">
                <div class="tovar-href-decor">
                    <div class="tovar-href-decor_line"></div>
                </div>
                <a class="upAnim" style="z-index: 100;" href="index.php">товар</a>
            </div>
            <div class="profile header-el">
                <div class="basket bgOnHover" >
                    <a href="basket.php">
                        <xml version="1.0" ><svg class="header-svg upAnim" height="1792" viewBox="0 0 1792 1792" width="1792" xmlns="http://www.w3.org/2000/svg"><path d="M1792 768q53 0 90.5 37.5t37.5 90.5-37.5 90.5-90.5 37.5h-15l-115 662q-8 46-44 76t-82 30h-1280q-46 0-82-30t-44-76l-115-662h-15q-53 0-90.5-37.5t-37.5-90.5 37.5-90.5 90.5-37.5h1792zm-1435 800q26-2 43.5-22.5t15.5-46.5l-32-416q-2-26-22.5-43.5t-46.5-15.5-43.5 22.5-15.5 46.5l32 416q2 25 20.5 42t43.5 17h5zm411-64v-416q0-26-19-45t-45-19-45 19-19 45v416q0 26 19 45t45 19 45-19 19-45zm384 0v-416q0-26-19-45t-45-19-45 19-19 45v416q0 26 19 45t45 19 45-19 19-45zm352 5l32-416q2-26-15.5-46.5t-43.5-22.5-46.5 15.5-22.5 43.5l-32 416q-2 26 15.5 46.5t43.5 22.5h5q25 0 43.5-17t20.5-42zm-1156-1217l-93 412h-132l101-441q19-88 89-143.5t160-55.5h167q0-26 19-45t45-19h384q26 0 45 19t19 45h167q90 0 160 55.5t89 143.5l101 441h-132l-93-412q-11-44-45.5-72t-79.5-28h-167q0 26-19 45t-45 19h-384q-26 0-45-19t-19-45h-167q-45 0-79.5 28t-45.5 72z"/></svg>
                    </a>
                </div>
                <div class="profile-info header-el bgOnHover">
                    <div class="profile-img">
                        <img src="<?php echo($img); ?>" alt="">
                    </div>
                    <div class="profile-name">
                        <?php echo($login); ?>
                    </div>
                </div>
                <?php
                if ($isAdmin){
                    echo ('
                        <div class="header-el bgOnHover">
                            <a href="admin.php">
                                <xml version="1.0" ><svg class="header-svg upAnim" enable-background="new 0 0 48 48" height="48px" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Expanded"><g><g><path d="M24,20c-11.215,0-20-3.953-20-9s8.785-9,20-9s20,3.953,20,9S35.215,20,24,20z M24,4C15.486,4,6,6.875,6,11s9.486,7,18,7     s18-2.875,18-7S32.514,4,24,4z"/></g><g><path d="M24,28c-11.215,0-20-3.953-20-9v-8c0-0.553,0.447-1,1-1s1,0.447,1,1v8c0,4.125,9.486,7,18,7s18-2.875,18-7v-8     c0-0.553,0.447-1,1-1s1,0.447,1,1v8C44,24.047,35.215,28,24,28z"/></g><g><path d="M24,37c-11.215,0-20-3.953-20-9v-9c0-0.553,0.447-1,1-1s1,0.447,1,1v9c0,4.125,9.486,7,18,7s18-2.875,18-7v-9     c0-0.553,0.447-1,1-1s1,0.447,1,1v9C44,33.047,35.215,37,24,37z"/></g><g><path d="M24,46c-11.215,0-20-3.953-20-9v-9c0-0.553,0.447-1,1-1s1,0.447,1,1v9c0,4.125,9.486,7,18,7s18-2.875,18-7v-9     c0-0.553,0.447-1,1-1s1,0.447,1,1v9C44,42.047,35.215,46,24,46z"/></g></g></g></svg>
                            </a>
                        </div>
                    ');
                }
                ?>
                <div class="header-el bgOnHover">
                    <a href="login.php">
                        <xml version="1.0" ><svg class="header-svg upAnim" style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">.st0{opacity:0.2;fill:none;stroke:#000000;stroke-width:5.000000e-02;stroke-miterlimit:10;}</style><g id="grid_system"/><g id="_icons"><g><path d="M20.9,11.6c-0.1-0.1-0.1-0.2-0.2-0.3l-3-3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l1.3,1.3H13c-0.6,0-1,0.4-1,1s0.4,1,1,1h4.6    l-1.3,1.3c-0.4,0.4-0.4,1,0,1.4c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l3-3c0.1-0.1,0.2-0.2,0.2-0.3C21,12.1,21,11.9,20.9,11.6z    "/><path d="M15.5,18.1C14.4,18.7,13.2,19,12,19c-3.9,0-7-3.1-7-7s3.1-7,7-7c1.2,0,2.4,0.3,3.5,0.9c0.5,0.3,1.1,0.1,1.4-0.4    c0.3-0.5,0.1-1.1-0.4-1.4C15.1,3.4,13.6,3,12,3c-5,0-9,4-9,9s4,9,9,9c1.6,0,3.1-0.4,4.5-1.2c0.5-0.3,0.6-0.9,0.4-1.4    C16.6,18,16,17.8,15.5,18.1z"/></g></g></svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
