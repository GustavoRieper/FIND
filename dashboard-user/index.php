<?php
$page = "Início";
include 'default/menu.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>
    
    <body onload="getLocation()" >
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
<!--
                <p id="demo">Clique no botão para receber sua localização em Latitude e Longitude:</p>
                <button onclick="getLocation()">Clique Aqui</button>
-->

                <script>
                    var lat;
                    var long;
                    var erro;
                    function getLocation()
                    {
                        if (navigator.geolocation){
                            navigator.geolocation.getCurrentPosition(showPosition);
                        }
                        else{
                            erro = "O seu navegador não suporta Geolocalização.";
                        }
                    }
                    function showPosition(position)
                    {
                        lat = position.coords.latitude;
                        long = position.coords.longitude; 
                        sessionStorage.setItem('UserLat', lat);
                        sessionStorage.setItem('UserLong', long);
                        console.log(lat);
                        console.log(long);
                    }
                </script>
                <p id="demo"></p>
            </div>
        </div>
    </body>
</html>