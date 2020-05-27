<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.03 - Funções para arrays");

/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$index = [
    "AC/DC",
    "Nirvana",
    "Alter Bridge",
];

$assoc = [
    "band_1" => "AC/DC",
    "band_2" => "Nirvana",
    "band_3" => "Alter Bridge",
];

// PARA ADICIONAR NO INÍCIO DO ARRAY ↓↓↓
// » ARRAY_UNSHIFT => Adicionar um indice no início do array index.
array_unshift($index, "", "Pearl Jam");

// » Para adicionar no início do array associativo usamos:
$assoc = ["band_4" => "Pearl Jam", "band_5" => ""] + $assoc;

// PARA ADICIONAR NO FIM DO ARRAY ↓↓↓
// » ARRAY_PUSH => Adicionar um indice no fim do array index.
array_push($index, "");

// » Para adicionar no fim do array associativo usamos:
$assoc = $assoc + ["band_6" => ""];

// PARA REMOVER O PRIMEIRO VALOR DO ARRAY
array_shift($index);
array_shift($assoc);

// PARA REMOVER O ÚLTIMO VALOR DO ARRAY
array_pop($index);
array_pop($assoc);

// PARA LIMPAR CAMPOS QUE NÃO POSSUEM VALOR
$index = array_filter($index);
$assoc = array_filter($assoc);

var_dump(
    $index,
    $assoc
);

/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);

// Inverter ordem do array porém não mantém os índices em um array_index.
$index = array_reverse($index);
$assoc = array_reverse($assoc);

// asort — Ordena um array mantendo a associação entre índices e valores.
asort($index);
asort($assoc);

// ksort — Ordena um array pelas chaves
ksort($index);
ksort($assoc);

// krsort — Ordena um array pelas chaves em ordem descrescente
krsort($index);
krsort($assoc);

// sort - Ordena um array em ordem crescente.
sort($index);
sort($assoc);

// sort - Ordena um array em ordem decrescente.
rsort($index);
rsort($assoc);

var_dump(
    $index,
    $assoc
);

/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

var_dump([
    [
        array_keys($assoc),
        array_values($assoc)
    ]
]);

if (in_array("AC/DC", $assoc)) {
    echo "<p>Cause I'm back!</p>";
}

$arrToString = implode(", ", $assoc);

echo "<p>Eu curto {$arrToString} e muitas ourtas!</p>";
echo "<p>{$arrToString}</p>";

var_dump(explode(", ", $arrToString));

/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);

$profile = [
    "name" => "Julio",
    "company" => "Nuit",
    "mail" => "jfr3itas@gmail.com"
];

$template = <<<TPL
    <article>
        <h1>{{name}}</h1>
        <p>
            {{company}} <br />
            <a href="mailto:{{mail}}" title="Enviar e-mail para {{name}}">Enviar E-mail</a>
        </p>
    </article>
TPL;

echo $template;
echo str_replace(array_keys($profile), array_values($profile), $template);

$replaces = "{{" . implode("}}&{{", array_keys($profile)) . "}}";

//var_dump(explode("&", $replaces));

echo str_replace(
    explode("&", $replaces),
    array_values($profile),
    $template
);