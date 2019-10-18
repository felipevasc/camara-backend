<?php
include("cabecalho.php");
if (empty($_GET['vereador'])) {
    $liberar = new liberar();
    $row = $liberar->getDados();
    $tmp = array();
    $tmp['id'] = $row['id'];
    if (empty($row['microfone'])) {
        $tmp['microfone'] = 'TRUE';
    }
    else {
        $tmp['microfone'] = "FALSE";
    }
    $liberar->update($tmp);    
}
else {
    $vereador = new vereador();
    $vereador_row = $vereador->get($_GET['vereador']);
    $tmp = array();
    $tmp['id'] = $vereador_row['id'];
    if (empty($vereador_row['microfone'])) {
        $tmp['microfone'] = 'TRUE';
    }
    else {
        $tmp['microfone'] = "FALSE";
    }
    $vereador->update($tmp);    
}

funcoes::redirecionar('microfones.php');