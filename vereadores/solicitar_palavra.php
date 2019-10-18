<meta charset="UTF-8"/>
<?php
date_default_timezone_set('America/Sao_Paulo');
include("../auxiliares/autoload.php");
$palavra = new palavra();
$tmp = array();
$tmp['vereador'] = $_GET['vereador'];
$tmp['data'] = date('d/m/Y');
if (!$palavra->check($tmp['vereador'], $tmp['data'])) {
    $ok = $palavra->set($tmp);
    var_dump($ok);
}
echo "<script>alert('{$tmp['data']}Solicitação do uso da palavra cadastrada com sucesso.'); window.location.href='login_vereador.php?vereador={$tmp['vereador']}'; </script>";