<?php
$_GET['ajax'] = true;
include("cabecalho.php");
$liberar = new liberar();
$liberar_row = $liberar->getDados();
echo $liberar_row['tv'];