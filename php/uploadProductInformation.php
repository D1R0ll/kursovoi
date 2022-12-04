<?php
if (!$conn){
    require 'databaseconnect.php';
}
    
    session_start();

    $products = $conn->prepare("SELECT * FROM `product`");
    $products->execute();
?>

    <thead>
        <?php
            $products = $conn->prepare("SELECT * FROM `product`");
            $products->execute();
            foreach($products->fetch(PDO::FETCH_ASSOC) as $key=>$value){
                echo("<th>".$key."</th>");
            }
        ?>
    </thead>    
    <tbody>
        <?php
            $products = $conn->prepare("SELECT * FROM `product`");
            $products->execute();
            foreach($products->fetchAll(PDO::FETCH_ASSOC) as $key=>$value){
                echo("<tr>");
                foreach($value as $name=>$val){
                    echo("<td>".$val."</td>");
                }
                echo("</tr>");
            }
        ?>
    </tbody>

