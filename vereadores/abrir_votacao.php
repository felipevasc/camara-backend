<?php
$_GET['esconde_menu'] = true;
include("cabecalho.php");
$liberar = new liberar();
$liberar_row = $liberar->getDados();
if (!empty($_GET['projeto'])) {
    $projeto = new projeto();
    $projeto_row = $projeto->get($_GET['projeto']);
    $tmp['id'] = $liberar_row['id'];
    $tmp['pequeno_expediente'] = "NULL";
    $tmp['grande_expediente'] = "NULL";
    $tmp['votacao_projeto'] = $projeto_row['nome'];
    $tmp['texto_projeto'] = $projeto_row['descricao'];
    $tmp['expediente'] = "NULL";
    
    $ok = $liberar->update($tmp);
    $votacao = new votacao();
    $votacao->deleteVotacao();
    
    funcoes::alerta('Votação aberta!', 'exibe_configuracao.php');
}
else if (!empty($_POST['acao'])) {
    $ok = $liberar->update($_POST);
    $votacao = new votacao();
    $votacao->deleteVotacao();
    
    funcoes::alerta('Votação aberta!', 'exibe_configuracao.php');
} else {
    ?>
    <form method="POST">
        <input type="hidden" name="acao" value="abrir"/>
        <input type="hidden" name="grande_expediente" value="NULL"/>
        <input type="hidden" name="pequeno_expediente" value="NULL"/>
        <input type="hidden" name="id" value="<?php echo $liberar_row['id']; ?>"/>
        <table class="form_mobile">
            <caption>Abrir Votação</caption>
            <tbody>
                <tr>
                    <td>
                        Título do Projeto:<br/>
                        <input name="votacao_projeto" required="required"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Descrição do Projeto:
                        <textarea name="texto_projeto"></textarea>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-block btn-success">Abrir Votação</button>
                    </td>
                </tr>
            </tfoot>
        </table>    
    </form>
    <?php
}