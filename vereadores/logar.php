<?php
include("cabecalho.php");
if (!empty($_GET['vereador'])) {
    $_SESSION['vereador'] = $_GET['vereador'];
    funcoes::redirecionar('apresentacao.php');
}
?>
<style>
    
    ul {
        list-style-type: upper-roman;
        margin: 0;
        padding: 0;
    }


    ul li:hover {
        background: linear-gradient(0deg, rgba(255,255,255,0.2) 20%, rgba(255,255,255,0.8) 100%) !important;
        background-color: #85b2cb !important;
    }
    ul li {
        width: 370px;
        height: 75px;
        overflow-x: hidden;
        line-height: 30px;
        font-size: 90%;
        margin: 1px;
        padding: 2px;
        text-align: left;
    }
</style>
<?php
$vereador = new vereador();
$vereador_rs = $vereador->obterTodos();
echo "<ul class='sortable' style='text-algin: left; width: 600px;'>";
foreach ($vereador_rs as $vereador_row) {
    echo "<li onclick=\"abrirPagina('logar.php?vereador={$vereador_row['id']}');\"><span class='middle'><img src='{$vereador_row['imagem']}' style='width: 41px; height: 70px; margin-right: 8px;'></span><span class='middle' style='font-weight: bold; font-size: 18px;'>{$vereador_row['nome_urna']}</span></li>";
}
echo "</ul>";