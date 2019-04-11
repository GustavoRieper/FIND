<?php
include "../../admin//connect.php";

    /* Profissionais em Lista */
$filter       = $_POST['profissao'];

mysqli_set_charset($connect,'utf8'); 
$sql = "SELECT * FROM professional WHERE profissao = '$filter' ORDER BY name ASC";
$resultado = mysqli_query($connect,$sql);
$numero_linhas = mysqli_num_rows($resultado);
while ($linha = mysqli_fetch_array($resultado)){
    session_start();
    $_SESSION['name-pro'] = $linha["name"];
    $_SESSION['lastName-pro'] = $linha["last_name"];
    $_SESSION['profissao-pro'] = $linha["profissao"];
    //echo("$name, $last_name, $profissao <br>");
    
}header("location: ../request-pro.php");