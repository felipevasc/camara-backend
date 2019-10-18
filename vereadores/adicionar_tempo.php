<?php
include("cabecalho.php");
$tmp = array();
$cronometro = new cronometro();
$rs = $cronometro->obterTodos();
if (count($rs) > 0) {
    $row = $rs[0];
    $tmp['tempo_previsto'] = $row['tempo_previsto'] + 10;
    $cronometro = new cronometro();
    $cronometro->set($tmp);    
}
