<?php
    require_once 'pdoconfig.php';

    function redirect($url){
        header('Location: '.$url);
    }
    function cleanData($value=""){
        return  htmlspecialchars(strip_tags(stripcslashes(trim($value))));
    }
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, array(PDO::ATTR_PERSISTENT => true));
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

?>