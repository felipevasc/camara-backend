<meta charset="UTF-8"/>
<?php
include("../auxiliares/autoload.php");

$nomeTabela = funcoes::nomeTabelaByCaminho(__FILE__);
$tabela = new $nomeTabela();
$acao = "";
if (!empty($_GET['acao']) && $_GET['acao'] == "deletar") {
    $ok = $tabela->delete($_GET['id']);
    $acao = "Remoção";
}
else if (!empty($_GET['id'])) {
    $ok = $tabela->update($_GET);
    $acao = "Atualização";
}
else {
    $ok = $tabela->set($_GET);
    $acao = "Cadastro";
}
echo "<script>alert('Votação realizada com sucesso!'); window.location.href='login_vereador.php?vereador={$_GET['vereador']}'; </script>";
?>