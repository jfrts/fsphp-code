<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.06 - Arrays, vetores e pilhas");

/**
 * [ arrays ] https://php.net/manual/pt_BR/language.types.array.php
 */
fullStackPHPClassSession("index array", __LINE__);

$arrayIndex = [1, 2, 3];
var_dump($arrayIndex);

$arrayIndexACDC = [
    "Brian",
    "Angus",
    "Malcolm"
];

$arrayIndexACDC[] = "Cliff";
$arrayIndexACDC[] = "Phil";

var_dump($arrayIndexACDC);

/**
 * [ associative array ] "key" => "value"
 */
fullStackPHPClassSession("associative array", __LINE__);

$arrayAssociative = [
    "vocal" => "Brian",
    "solo_guitar" => "Angus",
    "base_guitar" => "Malcolm",
    "bass_guitar" => "Cliff"
];

$arrayAssociative["drums"] = "Phil";
$arrayAssociative["rock_band"] = "AC/DC";

var_dump($arrayAssociative);

/**
 * [ multidimensional array ] "key" => ["key" => "value"]
 */
fullStackPHPClassSession("multidimensional array", __LINE__);

$brian = ["Brian", "Mic"];
$angus = ["name" => "Angus", "instruments" => "guitar"];

$integrants = [
    $brian,
    $angus
];

var_dump($integrants);

var_dump([
    "brian" => $brian,
    "angus" => $angus
]);

/**
 * [ array access ] foreach(array as item) || foreach(array as key => value)
 */
fullStackPHPClassSession("array access", __LINE__);

$acdc = [
    "band" => "AC/DC",
    "vocal" => "Brian",
    "solo_guitar" => "Angus",
    "base_guitar" => "Malcolm",
    "bass_guitar" => "Cliff",
    "drums" => "Phil"
];
echo "<p>O vocal da banda AC/DC é {$acdc['vocal']}</p>";

$pearlJam = [
    "band" => "Pearl Jam",
    "vocal" => "Eddie",
    "solo_guitar" => "Mike",
    "base_guitar" => "Stone",
    "bass_guitar" => "Jeff",
    "drums" => "Jack"
];

$rockBands = [
    "acdc" => $acdc,
    "pearl_jam" => $pearlJam
];

echo "<p>{$rockBands["pearl_jam"]["vocal"]}</p>";

foreach ($acdc as $integrant) {
    echo "<p>{$integrant}</p>";
}

foreach ($rockBands["pearl_jam"] as $key => $value) {
    echo "<p>{$value} is a {$key} of {$rockBands['pearl_jam']['band']}</p>";
}

foreach ($rockBands as $rockBand) {
    var_dump($rockBand);
    $art = "<article><h1>%s</h1><p>%s</p><p>%s</p><p>%s</p><p>%s</p><p>%s</p></article>";
    vprintf($art, $rockBand);
}