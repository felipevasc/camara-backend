<?php
include("cabecalho.php");
$liberar = new liberar();
$liberar_row = $liberar->getDados();
$tmp = array();
$tmp['id'] = $liberar_row['id'];
$tmp['pequeno_expediente'] = "NULL";
$tmp['grande_expediente'] = "NULL";
$tmp['votacao_projeto'] = "NULL";
$tmp['texto_projeto'] = "NULL";
$tmp['expediente'] = $_GET['tempo'];
$liberar->update($tmp);
if (empty($_GET['destino'])) {
    $destino = "exibe_configuracao.php";
}
else {
    $destino = $_GET['destino'];
}
funcoes::alerta("Expediente Iniciado!", $destino);