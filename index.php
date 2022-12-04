<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>магазин</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/rangeStyle.css">
    <link rel="stylesheet" href="css/body_content.css">
    <link rel="stylesheet" href="css/magazin.css">
</head>

<body>
<?php
    include("php/header.php");
    require 'php/databaseconnect.php';

    $in_order = [];//массив содержащий товары добавленые эти пользователем в корзину
    if (!empty($_SESSION["user"])){
        $sth = $conn->prepare("SELECT `product_id` FROM `product_order` where `user_id` = :id");
        $sth->execute(["id"=>$_SESSION["user"]->id]);
        $in_order = $sth->fetchAll(PDO::FETCH_COLUMN);
    }
    $isCheked = [];
    $isCheked["maxPrice"] = 999999;
    $isCheked["minPrice"] = 0;  
    $isChekedStruktur = [];
    $data = $_GET;
    $sql = "SELECT * FROM `product`";
    if (count($_GET) > 0 && !$_GET["search"]){
        $sql = 'SELECT * FROM `product` WHERE ';
        foreach($_GET as $key=> $value){
            $_GET[$key] = explode("-",$value);
            $sql.= "(";
            for ($i=0;$i< count($_GET[$key]);$i++){
                
                if ($key != "price"){
                    $sql.= "`".$key."` = '".$_GET[$key][$i]."' OR ";
                    $isCheked[$_GET[$key][$i]] = $_GET[$key][$i];
                    if (!$isChekedStruktur[$key]) $isChekedStruktur[$key] = $key;
                }
                else if ($_GET["price"] !== "-"){
                    if (empty($_GET[$key][$i])){
                        $_GET[$key][$i] = 0;
                    }
                    if (empty($_GET[$key][$i+1])){
                        $_GET[$key][$i+1] = 0;
                    }
                    if ($_GET[$key][$i+1] > $_GET[$key][$i]){
                        $isCheked["maxPrice"] = $_GET[$key][$i+1];
                        $isCheked["minPrice"] = $_GET[$key][$i];
                    }
                    else{
                        $isCheked["maxPrice"] = $_GET[$key][$i];
                        $isCheked["minPrice"] = $_GET[$key][$i+1];
                    }
                    $sql.= "`".$key."` >= '".$isCheked["minPrice"]."' AND `".$key."` <= '".$isCheked["maxPrice"]."' ";
                    break;
                }
            }
            if ($key != "price"){
                $sql = substr($sql,0,-4);
            }
            $sql.= ")";
            $sql .= " AND ";
            
            
        }
        $sql = substr($sql,0,-4);
    }
    else if($data["search"]){
        $sql = 'SELECT * FROM `product` WHERE `model` LIKE "%'.$data["search"].'%"';
    }
   
    function arrayFromSQLquery($arr){
        $str = "";
        foreach($arr as $key=>$value){
            $str.="`".$key."`, ";
        }
        $str = substr($str,0,-2);
        return $str;
    }
?>
    <div class="content-wrapper">
         <div class="content">
            <form class="filters content-el" method="post" action="php/createURLforFilters.php">
                <?php
                    $translate = ["price"=>"цена","graphicsProcessor"=>"графический процессор","graficProcessorProizvoditel"=>"графический процессор",
                    "videoMemoryCapacity"=>"объем памяти","memoryType"=>"тип памяти","rtx"=>"трассировка",
                ];

                    $filters = $conn->prepare("SELECT ".arrayFromSQLquery($translate)." FROM `product` LIMIT 1");
                    $filters->execute();
                    $filters = $filters->fetch(PDO::FETCH_ASSOC);
                    foreach($filters as $key=>$value){
                        echo('
                            <div class="filter-wrapper">
                                <div class="filter">
                                    <div class="filter_title">
                                        '.$translate[$key].'
                                        <!DOCTYPE svg  PUBLIC "-//W3C//DTD SVG 1.1//EN"  "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="396.6,352 416,331.3 256,160 96,331.3 115.3,352 256,201.5 "/></svg>
                                    </div> 
                                    
                        ');
                        if ($key == 'price'){
                            echo('
                            <div class="filter_option filterPrice">
                                <div><label for="">От</label><input type="text" name="price[]" type="number" placeholder="0" value="'.$isCheked["minPrice"].'"></div>
                                <div><label for="">До</label><input type="text" name="price[]" type="number" placeholder="999999" value="'.$isCheked["maxPrice"].'"></div>
                            ');
                        }
                        else{
                            $block = '<div class="filter_option"><ul>';
                            if ($isChekedStruktur[$key]){
                                $block = '<div class="filter_option" style="display:flex;"><ul>';
                            }
                            echo($block);
                            $stmt = $conn->prepare("SELECT DISTINCT `".$key."` from `product`");
                            $stmt->execute();
                            $filters = $stmt->fetchAll(PDO::FETCH_COLUMN);
                            // var_dump($isCheked);
                            foreach($filters as $el=>$val){
                                if ($el != "price"){
                                    $chek = "";
                                    if($isCheked[$val]){
                                        $chek = "checked=checked";
                                    }
                                    echo('
                                        <li>
                                            <div class="decorCheckbox-wrap">
                                                <input '.$chek.' type="checkbox" class="'.$key.'" name="'.$key.'[]" value="'.$val.'"> 
                                                <div class="decorCheckbox">
                                                    <xml version="1.0" ><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>
                                                </div>
                                                <label for="">'.$val.'</label>
                                            </div>
                                        </li>
                                    ');
                                }
                            }
                            echo('</ul>');
                        }
                        echo('
                                        </div>  
                                    </div>
                                </div>
                        ');
                    }
                ?>
                <div class="confirmFilters-wrapper">
                    <button class="confirmFilters" type="submit">Применить</button>
                </div>
                <div class="clearFilters-wrapper">
                    <a href="index.php" class="clearFilters">Очистить</a>
                </div>
            </form>

            <div class="tovari content-el">
                
                <?php
                    $products = $conn->query($sql);
                    while($product = $products->fetch()){
                        $text = "Купить";
                        if (!empty($_SESSION["user"])){
                            for ($i = 0 ;$i < count($in_order);$i++){
                                if ($in_order[$i] == $product["id"]){
                                    $text = "В корзине";
                                }
                            }
                        }
                        echo('
                        <div class="tovar">
                            <div class="tovar-main-img">
                                <img src="img/'.$product["img"].'" alt="">
                            </div>
                            <div class="tovar-desc">
                                <div class="tovar-desc-el">
                                <span class="tovar-title">
                                    <a class="tovar-href" href="product.php?id='.$product["id"].'">
                                        Видеокарта '.$product["model"].'
                                    </a>
                                </span>
                                </div>
                                <div class="discription">
                                    '.$product["discription"].'
                                </div> 
                                <div class="tovar-desc-el buyAndPrice">
                                    <div class="inStock"> в наличии '.$product["count"].'</div> 
                                    <div class="price">'.$product["price"].' p</div>
                                    <button type="submit" class="buy" " value="'.$product["id"].'" ><a href="#" >'.$text.'</a></button>
                                </div>
                                
                            </div>
                        </div>
                    ');
                    }
                ?>
                
            </div>
        </div>
    </div>
   <script src="js/hideListParametrs.js"></script>
   <script>
    function addOrder(id){
        let url = new URL('php/addOrder.php', location);
            url.searchParams.append("id", id);
        let url_string = url.toString();
        getData(url_string);
    }
    async function getData (url) {
        console.log(url);
        response = await fetch(url, {});
        if (await response.text().length > 0) {
            alert(await response.text());
        }
        
    };
    document.querySelectorAll(".buy").forEach(el =>{
        el.addEventListener("click",function (){
            this.querySelector("a").innerHTML = "В корзине";
            addOrder(this.value);
        })
    })

   </script>
</body>
</html>