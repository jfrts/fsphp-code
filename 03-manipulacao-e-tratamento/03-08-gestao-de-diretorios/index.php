<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.08 - Gestão de diretórios");

/*
 * [ verificar, criar e abrir ] file_exists | is_dir | mkdir  | scandir
 */
fullStackPHPClassSession("verificar, criar e abrir", __LINE__);

$folder = __DIR__ . "/uploads";

// => Verificar se não existe e não é um diretório, caso true, criar o diretório.
if (!file_exists($folder) && !is_dir($folder)) {
    mkdir($folder, 0755);
} else {
    // => Listar todos os arquivos da pasta uploads.
    echo "<h1>/uploads</h1>",
    var_dump(scandir($folder));
}

/*
 * [ copiar e renomear ] copy | rename
 */
fullStackPHPClassSession("copiar e renomear", __LINE__);

$file = __DIR__ . "/file.txt";

var_dump(
    pathinfo($file),
    scandir($folder),
    scandir(__DIR__)
);

// => Verificar se não existe e não é um arquivo, caso true, criar e abrir um arquivo armazenado na variável $file.
if (!file_exists($file) && !is_file($file)) {
    fopen($file, 'w');
} else {
    // => Copiar o arquivo na pasta uploads mantendo o nome.
    copy($file, $folder . "/" . basename($file));

    // => Renomear o arquivo copiado para a pasta uploads para o horário atual, mantendo a extensão.
    rename(__DIR__ . "/uploads/file.txt", __DIR__ . "/uploads/". time() . "." . pathinfo($file)["extension"]);

    // => debug
    var_dump(
        filemtime($file),
        filemtime(__DIR__ . "/uploads/file.txt")
    );

    // => Renomear o arquivo da raíz  para o horário atual, mantendo a extensão.
    rename($file, __DIR__ . "/uploads/". time() . "." . pathinfo($file)["extension"]);
}

/*
 * [ remover e deletar ] unlink | rmdir
 */
fullStackPHPClassSession("remover e deletar", __LINE__);

//rmdir(__DIR__ . "/remove");

// => Criação de variáveis
$dirRemove = __DIR__ . "/remove";

// => Removendo os campos . e .. do array de itens desse diretório.
$dirFiles = array_diff(scandir($dirRemove), ['.', '..']);

// => Contando quantos itens ficaram no diretório.
$dirCount = count($dirFiles);

var_dump($dirFiles, $dirCount);

// => Verificar se o diretório está vazio
if ($dirCount > 0) {
    // => Caso não, vamos excluir os arquivos...
    echo "<h2>Clear...</h2>";

    // => Percorrendo o diretório e separando cada arquivo...
    foreach (scandir($dirRemove) as $fileItem) {
        // => Garantindo que estamos trabalhando na pasta correta.
        $fileItem = __DIR__ . "/remove/{$fileItem}";

        // => Se existe um arquivo, deletamos...
        if (file_exists($fileItem) && is_file($fileItem)) {
            unlink($fileItem);
        };
    }
} else {
    // => Caso sim, deletamos o diretório.
    rmdir($dirRemove);
}