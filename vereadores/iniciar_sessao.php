<?php
include("cabecalho.php");
$liberar = new liberar();
$liberar_row = $liberar->getDados();
$tmp = array();
$tmp['id'] = $liberar_row['id'];
$tmp['inicio_sessao'] = date("Y-m-d H:i:s");
$tmp['sessao'] = $_GET['sessao'];
$liberar->update($tmp);
funcoes::alerta("Sessão iniciada!", "exibe_configuracao.php");