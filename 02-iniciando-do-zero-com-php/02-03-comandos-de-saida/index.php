<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.03 - Comandos de saída");

/**
 * [ echo ] https://php.net/manual/pt_BR/function.echo.php
 */
fullStackPHPClassSession("echo", __LINE__);
echo "<h3>Echo: Comando de saída básico ", "<span class='tag'>#BoraProgramar</span></h3>";

$hello = "Olá mundo";
$code = "<span class='tag'>#BoraProgramar!</span>";

$day = "dia";
echo "<p>Falta 1 $day para o evento</p>"; // Variável não protegida...
echo "<p>Faltam 2 {$day}s para o evento</p>"; // Variável protegifa...

echo "<h3>{$hello}</h3>";
echo "<h4>{$hello} {$code}</h4>";
?>

<!-- HTML -->
<h4><?= $hello ;?></h4>

<?php
/**
 * [ print ] https://php.net/manual/pt_BR/function.print.php
 */
fullStackPHPClassSession("print", __LINE__);

print $hello;
print $code;

print "<h3>{$hello} {$code}</h3>";

/**
 * [ print_r ] https://php.net/manual/pt_BR/function.print-r.php
 */
fullStackPHPClassSession("print_r", __LINE__);

$array = [
    "company" => "UpInside",
    "course" => "FSPHP",
    "class" => "Comandos de saída"
];

print_r($array);
echo "<pre>", print_r($array), "</pre>"; // Printa a array mas exibe o número 1
echo "<pre>", print_r($array, true), "</pre>"; // Printa a array e não exibe o número 1

/**
 * [ printf ] https://php.net/manual/pt_BR/function.printf.php
 */
fullStackPHPClassSession("printf", __LINE__);

$article = "<article><h1>%s</h1><p>%s</p></article>";
$title = "{$hello} {$code}";
$subtitle = "Lorem ipsum dolor sit amen";

printf($article, $title, $subtitle);  // Printa formatado na tela, preenchendo os %s em ordem;
sprintf($article, $title, $subtitle); // Transforma em um return, não printa mais.

/**
 * [ vprintf ] https://php.net/manual/pt_BR/function.vprintf.php
 */
fullStackPHPClassSession("vprintf", __LINE__);

$company = "
    <article>
        <h1>Escola %s</h1>
        <p>
            Curso <b>%s</b>, aula <b>%s</b>
        </p>
    </article>
";

vprintf($company, $array);

/**
 * [ var_dump ] https://php.net/manual/pt_BR/function.var-dump.php
 */
fullStackPHPClassSession("var_dump", __LINE__);

var_dump($array);