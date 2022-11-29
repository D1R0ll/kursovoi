<?php
    session_start();
    if ($_SESSION["conn"]){
        
    }
    else{
        require 'databaseconnect.php';
        $_SESSION["conn"] = $conn;
    }
    $stmt = $_SESSION["conn"]->prepare("SELECT `img`,`model`,`id` FROM `product`");
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
        echo("<button class=".$_POST["clas"]." value='".$val["id"]."'>".$_POST["text"]."</button>");
        echo "</div>";
    }
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);
    // if ($_SESSION["conn"]){
    //     return insertProductToDeletForm($_POST["text"],$_POST["clas"]);
    // }
    // else{
    //     require 'databaseconnect.php';
    //     $_SESSION["conn"] = $conn;
    //     return insertProductToDeletForm($_POST["text"],$_POST["clas"]);
    // }
    
?>