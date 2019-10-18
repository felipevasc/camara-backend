<?php
include("cabecalho.php");
$liberar = new liberar();
$liberar_row = $liberar->getDados();
$tmp = array();
$tmp['id'] = $liberar_row['id'];
$tmp['pequeno_expediente'] = "NULL";
$tmp['grande_expediente'] = "TRUE";
$tmp['votacao_projeto'] = "NULL";
$tmp['texto_projeto'] = "NULL";
$liberar->update($tmp);
funcoes::alerta('Grande expediente iniciado!', 'exibe_configuracao.php');