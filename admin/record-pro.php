<?php
    include 'connect.php';
    session_start();
    $num_endereco              = $_POST['street_number'];
    $lat                        = $_POST['lat'];
    $long                        = $_POST['lng'];
    $endereco                   = $_POST['formatted_address'];
    
    $level                      = $_SESSION['level']; 
    $name                       = $_SESSION['name'];
    $last_name                  = $_SESSION['last_name'];
    $email                      = utf8_decode($_SESSION['email']);
    $senha                      = $_SESSION['senha'];
    $tel                        = $_SESSION['tel'];
    $profissao                  = $_SESSION['profissao'];
    $cpf                        = $_SESSION['cpf'];
    

    $sql = mysqli_query($connect, "INSERT INTO professional
    VALUES
    (null, '$level', '$name', '$last_name', '$email', '$senha', '$tel', '$profissao', '$cpf', '$lat', '$long', '$endereco', '$num_endereco')");
    /*
    $sql = mysqli_query($connect, 
    "INSERT INTO professional(level, name, last_name, email, senha, tel, profissao, cpf, lat, long, endereco, num_endereco) 
    VALUES ($level, '$name', '$last_name', '$email', '$senha', '$tel', '$profissao', '$cpf', '$lat', '$long', '$endereco', '$num_endereco')" 
    or die (mysqli_error));
*/
     
    $_SESSION['record'] = "1";
    
    //header("location: ../index.php");
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
    echo($num_endereco);
    echo("<br>");
   


?>
