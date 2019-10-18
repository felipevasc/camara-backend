<?php
include("cabecalho.php");
$liberar = new liberar();
$liberar_row = $liberar->getDados();
$tmp = array();
$tmp['id'] = $liberar_row['id'];
$tmp['inicio_sessao'] = NULL;
$liberar->update($tmp);
funcoes::alerta("Sessão Encerrada!", "exibe_configuracao.php");