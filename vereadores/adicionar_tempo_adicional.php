<?php
include("cabecalho.php");
$discurso = new discurso();
$row = $discurso->getDiscurso();
$tmp = array();
$tmp['id'] = $row['id'];
//AO CLICAR EM ADICIONAR TEMPO ADICIONAL, NORMAL 120
$tmp['segundos_adicional'] = $row['segundos_adicional'] + 60;
$ok = $discurso->update($tmp);