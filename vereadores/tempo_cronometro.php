<?php

$_GET['ajax'] = true;
include("cabecalho.php");
$cronometro = new cronometro();
$rs = $cronometro->obterTodos();
if (count($rs) == 0) {
    $tmp['pausado'] = '';
    $tmp['tempo'] = 0;
    $tmp['previsto'] = 0;
} else {
    $row = $rs[0];
    $tmp = array();
    $tmp['pausado'] = $row['pausado'];
    $tmp['previsto'] = $row['tempo_previsto'];
    if (!empty($row['pausado'])) {
        $tmp['tempo'] = $row['tempo_decorrido'];
    } else {
        $tempo_atual = $row['tempo_decorrido'];
        $tempo = explode(' ', $row['hora_ultimo_start']);
        $data_tmp = explode('-', $tempo[0]);
        $hora_tmp = explode(':', $tempo[1]);
        $ultimo_start = mktime($hora_tmp[0], $hora_tmp[1], $hora_tmp[2], $data_tmp[1], $data_tmp[2], $data_tmp[0]);
        $atual = mktime(date('H'), date('i'), date('s'), date('m'), date('d'), date('Y'));
        $tempo_segundos = $atual - $ultimo_start;
        $tmp['tempo'] = $tempo_segundos + $tempo_atual;
    }
}
echo json_encode($tmp);
