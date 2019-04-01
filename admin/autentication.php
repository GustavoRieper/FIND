<?php
    require 'connect.php';
    
    $email  = $_POST['email'];
    $pass   = $_POST['password'];

    $autentication = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email' AND senha = '$pass'") or die (mysqli_error);
    $row = mysqli_num_rows($autentication);
    if($row > 0){
        session_start();
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['pass'] = $_POST['password'];
        header("location: ../dashboard-user");
    }else{
        $autentication = mysqli_query($connect, "SELECT * FROM professional WHERE email = '$email' AND senha = '$pass'") or die (mysqli_error);
        $row = mysqli_num_rows($autentication);
        if($row > 0){
            session_start();
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['pass'] = $_POST['password'];
            header("location: ../dashboard-pro");
        }else{
            session_start();
            $_SESSION['error'] = "1";
            header("location: ../index.php");
        }
    }

        

?>