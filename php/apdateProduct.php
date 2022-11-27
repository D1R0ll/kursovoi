<?php 
    require 'databaseconnect.php';
    session_start();

    $data = $_POST;
    $img = $_FILES["img"];

    $columns = "";
    foreach($_POST as $key=>$value){
        if ($key != "id"){
            $columns.="`".$key."` = :".$key.",";
        }
    }
    if ($img["name"] != ""){
        $columns .= "`img` = :img";
    }
    else{
        $columns = substr($columns,0,-1);
    }
    


        $file = $_FILES["img"];
         
        $path =  dirname(__DIR__, 1).'/img/';
    
        $fileExt = end(explode('.', $file['name']));  // Получили расширение файла `jpg`
    
        $fileName = uniqid('image_') . "." . $fileExt;
        try {
            if ($file["name"] != "") {
                $data["img"] = $fileName;
            }
            $sql = "UPDATE `product` SET ".$columns." WHERE `id` = :id";
            echo($sql);
            $stmt = $conn->prepare($sql);
            $stmt->execute($data);
            move_uploaded_file($file['tmp_name'], $path.$fileName);
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
