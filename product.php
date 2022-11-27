<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCT</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <?php include("php/header.php");require 'php/databaseconnect.php';?>
    <div class="content-wrapper">
        <div class="content">
            <?php
                $sql = "SELECT * FROM `product` WHERE `id` = '".$_GET["id"]."'";
                $d = $conn->prepare($sql);
                $d->execute();
                $tovar = $d->fetch(PDO::FETCH_ASSOC);

                $sth = $conn->query('SELECT `product_id` FROM `product_order` WHERE `user_id` = '.$_SESSION["user"]->id.' AND `product_id` = '.$_GET["id"]);
                $in_order = $sth->fetchAll(PDO::FETCH_COLUMN);
                $text = "В корзину";
                if (!empty($in_order)){
                    $text = "В корзине";
                }
                echo('
                <div class="wrapper">
                    <div class="content-title">Видеокарта '.$tovar["model"].'</div>
                </div>
                <div class="wrapper img_and_price">
                    <div class="images">
                        <img src="img/'.$tovar["img"].'" alt="">
                    </div>
                    <div class="discription">
                        <div class="up">
                            <div class="wrapper"><h2>Описание</h2></div>
                            <div class="wrapper">
                                <p class="discription-text">
                                    '.$tovar["discription"].'
                                </p>
                            </div>
                        </div>
                        <div class="wrapper down">
                            <span class="price">'.$tovar["price"].'P</span>
                            <button type="submit" value="'.$tovar["id"].'" class="byButton">'.$text.'</button>
                        </div>
                    </div>

                </div>
                <div class="wrapper">
                    <div class="parametrs">
                    <div class="parametrs-title">
                        Характеристики
                        <!DOCTYPE svg  PUBLIC `-//W3C//DTD SVG 1.1//EN`  `http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd`><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="396.6,352 416,331.3 256,160 96,331.3 115.3,352 256,201.5 "/></svg>
                    </div>
                        <div class="list">
                            <div class="list-stroke">
                                <div class="list-stroke-el list-stroke-title">Гарантия от производителя</div>
                                <div class="list-stroke-el list-stroke-param">'.$tovar["guarantee"].' мес</div>
                            </div>

                            <div class="list-stroke">
                                <div class="list-stroke-el list-stroke-title">Графический процессор</div>
                                <div class="list-stroke-el list-stroke-param">'.$tovar["graphicsProcessor"].'</div>
                            </div>

                            <div class="list-stroke">
                                <div class="list-stroke-el list-stroke-title">Техпроцесс</div>
                                <div class="list-stroke-el list-stroke-param">'.$tovar["technicalProcess"].' нм</div>
                            </div>

                            <div class="list-stroke">
                                <div class="list-stroke-el list-stroke-title">Объем видеопамяти</div>
                                <div class="list-stroke-el list-stroke-param">'.$tovar["videoMemoryCapacity"].' ГБ</div>
                            </div>

                            <div class="list-stroke">
                                <div class="list-stroke-el list-stroke-title">Тип памяти</div>
                                <div class="list-stroke-el list-stroke-param">'.$tovar["memoryType"].'</div>
                            </div>

                            <div class="list-stroke">
                                <div class="list-stroke-el list-stroke-title">Разрядность шины памяти</div>
                                <div class="list-stroke-el list-stroke-param">'.$tovar["memoryBusBitRate"].' бит</div>
                            </div>

                            <div class="list-stroke">
                                <div class="list-stroke-el list-stroke-title">Максимальная пропускная способность памяти</div>
                                <div class="list-stroke-el list-stroke-param">'.$tovar["maximumMemoryBandwidth"].' Гбайт/сек</div>
                            </div>


                            <div class="list-stroke">
                                <div class="list-stroke-el list-stroke-title">Эффективная частота памяти</div>
                                <div class="list-stroke-el list-stroke-param">'.$tovar["effectiveMemoryFrequency"].' МГц</div>
                            </div>


                            <div class="list-stroke">
                                <div class="list-stroke-el list-stroke-title">Максимальное разрешение</div>
                                <div class="list-stroke-el list-stroke-param">'.$tovar["maximumResolution"].'</div>
                            </div>


                            <div class="list-stroke">
                                <div class="list-stroke-el list-stroke-title">Тип охлаждения</div>
                                <div class="list-stroke-el list-stroke-param">'.$tovar["typeOfCooling"].'</div>
                            </div>

                        </div>
                    </div>
                </div>
                ');
            ?>
        </div>
    </div>
    <script>
        function addOrder(id){
            let url = new URL('php/addOrder.php', location);
                url.searchParams.append("id", id);
            let url_string = url.toString();
            console.log(url_string)
            getData(url_string);
        }
        async function getData (url) {
            test = await fetch(url, {});
        };
        document.querySelector(".byButton").addEventListener("click",function (){
            this.innerHTML = "В корзине";
            addOrder(this.value);
        })
    </script>
</body>
</html>