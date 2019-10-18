<?php
$_GET['ajax'] = true;
if (empty($_GET['att'])) {
    $_GET['autoload'] = true;    
}
include("cabecalho.php");
$vereador = new vereador();
$vereador_rs = $vereador->getUsoPalavra();

foreach ($vereador_rs as $i => $vereador_row) {
    if ($i == 0) {//trocar as cores da barra de fotos
        $classe = "btn-warning";
    }
    else {
        $classe = "btn-primary";
    }
    echo "<a type='button' class='btn {$classe}' onclick=\"selecionarVereador('{$vereador_row['id']}');\" style='width: 150px; overflow-x: hidden; padding: 0; border-radius: 10px;'>";
    echo "<span class='middle'><img src='{$vereador_row['imagem']}' style='width: 100%; height: 150px; border-radius: 10px;'></span>";
    //COMENTAR PARA REMOVER O NOME
    echo "<br/><font style='font-weight: bold;'>{$vereador_row['nome_urna']}</font>";
    echo "</a>";
}