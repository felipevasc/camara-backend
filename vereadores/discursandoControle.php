<?php
include("cabecalho.php");
$cronometro = new cronometro();
$cronometro_rs = $cronometro->obterTodos();
if (count($cronometro_rs) > 0) {
    $cronometro_row = $cronometro_rs[0];
    $vereador = new vereador();
    $vereador_row = $vereador->get($cronometro_row['vereador']);
    ?>
    <img src="<?php echo $vereador_row['imagem']; ?>" style="width: 100px; height: 150px; border-radius: 5px;"/>
    <br/>
    <span style="font-weight: bold; font-size: 25px;">
        <?php echo $vereador_row['nome_urna']; ?>
    </span>
        
    <?php
} else {
    echo "EM ABERTO";
}