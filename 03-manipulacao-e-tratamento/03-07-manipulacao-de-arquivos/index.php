<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.07 - Manipulação de arquivos");

/*
 * [ verificação de arquivos ] file_exists | is_file | is_dir
 */
fullStackPHPClassSession("verificação", __LINE__);

$file = __DIR__ . "/file.txt";

// => Verificar se o arquivo existe e se realmente é um arquivo e não um diretório.
if (file_exists($file) && is_file($file)) {
    echo "<p>Existe</p>";
} else {
    echo "<p>Não existe</p>";
}

/*
 * [ leitura e gravação ] fopen | fwrite | fclose | file
 */
fullStackPHPClassSession("leitura e gravação", __LINE__);

// => Criando o arquivo, caso não exista.
if (!file_exists($file) || !is_file($file)) {
    $fileOpen = fopen($file, "w");
    // => Escrevendo nesse arquivo
    fwrite($fileOpen, "Linha 01" . PHP_EOL);
    fwrite($fileOpen, "Linha 02" . PHP_EOL);
    fwrite($fileOpen, "Linha 03" . PHP_EOL);
    fwrite($fileOpen, "lorem ipsum dolor sit amet." . PHP_EOL);
    fclose($fileOpen);
} else {
    var_dump(
        file($file),
        pathinfo($file)
    );
}

// => Mostrando na tela apenas o campo de índice 3 do array, ou linha 4 do arquivo.
echo "<p>" . file($file)[3] . "</p>";

// => Abrindo o arquivo para trabalhar com ele e armazenando na variável.
$open = fopen($file, "r");

// => Percorrendo por esse arquivo até o seu fim.
while (!feof($open)) {
    // => Mostrando cada linha na tela de forma separada.
    echo "<p>" . fgets($open) . "</p>";
}

// => Fechando o arquivo. SEMPRE FECHAR!!!
fclose($open);

/*
 * [ get, put content ] file_get_contents | file_put_contents
 */
fullStackPHPClassSession("get, put content", __LINE__);

// => Obter arquivo; Só funciona se o arquivo já estiver criado.
$getContents = __DIR__ . "/teste2.txt";

if (file_exists($getContents) && is_file($getContents)) {
    echo file_get_contents($getContents);
} else {
    $data = "<article><h1>Julio</h1></article>";
    file_put_contents($getContents, $data);
    echo file_get_contents($getContents);
}

if (file_exists($getContents) && is_file($getContents)) {
    unlink($getContents);
}

if (file_exists($file) && is_file($file)) {
    unlink($file);
}
