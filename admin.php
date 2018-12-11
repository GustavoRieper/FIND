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
            <img id="image-logo" src="image/default/logo_blue.png">
            <form method="post" action="admin/autentication-admin.php">
                <input type="email" required placeholder="E-mail" name="email">
                <input type="password" required placeholder="Senha" name="password">
                <input type="submit" value="Login">
            </form>
            <div class="error-login">
                <span id="error">
                    Acesso do administrador<br>
                    <?php
                        if(isset($_SESSION['error'])){
                            echo("<u>Usuário ou senha incorreto.</u>");
                        }else{

                        }                        
                    ?>
                </span>
                <br>
            </div>
        </div>
    </body>
</html>