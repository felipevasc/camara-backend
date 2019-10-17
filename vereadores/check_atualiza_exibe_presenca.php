<?php
$_GET['ajax'] = true;
include_once("cabecalho.php");
$presenca = new presenca();
$data = $presenca->getMaiorData();
echo $data;