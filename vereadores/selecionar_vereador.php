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

if (!empty($liberar_row['expediente'])) {
    $tmp['segundos_normal'] = (((int)$liberar_row['expediente']) * 60);
}
else {
    $tmp['segundos_normal'] = '300';
}
$tmp['segundos_adicional'] = '';
$tmp['pausado'] = '';
$discurso->update($tmp);
$palavra->removerPalavra($_GET['vereador']);