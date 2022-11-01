<?php
    require_once 'pdoconfig.php';
    
    function redirect($url){
        header('Location: '.$url);
    }
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, array(PDO::ATTR_PERSISTENT => true));
        $_SESSION = [];

    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

?>