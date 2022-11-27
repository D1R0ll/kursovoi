<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/content.css">
     <link rel="stylesheet" href="css/index.css">
    <title>Главная</title>
</head>
<body>
<?php
    // require 'php/databaseconnect.php';
    // session_start();
?>
<?php include("php/header.php");?>
<content>
        <div class="slider">
            <div class="slider-buttons">
                <button class="slider-button" onclick="next()">
                    <xml version="1.0" ><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 "/></svg>
                </button>
                <button class="slider-button" onclick="pre()">
                    <xml version="1.0" ><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 "/></svg>
                </button>
            </div>
            <div class="slide">
                <img src="img/default.jpg" alt="">
            </div>
            <div class="slide">
                <img src="img/default.jpg" alt="">
            </div>
            <div class="slide">
                <img src="img/default.jpg" alt="">
            </div>
        </div>
        <div class="canvas-wrap">
            <canvas id="canvasUp"></canvas>
        </div>
            <div class="info">
                <div class="content-line">
                    <span class="razdel-title">Что нового</span>
                </div>
                <div class="content-line">
                    <div class="news content-el">
                        <div class="content-el-decor">
                            <div class="content-el-decor_line content-el-decor_line-left"></div>
                            <div class="content-el-decor_line content-el-decor_line-top"></div>
                            <div class="content-el-decor_line content-el-decor_line-right"></div>
                            <div class="content-el-decor_line content-el-decor_line-bottom"></div>
                        </div>
                        <img src="" alt="">
                        <span>
                            новости
                        </span>
                    </div>
                    <div class="texnologies content-el">
                        <div class="content-el-decor">
                            <div class="content-el-decor_line content-el-decor_line-left"></div>
                            <div class="content-el-decor_line content-el-decor_line-top"></div>
                            <div class="content-el-decor_line content-el-decor_line-right"></div>
                            <div class="content-el-decor_line content-el-decor_line-bottom"></div>
                        </div>
                        <img src="" alt="">
                        <span>
                            технологии
                        </span>
                    </div>
                </div>
                <div class="content-line">
                    <span class="razdel-title">Продукты</span>
                </div>
                <div class="content-line">
                    <div class="vid content-el">
                        <div class="content-el-decor">
                            <div class="content-el-decor_line content-el-decor_line-left"></div>
                            <div class="content-el-decor_line content-el-decor_line-top"></div>
                            <div class="content-el-decor_line content-el-decor_line-right"></div>
                            <div class="content-el-decor_line content-el-decor_line-bottom"></div>
                        </div>
                        <img src="" alt="">
                        <span>
                            Игровые
                        </span>
                    </div>  
                    <div class="vid content-el">
                        <div class="content-el-decor">
                            <div class="content-el-decor_line content-el-decor_line-left"></div>
                            <div class="content-el-decor_line content-el-decor_line-top"></div>
                            <div class="content-el-decor_line content-el-decor_line-right"></div>
                            <div class="content-el-decor_line content-el-decor_line-bottom"></div>
                        </div>
                        <img src="" alt="">
                        <span>
                        Профессиональные
                        </span>
                    </div>  
                    <div class="vid content-el">
                        <div class="content-el-decor">
                            <div class="content-el-decor_line content-el-decor_line-left"></div>
                            <div class="content-el-decor_line content-el-decor_line-top"></div>
                            <div class="content-el-decor_line content-el-decor_line-right"></div>
                            <div class="content-el-decor_line content-el-decor_line-bottom"></div>
                        </div>
                        <img src="" alt="">
                        <span>
                            Серверные
                        </span>
                    </div>  
                </div>
                <div class="content-line">
                    <span class="razdel-title">Популярное</span>
                </div>
                <div class="content-line">
                    <div class="vid content-el">
                        <div class="content-el-decor">
                            <div class="content-el-decor_line content-el-decor_line-left"></div>
                            <div class="content-el-decor_line content-el-decor_line-top"></div>
                            <div class="content-el-decor_line content-el-decor_line-right"></div>
                            <div class="content-el-decor_line content-el-decor_line-bottom"></div>
                        </div>
                        <img src="" alt="">
                        <span>
                            Игровые
                        </span>
                    </div>  
                    <div class="vid content-el">
                        <div class="content-el-decor">
                            <div class="content-el-decor_line content-el-decor_line-left"></div>
                            <div class="content-el-decor_line content-el-decor_line-top"></div>
                            <div class="content-el-decor_line content-el-decor_line-right"></div>
                            <div class="content-el-decor_line content-el-decor_line-bottom"></div>
                        </div>
                        <img src="" alt="">
                        <span>
                            Серверные
                        </span>
                    </div>  
                </div>
        </div>
        <canvas id="canvasDown"></canvas>
        <div class="back">
            <video src="video/Nvidia RTX 3080 - Reveal Trailer.mp4" loop="1", muted="0"></video>
        </div>
    </content>
    
    <footer>
        <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
        Commodi debitis neque officia, deleniti animi tenetur molestiae architecto veniam quidem sit adipisci ipsam magnam,<br><br>
        ab repudiandae in? Accusantium harum incidunt ut!
        </p>
    </footer>
    
    <script src="js/API.js"></script>
    <script src="js/perlinNoise.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/slider.js"></script>
    <script>
        let perlinNoise = new PerlinNoise();

        let topCanvas = document.querySelector('#canvasUp'),
            bottomCanvas = document.querySelector('#canvasDown');

        let topCtx = topCanvas.getContext('2d');
            bottomCtx = bottomCanvas.getContext('2d');
            topCanvas.width = bottomCanvas.width = window.innerWidth;
            topCanvas.height = bottomCanvas.height =  200;
            
        topCtx.fillStyle = "rgba(255,255,255,0)"
        topCtx.fillRect(0,0,topCanvas.width,topCanvas.height)
        bottomCtx.fillStyle = "rgba(255,255,255,0)"
        bottomCtx.fillRect(0,0,bottomCanvas.width,bottomCanvas.height)
        size = 1
        let wavesGeometry = []

        function crateWaves(h,w){
            for (let i = 0;i<h/size;i++){
                for (let j = 0;j<w/size;j++){
                    wavesGeometry.push(new WaveElement(j,i,size,perlinNoise.getNoise(j,i)))
                }
            }
            wavesGeometry.forEach((el)=>{
                el.draw(topCanvas,topCtx);
                el.draw(bottomCanvas,bottomCtx,-1);
            })
        }
        crateWaves(1,bottomCanvas.width);

        let back = document.querySelector(".back");
        let video = document.querySelector("video");
        document.body.addEventListener("scroll",function (e){
            if (this.scrollTop > 473){
                topCanvas.style.position = "fixed";
                topCanvas.style.top = "0px ";
                
            }
            else{
                topCanvas.style.position = "relative";
                topCanvas.style.top = "0px";
                
            }
            if (this.scrollTop > 450){
                video.play();
            }
            else{
                video.pause();
            }
        })
        function randomLine(arr,param,param2){
            arr.forEach(el=>{
                let res1 = rnd(15,75);
                el.style[param] = res1 + "%";
                el.style[param2] = 2 + "px";
                el.parentNode.addEventListener("mouseenter",()=>{
                    el.style[param] = res1 + rnd(10,20) + "%"; 
                })
                el.parentNode.addEventListener("mouseleave",()=>{
                    el.style[param] = res1+"%"; 
                })
            })
        }
        randomLine(Array.from(document.querySelectorAll(".content-el-decor_line-left, .content-el-decor_line-right")), "height","width");
        randomLine(Array.from(document.querySelectorAll(".content-el-decor_line-bottom, .content-el-decor_line-top")), "width","height");
    </script>
</body>
</html>