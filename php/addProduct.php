<?php
    require 'databaseconnect.php';
    session_start();

    $columns = "";
    $values = "";
    foreach($_POST as $key=>$value){
        $columns.="`".$key."`, ";
        $values .= ":".$key.", ";
    }
    $columns .= "`img`";

        $file = $_FILES["img"];
       
        $path =  dirname(__DIR__,1).'/img/';

        $fileExt = end(explode('.', $file['name']));
    
        $fileName = uniqid('image_') . "." . $fileExt;
        try {
            if ($file["name"] == "") {
                $fileName = null;
            }
            $values.=":img";

            $sql = "INSERT INTO `product` (".$columns.") VALUES (".$values.")";

            $stmt = $conn->prepare($sql);
            $_POST["img"] = $fileName;
            $stmt->execute($_POST);
            move_uploaded_file($file['tmp_name'], $path.$fileName);
            echo("Товар добавлен!");
            
        } catch (Exception $e) {
            echo "Товар не добавлен ".($e->getMessage());
        }