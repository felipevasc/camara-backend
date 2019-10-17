<?php
include("cabecalho.php");
$tmp = array();
$cronometro = new cronometro();
$rs = $cronometro->obterTodos();
$row = $rs[0];
if (empty($row['pausado'])) {
    $tmp['pausado'] = "TRUE";
    $tempo = explode(' ', $row['hora_ultimo_start']);
    $data_tmp = explode('-', $tempo[0]);
    $hora_tmp = explode(':', $tempo[1]);
    $ultimo_start = mktime($hora_tmp[0], $hora_tmp[1], $hora_tmp[2], $data_tmp[1], $data_tmp[2], $data_tmp[0]);
    $atual = mktime(date('H'), date('i'), date('s'), date('m'), date('d'), date('Y'));
    $tempo_segundos = $atual - $ultimo_start;
    if (empty($row['tempo_decorrido'])) {
        $row['tempo_decorrido'] = 0;
    }
    $tmp['tempo_decorrido'] = $row['tempo_decorrido'] + $tempo_segundos;
    $cronometro = new cronometro();
    $cronometro->set($tmp);    
}