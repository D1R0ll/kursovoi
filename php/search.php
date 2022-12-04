<?php
    require 'databaseconnect.php';
    session_start();
    if (trim($_POST["search"])!= ""){
        $request = "../index.php?search=".$_POST["search"];
        redirect($request);
    }
    else{
        redirect("../index.php");
    }
    