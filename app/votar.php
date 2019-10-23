<?php

header('Content-Type: application/json');
include("../auxiliares/autoload.php");
$votacao = new votacao();
$vereador = new vereador();
$vereador_row = $vereador->get($_GET['vereador']);

$json = array();
if (sha1($_GET['senha']) === $vereador_row['senha']) {
    $ok = $votacao->set($_GET);
    $json['ok'] = true;
}
else {
    $json['erro'] = 'Senha Invalida';
}

echo json_encode($json);
