<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.09 - Closures e generators");

/*
 * [ closures ] https://php.net/manual/pt_BR/functions.anonymous.php
 */
fullStackPHPClassSession("closures", __LINE__);

// CLOSURES => São as funções anônimas!
$myAge = function ($year) {
  $age = date("Y") - $year;

  return "<p>Você tem {$age} anos!</p>";
};

echo $myAge(1994);
echo $myAge(2002);
echo $myAge(1996);
echo $myAge(1972);
echo $myAge(1978);

$priceBrl = function ($price) {
  return "R$ ". number_format($price, 2, ",", ".");
};
echo "<p>O projeto custa {$priceBrl(3600)}. Vamos fechar?</p>";

$myCart = [];
$myCart["total_price"] = 0;
$cartAdd = function ($item, $qtd, $price) use (&$myCart) {
    $myCart[$item] = $qtd * $price;
    $myCart["total_price"] += $myCart[$item];
};

$cartAdd("HTML5", 1, 497);
$cartAdd("jQuery", 2, 497);
$cartAdd("Laradev", 1, 997);

var_dump($myCart, $cartAdd);
/*
 * [ generators ] https://php.net/manual/pt_BR/language.generators.overview.php
 */
fullStackPHPClassSession("generators", __LINE__);

// GENERATOR => Iterar com qualquer objeto sem usar recursos de memória do servidor.


// Código sem generator
$iterator = 1000;

function showDates($days) {
    $saveDate = [];

    for ($day = 1; $day < $days; $day++) {
        $saveDate[] = date("d/m/Y", strtotime("+{$day}days"));
    }
    return $saveDate;
}

echo "<div style='text-align: center'>";
foreach (showDates(0) as $date) {
    echo "<small class='tag'>{$date}</small>";
}
echo "</div>";


// Código com generator
function generatorDate($days) {
    for ($day = 1; $day < $days; $day++) {
        yield date("d/m/Y", strtotime("+{$day}days"));
    }
}

echo "<div style='text-align: center'>";
foreach (generatorDate(400) as $date) {
    echo "<small class='tag'>{$date}</small>";
}
echo "</div>";