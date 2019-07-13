<?php
    include 'connect.php';
    session_start();
    $level                      = $_SESSION['level'];
    $name                       = utf8_decode($_SESSION['name']);
    $last_name                  = utf8_decode($_SESSION['last_name']);
    $email                      = $_SESSION['email'];
    $senha                      = $_SESSION['senha'];
    $tel                        = $_SESSION['tel'];
    $profissao                  = $_SESSION['profissao'];
    $cpf                        = $_SESSION['cpf'];
    $lat                        = $_POST['lat'];
    $long                       = $_POST['lng'];
    $endereco                   = $_POST['formatted_address'];
    $num_endereco               = $_POST['street_number'];
    $nota                       = "3.0";
    $bairro                     = $_POST['sublocality'];
    $cidade                     = $_POST['cidade'];
    $estado                     = $_POST['administrative_area_level_1'];     


    $sql = mysqli_query($connect, "INSERT INTO professional VALUES (null, '$level', '$name', '$last_name', '$email', '$senha', '$tel', '$profissao', '$cpf', '$lat', '$long', '$endereco', '$bairro', '$cidade', '$estado', '$num_endereco', '$nota')") or die (mysqli_error);
    /*
    $sql = mysqli_query($connect, 
    "INSERT INTO professional(level, name, last_name, email, senha, tel, profissao, cpf, lat, long, endereco, num_endereco) 
    VALUES ($level, '$name', '$last_name', '$email', '$senha', '$tel', '$profissao', '$cpf', '$lat', '$long', '$endereco', '$num_endereco')" 
    or die (mysqli_error));
*/
     
    $_SESSION['record'] = "1";
    
    header("location: ../index.php");
     echo($level);
     echo("<br>");
     echo($name);
     echo("<br>");
     echo($last_name);
     echo("<br>");
     echo($email);
     echo("<br>");
     echo($senha);
     echo("<br>");
     echo($tel);
     echo("<br>");
     echo($profissao);
     echo("<br>");
     echo($cpf);
     echo("<br>");
     echo($lat);
     echo("<br>");
     echo($long);
     echo("<br>");
     echo($endereco);
     echo("<br>");
     echo($bairro);
     echo("<br>");
     echo($cidade);
     echo("<br>");
     echo($estado);
     echo("<br>");
     echo($num_endereco);
     echo("<br>");
   


?>
