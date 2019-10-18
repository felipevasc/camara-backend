<?php
include("cabecalho.php");
$liberar = new liberar();
$liberar_row = $liberar->getDados();
$tmp = array();
$tmp['id'] = $liberar_row['id'];
$tmp['tv'] = $_GET['pagina'];
$liberar->update($tmp);
funcoes::redirecionar("exibe_configuracao.php");