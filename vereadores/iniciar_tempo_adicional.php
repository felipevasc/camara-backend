<?php
include("cabecalho.php");
$discurso = new discurso();
$row = $discurso->getDiscurso();
$tmp = array();
$tmp['id'] = $row['id'];
$tmp['inicio_adicional'] = date('H:i:s');
if (!empty($_GET['reseta'])) {
    $tmp['segundos_adicional'] = 0;
}
$ok = $discurso->update($tmp);