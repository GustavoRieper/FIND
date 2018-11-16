<?php
    include "../admin/connect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FIND - Registro</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/register.css">
        <link rel="script" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"/>
        <script type="text/javascript">            
            /* Máscaras ER */
            function mascara(o,f){
                v_obj=o
                v_fun=f
                setTimeout("execmascara()",1)
            }
            function execmascara(){
                v_obj.value=v_fun(v_obj.value)
            }
            function mtel(v){
                v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
                v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
                v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
                return v;
            }
            function id( el ){
                return document.getElementById( el );
            }
            window.onload = function(){
                id('telefone').onkeypress = function(){
                    mascara( this, mtel );
                }
            } 
        </script>
    </head>
    
    
    <body>
        <div class="box-register">
            <img id="image-logo" src="../image/default/logo_blue.png">
                <div class="col1">
                    <form method="post" action="../admin/record-user.php" onsubmit="return validarSenha();" name="cadastro">
                        <div class="option">
                            <div id="box-label">
                                <label for="name">Nome<span id="obg">*</span></label>
                            </div>
                            <input type="text" id="name" name="name" placeholder="Ex: Gustavo" required>
                        </div>

                        <div class="option">
                            <div id="box-label">
                                <label for="last-name">Último Nome<span id="obg">*</span></label>
                            </div>
                            <input type="text" id="last-name" name="last_name" placeholder="Ex: Rieper" required>
                        </div>
                        
                        <div class="option">
                            <div id="box-label">
                                <label for="email">E-mail<span id="obg">*</span></label>
                            </div>
                            <input type="text" id="email" name="email" placeholder="Ex: seunome@dominio.com" required>
                        </div>
                        
                        <div class="option">
                            <div id="box-label">
                                <label for="pass">Senha<span id="obg">*</span></label>
                            </div>
                            <input type="password" id="pass" name="senha" placeholder="***********" required>
                        </div>
                        <div class="option">
                            <div id="box-label">
                                <label for="pass">Repetir Senha<span id="obg">*</span></label>
                            </div>
                            <input type="password" id="pass" name="re_senha" placeholder="***********" required>
                        </div>
                        <script>
                             function validarSenha(){
                                    senha = document.cadastro.senha.value;
                                    re_senha = document.cadastro.re_senha.value;
                                    if (senha != re_senha){ 
                                         alert("Ops... Senhas diferentes!");
                                        document.cadastro.re_senha.focus();
                                        document.cadastro.re_senha.style.borderColor = "red";
                                        document.cadastro.senha.style.borderColor = "red";
                                         return false;
                                    }
                                    return true;
                             }
                        </script>                        
                        
                        
                        <div class="option">
                            <div id="box-label">
                                <label for="telefone">Telefone<span id="obg">*</span></label>
                            </div>
                            <input type="text" id="telefone" name="tel" placeholder="Ex: (47) 5555-5555"  maxlength="15" required>
                        </div>
                        <div class="bottons" style="margin-left:180px;">
                            <a href="../index.php" id="register">Voltar ao login</a>
                            <input type="submit" id="register" value="Registrar" onClick="valida()">  
                        </div>
                    </div>                    
                </form>
            </div>                          
        </div>
    </body>

</html>