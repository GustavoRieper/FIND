<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FIND - Login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/index.css">
    </head>
    
    <body>
        <div class="box-login">
            <img id="image-logo" src="image/default/Logo_VIUO.png">
            <form method="post" action="admin/autentication.php">
                <input type="email" required placeholder="E-mail" name="email">
                <input type="password" required placeholder="Senha" name="password">
                <input type="submit" value="Login">
            </form>
            <form method="get" action="function/opc_register.php">
                <input type="submit" value="Registrar">
            </form>
            <div class="error-login">
                <span id="error">
                    <?php
                        if(isset($_SESSION['error'])){
                            echo("Usuário ou senha incorreto.");
                        }else{

                        }                        
                    ?>
                </span>
                <br>
                <span id="record">
                    <?php
                        if(isset($_SESSION['record'])){
                                echo("Cadastrado realizado com sucesso!");
                            }
                    ?>
                </span>
            </div>
        </div>
    </body>
</html>