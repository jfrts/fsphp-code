<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.12 - Cookies e sessões");

/*
 * [ cookies ] http://php.net/manual/pt_BR/features.cookies.php
 */
fullStackPHPClassSession("cookies", __LINE__);

/** Camada permanente da aplicação */
setcookie("fsphp", "Esse é meu cookie!", time() + 60);

$cookie = filter_input_array(INPUT_COOKIE, FILTER_SANITIZE_STRIPPED);
var_dump(
    $_COOKIE,
    $cookie
);

$time = time() + 60 * 60 * 24 * 7;
$user = [
    "user" => "root",
    "password" => 12345,
    "expire" => $time
];

setcookie(
    "fslogin",
    http_build_query($user),
    $time,
    "/",
    "localhost",
    true
);

$login = filter_input(INPUT_COOKIE, "fslogin", FILTER_SANITIZE_STRIPPED);
if ($login) {
    var_dump($login);
    parse_str($login, $user);
    var_dump($user);
}

/*
 * [ sessões ] http://php.net/manual/pt_BR/ref.session.php
 */
fullStackPHPClassSession("sessões", __LINE__);

session_save_path(__DIR__ . "/ses");
session_start();

var_dump($_SESSION, [
    "id" => session_id(),
    "name" => session_name(),
    "status" => session_status(),
    "save_path" => session_save_path(),
    "cookie" => session_get_cookie_params()
]);

$_SESSION['login'] = (object)$user;
$_SESSION['user'] = $user;

unset($_SESSION['user']);
session_destroy();
