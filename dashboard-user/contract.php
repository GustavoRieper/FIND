<?php
$page = "Perfil do Profissional";
include "../admin/connect.php";
$professional  = $_GET["id"];
include 'default/menu.php';

mysqli_set_charset($connect,'utf8'); 
$sql = "SELECT id, name, tel, profissao, endereco, num_endereco, nota FROM professional WHERE id = '$professional'"; 
$resultado = mysqli_query($connect,$sql);
$numero_linhas = mysqli_num_rows($resultado);
while ($linha = mysqli_fetch_array($resultado)){
    $id = $linha["id"];
    $name = $linha["name"];
    $tel = $linha["tel"];
    $profissao = $linha["profissao"];
    $endereco = $linha["endereco"];
    $num_endereco = $linha["num_endereco"];
    $nota = $linha["nota"];
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/request-pro.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link rel="stylesheet" type="text/css" href="css/assessments.css">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">




    
    </head>
    
    <body>
        <?php ?>
<!--
        <script>
            var UserLat = sessionStorage.getItem('UserLat');
            var UserLong = sessionStorage.getItem('UserLong');
            
        </script>
-->
   
    <div class="content" onclick="closeUser()">
            
        
            <?php
        
//                echo($professional);
            ?>
            
   </div>   
   
   
    </body>
</html>