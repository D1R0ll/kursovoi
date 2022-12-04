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
                <button class="function-button" onclick="uploadTable()">
                    Выгрузить информацию о товаре
                </button>
            </div>
        </div>
        <table id="tbl_exporttable_to_xls" style="border:1">
        <?php include("php/uploadProductInformation.php"); ?>
        </table>
        <?php
            $_POST["clas"] = "createBlock";
            include("php/creationForm.php");
        ?>
       
        <div class="removeBlock form" id="removeBlock">
            <?php 
                $_POST["text"] = "удалить";
                $_POST["clas"] = "remove_bt";
                $_POST["func"] = "del";
                require 'php/insertProductToDeletForm.php';
            ?>
        </div>
        <div class="blur"></div>
        <div class="restatBlock form" id="restatBlock">
            <?php
                $_POST["text"] = "изменить";
                $_POST["clas"] = "restat_bt";
                $_POST["func"] = "restat";
                require 'php/insertProductToDeletForm.php';
            ?>
        </div>
    </div>
</div>
    <script>
        function ShowCreateProductForm(form){
            document.querySelectorAll(".form").forEach(el=>{
                el.style.display = "none";
            })
            document.querySelector("#"+form).style.display = "flex";
            if (form == "removeBlock"){
                insertProductToDeletForm(document.querySelector("#"+form),"удалить","remove_bt","del");
            }
            else if (form == "restatBlock"){
               insertProductToDeletForm(document.querySelector("#"+form),"изменить","restat_bt","restat");
            }
        }

        async function insertProductToDeletForm(form,text,clas,func) {
            let formData = new FormData();
                formData.append("text",text);
                formData.append("clas",clas);
                formData.append("func",func);
            let response = await fetch('php/insertProductToDeletForm.php', {
                method: 'POST',
                body: formData
            });
            let result = await response.text();
            form.innerHTML = result;
        }
        //выгрузка файла в exel
        async function uploadTable(){
            console.log()
            let response = await fetch('php/uploadProductInformation.php', {
                method: 'POST',
            });
            let result = await response.text();
            document.getElementById('tbl_exporttable_to_xls').innerHTML = result;
            ExportToExcel();
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
        function del(bt){
            remove(bt.value);
            bt.parentNode.parentNode.removeChild(bt.parentNode)
        }

        //добавление
        document.querySelector(".inputWithImg").onchange = function (e) {
            let selectedFile = e.target.files[0];
            let reader = new FileReader();
            console.log("wd");
            reader.onload = function(e) {
               document.querySelector(".selectImg").src = e.target.result;
            };
            reader.readAsDataURL(selectedFile);
        }

        createBlock.onsubmit = async (e) => {
            e.preventDefault();
            let response = await fetch('php/addProduct.php', {
                method: 'POST',
                body: new FormData(createBlock)
            });
            let result = await response.text();
            alert(result);
            createBlock.querySelectorAll(".createInput").forEach(el=>{
                el.value = "";
                createBlock.querySelector(".selectImg").src = "";
            })
        };
        //изменение товара
        document.querySelector(".blur").addEventListener("click",function (e){
            if(e.target === this){
                this.style.display = "none";
                this.innerHTML = "";
            }
        })  

        async function restat(bt){
            let formData = new FormData();
                formData.append("clas","apdateForm");
                formData.append("id",bt.value);
            let response = await fetch('php/creationForm.php', {
                method: 'POST',
                body: formData
            });
            let result = await response.text();

            document.querySelector(".blur").style.display = "flex";
            document.querySelector(".blur").innerHTML = result;
            console.log(document.querySelectorAll(".selectImg")[1])
            document.querySelectorAll(".inputWithImg")[1].onchange = function (e) {
                let selectedFile = e.target.files[0];
                let reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelectorAll(".selectImg")[1].src = e.target.result;
                };
                reader.readAsDataURL(selectedFile);
            }
            apdateBloc = document.querySelector(".blur").querySelector("form");
            apdateBloc.onsubmit = async (e) => {
                e.preventDefault();
                let formData = new FormData(apdateBloc);
                formData.append("id",bt.value);
                let response = await fetch('php/apdateProduct.php', {
                    method: 'POST',
                    body: formData
                });
                let result = await response.text();
                document.querySelector(".blur").style.display = "none";
                document.querySelector(".blur").innerHTML = "";
                ShowCreateProductForm('restatBlock');
            };

        }
    </script>
</body>
</html>