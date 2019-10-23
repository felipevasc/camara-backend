<br/>
<?php
date_default_timezone_set('America/Sao_Paulo');
if (empty($autoload)) {
    include("../auxiliares/autoload.php");
}
$liberar = new liberar();
$liberar_row = $liberar->getDados();
$votacao = new votacao();
$presenca = new presenca();
$vereador = new vereador();
$vereador_row = $vereador->get($_GET['vereador']);
$presente = $presenca->check($_GET['vereador']);

$voto = $votacao->getResultadoVereador($_GET['vereador']);
if (empty($voto) && !empty($liberar_row['votacao_projeto']) && !empty($presente)) {
    $tipoVoto = new tipoVoto();
    $projeto = new projeto();
    $liberar = new liberar();
    $rs = $tipoVoto->obterTodos();
    $projeto_row = $liberar->getDados();
    foreach ($rs as $row) {
        ?><br/>
        <span class="botao2" onclick="confirma('Tem certeza que deseja confirmar seu voto como <?php echo $row['nome']; ?>?', function () {
                            abrirPagina('votacaoCrud.php?vereador=<?php echo $vereador_row['id']; ?>&projeto=<?php echo $projeto_row['id']; ?>&tipo_voto=<?php echo $row['id']; ?>');
                        })"
              onclick2="if (confirm('Tem certeza que deseja confirmar seu voto como <?php echo $row['nome']; ?>?')) {
              window.location.href = 'votacaoCrud.php?vereador=<?php echo $vereador_row['id']; ?>&projeto=<?php echo $projeto_row['id']; ?>&tipo_voto=<?php echo $row['id']; ?>'
              }">
            <label>
                <span style="display: inline-block; vertical-align: middle">
                    <?php echo $row['nome']; ?>
                </span>
                <span style="display: inline-block; vertical-align: middle">
                    <img src="<?php echo $row['imagem']; ?>"/>
                </span>
            </label>
            <label for="r_<?php echo $row['id']; ?>"></label>
        </span>
        <?php
    }
}
echo "<br/>";
$liberar = new liberar();
$liberar_row = $liberar->getDados();
if (empty($presente)) {
    if (!empty($liberar_row['inicio_sessao']) && $liberar_row['inicio_sessao'] != '0000-00-00 00:00:00') {
        ?>
        <button class="btn btn-success" style="font-size: 30px;" onclick="presenca()">
            <img src="../auxiliares/images/presenca.png" style="width: 26px; "/>Presença
        </button> 
        <?php
    }
    else {
        ?>
        <button class="btn" style="font-size: 30px; color: #444;" onclick="alert('A sessão ainda não foi iniciada!')">
            Presença
        </button> 
        <?php
    }
} else {
    ?>
    <button class="btn btn-danger" style="font-size: 30px;" onclick="sair()">
        <!-- <img src="../auxiliares/images/presenca.png" style="width: 160px; height: 120px;"/><br/> -->                  Sair
    </button> 
    <?php
}

if (!empty($liberar_row['votacao_projeto'])) {
    $votacao = new votacao();
    $voto = $votacao->getResultadoVereador($_GET['vereador']);
    
    if (empty($voto)) {
        ?>
        <button class="btn btn-primary" style="font-size: 25px;" onclick="votacao()">
            <!-- <img src="../auxiliares/images/votacao.png" style="width: 160px; height: 120px;"/><br/> -->
            Não Votado!
        </button> 
        <?php
    } else {
        ?>
        <button class="btn btn-primary" style="font-size: 30px;" onclick="alert('Você já realizou seu voto nesta votação!')">
            <!-- <img src="../auxiliares/images/votacao.png" style="width: 160px; height: 120px;"/><br/> -->
            Votado!
        </button> 
        <?php
    }
}
if (!empty($liberar_row['pequeno_expediente']) || !empty($liberar_row['grande_expediente'])) {
    ?>
    <button class="btn btn-warning" style="font-size: 30px;" onclick="palavra()">
        <!-- <img src="../auxiliares/images/assembleia.jpg" style="width: 160px; height: 120px;"/><br/> -->
        Palavra
    </button> 
    <?php
}