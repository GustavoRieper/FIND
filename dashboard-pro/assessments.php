<?php
include 'default/menu.php';
$page = "Perfil";
include '../admin/connect.php';

$email = $_SESSION['email']; 

$dados= mysqli_query($connect, "SELECT name, last_name, nota FROM professional WHERE '$email'= email") or die (mysql_error());
$nome = mysqli_fetch_assoc($dados);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/assessments.css">
    </head>
    
    <body>
        
        <div class="content" onclick="closeUser()">
            
            <div class="bloco-stars">
                <h2>Sua avaliação <b><?php echo($nome['name']); ?> <?php echo($nome['last_name']); ?></b></h2>
                <?php
                    $full_stars = "<i class='fas fa-star'></i>";
                    $half_stars = "<i class='fas fa-star-half-alt'></i>";
                
                if($nome['nota']<="1.0"){
                    echo($full_stars);
                   }
                else if($nome['nota']>"1.0" && $nome['nota']< "1.6"){
                     echo($full_stars . $half_stars);
                    }
                else if($nome['nota']>"1.6" && $nome['nota']< "2.1"){
                     echo($full_stars . $full_stars);
                    }
                else if($nome['nota']>"2.1" && $nome['nota']< "2.6"){
                     echo($full_stars . $full_stars . $half_stars);
                    }
                else if($nome['nota']>"2.5" && $nome['nota']< "3.1"){
                     echo($full_stars . $full_stars . $full_stars);
                    }
                else if($nome['nota']>"3.1" && $nome['nota']< "3.6"){
                    echo($full_stars . $full_stars . $full_stars . $half_stars);
                    }
                else if($nome['nota']>"3.5" && $nome['nota']< "4.1"){
                     echo($full_stars . $full_stars . $full_stars . $full_stars);
                    }
                else if($nome['nota']>"4.1" && $nome['nota']< "4.6"){
                     echo($full_stars . $full_stars . $full_stars . $full_stars . $half_stars);
                    }
                else if($nome['nota']>"4.5" && $nome['nota']< "5.1"){
                     echo($full_stars . $full_stars . $full_stars . $full_stars . $full_stars);
                    }
                
                ?>
                
                
                
            </div>
        </div>
    </body>
</html>