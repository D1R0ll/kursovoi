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

    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
</head>
<body>
<?php
    include("php/header.php");
    require 'php/databaseconnect.php';
    $_SESSION["conn"] = $conn;
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
                <button class="function-button" onclick="uploadProductInformation()">
                    Выгрузить информацию о товаре
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
                <br>
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
                <input class="createInput" type="text" placeholder="кол-во" name="count">
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
            $_POST["text"] = "удалить";
            $_POST["clas"] = "remove_bt";
             require 'php/insertProductToDeletForm.php';
            
            ?>
        </div>
        <div class="restatBlock form" id="restatBlock">
            <div class="blur">
                <form id="apdateForm">
                    
                </form>
            </div>

            <?php
                $_POST["text"] = "добавить";
                $_POST["clas"] = "restat_bt";
                require 'php/insertProductToDeletForm.php';
            ?>
        </div>
        <!-- <div class="">
                    <table id="tbl_exporttable_to_xls">
                <thead>
                    <th>Sr</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Job Profile</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><p>Amit Sarna</p></td>
                        <td>Florida</td>
                        <td>Data Scientist</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><p>Sagar Gada</p></td>
                        <td>California</td>
                        <td>Sr FullStack Dev</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><p>Ricky Marck</p></td>
                        <td>Nevada</td>
                        <td>Sr .Net Dev</td>
                    </tr>           
                </tbody>
            </table>
            <button onclick="ExportToExcel('xlsx')">Export table to excel</button>   
        </div> -->
    </div>
</div>
    <script>
        async function insertProductToDeletForm(form,text,clas) {
            let formData = new FormData();
                formData.append("text",text);
                formData.append("clas",clas);
            let response = await fetch('php/insertProductToDeletForm.php', {
                method: 'POST',
                body: formData
            });
            let result = await response.text();
            form.innerHTML = result;
        }
        //выгрузка
        async function uploadProductInformation () {
            let response = await fetch('php/uploadProductInformation.php', {
                method: 'POST',
                body: {}
            });
            let result = await response.text();
            console.log(result);
        }
        function ExportToExcel(type, fn, dl) {
            var elt = document.getElementById('tbl_exporttable_to_xls');
            var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
            return dl ?
                XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
                XLSX.writeFile(wb, fn || ('MySheetName.' + (type || 'xlsx')));
        }
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
            if (form == "removeBlock"){
                insertProductToDeletForm(document.querySelector("#"+form),"удалить","remove_bt");
            }
            else if (form == "restatBlock"){
               insertProductToDeletForm(document.querySelector("#"+form),"добавить","restat_bt");
            }
            
        }

        createBlock.onsubmit = async (e) => {
            e.preventDefault();
            let response = await fetch('addProduct.php', {
                method: 'POST',
                body: new FormData(createBlock)
            });
            let result = await response.text();
            alert(result);
            createBlock.querySelectorAll(".createInput").forEach(el=>{
                el.value = "";
            })
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