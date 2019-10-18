<?php
include("cabecalho.php");
$tmp = array();
$cronometro = new cronometro();
$rs = $cronometro->obterTodos();

$cronometro->delete($rs[0]['id']);