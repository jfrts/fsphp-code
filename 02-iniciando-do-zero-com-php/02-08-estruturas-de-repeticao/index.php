<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.08 - Estruturas de repetição");

/*
 * [ while ] https://php.net/manual/pt_BR/control-structures.while.php
 * [ do while ] https://php.net/manual/pt_BR/control-structures.do.while.php
 */
fullStackPHPClassSession("while, do while", __LINE__);

// WHILE => Enquanto a condição for verdadeira, faça:
$looping = 0;
$while = [];

while ($looping <= 12) {
    $while[] = $looping;
    $looping++;
}

var_dump($while);

// DO WHILE => Faça uma ação, depois verifique a condição, se ela for verdadeira, repita.
$looping = 12;
$while = [];

do {
    $while[] = $looping;
    $looping--;
} while ($looping >= 0);

var_dump($while);

/*
 * [ for ] https://php.net/manual/pt_BR/control-structures.for.php
 */
fullStackPHPClassSession("for", __LINE__);

// FOR => Repetição de forma rápida, usável quando temos total controle de quantas iterações precisaremos.
for ($i = 1; $i <= 10; $i++) {
    echo "<p>{$i}</p>";
}

/**
 * [ break ] https://php.net/manual/pt_BR/control-structures.break.php
 * [ continue ] https://php.net/manual/pt_BR/control-structures.continue.php
 */
fullStackPHPClassSession("break, continue", __LINE__);

// BREAK AND CONTINUE => Usado para controlar fluxo dentro de algum laço de repetição;
for ($c = 1; $c <= 10; $c++) {
    if ($c % 2 == 0) {
        continue;
    }

    if ($c > 7) {
        break;
    }
    echo "<p>Pulou +2 :: {$c}</p> ";
}

/**
 * [ foreach ] https://php.net/manual/pt_BR/control-structures.foreach.php
 */
fullStackPHPClassSession("foreach", __LINE__);

$array = [];
for ($ar = 0; $ar < 5; $ar++) {
    $array[] = $ar;
}

var_dump($array);

foreach ($array as $item) {
    var_dump($item);
}

foreach ($array as $key => $value) {
    var_dump("{$key} = {$value}");
}