<?php
class User{
    function __construct($data){
        foreach($data as $key=>$value){
            $this->$key = $value;
        }
    }
}