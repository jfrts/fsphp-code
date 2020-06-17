<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.12 - Comportamentos com traits");

require __DIR__ . "/source/autoload.php";

/*
 * [ trait ] São traços de código que podem ser reutilizados por mais de uma classe. Um trait é como um compoetamento
 * do objeto (BEHAVES LIKE). http://php.net/manual/pt_BR/language.oop5.traits.php
 */
fullStackPHPClassSession("trait", __LINE__);

$user = new \Source\Traits\User(
    "Júlio",
    "Freitas",
    "cursos@teste.com.br"
);

$address = new \Source\Traits\Address(
    "Rua",
    100,
    "Casa A"
);

$register = new \Source\Traits\Register($user, $address);

var_dump($register);

$cart = new \Source\Traits\Cart();

$cart->add(1, "FSPHP", 5, 2000);
$cart->add(2, "Laradev", 1, 997);
$cart->remove(1, 1);

$cart->checkout($user, $address);

var_dump($cart);