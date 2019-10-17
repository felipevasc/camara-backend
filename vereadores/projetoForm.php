<?php
include ("./cabecalho.php");


$projeto = new projeto();
?>

<form method="POST" action="projetoCrud.php">
    <table class="form_mobile">
        <caption>Cadastro de Projetos</caption>
        <tbody>
            <tr>
                <td>
                    Nome do Projeto<br/>
                    <input name="nome" class="form-control"/>
                </td>
            </tr><tr>
                <td>
                    Descrição<br/>
                    <textarea name="descricao" class="form-control"></textarea>
                </td>
            </tr><tr>
                <td>
                    Autor<br/>
                    <input name="autor" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $comissao = new comissao();
                    $comissao_rs = $comissao->obterTodos();
                    foreach ($comissao_rs as $comissao_row) {
                        ?>
                        <label class='btn btn-danger btn-block' style='margin: 0; padding: 0; padding-left: 20px; text-align: left;'>
                            <span class='middle'>
                                <input name='comissoes[]' value='<?php echo $comissao_row['id']; ?>' style='margin: 0; padding: 0; width: 20px;' type='checkbox'/>
                            </span> 
                            <span class='middle'>
                                <?php echo $comissao_row['nome']; ?>
                            </span>
                        </label>
                        <br/>
                        <?php
                    }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
    <input type="submit" class="btn btn-block btn-success"/>
</form>
<?php
include ("./rodape.php");
?>