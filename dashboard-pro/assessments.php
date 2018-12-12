<?php
include 'default/menu.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/assessments.css">
    </head>
    
    <body>
        <div class="content" onclick="closeUser()">
            <div class="bloco-stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <i class="far fa-star"></i>
                <br>
                <h2>Parabéns <b><?php echo($nome['name']); ?> <?php echo($nome['last_name']); ?></b> sua avaliação é <b>boa.</b></h2>
                
            </div>
        </div>
    </body>
</html>