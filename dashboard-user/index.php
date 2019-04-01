<?php
$page = "Início";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>
    
    <body>
        <?php include 'default/menu.php';?>
        <div class="content" onclick="closeUser()">
            <div class="options">
                <div class="opc">
                    <a href="request-pro.php"><i class="fas fa-toolbox"></i>Solicitar Profissional</a>
                </div>
                <div class="opc">
                    <a href="list-user.php"><i class="fas fa-comments"></i>Avaliar profissional</a>
                </div>
                <div class="opc">
                    <a href="historic-pro.php"><i class="fas fa-book-reader"></i>Profissionais contratados</a>
                </div>                
            </div>
        </div>
    </body>
</html>