<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>basket</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/magazin.css">
    <link rel="stylesheet" href="css/body_content.css">
    <link rel="stylesheet" href="css/basket.css">
</head>
<?php
    require 'php/databaseconnect.php';
    session_start();
?>
<body>
<?php include("php/header.php");?>
<div class="content-wrapper">
    <div class="content">
        <div class="tovari">
            <div class="content_title"><span>Корзина</span><span class="count"> <?php echo(" 1 товаров. "); ?> </span></div>
            <div class="tovar">
                <div class="tovar-main-img">
                    <img src="img/1660S.jpg" alt="">
                </div>
                <div class="tovar-desc">
                    <div class="tovar-desc-el">
                    <span class="tovar-title">Видеокарта KFA2 GeForce GTX 1660 SUPER 1-click OC [60SRL7DSY91K] [PCI-E 3.0, 6 ГБ GDDR6, 192 бит, DVI-D, DisplayPort, HDMI, GPU 1530 МГц]</span>
                    </div>
                    <div class="tovar-desc-el">
                        <span class="delete">
                            <xml version="1.0" ><svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M12 38c0 2.21 1.79 4 4 4h16c2.21 0 4-1.79 4-4v-24h-24v24zm26-30h-7l-2-2h-10l-2 2h-7v4h28v-4z"/><path d="M0 0h48v48h-48z" fill="none"/></svg>
                        </span>
                        <span class="price">3 399 ₽</span>
                    </div>
                    
                </div>
            </div>
            <div class="tovar">
                <div class="tovar-main-img">
                    <img src="img/1660S.jpg" alt="">
                </div>
                <div class="tovar-desc">
                    <div class="tovar-desc-el">
                    <span class="tovar-title">Видеокарта KFA2 GeForce GTX 1660 SUPER 1-click OC [60SRL7DSY91K] [PCI-E 3.0, 6 ГБ GDDR6, 192 бит, DVI-D, DisplayPort, HDMI, GPU 1530 МГц]</span>
                    </div>
                    <div class="tovar-desc-el">
                        <span class="delete">
                            <xml version="1.0" ><svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M12 38c0 2.21 1.79 4 4 4h16c2.21 0 4-1.79 4-4v-24h-24v24zm26-30h-7l-2-2h-10l-2 2h-7v4h28v-4z"/><path d="M0 0h48v48h-48z" fill="none"/></svg>
                        </span>
                        <span class="price">3 399 ₽</span>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="oformit">
            <div class="endPrice">
                Итог: 43000 Р
            </div>
            <div class="bybotton">
                <button>Перейти к оформлению</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>