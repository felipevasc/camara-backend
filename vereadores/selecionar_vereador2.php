<?php
include("cabecalho.php");
$discurso = new discurso();
$palavra = new palavra();
$liberar = new liberar();

$liberar_row = $liberar->getDados();

$row = $discurso->getDiscurso();
$tmp = array();
$tmp['id'] = $row['id'];
$tmp['vereador'] = $_GET['vereador'];
$tmp['inicio_normal'] = '';
$tmp['inicio_adicional'] = '';
//AO SELECIONAR UM VEREADOR, NORMAL 300
if (empty($liberar_row['grande_expediente'])) {
    $tmp['segundos_normal'] = '10';
}
else {
    $tmp['segundos_normal'] = '600';
}

$tmp['segundos_adicional'] = '';
$tmp['pausado'] = '';
$discurso->update($tmp);
$palavra->removerPalavra($_GET['vereador']);