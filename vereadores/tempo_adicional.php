<?php
$_GET['ajax'] = true;
include("cabecalho.php");
$discurso = new discurso();
$row = $discurso->getDiscurso();
if (empty($row['tempo_adicional'])) {
    echo "00:00:00";
}
else {
    $tmp = explode(':', $row['tempo_adicional']);
    $tempo_adicional = mktime($tmp[0], $tmp[1], $tmp[2], 1, 1, 2000);
    $tempo_agora = mktime(date('h'), date('i'), date('s'), 1, 1, 2000);
    $decorrido = $tempo_agora - $tempo_adicional;
    $total = $row['segundos_adicional'];
    $inicio = mktime(0, 0, 0, 1, 1, 2000);
    $inicio += $total;
    $inicio -= $decorrido;
    echo date("h:i:s", $inicio);
}