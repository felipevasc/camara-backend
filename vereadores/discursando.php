<?php
include_once("cabecalho.php");
$cronometro = new cronometro();
$cronometro_rs = $cronometro->obterTodos();
if (count($cronometro_rs) > 0) {
    $cronometro_row = $cronometro_rs[0];
    $vereador = new vereador();
    $vereador_row = $vereador->get($cronometro_row['vereador']);
    ?>
    <img src="<?php echo $vereador_row['imagem']; ?>" style="width: 500px; height: 500px; border-radius: 25px; border-top: 5px solid rgba(0, 0, 0, 0.7); border-left: 5px solid rgba(0, 0, 0, 0.7); border-right: 5px solid rgba(0, 0, 0, 0.5); border-bottom: 5px solid rgba(0, 0, 0, 0.5);"/>
    <br/>
    <span style="font-weight: bold; font-size: 35px; color: #c5fce7;">
        <?php echo $vereador_row['nome_urna']; ?>
    </span>
        
    <?php
} else {
    echo "EM ABERTO";
}