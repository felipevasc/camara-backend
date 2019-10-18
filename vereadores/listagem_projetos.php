<?php
$_GET['ajax'] = true;
$_GET['autoload'] = true;
include("cabecalho.php");
$projeto = new projeto();
$projeto_rs = $projeto->getProjetoOrdem();
echo "<ul class='sortable'>";
foreach ($projeto_rs as $projeto_row) {
    echo "<li><input type='hidden' name='id' value='{$projeto_row['id']}'/> {$projeto_row['nome']} <img src='../auxiliares/ico/bola_laranja.png' style='float: right; cursor: pointer;' title='Abrir Votação' onclick=\"abrirPagina('exibir_votacao.php?projeto={$projeto_row['id']}')\"/></li>";
}
echo "</ul>";