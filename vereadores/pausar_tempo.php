<?php

include("cabecalho.php");
$discurso = new discurso();
$row = $discurso->getDiscurso();
$array = array();
$array['id'] = $row['id'];
if (empty($row['pausado'])) {
    if (!empty($row['inicio_adicional'])) {
        $tmp = explode(':', $row['inicio_adicional']);
        $tempo_adicional = mktime($tmp[0], $tmp[1], $tmp[2], 1, 1, 2000);
        $tempo_agora = mktime(date('H'), date('i'), date('s'), 1, 1, 2000);
        $decorrido = $tempo_agora - $tempo_adicional;
        $total = $row['segundos_adicional'];
        $inicio = mktime(0, 0, 0, 1, 1, 2000);
        $inicio += $total;
        $inicio -= $decorrido;
        $array['pausado'] = date("H:i:s", $inicio);
        $tmp = explode(":", $array['pausado']);
        $tempo = 0;
        $tempo += $tmp[0] * 60 * 60;
        $tempo += $tmp[1] * 60;
        $tempo += $tmp[2];
        $array['segundos_adicional'] = $tempo;
        $array['segundos_normal'] = 0;
    } else {
        $tmp = explode(':', $row['inicio_normal']);
        $tempo_adicional = mktime($tmp[0], $tmp[1], $tmp[2], 1, 1, 2000);
        $tempo_agora = mktime(date('H'), date('i'), date('s'), 1, 1, 2000);
        $decorrido = $tempo_agora - $tempo_adicional;
        $total = $row['segundos_normal'];
        $inicio = mktime(0, 0, 0, 1, 1, 2000);
        $inicio += $total;
        $inicio -= $decorrido;
        $array['pausado'] = date("H:i:s", $inicio);
        $tmp = explode(":", $array['pausado']);
        $tempo = 0;
        $tempo += $tmp[0] * 60 * 60;
        $tempo += $tmp[1] * 60;
        $tempo += $tmp[2];
        $array['segundos_normal'] = $tempo;
        $array['segundos_adicional'] = 0;
    }
    $array['inicio_adicional'] = "";
    $array['inicio_normal'] = "";
    $ok = $discurso->update($array);
}
