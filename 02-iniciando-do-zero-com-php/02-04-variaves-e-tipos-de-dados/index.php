<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.04 - Variáveis e tipos de dados");

/**
 * [tipos de dados] https://php.net/manual/pt_BR/language.types.php
 * [ variáveis ] https://php.net/manual/pt_BR/language.variables.php
 */
fullStackPHPClassSession("variáveis", __LINE__);

// camelCase e em inglês
$userFirstName = "Júlio";
$userLastName = "Freitas";

echo "<h3>{$userFirstName} {$userLastName}</h3>";

$userAge = 25;

echo "<p>{$userFirstName} {$userLastName} tem ${userAge} anos.</p>";

// Variável variável
$company = "UpInside";
$$company = "Treinamentos";
echo "<h2>{$company} {$UpInside}</h2>";

// Referência
$calcA = 10;
$calcB = 20;
$calcB = &$calcA;
$calcB = 30;

var_dump([
    "a" => $calcA,
    "b" => $calcB
]);

/**
 * [ tipo boleano ] true | false
 */
fullStackPHPClassSession("tipo boleano", __LINE__);

$true = true;
$false = false;
var_dump($true, $false);

// Algumas rotinas que também retornar booleanos
$bestAge = ($userAge > 40);
var_dump($bestAge);

$a = 0;
$b = 0.0;
$c = "";
$d = [];
$e = null;

var_dump($a, $b, $c, $d, $e);

if ($a || $b || $c || $d || $e) {
    var_dump(true);
} else {
    var_dump(false);
}

/**
 * [ tipo callback ] call | closure
 */
fullStackPHPClassSession("tipo callback", __LINE__);

// Variáveç que retorna uma rotina ou um valor.

$code = "<article><h1>Um Call User Function!</h1></article>";

// strip_tags -> eliminar códigos html da string;
$codeClear = call_user_func("strip_tags", $code);
var_dump($code, $codeClear);

// Closures
$codeMore = function($code) {
    var_dump($code);
};

$codeMore("#BoraProgramar!");

/**
 * [ outros tipos ] string | array | objeto | numérico | null
 */
fullStackPHPClassSession("outros tipos", __LINE__);

$string = "Olá mundo!";
$array = array($string); // ou []
$object = new StdClass();
$object->hello = $string;
$null = null;
$int = 150;
$float = 150.5;

var_dump([
    $string,
    $array,
    $object,
    $null,
    $int,
    $float
]);
