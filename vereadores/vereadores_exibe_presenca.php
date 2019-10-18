<?php
$_GET['ajax'] = true;
include_once("cabecalho.php");
$presenca = new presenca();
$vereador = new vereador();
$partido = new partido();
$vereador_rs = $vereador->obterTodos();

foreach ($vereador_rs as $vereador_row) {
    $ok = $presenca->check($vereador_row['id']);
    if ($ok) {
        $classe = "";
        $img = "<img src='../auxiliares/ico/bola_azul.png'/> Presente";
        $title = "Entrar";
    }
    else {
        $classe = 'ausente';
        $img = "<img src='../auxiliares/ico/bola_branca.png'/> Ausente";
        $title = "Confirmar Presença";
    }
    ?>
    <span class="exibe_vereador <?php echo $classe; ?>" onclick="abrirPagina('login_vereador.php?vereador=<?php echo $vereador_row['id']; ?>')" title="<?php echo $title; ?>">
        <span class="middle img_vereador">
            <img src="<?php echo $vereador_row['imagem'] ?>"/>
        </span>
        <span class="img_partido">
            <img src="<?php echo $partido->getImagem($vereador_row['partido']); ?>"/>
        </span>
        <span class="texto"> 
            <span class="texto_nome">
            <?php echo $vereador_row['nome_urna']; ?>    
            </span><br/>
            <span class="texto_status">
            <?php
            echo $img;
            ?>    
            </span>            
        </span>
    </span>
    <?php
}
