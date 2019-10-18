<?php
include("cabecalho.php");
$liberar = new liberar();
$liberar_row = $liberar->getDados();
$tmp = array();
$tmp['id'] = $liberar_row['id'];
$tmp['pequeno_expediente'] = "TRUE";
$tmp['grande_expediente'] = "NULL";
$tmp['votacao_projeto'] = "NULL";
$tmp['texto_projeto'] = "NULL";
$liberar->update($tmp);
funcoes::alerta('Pequeno expediente iniciado!', 'exibe_configuracao.php');