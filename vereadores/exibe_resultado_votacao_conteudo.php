    <?php
$_GET['esconde_menu'] = true;
include_once("cabecalho.php");

$liberar = new liberar();
$liberar_row = $liberar->getDados();

$vereador = new vereador();
$votacao = new votacao();
$tipoVoto = new tipoVoto();
$rs = $tipoVoto->obterTodos();
$partido = new partido();
$vereador_rs = $vereador->obterTodos();
$qtd = 0
?>
<style>
    body {
        background: linear-gradient(1deg, #000000, #444444, #222222, #000000);
    }
</style>
<div style="width: 100%; background-color: rgba(255, 255, 255, 0.9); margin: 0 auto; text-align: center;">
    <span style='font-size: 42px; font-weight: bold;'>
        <?php echo $liberar_row['sessao']; ?>-
        <?php echo $liberar_row['votacao_projeto']; ?><br/>
    </span>
    <table class="table1" style="margin: 0 auto; padding: 0;">
        <tr>
            <?php
            foreach ($rs as $row) {
                ?>
                <td style="width: 280px;">
                    <span class="middle">
                        <img src="<?php echo $row['imagem'] ?>" />
                    </span>
                    <span class="middle" style="font-size: 30px;">
                        <?php echo $row['nome'] ?>
                        <strong>
                            <?php
                            $total = $votacao->getResultadoTipo($row['id']);
                            $qtd += $total;
                            echo $total;
                            ?>
                        </strong>
                    </span>
                </td>
                <?php
            }
            ?>  
            <td style="width: 280px;">
                <span class="middle">
                    <img src="../auxiliares/ico/bola_preto.png" />
                </span>
                <span class="middle" style="font-size: 30px;">
                    TOTAL
                    <strong>
                        <?php echo $qtd; ?>
                    </strong>
                </span>
            </td>
        </tr>
    </table>
</div>
<?php
foreach ($vereador_rs as $vereador_row) {
    $voto = $votacao->getResultadoVereador($vereador_row['id']);
    ?>
    <span class="exibe_vereador <?php echo (!empty($voto)) ?  $tipoVoto->getNome($voto) : 'ausente'; ?>" onclick="abrirPagina('login_vereador.php?vereador=<?php echo $vereador_row['id']; ?>')">
        <span class="middle img_vereador">
            <img src="<?php echo $vereador_row['imagem'] ?>"/>
        </span>
        <span class="img_partido">
            <img src="<?php echo $partido->getImagem($vereador_row['partido']); ?>" style="width: 300px; height: 100px; z-index: 1;"/>
        </span>
        <span class="texto"> 
            <span class="texto_nome">
            <?php echo $vereador_row['nome_urna']; ?>    
            </span><br/>
            <span class="texto_status">
                <?php
                if (empty($voto)) {
                    echo "<img src='../auxiliares/ico/bola_branca.png'/> Não Votou";
                } else {
                    echo "<img src='" . $tipoVoto->getImagem($voto) . "'/> " . $tipoVoto->getNome($voto);
                }
                ?>
            </span>
        </span>
            
    </span>
    <?php
}
?>
<img src="../auxiliares/ico/configuracao.png" style="position: fixed; top: 2px; right: 2px; width: 30px;" onclick="abrirPagina('exibe_configuracao.php');"/>