<?php  
    session_start();
    $translateProductInputs = [
        "model"=>"название","img"=>"картинка","discription"=>"описание","price"=>"цена",
        "guarantee"=>"гарантия","graficProcessorProizvoditel"=>"Производитель графического процессора",
        "graficProcessorMaker"=>"Производитель видеокарты","graphicsProcessor"=>"Графический процессор",
        "technicalProcess"=>"техпроцесс","memoryType"=>"тип памяти",
        "videoMemoryCapacity"=>"колличесвто памяти","memoryBusBitRate"=>"memoryBusBitRate",
        "maximumMemoryBandwidth"=>"maximumMemoryBandwidth","effectiveMemoryFrequency"=>"effectiveMemoryFrequency",
        "maximumResolution"=>"максимальное разрешение","typeOfCooling"=>"тип охлаждения",
        "recommendedPowerSupply"=>"рекомендуемая мощность блока питания","connectionInterface"=>"интерфейс подключения",
        "videoConnectors"=>"разъемы подключения","count"=>"кол-во",
        "rtx"=>"Трассировака",
    ];
    if (!$conn){
        require 'databaseconnect.php';
    }
    $query = $conn->prepare("SELECT * FROM `product` limit 1 ");
    $query->execute();
    $tovari = $query->fetch(PDO::FETCH_ASSOC);
    $tovarData = [];
    if ($_POST["id"]){
        $query = $conn->prepare("SELECT * FROM `product` where `id` = '".$_POST["id"]."'");
        $query->execute();
        $tovarData = $query->fetch(PDO::FETCH_ASSOC);
    }
?>

<form class="<?php echo($_POST["clas"]);?> form" id="<?php echo($_POST["clas"]);?>">
    <?php
        foreach($tovari as $key=>$value){
            
            if ($key != 'id'){
                if ($key == 'img'){
                    $img = $tovarData[$key];
                    echo('
                    <div class="createInputWrapper">
                        <div class="svg-wrap">
                            <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M6 22h12a2 2 0 0 0 2-2V8l-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2zm7-18 5 5h-5V4zm-4.5 7a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 8.5 11zm.5 5 1.597 1.363L13 13l4 6H7l2-3z"/></svg>
                        </div> 
                        <img class="selectImg" src= img/'.$img.'>
                        <br>
                        <input class="createInput inputWithImg" type="file"  name='.$key.'>
                        <br>
                    </div>
                    ');
                    continue;
                }
                if ($key == 'rtx'){
                    $query = $conn->prepare("SELECT DISTINCT `".$key."` FROM `product`");
                    $query->execute();
                    $kategori = $query->fetchAll(PDO::FETCH_ASSOC);

                    echo('
                        <div class="createInputWrapper">
                            <select class="createInput" name="rtx">
                    ');
                    if (!$_POST["id"]) echo '<option selected disabled value="">Трассировака</option>';
                    foreach($kategori as $keyKategory=>$valueKategory){
                        if ($tovarData['rtx'] == $valueKategory[$key]) echo('<option selected value='.$valueKategory[$key].'>'.$valueKategory[$key].'</option> ');
                        else echo('<option value='.$valueKategory[$key].'>'.$valueKategory[$key].'</option> ');
                        
                    }
                    echo('
                            </select>
                        </div>
                    ');
                    continue;
                }
                if ($key == 'discription'){
                    echo('
                        <div class="createInputWrapper">
                            <textarea class="createInput" type="text" placeholder="'.$translateProductInputs[$key].'" name="'.$key.'" value="'.$tovarData[$key].'">'.$tovarData[$key].'</textarea>
                        </div>
                    ');
                    continue;   
                }
                echo('
                    <div class="createInputWrapper">
                        <input class="createInput" type="text" placeholder="'.$translateProductInputs[$key].'" name="'.$key.'" value="'.$tovarData[$key].'">
                    </div>
                ');
            }
        }
    ?>
    <div class="createInputWrapper">
        <input  class="add-button" type="submit">
    </div>
</form> 