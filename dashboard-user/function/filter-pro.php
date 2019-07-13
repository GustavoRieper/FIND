<?php
include "../../admin//connect.php";
$filter1 = $_POST["profissao"];
$filter2 = $_POST["cidade"];
$filter3 = $_POST["bairro"];

session_start();
$_SESSION['pro'] = $filter1;
$_SESSION['cidade'] = $filter2;
$_SESSION['bairro'] = $filter3;
echo("<script>localStorage.setItem('pro','$filter1');</script>");
echo("<script>localStorage.setItem('cidade','$filter2');</script>");
echo("<script>localStorage.setItem('bairro','$filter3');</script>");
//echo("<script>alert(localStorage.getItem('pro'));</script>");
echo($filter1);
echo($filter2);
echo($filter3);


echo("<script>window.setTimeout(window.location.href = '../request-pro.php#mapa',1000);</script>");
//header("location: ../request-pro.php");