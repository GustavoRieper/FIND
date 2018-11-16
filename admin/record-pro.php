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
    header("location: ../index.php");



?>