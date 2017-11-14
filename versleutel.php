<?php
//
//$test = "qaz";
//echo $test . "->";
//$test = verSleutel($test);
//echo $test . "<br>";
//
//$test = ontSleutel($test);
//echo $test . "<br>";



function verSleutel($erin) {
    $eruit = "";
    $strlen = strlen($erin);

    for ($i = 0; $i < $strlen; $i++) {
        $een = substr($erin, $i, 1);
        $eruit .= chr(ord($een) + 1);
    }

    return $eruit;
}

function ontSleutel($erin) {
    $eruit = "";
    $strlen = strlen($erin);

    for ($i = 0; $i < $strlen; $i++) {
        $een = substr($erin, $i, 1);
        $eruit .= chr(ord($een) - 1);
    }
    return $eruit;
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

