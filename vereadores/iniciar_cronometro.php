<?php
include("cabecalho.php");
$tmp = array();
$tmp['hora_inicio'] = date('Y-m-d H:i:s');
$tmp['hora_ultimo_start'] = date('Y-m-d H:i:s');
$tmp['pausado'] = "";

$cronometro = new cronometro();
$cronometro->set($tmp);