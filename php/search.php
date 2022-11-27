<?php
    require 'databaseconnect.php';
    session_start();
    if (trim($_POST["search"])!= ""){
        $request = "../magazin.php?search=".$_POST["search"];
        redirect($request);
    }
    else{
        redirect("../magazin.php");
    }
    