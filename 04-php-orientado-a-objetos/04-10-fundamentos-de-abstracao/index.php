<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.10 - Fundamentos da abstração");

require __DIR__ . "/source/autoload.php";

/*
 * [ superclass ] É uma classe criada como modelo e regra para ser herdada por outras classes,
 * mas nunca para ser instanciada por um objeto.
 */
fullStackPHPClassSession("superclass", __LINE__);

$julio = new \Source\App\User("Júlio", "Freitas");
//$account = new \Source\Bank\Account(
//    1600,
//    22345,
//    $julio,
//    1000
//);

var_dump($julio);

/*
 * [ especialização ] É uma classe filha que implementa a superclasse e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.a", __LINE__);

$saving = new \Source\Bank\AccountSaving(
  1655,
  22345,
  $julio,
  0
);

var_dump($saving);

$saving->deposit(1500);
$saving->withdraw(548.25);

$saving->extract();
$saving->withdraw(1000);

/*
 * [ especialização ] É uma classe filha que implementa a superclass e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.b", __LINE__);

$current = new \Source\Bank\AccountCurrent(
    1655,
    223456,
    $julio,
    1000,
    1000
);

var_dump($current);

$current->deposit(1000);
$current->withdraw(2300);

$current->extract();