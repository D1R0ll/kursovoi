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
                $in_order = [];
                if ($_SESSION["user"]){
                    $sth = $conn->query('SELECT `product_id` FROM `product_order` WHERE `user_id` = '.$_SESSION["user"]->id.' AND `product_id` = '.$_GET["id"]);
                    $in_order = $sth->fetchAll(PDO::FETCH_COLUMN);
                }
                else{
                    $tovar["id"] = "";
                }
                
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
                    ');
                
                echo('
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
            <div class="febacks-wrapper wrapper">
                <form class="create-feback" id="createFeback" method="post" name="<?php echo($tovar["id"])?>">
                    <textarea name="content" id=""></textarea>
                    <div class="line">
                        <?php 
                            if ($_SESSION["user"]){
                                echo '<button type="submit" class="create-feback-button">оставить отзыв</button>';
                            }
                            else{
                                echo 'Войдите в аккаунт';
                            }
                        ?>
                        <div class="emis">
                            <div class="emis-star">
                                <input name="emiss" type="checkbox" value="1">
                                <svg class="star" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></g></svg>
                            </div>
                            <div class="emis-star">
                                <input name="emiss" type="checkbox" value="2">
                                <svg class="star" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></g></svg>
                            </div>
                            <div class="emis-star">
                                <input name="emiss" type="checkbox" value="3">
                                <svg class="star" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></g></svg>
                            </div>
                            <div class="emis-star">
                                <input name="emiss" type="checkbox" value="4">
                                <svg class="star" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></g></svg>
                            </div>
                            <div class="emis-star">
                                <input name="emiss" type="checkbox" value="5">
                                <svg class="star" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></g></svg>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="febacks">
                    <?php
                        $febacks = $conn->prepare("SELECT * FROM `feback` where `tovar` = '".$tovar["id"]."' ORDER BY id DESC");
                        $febacks->execute();
                        foreach($febacks->fetchAll(PDO::FETCH_ASSOC) as $el){
                            $_POST["author"] = $el["author"];
                            $_POST["content"] = $el["content"];
                            $_POST["date"] = $el["date"];
                            $_POST["emiss"] = $el["emiss"];
                            $_POST["id"] = $el["id"];
                            echo "<div class='feback'>";
                            include("php/feback.php");
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        async function delet(bt){
            bt.closest(".feback").remove();
            let formData = new FormData();
            formData.append("id",bt.value)
            let response = await fetch('php/deletefeback.php', {
                method: 'POST',
                body: formData
            });
        }
        //блок вынести в php и добавлять в начало
        //отзывы
        createFeback.addEventListener("submit",async function (e){
            e.preventDefault();
            let formData = new FormData(createFeback);
            formData.append("tovar",createFeback.name);
            var currentdate = new Date(); 
            var datetime = currentdate.getDate() + "/"
                            + (currentdate.getMonth()+1)  + "/" 
                            + currentdate.getFullYear() +" "
                            + currentdate.getHours() + ":"  
                            + currentdate.getMinutes() + ":" 
                            + currentdate.getSeconds();
            formData.append("date",datetime);
            let response = await fetch('php/createFeback.php', {
                method: 'POST',
                body: formData
            });
            let result = await response.text();

            console.log(result)
            console.log("__________")

            Array.from(this.children).forEach(el=>{
                el.value = "";
            })
            formData.append("author",document.querySelector(".profile-name").textContent);
            formData.append("id",result);
            response = await fetch('php/feback.php', {
                method: 'POST',
                body: formData
            });
            result = await response.text();
            
            let div = document.createElement("div");
                div.classList = "feback";
                div.innerHTML=result;
            document.querySelector(".febacks").prepend(div);
        })
        function isFocus(coll){
            let c = true;
            coll.forEach(el=>{
                if (el.checked) {
                    c = false;
                }
            })
            return c;
        }
        document.querySelectorAll("input").forEach((input,id)=>{
            input.addEventListener("mouseenter",function(){
                if (isFocus(document.querySelectorAll("input"))){
                    document.querySelectorAll(".star").forEach((el2,index)=>{
                        if (index < id){
                            el2.style.fill = "#d8ff2e";
                        }
                        else{
                            el2.style.fill = "rgb(199, 199, 199)";
                        }
                    })
                }
            });
            input.addEventListener("mouseleave",function(){
                if (isFocus(document.querySelectorAll("input"))){
                    document.querySelectorAll(".star").forEach((el2,index)=>{
                        el2.style.fill = "rgb(199, 199, 199)";
                    })
                }
            });
            input.addEventListener("change",function(){
                document.querySelectorAll(".star").forEach((el2,index)=>{
                    if (index < id){
                        el2.style.fill = "#d8ff2e";
                    }
                    else{
                        el2.style.fill = "rgb(199, 199, 199)";
                    }
                })
            })
        })
        //покупка
        async function addOrder (id) {
            let url = new URL('php/addOrder.php', location);
                url.searchParams.append("id", id);
            let url_string = url.toString();
            test = await fetch(url_string, {});
        };
        document.querySelector(".byButton").addEventListener("click",function (){
            if (this.value != ""){
                this.innerHTML = "В корзине";
                addOrder(this.value);
            } 
            else{
                alert("войдите в аккаунт");
            }
        })
    </script>
</body>
</html>