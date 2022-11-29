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
<body>
<?php
 include("php/header.php");
 require 'php/databaseconnect.php';
?>
<div class="content-wrapper">
    <div class="content">
        <div class="tovari">
            <?php
                $in_order = [];
                $sumPrice = 0;
                if (!empty($_SESSION["user"])){
                    $sth = $conn->query("SELECT `product_id`,`count` FROM `product_order` where `user_id` = ".$_SESSION["user"]->id);
                    $in_order = $sth->fetchAll(PDO::FETCH_ASSOC);
                    $sth = $conn->query("SELECT * FROM `product`");
                    echo('<div class="content_title"><span>В корзине </span><span class="count"> '.count($in_order).' </span><span class="count"> товара</span></div>');
                    while($product = $sth->fetch()){
                        for ($i = 0 ;$i < count($in_order);$i++){
                            if ($in_order[$i]["product_id"] == $product["id"]){
                                $sumPrice += $product["price"]*$in_order[$i]["count"];
                                echo('
                                    <div class="tovar">
                                        <div class="tovar-main-img">
                                            <img src="img/'.$product["img"].'" alt="">
                                        </div>
                                        <div class="tovar-desc">
                                            <div class="tovar-desc-el">
                                                <span class="tovar-title">'.$product["model"].'</span>
                                            </div>
                                            <div class="tovar-desc-el tovar-count">
                                                <button value="'.$product["id"].'" class="plus" onclick="plus(this,'.$product["count"].')">+</button>
                                                <span class="count">'.$in_order[$i]["count"].'</span>
                                                <button value="'.$product["id"].'" class="minus" onclick="minus(this)">-</button>
                                            </div> 
                                            <div class="tovar-desc-el priceAndRemove">
                                                <div><span class="price">'.$product["price"].'</span><span class="price">₽</span></div>
                                                <button class="delete" value="'.$product["id"].'">
                                                    <xml version="1.0" ><svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M12 38c0 2.21 1.79 4 4 4h16c2.21 0 4-1.79 4-4v-24h-24v24zm26-30h-7l-2-2h-10l-2 2h-7v4h28v-4z"/><path d="M0 0h48v48h-48z" fill="none"/></svg>
                                                </button>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                ');
                            }
                        }
                    }
                }
                else{
                    echo(
                        "Войдите чтобы иметь доступ к корзине )"
                    );
                }
            ?>
        </div>
        <div class="oformit">
            <div class="endPrice">
                <?php
                    echo("Итог: <p class='num'>".$sumPrice."</p>₽");
                ?>
            </div>
            <div class="bybotton">
                <button onclick="buy()">Оплатить</button>
            </div>
        </div>
    </div>
</div>
<script>
    function plus(el,max){
        if (el.parentNode.querySelector(".count").textContent < max){
            el.parentNode.querySelector(".count").textContent++;
            upCount(el.parentNode.querySelector(".count").textContent,el.value);
            document.querySelector('.endPrice').querySelector('p').textContent = parseInt(document.querySelector('.endPrice').querySelector('p').textContent)+parseInt(el.parentNode.parentNode.querySelector(".price").textContent)
        }
    }
    function minus(el){
        if(el.parentNode.querySelector(".count").textContent > 1){
            el.parentNode.querySelector(".count").textContent--;
            document.querySelector('.endPrice').querySelector('p').textContent = parseInt(document.querySelector('.endPrice').querySelector('p').textContent)-parseInt(el.parentNode.parentNode.querySelector(".price").textContent)
        }
        else{

        }
        
        upCount(el.parentNode.querySelector(".count").textContent,el.value);
    }
    async function upCount(count,product_id){
        let data = new FormData();
        data.append('count',count);
        data.append('product_id',product_id);
        let response = await fetch('php/upCount.php', {
            method: 'POST',
            body: data
        });
    }
    function buy(){
        alert("Товары купленны  ");
    }
    function removeOrder(id){
        let url = new URL('php/remuveOrder.php', location);
            url.searchParams.append("id", id);
        let url_string = url.toString();
        console.log(url_string)
        getData(url_string);
    }
    async function getData (url) {
        test = await fetch(url, {});
    };
    document.querySelectorAll('.delete').forEach(el=>{
        el.addEventListener('click',function(){
            removeOrder(this.value);
            document.querySelector('.count').textContent -= 1;
            document.querySelector('.endPrice').querySelector('p').textContent = document.querySelector('.endPrice').querySelector('p').textContent - this.parentNode.querySelector('.price').textContent*this.parentNode.parentNode.querySelector('.count').textContent;
            this.parentNode.parentNode.parentNode.remove()
        })
    })
</script>
</body>
</html>