<?php
    include 'connect.php';

    $level      = '3';
    $name       = utf8_decode($_POST['name']);
    $last_name  = utf8_decode($_POST['last_name']);
    $email      = utf8_decode($_POST['email']);
    $senha      = $_POST['senha'];
    $tel        = $_POST['tel'];

    $sql = mysqli_query($connect, "INSERT INTO user(level, name, last_name, email, senha, tel) VALUES ('$level', '$name', '$last_name', '$email', '$senha', '$tel')");
    

     session_start();
    $_SESSION['record'] = "1";
    header("location: ../index.php");





?>