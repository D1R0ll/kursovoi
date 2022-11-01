<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>магазин</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/magazin.css">
    <link rel="stylesheet" href="css/rangeStyle.css">
    <link rel="stylesheet" href="css/body_content.css">
</head>
<?php
    require 'php/databaseconnect.php';
    session_start();
?>
<body>
<?php include("php/header.php");?>
    <div class="content-wrapper">
         <div class="content">
            <div class="filters content-el">
                <div class="filter-wrapper">
                    <div class="filter">
                        <div class="filter_title">
                            цена
                            <!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="396.6,352 416,331.3 256,160 96,331.3 115.3,352 256,201.5 "/></svg>
                        </div> 
                        <div class="filter_option">
                            <div><label for="">От</label><input type="text"></div>
                            <div><label for="">До</label><input type="text"></div>
                        </div>                   
                    </div>
                </div>
                <div class="filter-wrapper">
                    <div class="filter">
                        <div class="filter_title">
                            производитель графического процессора
                            <!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="396.6,352 416,331.3 256,160 96,331.3 115.3,352 256,201.5 "/></svg>
                        </div> 
                        <div class="filter_option">
                            <ul>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="makerGrafikProcessor" > 
                                        <div class="decorCheckbox">
                                        <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">NVIDIA</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="makerGrafikProcessor" > 
                                        <div class="decorCheckbox">
                                        <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">AMD</label>
                                    </div>
                                </li>
                            </ul>
                        </div>                          
                    </div>
                </div>
                <div class="filter-wrapper">
                    <div class="filter">
                        <div class="filter_title">
                            графический процессор
                            <!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="396.6,352 416,331.3 256,160 96,331.3 115.3,352 256,201.5 "/></svg>
                        </div> 
                        <div class="filter_option">
                            <ul>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="GrafikProcessor" > 
                                        <div class="decorCheckbox">
                                            <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">GeForce 2060</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="GrafikProcessor" > 
                                        <div class="decorCheckbox">
                                            <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">Radeon Rx 6950 XT</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="GrafikProcessor" > 
                                        <div class="decorCheckbox">
                                            <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">GeForce GTX 1660</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="GrafikProcessor" > 
                                        <div class="decorCheckbox">
                                            <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">GeForce GTX 1650</label>
                                    </div>
                                </li>
                            </ul>
                        </div>                          
                    </div>
                </div>
                <div class="filter-wrapper">
                    <div class="filter">
                        <div class="filter_title">
                            тип памяти
                            <!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="396.6,352 416,331.3 256,160 96,331.3 115.3,352 256,201.5 "/></svg>
                        </div> 
                        <div class="filter_option">
                            <ul>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="typeMemory" > 
                                        <div class="decorCheckbox">
                                            <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">GDDR6</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="typeMemory" > 
                                        <div class="decorCheckbox">
                                            <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">GDDR5</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="typeMemory" > 
                                        <div class="decorCheckbox">
                                            <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">GDDR6X</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="typeMemory" > 
                                        <div class="decorCheckbox">
                                            <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">GDDR4</label>
                                    </div>
                                </li>
                            </ul>
                        </div>                         
                    </div>
                </div>
                <div class="filter-wrapper">
                    <div class="filter">
                        <div class="filter_title">
                            объем памяти
                            <!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="396.6,352 416,331.3 256,160 96,331.3 115.3,352 256,201.5 "/></svg>
                        </div> 
                        <div class="filter_option">
                            <ul>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="countMemory" > 
                                        <div class="decorCheckbox">
                                            <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">1</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="countMemory" > 
                                        <div class="decorCheckbox">
                                            <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">2</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="countMemory" > 
                                        <div class="decorCheckbox">
                                            <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">4</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="countMemory" > 
                                        <div class="decorCheckbox">
                                            <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">5</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="countMemory" > 
                                        <div class="decorCheckbox">
                                            <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">6</label>
                                    </div>
                                </li>

                            </ul>
                        </div>                         
                    </div>
                </div>
                <div class="filter-wrapper">
                    <div class="filter">
                        <div class="filter_title">
                            производитель
                            <!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="396.6,352 416,331.3 256,160 96,331.3 115.3,352 256,201.5 "/></svg>
                        </div> 
                        <div class="filter_option">
                            <ul>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="maker" > 
                                        <div class="decorCheckbox">
                                            <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">ASUS</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="maker" > 
                                        <div class="decorCheckbox">
                                            <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">MSI</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="decorCheckbox-wrap"><input type="checkbox" class="maker" > 
                                        <div class="decorCheckbox">
                                            <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                        </div>
                                        <label for="">GIGABYTE</label>
                                    </div>
                                </li>
                            </ul>
                        </div>                         
                    </div>
                </div>
                <div class="confirmFilters-wrapper">
                    <button class="confirmFilters">Применить</button>
                </div>
            </div>

            <div class="tovari content-el">
                
            
                <div class="tovar">
                    <div class="tovar-main-img">
                        <img src="img/1660S.jpg" alt="">
                    </div>
                    <div class="tovar-desc">
                        <div class="tovar-desc-el">
                        <span class="tovar-title">
                            <a href="product.php">
                                Видеокарта KFA2 GeForce GTX 1660 SUPER 1-click OC [60SRL7DSY91K] [PCI-E 3.0, 6 ГБ GDDR6, 192 бит, DVI-D, DisplayPort, HDMI, GPU 1530 МГц]
                            </a>
                        </span>
                        </div>
                        <div class="tovar-desc-el">
                            <span class="price">3 399 ₽</span>
                            <span class="buy">Купить</span>
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
                            <span class="price">3 399 ₽</span>
                            <span class="buy">Купить</span>
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
                            <span class="price">3 399 ₽</span>
                            <span class="buy">Купить</span>
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
                            <span class="price">3 399 ₽</span>
                            <span class="buy">Купить</span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   <script src="js/hideListParametrs.js">
   </script>
</body>
</html>