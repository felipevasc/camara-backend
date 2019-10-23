<?php
header('Content-Type: application/json');
include("../auxiliares/autoload.php");

$liberar = new liberar();
$liberar_row = $liberar->getDados();

$votacao = new votacao();
$voto = $votacao->getResultadoVereador($_GET['vereador']);
//var_dump($voto);
$json = array();
$json['id'] = $liberar_row['id'];
$json['nome'] = $liberar_row['votacao_projeto'];
$json['descricao'] = $liberar_row['texto_projeto'];
$json['votado'] = (empty($voto) ? null : $voto);
$json['vereador'] = $_GET['vereador'];


echo json_encode($json);