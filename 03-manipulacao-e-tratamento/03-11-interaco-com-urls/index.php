<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.11 - Interação com URLs");

/*
 * [ argumentos ] ?[&[&][&]]
 */
fullStackPHPClassSession("argumentos", __LINE__);

echo "<h1><a href='index.php'>Clear</a></h1>";
echo "<p><a href='index.php?arg1=true&arg2=true'>Argumentos</a></p>";

var_dump($_GET);

$data = [
    "name" => "Julio",
    "company" => "CompanyTest",
    "mail" => "mail@test.com",
];


$arguments = http_build_query($data);
echo "<p><a href='index.php?{$arguments}'>Args By Array</a></p>";
var_dump($data, $arguments);

$object = (object)$data;
var_dump(
    $object,
    http_build_query($object),
);

/*
 * [ segurança ] get | strip | filters | validation
 * [ filter list ] https://php.net/manual/en/filter.filters.php
 */
fullStackPHPClassSession("segurança", __LINE__);

$dataPosFilter = http_build_query([
    "name" => "Julio",
    "company" => "CompanyTest",
    "mail" => "mail@test.com",
    "site" => "website.com.br",
    "script" => "<script>alert('js');</script>"
]);

echo "<p><a href='index.php?{$dataPosFilter}'>Data Filter</a></p>";

$dataUrl = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRIPPED);

if ($dataUrl) {
    if (in_array("", $dataUrl)) {
        echo "<p class='trigger warning'>Faltam dados!</p>";
    } elseif (empty($dataUrl["mail"])) {
        echo "<p class='trigger warning'>Falta o e-mail!</p>";
    } elseif (!filter_var($dataUrl["mail"], FILTER_VALIDATE_EMAIL)) {
        echo "<p class='trigger warning'>E-mail inválido!</p>";
    } else {
        echo "<p class='trigger accept'>Tudo certo!</p>";
    }
} else {
    var_dump(false);
}

$dataPreFilter = http_build_query([
    "name" => "Julio",
    "company" => "CompanyTest",
    "mail" => "mail@test.com",
    "site" => "https://website.com.br",
    "script" => "<script>alert('js');</script>"
]);

parse_str($dataPreFilter, $arrDataPreFilter);
var_dump($dataPreFilter, $arrDataPreFilter);

$dataPreFilterValidation = [
    "name" => FILTER_SANITIZE_STRING,
    "company" => FILTER_SANITIZE_STRING,
    "mail" => FILTER_VALIDATE_EMAIL,
    "site" => FILTER_VALIDATE_URL,
    "script" => FILTER_SANITIZE_STRING,
];

var_dump(filter_var_array($arrDataPreFilter, $dataPreFilterValidation));