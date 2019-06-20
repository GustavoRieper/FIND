<?php
//include "../admin/connect.php";
//
//session_start();
//$level      = '2';
//$name       = $_POST['name'];
//$last_name  = $_POST['last_name'];
//$email      = $_POST['email'];
//$senha      = $_POST['senha'];
//$tel        = $_POST['tel'];
//$profissao  = $_POST['profissao'];
//$cpf        = $_POST['cpf'];
//
//$_SESSION['level']          = $level;
//$_SESSION['name']           = $name;
//$_SESSION['last_name']      = $last_name;
//$_SESSION['email']          = $email ;
//$_SESSION['senha']          = $senha;
//$_SESSION['tel']            = $tel ;
//$_SESSION['profissao']      = $profissao;
//$_SESSION['cpf']            = $cpf;
//
//if(isset($_SESSION['email'])){
//    //header("location: register-pro.php");
//}
?>

<html>
    <head>
        <title>VIUO - Registro</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/register.css">
        <style type="text/css" media="screen">
            .map_canvas { float: left; }
            fieldset { width: 320px; margin-top: 20px}
            fieldset label { display: block; margin: 0.5em 0 0em; }
            fieldset input { width: 95%; }
                #examples a {
                text-decoration: underline;
                }

                #geocomplete { 
                    width: 100%;
/*                    position: absolute;*/
                }
                .busca{
/*                    margin-top: -80px;*/
                    width: 100%;
                }
                #desc{
                    font-family: 'Raleway', sans-serif;
                    position:absolute;
                    margin-top:-60px;
                    color:#929292;
                }

                .map_canvas { 
                width: 600px; 
                height: 400px; 
                margin: 10px 20px 10px 0;
                }

                #multiple li { 
                cursor: pointer; 
                text-decoration: underline; 
                }
        </style>
    </head>

<body>
    <div class="box-register" style="z-index: 5;">
        <form action="" method="post" name="cadastro" >
        <div id="busca">
            <input id="geocomplete" type="text" placeholder="Informe seu Endereço e o número da residência" autocomplete="off" autofocus style="border-color:RED;"/>
            
            <br>
            <br>
<!--            <span id="desc">Ex: Rua Inácio de Oliveira, 350, Itaum, Joinville - SC, Brasil</span>-->
            <!--<input id="other" type="text" placeholder="Type in a value" value="" />-->
        </div>
        
<!--
            <fieldset >
                <label >Numero<span id="obg">*</span></label>
                <input name="street_number" type="text" value="" required>
        <div class="box" style="width: 305px; height: 170px; position: absolute; background-color: white; opacity: 0.0;"></div> 
                <label>Endereço Localizado</label>
                <input name="formatted_address" type="text" value="" required>
                

                <label>Latitude</label>
                <input name="lat" type="text" value="" required>

                <label>Longitude</label>
            <input name="lng" type="text" value="" required>
           
            </fieldset>
        
-->
            
        <br><br><br><br><br><br><br><br>

        </form>

        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBJwO9baL-pMt1EN4PWu5LHw6KJu0lXGc4&amp;sensor=false&amp;libraries=places"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/geocomplete/1.7.0/jquery.geocomplete.js"></script>

        <script>
        $(function(){
            $("#geocomplete").geocomplete({
            map: ".map_canvas",
            details: "form",
            blur: true,
            geocodeAfterResult: true
            });

            $("#find").click(function(){
            $("#geocomplete").trigger("geocode");
            });
        });
        </script>
        <div class="col2"style="display:none">
        <div class="map_canvas"></div>
        </div>
    </div>

</body>


</html>