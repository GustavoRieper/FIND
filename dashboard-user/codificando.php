<?php
include "../admin/connect.php";

mysqli_set_charset($connect,'utf8'); 
$sql = "SELECT nm_profissao FROM profissoes ORDER BY nm_profissao ASC"; 
$resultado = mysqli_query($connect,$sql);
$numero_linhas = mysqli_num_rows($resultado);
while ($linha = mysqli_fetch_array($resultado)){
    $profissao = $linha["nm_profissao"];
    echo("<option>$profissao</option>");
}


$json = '{
    "title1": {
        "key1": "value1",
        "key2": "value2",
        "key3": "value3"
    },
    "title2": {
        "key1": "value1",
        "key2": "value2",
        "key3": "value3"      
    }
}';

$decodificado = json_decode($json);

if (!$decodificado) {
    die('JSON invalido');
}

$decodificado->title1->key2 = 'Novo valor FOO';
$decodificado->title2->key1 = 'Novo valor BAR';
$decodificado->title2->key3 = 'Novo valor BAZ';

print_r($decodificado);

$codificado = json_encode($decodificado);

file_put_contents('novo.json', $codificado);