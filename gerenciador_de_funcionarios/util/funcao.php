<?php

function convertDateToDb($data){
    if($data == "")
    return null;

    // 20/10/2000
    //array(0=> 20,1=> 10, 2=> 2000)
    $newDate = explode("/",$data);
       //array(0=> 2000,1=> 10, 2=> 20)
    $newDate = array_reverse($newDate);

    //transformar array em uma string
    //2000-10-20
    return implode("-",$newDate);

    
}
//1500,50
//1500.50
function convertDoubleToDb($value){
    $value = trim($value);
    $value = str_replace(",",".",$value);
    return $value;
}