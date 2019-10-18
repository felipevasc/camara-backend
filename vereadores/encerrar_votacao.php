<?php
include("cabecalho.php");
$sessao = new sessao();
$sessao_rs = $sessao->obterTodos();
$sessao->delete($sessao_rs[0]['id']);