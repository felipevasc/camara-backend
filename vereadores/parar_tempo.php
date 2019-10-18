<?php
include("cabecalho.php");
$discurso = new discurso();
$row = $discurso->getDiscurso();

$tmp = array();
$tmp['id'] = $row['id'];
$tmp['inicio_normal'] = '';
$tmp['inicio_adicional'] = '';
$tmp['segundos_adicional'] = '';

$liberar = new liberar();
$liberar_row = $liberar->getDados();
if (!empty($liberar->getTempo())) {
    $tmp['segundos_normal'] = ((int)$liberar->getTempo());
}
else {
    $tmp['segundos_normal'] = '300';
}

$ok = $discurso->update($tmp);