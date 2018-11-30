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
            
            /* Validação de CPF */
            function valida(){
				if(valida_cpf(document.getElementById('cpf').value)){
                }else{
					alert('CPF Inválido');
                    document.cadastro.cpf.style.borderColor = "red";
                }
			}
			
			function valida_cpf(cpf){
				  var numeros, digitos, soma, i, resultado, digitos_iguais;
				  digitos_iguais = 1;
				  if (cpf.length < 11)
						return false;
				  for (i = 0; i < cpf.length - 1; i++)
						if (cpf.charAt(i) != cpf.charAt(i + 1))
							  {
							  digitos_iguais = 0;
							  break;
							  }
				  if (!digitos_iguais)
						{
						numeros = cpf.substring(0,9);
						digitos = cpf.substring(9);
						soma = 0;
						for (i = 10; i > 1; i--)
							  soma += numeros.charAt(10 - i) * i;
						resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
						if (resultado != digitos.charAt(0))
							  return false;
						numeros = cpf.substring(0,10);
						soma = 0;
						for (i = 11; i > 1; i--)
							  soma += numeros.charAt(11 - i) * i;
						resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
						if (resultado != digitos.charAt(1))
							  return false;
						return true;
						}
				  else
						return false;
			}
            
            /* Validação de CEP */
            function limpa_formulário_cep() {
                //Limpa valores do formulário de cep.
                document.getElementById('rua').value=("");
                document.getElementById('bairro').value=("");
                document.getElementById('cidade').value=("");
                document.getElementById('uf').value=("");
                document.getElementById('ibge').value=("");
            }

            function meu_callback(conteudo) {
                if (!("erro" in conteudo)) {
                    //Atualiza os campos com os valores.
                    document.getElementById('rua').value=(conteudo.logradouro);
                    document.getElementById('bairro').value=(conteudo.bairro);
                    document.getElementById('cidade').value=(conteudo.localidade);
                    document.getElementById('uf').value=(conteudo.uf);
                    document.getElementById('ibge').value=(conteudo.ibge);
                } //end if.
                else {
                    //CEP não Encontrado.
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            }

            function pesquisacep(valor) {

                //Nova variável "cep" somente com dígitos.
                var cep = valor.replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        document.getElementById('rua').value="...";
                        document.getElementById('bairro').value="...";
                        document.getElementById('cidade').value="...";
                        document.getElementById('uf').value="...";
                        document.getElementById('ibge').value="...";

                        //Cria um elemento javascript.
                        var script = document.createElement('script');

                        //Sincroniza com o callback.
                        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                        //Insere script no documento e carrega o conteúdo.
                        document.body.appendChild(script);

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
            };
        </script>
    </head>
    
    
    <body>
        <div class="box-register">
            <img id="image-logo" src="../image/default/logo_blue.png">
                <div class="col1">
                    <form method="post" action="../admin/record-pro.php" onsubmit="return validarSenha();" name="cadastro">
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
                </div>
                <div class="col2">
                        <div class="option">
                            <div id="box-label">
                                <label for="select">Profissão<span id="obg">*</span></label>
                            </div>
                            <select id="select" name="profissao" required>
                                <?php
                                    mysqli_set_charset($connect,'utf8'); 
                                    $sql = "SELECT nm_profissao FROM profissoes"; 
                                    $resultado = mysqli_query($connect,$sql);
                                    $numero_linhas = mysqli_num_rows($resultado);
                                    while ($linha = mysqli_fetch_array($resultado)){
                                        $profissao = $linha["nm_profissao"];
                                        echo("<option>$profissao</option>");
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="option">
                            <div id="box-label">
                                <label for="cpf">CPF<span id="obg">*</span></label>
                            </div>
                            <input name="cpf" type="num" id="cpf" maxlength="11" placeholder="Ex: 000.000.000.00 " required/> 
                        </div>
                    
                        <div class="option">
                            <div id="box-label">
                                <label for="cep">CEP<span id="obg">*</span></label>
                            </div>
                            <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" required/> 
                        </div>
                        
                        <div class="option">
                            <div id="box-label">
                                <label for="rua">Rua<span id="obg">*</span></label>
                            </div>
                            <input name="rua" type="text" id="rua" size="60" required/> 
                        </div>
                    
                        <div class="option">
                            <div id="box-label">
                                <label for="bairro">Bairro<span id="obg">*</span></label>
                            </div>
                            <input name="bairro" type="text" id="bairro" size="40" required/>
                        </div>
                    
                        <div class="option">
                            <div id="box-label">
                                <label for="cidade">Cidade<span id="obg">*</span></label>
                            </div>
                            <input name="cidade" type="text" id="cidade" size="40" required/>
                        </div>
                        
                        <div class="option">
                            <div id="box-label">
                                <label for="uf">Estado<span id="obg">*</span></label>
                            </div>
                            <input name="uf" type="text" id="uf" size="2" required/>
                        </div>
                        <input style="display:none;" name="ibge" type="text" id="ibge" size="8"  /> <!-- Fonte IBGE Obrigatório -->
                    
                        <div class="bottons">
                            <a href="../index.php" id="register">Voltar ao login</a>
                            <input type="submit" id="register" value="Registrar" onClick="valida()">  
                        </div>
                    </form>
                </div>                          
        </div>
    </body>

</html>