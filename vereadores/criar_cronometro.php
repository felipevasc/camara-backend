<?php
include("cabecalho.php");
$tmp = array();
$tmp['hora_inicio'] = date('Y-m-d H:i:s');
$tmp['hora_ultimo_start'] = date('Y-m-d H:i:s');
$tmp['tempo_previsto'] = 20;
$tmp['pausado'] = "TRUE";
$tmp['vereador'] = $_GET['vereador'];
$cronometro = new cronometro();
$cronometro->set($tmp);
$vereador = new vereador();
$tmp = array();
$tmp['id'] = $_GET['vereador'];
$tmp['solicitar_palavra'] = "NULL";
$vereador->update($tmp);