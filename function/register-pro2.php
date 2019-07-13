<?php
include "../admin/connect.php";

session_start();
$level      = '2';
$name       = $_POST['name'];
$last_name  = $_POST['last_name'];
$email      = $_POST['email'];
$senha      = $_POST['senha'];
$tel        = $_POST['tel'];
$profissao  = $_POST['profissao'];
$cpf        = $_POST['cpf'];

$_SESSION['level']          = $level;
$_SESSION['name']           = $name;
$_SESSION['last_name']      = $last_name;
$_SESSION['email']          = $email ;
$_SESSION['senha']          = $senha;
$_SESSION['tel']            = $tel ;
$_SESSION['profissao']      = $profissao;
$_SESSION['cpf']            = $cpf;

if(isset($_SESSION['email'])){
    //header("location: register-pro.php");
}
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
                    width: 50%;
                    position: absolute;
                    padding-top:-100px;
                }
                .busca{
                    margin-top: -80px;
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
        
        
        
        <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
        
         <script language="JavaScript">
         function mascara(t, mask){
         var i = t.value.length;
         var saida = mask.substring(1,0);
         var texto = mask.substring(i)
         if (texto.substring(0,1) != saida){
         t.value += texto.substring(0,1);
         }
         }
         </script>

<body>
   
    <div class="box-register" style="z-index: 5;">
         <span id="info">É importante a informação de localização correta, pois através dela você será visualizado por outros usuários.</span>
        <form action="../admin/record-pro.php" method="post" name="cadastro" onsubmit="return validarcep();">
        <div id="busca" style="margin-top: -40px;">
            <input id="geocomplete" type="text" placeholder="Informe seu Endereço e o número da residência" autocomplete="off" autofocus style="border-color:RED;"/>
            
            <br>
            <br>
            <span id="desc">Ex: Rua Inácio de Oliveira, 350, Itaum, Joinville - SC, Brasil</span>
            <!--<input id="other" type="text" placeholder="Type in a value" value="" />-->
        </div>
        
            <fieldset >
                                
                <label style="font-weight: bold;">Confirme o CEP:<span id="obg">*</span></label>
                <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" required onkeypress="mascara(this, '#####-###')" /></label><br />
            
                <script>
                     function validarcep(){
                            cep = document.cadastro.cep.value;
                            postal_code = document.cadastro.postal_code.value;
                            if (cep != postal_code){ 
                                 alert("Ops... Confirmação de CEP incorreta!");
                                document.cadastro.cep.focus();
                                document.cadastro.cep.style.borderColor = "red";
                                document.cadastro.postal_code.style.borderColor = "red";
                                 return false;
                            }
                            return true;
                     }
                </script> 
            
                 <label><b>Confirme a Cidade:</b><span id="obg">*</span>
                <input name="cidade" type="text" id="cidade" size="40" required /></label>
                
                <label >Numero<span id="obg">*</span></label>
                <input name="street_number" type="text" value="" required>
        <div class="box" style="width: 305px; height: 420px; position: absolute; background-color: white; opacity: 0.0;"></div> 
                <label>Endereço Localizado</label>
                <input name="formatted_address" type="text" value="" required>
                
                <label>Bairro</label>
                <input name="sublocality" type="text" value="">
                
                <label>Cep Capturado</label>
                <input name="postal_code" type="text" value="">                
                
                <label>Estado</label>
                <input name="administrative_area_level_1" type="text" value="">
                

                <label>Latitude</label>
                <input name="lat" type="text" value="" required>

                <label>Longitude</label>
                <input name="lng" type="text" value="" required>          
                

           
            </fieldset>
        
            
        <br><br><br><br><br><br><br><br>
        <div class="bottons">
            <a href="../index.php" id="register">Voltar ao login</a>
            <a href="javascript:history.back()" id="register">Voltar</a>
            <input type="submit" id="register" value="Registrar">  
        </div>
        </form>

        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBJwO9baL-pMt1EN4PWu5LHw6KJu0lXGc4&amp;sensor=false&amp;libraries=places"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

        <script src="../JS/jquery.geocomplete.js"></script>

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
        <div class="col2">
        <div class="map_canvas"></div>
        </div>
    </div>
</body>


</html>