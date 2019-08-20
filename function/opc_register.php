<?php
    session_start();
    session_destroy(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>VIUO - Registrar</title>
        <link rel="stylesheet" type="text/css" href="../css/opc_register.css">
    </head>
    
    <body>
        <div class="box-register">
            <a href="../index.php" id="back">Voltar ao login</a>
            <a href="register-user.php">
                <div class="user">
                    <div class="row1">
                        <img id="img" src="../image/default/user.gif">
                    </div>
                    <div class="row2">
                        <h1 id="title">Usuário</h1>
                        <p id="desc">Você pode contratar qualquer profissional da sua região, basta procurar de acordo com sua localização.</p>
                    </div>
                </div>
            </a>
            <a href="register-pro.php">
                <div class="pro">
                    <div class="row1">
                        <img src="../image/default/pro.gif">
                    </div>
                    <div class="row2">
                        <h1 id="title">Profissional</h1>
                        <p id="desc">Cadastre-se e fique visível para todas as pessoas que presisam de seus serviços na sua região.</p>
                    </div>
                </div>
            </a>
        </div>
    </body>

</html>