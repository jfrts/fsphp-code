<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.10 - Requisição de arquivos");

/*
 * [ include ] https://php.net/manual/pt_BR/function.include.php
 * [ include_once ] https://php.net/manual/pt_BR/function.include-once.php
 */
fullStackPHPClassSession("include, include_once", __LINE__);

// INCLUDE => Representa algo que querenos incluir, mas não é necessário para o funcionamento da aplicação.
//include "header.php";
include __DIR__ . "/header.php";

$profile = new stdClass();
$profile->name = "Júlio";
$profile->company = "Nuit";
$profile->email = "nuit.dev@gmail.com";
include __DIR__ . "/profile.php";

var_dump($profile);

$profile = new stdClass();
$profile->name = "Robson";
$profile->company = "UpInside";
$profile->email = "cursos@upinside.com.br";
include_once __DIR__ . "/profile.php";

var_dump($profile);

/*
 * [ require ] https://php.net/manual/pt_BR/function.require.php
 * [ require_once ] https://php.net/manual/pt_BR/function.require-once.php
 */
fullStackPHPClassSession("require, require_once", __LINE__);

// REQUIRE => Incluir e afirmar a obrigatoriedade do arquivo para a aplicação funcionar.

require __DIR__ . "/config.php";
require_once __DIR__ . "/config.php";

echo "<h1>" . COURSE . "</h1>";

var_dump(require __DIR__ . "/config.php");
var_dump(require_once __DIR__ . "/config.php");

