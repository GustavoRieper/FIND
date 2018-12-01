<?php
    session_start();
    $email = $_SESSION['email']; 
    include '../../admin/connect.php';

    $name       = utf8_decode($_POST['name']);
    $last_name  = utf8_decode($_POST['last_name']);
    $senha      = $_POST['senha'];
    $cep        = $_POST['cep'];
    $rua        = utf8_decode($_POST['rua']);
    $bairro     = utf8_decode($_POST['bairro']);
    $cidade     = utf8_decode($_POST['cidade']);
    $uf         = utf8_decode($_POST['uf']);
    
    $sql= mysqli_query($connect, "SELECT name, last_name, senha, cep, rua, bairro, cidade, uf FROM pro WHERE '$email'= email") or die (mysql_error());
    $dados = mysqli_fetch_assoc($sql);
    

    if($name!=$dados['name']){
        $update = mysqli_query($connect, "UPDATE pro set name='$name' where '$email'= email");
        echo("nome Alterado<br>");
             session_start();
             $_SESSION['record'] = "1";
    }
    if($last_name!=$dados['last_name']){
        $update = mysqli_query($connect, "UPDATE pro set last_name='$last_name' where '$email'= email");
        echo("Alterado<br>");
    }
    if($senha!=$dados['senha']){
        $update = mysqli_query($connect, "UPDATE pro set senha='$senha' where '$email'= email");
        echo("Senha Alterado<br>");
    }
    if($cep!=$dados['cep']){
        $update = mysqli_query($connect, "UPDATE pro set cep='$cep' where '$email'= email");
        echo("CEP Alterado<br>");
    }
    if($rua!=$dados['rua']){
        $update = mysqli_query($connect, "UPDATE pro set rua='$rua' where '$email'= email");
        echo("Rua Alterado<br>");
    }
    if($bairro!=$dados['bairro']){
        $update = mysqli_query($connect, "UPDATE pro set bairro='$bairro' where '$email'= email");
        echo("Bairro Alterado<br>");
    }
    if($cidade!=$dados['cidade']){
        $update = mysqli_query($connect, "UPDATE pro set cidade='$cidade' where '$email'= email");
        echo("Cidade Alterado<br>");
    }
    if($uf!=$dados['uf']){
        $update = mysqli_query($connect, "UPDATE pro set uf='$uf' where '$email'= email");
        echo("UF Alterado<br>");
    }
    if($name==$dados['name'] && $last_name==$dados['last_name'] && $senha==$dados['senha'] && $cep==$dados['cep'] && $rua==$dados['rua'] && $bairro==$dados['bairro'] && $cidade==$dados['cidade'] && $uf==$dados['uf']){
        echo("Nada foi alterado");
    }
    
    header("location: ../profile.php");
?>