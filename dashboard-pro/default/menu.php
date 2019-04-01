<?php
include '../admin/connect.php';

    session_start();
    $email = $_SESSION['email']; 

    $dados= mysqli_query($connect, "SELECT name, last_name, profissao FROM professional WHERE '$email'= email") or die (mysql_error());
    $nome = mysqli_fetch_assoc($dados);
    if($email == NULL){
        
        echo "<script>alert('Email não encontrado')</script>";
    }else{
        
    }

    /* Nome Pagina */
    if(!isset($page)){
        $page = "Dashboard";
    }
?>
<head>
    <title>FIND - <?php echo($page); ?></title>
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script>
    function contentUser() {
        var contentUser = document.getElementById("contentUser");
        if(contentUser.style.display == "block"){
           contentUser.style.display = "none";
        }else{
            contentUser.style.display = "block"; 
        } 
    }
    function closeUser(){
        var contentUser = document.getElementById("contentUser");
        if(contentUser.style.display == "block"){
           contentUser.style.display = "none";
        }
    }
    </script>

</head>
<div class="menu">
    <div class="pro">
        <h2 id="profissao"><?php echo($nome['profissao']); ?></h2>
    </div>
    <div class="logo">
        <img src="../image/default/ico_branco.png">
    </div>
    <div class="content-nav">
        <nav>
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i>Início</a></li>
                <li><a href="profile.php"><i class="fas fa-user-cog"></i>Perfil</a></li>
                <li><a href="#"><i class="fas fa-briefcase"></i>Negócios</a></li>
            </ul>
        </nav>
        <div class="user">
            <img src="image/default/user.png" onclick="contentUser()">
            <div class="content-user" id="contentUser">
                <ul>
                    <li><?php echo($nome['name']); ?> <?php echo($nome['last_name']); ?></li>
                    <li><?php echo($email); ?></li>
                    <li><a id="logout" href="../function/logout.php"><i class="fas fa-sign-out-alt"></i>Sair</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>