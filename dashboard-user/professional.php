<?php
$page = "Início";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/professional.css">
        <link rel="stylesheet" type="text/css" href="../css/register.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>
    
    <body onload="getLocation()">
        <?php include 'default/menu.php';?>
        <div class="content" >
            <div class="box1">
                <img src="image/perfil.jpg">
                <div class="info">
                    <h2>Nome do Profissional</h2>
                    <span>*****</span>
                    
                    <form>
                        <div id="box_p">
                            <div class="option">
                                <div id="box-label">
                                    <label for="name">Telefone</label>
                                </div>
                                <input type="text" id="name" name="name" disabled value="(47) 0000-0000">
                            </div>
                            <div class="option">
                                <div id="box-label">
                                    <label for="name">Email</label>
                                </div>
                                <input type="text" id="name" name="name" disabled value="endereco@email.com.br">
                            </div>
                        </div>
                        <div class="option">
                            <div id="box-label">
                                <label for="name">Endereço</label>
                            </div>
                            <input type="text" id="endereco" name="name" disabled value="Rua Inácio de Oliveira, Itaum, Joinville - SC">
                        </div>
                    </form>
                </div>                
            </div>
            
            <div class="box2">
                <div id="map"></div>
                
                
            </div>
        </div>
    </body>
</html>