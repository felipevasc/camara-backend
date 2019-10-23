<?php
header('Content-Type: application/json');
include("../auxiliares/autoload.php");
$autoload = true;
$vereador = new vereador();
$vereador_rs = $vereador->obterTodos();
echo json_encode($vereador_rs);
