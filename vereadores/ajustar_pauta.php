<?php
include("cabecalho.php");
$projeto = new projeto();
$emenda = new emenda();
$id_projeto = $_GET['projeto'];
$projeto->ajustaOrdenacao();
if ($_GET['tipo'] == 'PROJETO') {
    $projeto_row = $projeto->get($id_projeto);
}
else {
    $projeto_row = $emenda->get($id_projeto);
}
    
if ($_GET['acao'] == "priorizar") {
    $projeto->sobeOrdem($projeto_row['ordem']);
    /*
    $rs = $projeto->getByCondicao("WHERE pautado is true and ordem < {$projeto_row['ordem']} ORDER BY ordem DESC LIMIT 1");
    if (count($rs) > 0) {
        $projeto2_row = $rs[0];
        $tmp = array();
        $tmp['id'] = $projeto_row['id'];
        $tmp['ordem'] = $projeto2_row['ordem'];
        $projeto->update($tmp);
        $tmp = array();
        $tmp['id'] = $projeto2_row['id'];
        $tmp['ordem'] = $projeto_row['ordem'];
        $projeto->update($tmp);
    } else {
        $tmp = array();
        $tmp['id'] = $projeto_row['id'];
        $tmp['ordem'] = "0";
        $projeto->update($tmp);
    } */
} else if ($_GET['acao'] == 'retirar') {
    if ($_GET['tipo'] == 'PROJETO') {
        $tmp = array();
        $tmp['id'] = $projeto_row['id'];
        $tmp['pautado'] = "FALSE";
        $projeto->update($tmp);
    }
    else {
        $tmp = array();
        $tmp['id'] = $projeto_row['id'];
        $tmp['pautado'] = "FALSE";
        $emenda->update($tmp);
    }
        
} else if ($_GET['acao'] == 'adicionar') {
    if ($_GET['tipo'] == 'PROJETO') {
        $tmp = array();
        $tmp['id'] = $projeto_row['id'];
        $tmp['pautado'] = "TRUE";
        $tmp['ordem'] = $projeto->getProximaOrdem();
        $projeto->update($tmp);
    }
    else {
        $tmp = array();
        $tmp['id'] = $projeto_row['id'];
        $tmp['pautado'] = "TRUE";
        $tmp['ordem'] = $projeto->getProximaOrdem();
        $emenda->update($tmp);
    }
}
funcoes::redirecionar('exibe_configuracao.php');
