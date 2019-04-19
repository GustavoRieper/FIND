<?php
include "../../admin//connect.php";
session_start();
$filter = $_SESSION['pro'];

if(isset($_POST["content"]) && $_POST["content"] == "all"){
    $arrayPontos=array();

    //$sql = mysqli_query($connect, "SELECT * FROM professional");
    $sql = mysqli_query($connect, "SELECT * FROM professional WHERE profissao = '$filter'");
    while($row=mysqli_fetch_array($sql)){
        $arrayPontos[]=$row;
    }
    //return(json_encode($arrayPontos));
    echo(json_encode($arrayPontos));
    
}