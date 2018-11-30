<?php
include '../admin/connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FIND ADM - Lista de Usuários</title>
        <link rel="stylesheet" type="text/css" href="css/list-user.css">
        <link rel="stylesheet" type="text/css" href="css/default.css">
    </head>
    <body>
        <div class="botton">
            <a href="index.php">Voltar</a>
        </div>
        <h2>Usuários cadastrados</h2>
        <div class="content">
            <div class="quantidade">
                <span>Total de usuários cadastrados:
                <b>
                    <?php
                        $result = mysqli_query($connect, "SELECT count(*) as total from user");
                        $data = mysqli_fetch_assoc($result);
                        echo $data['total'];
                        ?>
                </b>
                </span>
            </div>
            <div class="report-user">                
                <div class="users">
                    <table style="width:100%">
                      <tr>
                        <th>Nome</th>
                        <th>Email</th> 
                        <th>ID</th>
                      </tr>
                      <tr>
                        <td>
                            <?php
                                mysqli_set_charset($connect,'utf8'); 
                                $sql = "SELECT name FROM user";                         
                                $resultado = mysqli_query($connect,$sql);
                                $numero_linhas = mysqli_num_rows($resultado);
                                while ($linha = mysqli_fetch_array($resultado)){
                                    $nome = $linha["name"];
                                    echo("<option>$nome</option>");
                                } 
                            ?>                          
                        </td>
                          <td>
                            <?php
                            mysqli_set_charset($connect,'utf8'); 
                                $sql = "SELECT email FROM user";                         
                                $resultado = mysqli_query($connect,$sql);
                                $numero_linhas = mysqli_num_rows($resultado);
                                while ($linha = mysqli_fetch_array($resultado)){
                                    $email = $linha["email"];
                                    echo("<option>$email</option>");
                                }   
                            ?>
                          </td>
                          <td>
                            <?php
                            mysqli_set_charset($connect,'utf8'); 
                                $sql = "SELECT id FROM user";                         
                                $resultado = mysqli_query($connect,$sql);
                                $numero_linhas = mysqli_num_rows($resultado);
                                while ($linha = mysqli_fetch_array($resultado)){
                                    $id = $linha["id"];
                                    echo("<option>$id</option>");
                                }   
                            ?>
                          </td>
                      </tr>
                    </table>
                    
                </div>
            </div>
        </div>
    </body>
</html>