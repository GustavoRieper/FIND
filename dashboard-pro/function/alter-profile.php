<?php
    session_start();
    $email = $_SESSION['email']; 
    include '../../admin/connect.php';

    $name               = utf8_decode($_POST['name']);
    $last_name          = utf8_decode($_POST['last_name']);
    $senha              = $_POST['senha'];
    $tel                = $_POST['tel'];
    $endereco           = utf8_decode($_POST['endereco']);
    $num_endereco       = utf8_decode($_POST['num_endereco']);
    

    $sql= mysqli_query($connect, "SELECT name, last_name, senha, tel, endereco, num_endereco FROM professional WHERE '$email'= email") or die (mysql_error());
    $dados = mysqli_fetch_assoc($sql);
    

    if($name!=$dados['name']){
        $update = mysqli_query($connect, "UPDATE professional set name='$name' where '$email'= email");
        echo("nome Alterado<br>");
             session_start();
             $_SESSION['record'] = "1";
    }
    if($last_name!=$dados['last_name']){
        $update = mysqli_query($connect, "UPDATE professional set last_name='$last_name' where '$email'= email");
        echo("Alterado<br>");
    }
    if($senha!=$dados['senha']){
        $update = mysqli_query($connect, "UPDATE professional set senha='$senha' where '$email'= email");
        echo("Senha Alterado<br>");
    }
    if($tel!=$dados['tel']){
        $update = mysqli_query($connect, "UPDATE professional set tel='$tel' where '$email'= email");
        echo("CEP Alterado<br>");
    }
    if($endereco!=$dados['endereco']){
        $update = mysqli_query($connect, "UPDATE professional set endereco='$endereco' where '$email'= email");
        echo("Endereço Alterado<br>");
    }
    if($num_endereco!=$dados['num_endereco']){
        $update = mysqli_query($connect, "UPDATE professional set num_endereco='$num_endereco' where '$email'= email");
        echo("Número do Endereço Alterado<br>");
    }
    if($name==$dados['name'] && $last_name==$dados['last_name'] && $senha==$dados['senha'] && $cep==$dados['cep'] && $rua==$dados['rua'] && $bairro==$dados['bairro'] && $cidade==$dados['cidade'] && $uf==$dados['uf']){
        echo("Nada foi alterado");
    }
    
    header("location: ../profile.php");
?>