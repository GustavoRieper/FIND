<?php
include "../../admin//connect.php";
$filter = $_POST["profissao"];
session_start();
$_SESSION['pro'] = $filter;
echo("<script>localStorage.setItem('pro','$filter');</script>");
//echo("<script>alert(localStorage.getItem('pro'));</script>");
echo($filter);


echo("<script>window.setTimeout(window.location.href = '../request-pro.php#mapa',1000);</script>");
//header("location: ../request-pro.php");