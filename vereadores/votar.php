<?php
$_GET['esconde_menu'] = true;
include("cabecalho.php");

$vereador = new vereador();
$projeto = new projeto();
$tipoVoto = new tipoVoto();

$vereador_row = $vereador->get($_GET['vereador']);
$projeto_row = $projeto->get($_GET['projeto']);
$rs = $tipoVoto->obterTodos();
?>
<style>
    body {
        background-image: url('../auxiliares/images/bg1.png');
    }
</style>
<div style="margin: 0 auto; margin-top: 50px; padding-top: 10px; height: 670px; width: 600px; border-radius: 30px; background: linear-gradient(0deg, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.5)); ">
    <img src="<?php echo $vereador_row['imagem']; ?>" style="width: 150px; border-radius: 25px;"/><br/>
    <strong>
        <?php echo $vereador_row['nome']; ?><br/>
    </strong>
    <fieldset class="title">
        <legend><h1><?php echo $projeto_row['nome']; ?></h1></legend>
        <h4 style="display: inline-block; width: 580px; height: 230px; overflow-y: scroll; background-color: rgba(255, 255, 255, 0.8); border-radius: 20px; padding: 8px;"><p style="text-align: justify"><?php echo $projeto_row['descricao']; ?></p></h4>
    </fieldset>

    <br/>
    <br/>
    <fieldset>
        <?php
        foreach ($rs as $row) {
            ?>
            <span onclick="confirma('Tem certeza que deseja confirmar seu voto como <?php echo $row['nome']; ?>?', function () {
                        abrirPagina('votacaoCrud.php?vereador=<?php echo $vereador_row['id']; ?>&projeto=<?php echo $projeto_row['id']; ?>&tipo_voto=<?php echo $row['id']; ?>');
                    })">
                <input type="radio" id="r_<?php echo $row['id']; ?>" name="voto[]" value="<?php echo $row['id']; ?>" class="checkboxradio"/> 
                <label for="r_<?php echo $row['id']; ?>"><?php echo $row['nome']; ?><img src="<?php echo $row['imagem']; ?>"/></label>
            </span>
            <?php
        }
        ?>
    </fieldset>    
</div>