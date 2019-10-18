<?php
include("cabecalho.php");
$discurso = new discurso();
$row = $discurso->getDiscurso();
$tmp = array();
$tmp['id'] = $row['id'];
$tmp['inicio_normal'] = date('H:i:s');
$tmp['pausado'] = "";
$ok = $discurso->update($tmp);