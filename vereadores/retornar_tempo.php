<?php

include("cabecalho.php");
$discurso = new discurso();
$row = $discurso->getDiscurso();
$array = array();
if (!empty($row['pausado'])) {
    $array['id'] = $row['id'];
    if (!empty($row['segundos_normal'])) {
        $array['inicio_normal'] = date('H:i:s');
    } else {
        $array['inicio_adicional'] = date('H:i:s');
    }
    $array['pausado'] = "NULL";
    $ok = $discurso->update($array);
}
