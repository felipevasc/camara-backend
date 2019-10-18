<?php
$_GET['esconde_menu'] = true;
include("cabecalho.php");
$liberar = new liberar();
$liberar_row = $liberar->getDados();
if (!empty($liberar_row['inicio_sessao']) && $liberar_row['inicio_sessao'] != '0000-00-00 00:00:00') {
    $tmp = explode(" ", $liberar_row['inicio_sessao']);
    $data = explode("-", $tmp[0]);
    $hora = explode(":", $tmp[1]);
    echo "<script> inicioSessao = new Date({$data[0]}, {$data[1]}, {$data[2]}, {$hora[0]}, {$hora[1]}, {$hora[2]}); </script>";
    echo "<script> $(function(){ relogioSessao(); }); </script>";
}
?>

<div id='conteudo_pagina'>    
    <?php include("exibe_pauta_conteudo.php"); ?>
</div>
<script>
    function atualizaPagina() {
        chamarPaginaAjax('exibe_pauta_conteudo.php', '', function(r) {
            $('#conteudo_pagina').html(r);
            setTimeout(function() {
                atualizaPagina();
            }, 1000);
        });
    }
    $(function(){
        atualizaPagina();
    })
</script>
<div id='relogio_sessao'></div>