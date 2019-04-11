<?php
include "../../admin//connect.php";
if(!isset($_GET["profissao"])){
    if(isset($_POST["content"]) && $_POST["content"] == "all"){
        $arrayPontos=array();
    
        $sql = mysqli_query($connect, "SELECT * FROM professional");
        while($row=mysqli_fetch_array($sql)){
            $arrayPontos[]=$row;
        }
        //return(json_encode($arrayPontos));
        echo(json_encode($arrayPontos));
    }
}else{

}

