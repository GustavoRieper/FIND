<?php
    include 'connect.php';

    $level      = '2';
    $name       = utf8_decode($_POST['name']);
    $last_name  = utf8_decode($_POST['last_name']);
    $email      = utf8_decode($_POST['email']);
    $senha      = $_POST['senha'];
    $tel        = $_POST['tel'];
    $profissao  = utf8_decode($_POST['profissao']);
    $cpf        = $_POST['cpf'];
    $cep        = $_POST['cep'];
    $rua        = utf8_decode($_POST['rua']);
    $bairro     = utf8_decode($_POST['bairro']);
    $cidade     = utf8_decode($_POST['cidade']);
    $uf         = utf8_decode($_POST['uf']);

    $sql = mysqli_query($connect, "INSERT INTO pro(level, name, last_name, email, senha, tel, profissao, cpf, cep, rua, bairro, cidade, uf) VALUES ('$level', '$name', '$last_name', '$email', '$senha', '$tel', '$profissao', '$cpf', '$cep', '$rua', '$bairro', '$cidade', '$uf')");
    

     session_start();
    $_SESSION['record'] = "1";
//    header("location: ../index.php");


$rua = str_replace(' ',  '+', 'Avenida Atlantica');
$numero = '1702';
$cidade = str_replace(' ', '+', 'Rio de Janeiro');
$pais = 'BR';
 
$url = 'http://maps.google.com.br/maps/api/geocode/json?address=';
$url .= "$numero+$rua,+$cidade,+$pais&sensor=false";
 
$c = curl_init();
curl_setopt($c, CURLOPT_URL, $url);
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
$conteudo = curl_exec($c);
curl_close($c);
 
$json = json_decode($conteudo, false);
 
print_r($conteudo);
 
echo 'latitude: ', $json->results[0]->geometry->location->lat, "\n";
echo 'longitude: ', $json->results[0]->geometry->location->lng;
?>
