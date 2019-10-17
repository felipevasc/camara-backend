<?php
include("cabecalho.php");
$discurso = new discurso();
$liberar = new liberar();
$row = $discurso->getDiscurso();
$tmp = array();
$tmp['id'] = $row['id'];
$tmp['segundos_normal'] = $row['segundos_normal'] + $liberar->getTempo();
$ok = $discurso->update($tmp);