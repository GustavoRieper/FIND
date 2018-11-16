<?php
include '../admin/connect.php';

    session_start();
    $email = $_SESSION['email']; 

$dados= mysqli_query($connect, "SELECT name, last_name FROM pro WHERE '$email'= email") or die (mysql_error());
    $nome = mysqli_fetch_assoc($dados);
    if($email == NULL){
        
//        header("location: ../index.php");
        echo "<script>alert('Email não encontrado')</script>";
    }else{
        
    }
?>