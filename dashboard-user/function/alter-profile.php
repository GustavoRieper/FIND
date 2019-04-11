<?php
    session_start();
    $email = $_SESSION['email']; 
    include '../../admin/connect.php';

    $name       = $_POST['name'];
    $last_name  = $_POST['last_name'];
    $senha      = $_POST['senha'];
    $tel        = $_POST['tel'];
    
    $sql= mysqli_query($connect, "SELECT name, last_name, senha, tel  FROM user WHERE '$email'= email") or die (mysql_error());
    $dados = mysqli_fetch_assoc($sql);
    

    if($name!=$dados['name']){
        $update = mysqli_query($connect, "UPDATE user set name='$name' where '$email'= email");
        echo("nome Alterado<br>");
             session_start();
             $_SESSION['record'] = "1";
    }
    if($last_name!=$dados['last_name']){
        $update = mysqli_query($connect, "UPDATE user set last_name='$last_name' where '$email'= email");
        echo("Alterado<br>");
    }
    if($senha!=$dados['senha']){
        $update = mysqli_query($connect, "UPDATE user set senha='$senha' where '$email'= email");
        echo("Senha Alterado<br>");
        $_SESSION['record'] = "1";
    }
    if($senha!=$dados['tel']){
        $update = mysqli_query($connect, "UPDATE user set tel='$tel' where '$email'= email");
        echo("Senha Alterado<br>");
        $_SESSION['record'] = "1";
    }
    if($name==$dados['name'] && $last_name==$dados['last_name'] && $senha==$dados['senha'] && $tel==$dados['tel']){
        echo("Nada foi alterado");
    }
    
    header("location: ../profile.php");
?>