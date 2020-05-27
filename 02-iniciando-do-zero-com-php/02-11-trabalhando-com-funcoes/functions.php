<?php

function functionName($arg1, $arg2, $arg3) {
    $body = [$arg1, $arg2, $arg3];
    return $body;
}

// Argumentos opcionais vão para o fim da lista
function optionArgs($arg1, $arg2 = true, $arg3 = null) {
    $body = [$arg1, $arg2, $arg3];
    return $body;
}

function calcImc() {
    global $weight;
    global $height;

    return $weight / ($height * $height);
}

$priceBrl = function ($price) {
    return "R$ ". number_format($price, 2, ",", ".");
};

function payTotal($price) {
    global $priceBrl;
    static $total;
    $total += $price;
    return "<p>O total a pagar é " . $priceBrl($total) . "</p>";
}

function myTeam() {
    $teamNames = func_get_args();
    $teamCount = func_num_args();
    return ["members" => $teamNames, "count" => $teamCount];
}