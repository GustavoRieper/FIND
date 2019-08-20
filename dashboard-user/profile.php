<?php
$page = "Perfil";
include 'default/menu.php';
include '../admin/connect.php';

$email = $_SESSION['email']; 

$dados= mysqli_query($connect, "SELECT name, last_name, email, tel  FROM user WHERE '$email'= email") or die (mysql_error());
$nome = mysqli_fetch_assoc($dados);

?>
<!DOCTYPE html>
<html>
    <head>  
        <link rel="stylesheet" type="text/css" href="css/profile.css">
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
        <style>
            #email{
                cursor: no-drop;
            }
            #record{
                color:red;
            }
        </style>
    </head>
    
    <body>
        <div class="content" onclick="closeUser()">
            <h2 id="title2">Perfil</h2>
            <div class="box-profile">
                <div class="col1">
                    <form method="post" action="function/alter-profile.php" onsubmit="return validarSenha();" name="cadastro">
                        <div class="option">
                            <div id="box-label">
                                <label for="name">Nome<span id="obg">*</span></label>
                            </div>
                            <input type="text" id="name" name="name" value=<?php echo($nome['name']); ?> required>
                        </div>

                        <div class="option">
                            <div id="box-label">
                                <label for="last-name">Último Nome<span id="obg">*</span></label>
                            </div>
                            <input type="text" id="last-name" name="last_name" value=<?php echo($nome['last_name']); ?> required >
                        </div>

                        <div class="option">
                            <div id="box-label">
                                <label for="email">E-mail<span id="obg">*</span></label>
                            </div>
                            <input type="text" id="email" name="email" value=<?php echo($nome['email']); ?> required disabled title="Não é permitido alterar o email.">
                        </div>

                        <div class="option">
                            <div id="box-label">
                                <label for="pass">Senha<span id="obg">*</span></label>
                            </div>
                            <input type="password" id="pass" name="senha" placeholder="***********" required >
                        </div>
                        <div class="option">
                            <div id="box-label">
                                <label for="pass">Repetir Senha<span id="obg">*</span></label>
                            </div>
                            <input type="password" id="pass" name="re_senha" placeholder="***********" required >
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
                            <input type="text" id="telefone" name="tel" value="<?php echo($nome['tel']); ?>"  maxlength="15" required>
                        </div>    


                                         
                </div>
                <div class="col2">

                <div class="bottons" style="margin-left:5%;">                            
                            <input type="submit" id="register" value="Salvar">  
                            <span id="record">
                                <?php
                                    if(isset($_SESSION['record'])){
                                            echo("Dados atualizados!");
                                        }
                                ?>
                            </span>
                        </div>   
                                           
                    </form>
                </div>                          
            </div>
        </div>
    </body>
</html> 