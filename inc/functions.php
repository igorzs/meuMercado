<?php

function clean($data) {
    $data = str_replace("'", "", $data);
    $data = ltrim($data);
    $data = rtrim($data);
    return $data;
}

function validaAlphaNumerico($str) {
    $arrayStringsFail = array("'"," ","/","'","#","+","&","*","(",")","%","$","¨","-","¨","=","{", "}", "[", "]",'\/','\\');

    foreach ($arrayStringsFail as $key => $value) {

        $searchFail = strpos($str, $value);
        if ($searchFail === false) {
        } else {

            return 0;
        }

    }
    return 1;
}

function convertCoin($coin) {


    $coin = number_format($coin, 2, ',', '.');
    $coin = $coin;
    return "$coin";
}

?>