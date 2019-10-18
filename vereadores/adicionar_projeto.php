<?php
include("cabecalho.php");
$id_projeto = $_GET['projeto'];

$projeto = new projeto();
$ordem = $projeto->getMaiorOrdem();
$ordem++;
$tmp = array();
$tmp['id'] = $id_projeto;
$tmp['ordem'] = $ordem;
$projeto->update($tmp);
