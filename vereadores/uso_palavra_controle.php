<?php
$_GET['ajax'] = true;
if (empty($_GET['att'])) {
    $_GET['autoload'] = true;    
}

include("cabecalho.php");
$vereador = new vereador();
$vereador_rs = $vereador->getUsoPalavra();
echo "<ul class='sortable1'>";
foreach ($vereador_rs as $vereador_row) {
    echo "<li onclick=\"selecionarVereador('{$vereador_row['id']}');\"><span class='middle'><img src='{$vereador_row['imagem']}' style='width: 71px; height: 70px; margin-right: 8px;'></span><span class='middle' style='font-weight: bold; font-size: 18px;'>{$vereador_row['nome_urna']}</span></li>";
}
echo "</ul>";