<?php

header('Content-Type: application/json');
include("../auxiliares/autoload.php");
$presenca = new presenca();
$vereador = new vereador();
$erro = null;
if (!empty($_GET['entrar'])) {
    $vereador_row = $vereador->get($_GET['id']);
    if (sha1($_GET['senha']) === $vereador_row['senha']) {
        $tmp = array();
        $tmp['vereador'] = $vereador_row['id'];
        $tmp['data'] = date('Y-m-d H:i:s');

        if (!$presenca->check($tmp['vereador'])) {
            $ok = $presenca->set($tmp);
        }
    } else {
        $erro = "Senha Invalida";
    }
} else if (!empty($_GET['sair'])) {
    $vereador_row = $vereador->get($_GET['id']);
    if (sha1($_GET['senha']) === $vereador_row['senha']) {
        $tmp = array();
        $tmp['vereador'] = $_GET['id'];
        $tmp['data'] = date('Y-m-d H:i:s');
        $row = $presenca->getByVereador($tmp['vereador'], $tmp['data']);
        $presenca->delete($row['id']);
    }
    else {
        $erro = "Senha Invalida";
    }
}

$ok = $presenca->check($_GET['id']);
echo json_encode(array("presente" => $ok, "erro" => $erro));
