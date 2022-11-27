<?php
    require 'databaseconnect.php';
    session_start();
    $request = "magazin.php?";
    var_dump($_POST);
    foreach($_POST as $key => $value){
        if (gettype($value) == 'array'){
               
            if ($value[0] != ""){
                
                $request.= $key."=";
                foreach($value as $el){
                    $request .= $el."-";
                }
                $request = substr($request,0,-1);
                $request.= "&";            
            }

        }
        else{
            $request.= $key."=".$value."&";
        }
    }
    $request = "http://localhost/верстка/".substr($request,0,-1);
    redirect($request);
    echo($request);
    // echo($request);
    // redirect($request);
?>