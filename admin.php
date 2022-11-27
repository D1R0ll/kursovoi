<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/magazin.css">
    <link rel="stylesheet" href="css/body_content.css">
    <link rel="stylesheet" href="css/admin_content.css">
</head>
<body>
<?php
    include("php/header.php");
    require 'php/databaseconnect.php';
    if ($_SESSION["user"]->isAdmin == 0 || $_SESSION["user"]->isAdmin == NULL){
        header('Location: '."login.php");
    }

?>   

<div class="content-wrapper">
    

<div class="content">
<div class="functions">
    <div class="function">
        <button class="function-button" onclick="ShowCreateProductForm('createBlock')">
            Добавить товар
        </button> 
        <button class="function-button" onclick="ShowCreateProductForm('removeBlock')">
            Удалить товар
        </button> 
        <button class="function-button" onclick="ShowCreateProductForm('restatBlock')">
            Изменить товар
        </button>
    </div>
</div>
        <form class="createBlock form" id="createBlock">
            <div class="createInputWrapper">
                <input class="createInput" type="text" placeholder="название" name="model">
            </div>
            <div class="createInputWrapper">
                <img class="selectImg">
                <br>
                <input class="createInput inputWithImg" type="file" placeholder="название" name="img">
            </div>
            <div class="createInputWrapper">
                <textarea class="createInput"  placeholder="описание" name="discription"></textarea>
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="number" placeholder="цена" name="price">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="number" placeholder="гарантия" name="guarantee">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="text" placeholder="Производитель графического процессора" name="graficProcessorProizvoditel">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="text" placeholder="Производитель видеокарты" name="graficProcessorMaker">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="text" placeholder="Графический процессор" name="graphicsProcessor">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="number" placeholder="техпроцесс" name="technicalProcess">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="text" placeholder="тип памяти" name="memoryType">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="number" placeholder="колличесвто памяти" name="videoMemoryCapacity">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="number" placeholder="memoryBusBitRate" name="memoryBusBitRate">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="number" placeholder="maximumMemoryBandwidth" name="maximumMemoryBandwidth">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="number" placeholder="effectiveMemoryFrequency" name="effectiveMemoryFrequency">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="text" placeholder="maximumResolution" name="maximumResolution">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="text" placeholder="typeOfCooling" name="typeOfCooling">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="text" placeholder="разъемы подключения" name="videoConnectors">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="text" placeholder="интерфейс подключения" name="connectionInterface">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="text" placeholder="рекомендуемая мощность блока питания" name="recommendedPowerSupply">
            </div>
            <div class="createInputWrapper">
                <select class="createInput" name="rtx">
                    <option selected disabled value="">Трассировака</option>
                    <option value="есть">есть</option>    
                    <option value="нет" >нет</option>         
                </select>
            </div>
            <div class="createInputWrapper">
                <input  class="add-button" type="submit">
            </div>
        </form>
        <div class="removeBlock form" id="removeBlock">
            <?php
            
                $stmt = $conn->prepare("SELECT `img`,`model`,`id` FROM `product`");
                $stmt->execute();
                $allProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($allProducts as $val){
                    echo "<div class='db_object'>";
                    foreach($val as $key=>$value){
                        if ($key == "img"){
                            echo("<img src='img/".$value."'>");
                        }
                        else if($key != "id"){
                            echo("<div class='model'>".$value."</div>");
                        }
                    }
                    echo("<button class='remove_bt' value='".$val["id"]."'>удалить</button>");
                    echo "</div>";
                }
            ?>
        </div>
        <div class="restatBlock form" id="restatBlock">
            <div class="blur">
                <form id="apdateForm">
                    
                </form>
            </div>

            <?php
                $stmt = $conn->prepare("SELECT `img`,`model`,`id` FROM `product`");
                $stmt->execute();
                $allProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($allProducts as $val){
                    echo "<div class='db_object'>";
                    foreach($val as $key=>$value){
                        if ($key == "img"){
                            echo("<img src='img/".$value."'>");
                        }
                        else if($key != "id"){
                            echo("<div class='model'>".$value."</div>");
                        }
                    }
                    echo("<button class='restat_bt' value='".$val["id"]."'>изменить</button>");
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</div>
    <script>
        //удалени
        async function remove(id){
            let url = new URL('php/remuveTovar.php', location);
            url.searchParams.append("id", id);
            let url_string = url.toString();
            await fetch(url_string, {});
        }
        document.querySelectorAll(".remove_bt").forEach(bt=>{
            bt.addEventListener("click",function (){
                remove(this.value);
                this.parentNode.parentNode.removeChild(this.parentNode)
            })
        })
        //добавление
        document.querySelector(".inputWithImg").onchange = function (event) {
            var selectedFile = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(event) {
               document.querySelector(".selectImg").src = event.target.result;
            };
            reader.readAsDataURL(selectedFile);
        }

        function ShowCreateProductForm(form){
            document.querySelectorAll(".form").forEach(el=>{
                el.style.display = "none";
            })
            document.querySelector("#"+form).style.display = "flex";
        }

        createBlock.onsubmit = async (e) => {
            e.preventDefault();
            let response = await fetch('addProduct.php', {
                method: 'POST',
                body: new FormData(createBlock)
            });
            let result = await response.text();
            console.log(result);
        };
        //изменение
        document.querySelector(".blur").addEventListener("click",function (e){
            if(e.target === this){
                this.style.display = "none";
                this.querySelector("form").innerHTML = "";
            }
        })
        document.querySelectorAll(".restat_bt").forEach(bt=>{
            bt.addEventListener("click",async function (e){
                let formData = new FormData();
                formData.append("id",this.value);
                let response = await fetch("php/getProductId.php",{
                    method: 'POST',
                    body: formData
                });
                let result = JSON.parse(await response.text())  ;

                document.querySelector(".blur").style.display = "flex";
                
                for(let el of Object.entries(result) ){
                    if(el[0] != "id"){
                        let div = document.createElement("div");
                            div.classList = "createInputWrapper";
                        let input = document.createElement("input");
                        if (el[0] == "discription"){
                            input = document.createElement("textarea");
                        }
                            input.classList = "createInput";
                            input.type = "text";
                            input.name = el[0];
                            input.value = el[1];
                        if(el[0] == "img"){
                            let img = document.createElement("img");
                                img.src="img/"+el[1];
                                img.classList="inputWithImg";
                                div.append(img);
                                input.type = "file";
                        }
                        else{
                            input.setAttribute('required', '');
                        }
                        div.append(input);
                        apdateForm.append(div); 
                    }
                }
                let div = document.createElement("div");
                    div.classList = "createInputWrapper";
                let bt = document.createElement("input");
                    bt.type = "submit";
                    bt.classList = "update-button";
                div.append(bt);
                apdateForm.append(div); 
            
                let id = this.value;
                apdateForm.onsubmit = async (e) => {
                    e.preventDefault();
                    let formData = new FormData(apdateForm);
                    formData.append("id",id);
                    let response = await fetch('php/apdateProduct.php', {
                        method: 'POST',
                        body: formData
                    });
                    let result = await response.text();
                };
            })
        })
    </script>
</body>
</html>

<!-- 
<div class="createInputWrapper">
                <input class="createInput" type="number" placeholder="цена">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="text" placeholder="гарантия в месяцах">
            </div>
            <div class="createInputWrapper" multiple>
                Производитель графического ядра 
                <select class="createInput">
                    <option value="AMD">AMD</option>    
                    <option value="NVIDEA">NVIDEA</option>      
                </select>
            </div>
            <div class="createInputWrapper" multiple>
                <select>
                    <option selected disabled>Производитель</option>
                    <option value="MSi">MSi</option>    
                    <option value="GIGABYTE">GIGABYTE</option>      
                </select>
            </div>
            <div class="createInputWrapper" multiple>
                <select>
                    <option selected disabled>Модель графического процесскора</option>
                    <option value="GeForce 210">GeForce 210</option>    
                    <option value="GTX 1660 Super">GTX 1660 Super</option>      
                </select>
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="number" placeholder="техпроцесс">
            </div>
            <div class="createInputWrapper" multiple>
                <select>
                    <option selected disabled>Колличесвто видеопамяти</option>
                    <option value="1">1</option>    
                    <option value="2">2</option>      
                    <option value="4">4</option>      
                </select>
            </div>
            <div class="createInputWrapper" multiple>
                <select>
                    <option selected disabled>Тип памяти</option>
                    <option value="DDR4">DDR4</option>    
                    <option value="DDR5">DDR5</option>      
                    <option value="DDR3">DDR3</option>      
                </select>
            </div>
            <div class="createInputWrapper" multiple>
                <select>
                    <option selected disabled>Разрядность шины памяти</option>
                    <option value="32">32</option>    
                    <option value="64">64</option>         
                </select>
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="number" placeholder="Максимальная пропускная способность памяти">
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="number" placeholder="Штатная частота работы видеочипа">
            </div>
            <div class="createInputWrapper" multiple>
                <select>
                    <option selected disabled>Максимальное разрешение</option>
                    <option value="2560x1600">2560x1600</option>    
                    <option value="1280x720">1280x720</option>         
                </select>
            </div>
            <div class="createInputWrapper" multiple>
                <select>
                    <option selected disabled>Охлаждение</option>
                    <option value="воздушное">воздушное</option>    
                    <option value="водянное">водянное</option>         
                </select>
            </div>
            <div class="createInputWrapper" multiple>
                <select>
                    <option selected disabled>RTX</option>
                    <option value="есть">есть</option>    
                    <option value="нет">нет</option>         
                </select>
            </div>

 -->



  <!-- <div class="createInputWrapper createCheckbox">
                <p>Интерфейсы подключения монитора</p>
                <input type="checkbox" value="DVI-I" name="interface">DVI-I
                <input type="checkbox" value="VGA" name="interface">VGA
                <input type="checkbox" value="HDMI" name="interface">HDMI
            </div> -->
            <!-- <div class="createInputWrapper">
                <select class="createInput" name="in">
                    <option selected disabled value="">Интерфейсы подключения</option>
                    <option value="PCI-E 2.0">PCI-E 2.0</option>    
                    <option value="PCI-E 3.0" >PCI-E 3.0</option>         
                </select>
            </div>
            <div class="createInputWrapper">
                <input class="createInput" type="number" placeholder="Потребление" name="Bt">
            </div> -->