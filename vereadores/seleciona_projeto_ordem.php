<?php
$_GET['esconde_menu'] = true;
include("cabecalho.php");
$projeto = new projeto();
$projeto_rs = $projeto->getProjetoSemOrdem();
?>
<table class="table table-hover table-striped table-bordered">
    <caption style="text-align: center;">
        Listagem de Projetos
    </caption>
    <thead>
        <tr>
            <th>Nome do Porjeto</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>
        <?php
        foreach ($projeto_rs as $projeto_row) {
            ?>
            <tr>
                <td><?php echo $projeto_row['nome']; ?></td>
                <td>
                    <img src="../auxiliares/ico/ok.png" onclick="chamarPaginaAjax('adicionar_projeto.php?projeto=<?php echo $projeto_row['id']; ?>', '', function() { abrirPagina('apresentacao.php'); })"/>
                </td>
            </tr>
            <?php
        }
        ?>
    </tfoot>
</table>
<input type="button" class="boton" value="Fechar" onclick="removerMascara();" style="width: 200px;"/>