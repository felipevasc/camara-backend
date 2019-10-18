<?php
$_GET['esconde_menu'] = true;
include("cabecalho.php");

$vereador = new vereador();
$votacao = new votacao();
$tipoVoto = new tipoVoto();
$rs = $tipoVoto->obterTodos();
$partido = new partido();
$presenca = new presenca();
$liberar = new liberar();
$liberar_row = $liberar->getDados();
if (!empty($liberar_row['inicio_sessao']) && $liberar_row['inicio_sessao'] != '0000-00-00 00:00:00') {
    $tmp = explode(" ", $liberar_row['inicio_sessao']);
    $data = explode("-", $tmp[0]);
    $hora = explode(":", $tmp[1]);
    echo "<script> inicioSessao = new Date({$data[0]}, {$data[1]}, {$data[2]}, {$hora[0]}, {$hora[1]}, {$hora[2]}); </script>";
    echo "<script> $(function(){ relogioSessao(); }); </script>";
    
}
$qtd = 0;
?>
<style>
    body {
        background: linear-gradient(1deg, #000000, #444444, #222222, #000000);
    }
</style>
<div class="titulo_presenca">
    <div id='relogio_sessao'></div>
    <table class="table1" style="margin: 0 auto; font-size: 30px;">
        <tr>
            <td style="color: #000000; font-weight: bold;">
                <?php
                if (empty($liberar_row['inicio_sessao'])) {
                    ?>
                    Presidente da Câmara: ERANILDO FONTENELE XAVIER - <?php echo date('d/m/Y'); ?>
                    <?php
                }
                else {
                    echo $liberar_row['sessao']." - ";
                    if ($liberar_row['expediente'] == 5) {
                        echo "Pequeno Expediente";
                    }
                    else if ($liberar_row['expediente'] == 20) {
                        echo "Grande Expediente";
                    }
                    else if ($liberar_row['expediente'] == 2) {
                        echo "Debate de Projetos";
                    }
                }
                ?>
                
            </td>
        </tr>
    </table>
</div>
<!--<img src="../auxiliares/images/bg666.png" style="width: 120px; position: fixed; left: 10px;"/>-->
<div id="vereadores">
    <?php
    include("vereadores_exibe_presenca.php");
    ?>    
</div>

<script>
    var ultimaAtualizacao = 0;
    $(function(){
        checkAtualizaPresenca();
    })
    function checkAtualizaPresenca() {
        chamarPaginaAjax('check_atualiza_exibe_presenca.php', '', function (r) {
            if (r != ultimaAtualizacao) {
                ultimaAtualizacao = r;
                atualizaPresenca();
            }
            else {
                setTimeout(function () {
                    checkAtualizaPresenca();
                }, 10000);
            }
        });
    }
    function atualizaPresenca() {
        chamarPaginaAjax('vereadores_exibe_presenca.php', '', function (r) {
            $('#vereadores').html(r);
            setTimeout(function () {
                checkAtualizaPresenca();
            }, 10000);
        });
    }
</script>
<img src="../auxiliares/ico/configuracao.png" class="img_configuracao" onclick="abrirPagina('exibe_configuracao.php');"/>