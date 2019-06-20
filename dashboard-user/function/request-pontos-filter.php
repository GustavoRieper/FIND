<?php
include "../../admin//connect.php";
session_start();
$filter1 = $_SESSION['pro'];
$filter2 = $_SESSION['cidade'];
$filter3 = $_SESSION['bairro'];

if(isset($_POST["content"]) && $_POST["content"] == "all"){
    $arrayPontos=array();

    //$sql = mysqli_query($connect, "SELECT * FROM professional");
    $sql = mysqli_query($connect, "SELECT * FROM professional WHERE profissao='$filter1' AND cidade='$filter2' AND bairro='$filter3' ");
    while($row=mysqli_fetch_array($sql)){
        $arrayPontos[]=$row;
    }
    //return(json_encode($arrayPontos));
    echo(json_encode($arrayPontos));
    
}