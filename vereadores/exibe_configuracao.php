<?php
$_GET['esconde_menu'] = true;
include("cabecalho.php");
$liberar = new liberar();
$liberar_row = $liberar->getDados();
?>

<style>
    .abas.procedimento .btn:not([type="submit"]) {
        height: 70px !important;
        font-size: 25px !important;
        line-height: 70px;
    }
</style>
<span class="btn-group btn-group-justified">
    <?php
    if (empty($liberar_row['inicio_sessao']) || $liberar_row['inicio_sessao'] == '0000-00-00 00:00:00') {
        echo "<a onclick=\"var x = prompt('Informe o nome da sessao'); abrirPagina('iniciar_sessao.php?sessao='+x)\" class='btn btn-success'>Iniciar a Sessão</a>";
    } else {
        echo "<a onclick=\"if (confirm('Deseja encerrar a sessão?')) { abrirPagina('encerrar_sessao.php'); }\" class='btn btn-danger'>Encerrar a Sessão</a>";
    }
    ?>
    <a class="btn btn-default" onclick="$('.abas').hide(); $('.procedimento').show()">Procedimento</a>
    <a class="btn btn-default" onclick="$('.abas').hide(); $('.pauta').show()">Pautas</a>
    <a class="btn btn-default" onclick="$('.abas').hide(); $('.tv').show()">Controle TV</a>
    <a class="btn btn-danger" onclick="abrirPagina('exibe_presenca.php', true)">Presença</a>
    <a class="btn btn-danger" onclick="abrirPagina('exibe_resultado_votacao.php', true)">Votação</a>
    <a class="btn btn-danger" onclick="abrirPagina('exibe_discursando.php', true)">Expediente</a>
    <a class="btn btn-danger" onclick="abrirPagina('exibe_pauta.php', true)">Pauta</a>
    <a class="btn btn-danger" onclick="abrirPagina('tv.php', true)">TV</a>
</span>
<div class="abas procedimento" style="display: none;">
    <?php
    if (!empty($liberar_row['votacao_projeto'])) {
        ?>
        <div style="background-color: #FFF;">
            <h1>
                Votação Aberta!<br/>
                Projeto: <?php echo $liberar_row['votacao_projeto']; ?>
            </h1>
            <button class="btn btn-danger" style="font-size: 20px;" onclick="confirma('Deseja encerrar a votação do projeto?', function () {
                            abrirPagina('encerrar.php');
                        })">
                Encerrar Votação
            </button> 
            <br/>
            <br/>
        </div>

        <?php
    } else if (!empty($liberar_row['expediente'])) {
        ?>
        <div style="background-color: #FFF;">
            <h1>
                Iniciado <?php echo $liberar->getExpediente(); ?>
            </h1>
            <button class="btn btn-danger" style="font-size: 20px;" onclick="confirma('Deseja encerrar o grande expediente?', function () {
                            abrirPagina('encerrar.php');
                        })">
                Encerrar Expediente
            </button> 
            <br/>
            <br/>
        </div>
        <?php
    } else {
        ?>
        <fieldset class="fieldset" style="background: #FFF; width: 100%;" >
            <table class="table">
                <caption><h3>Iniciar Procedimento</h3></caption>
                <tr>
                    <td>Tipo de Procedimento<br/>
                        <label class="btn btn-warning btn-block" style="padding: 2px; text-align: left; width: 90%;"><input name="tipo" type="radio" onchange="$('.opcoes').hide(); $('.projeto').show();"/>Votação de Projeto</label>
                        <label class="btn btn-warning btn-block" style="padding: 2px; text-align: left; width: 90%;"><input name="tipo" type="radio" onchange="$('.opcoes').hide(); $('.emenda').show();"/>Votação de Emenda</label>
                        <label class="btn btn-warning btn-block" style="padding: 2px; text-align: left; width: 90%;"><input name="tipo" type="radio" onchange="$('.opcoes').hide(); $('.expediente').show();"/>Expediente</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="abrir_votacao.php" class="opcoes projeto" style="display: none;">
                            <select required name="projeto" class="form-control" style="width: 80%; display: inline-block;">
                                <option value=""> - Selecione um Projeto - </option>
                                <?php
                                $projeto = new projeto();
                                $projeto_rs = $projeto->obterTodos();
                                foreach ($projeto_rs as $projeto_row) {
                                    echo "<option value='{$projeto_row['id']}' data-descricao='{$projeto_row['descricao']}'>{$projeto_row['nome']}</option>";
                                }
                                ?>
                            </select>
                            <input type="submit" class="btn btn-success" value="Iniciar" style="width: 18%;"/>
                        </form>
                        <form action="abrir_expediente.php" class="opcoes expediente" style="display: none;">
                            <select name="tempo" class="form-control" style="width: 80%; display: inline-block;">
                                <option value="pequeno">Abrir Pequeno Expediente</option>
                                <option value="grande">Abrir Grande Expediente</option>
                                <option value="explicacao">Abrir Explicação Pessoal</option>
                                <option value="debate">Abrir Debate de Projetos</option>
                            </select>
                            <input type="submit" class="btn btn-success" value="Iniciar" style="width: 18%;"/>
                        </form>
                    </td>
                </tr>
            </table>
        </fieldset>
        <?php
    }
    ?>
</div>

<div class="abas pauta">
    <h1>
        Iniciado <?php echo $liberar->getExpediente(); ?>
    </h1>
    <h2>Pauta do Dia</h2>
    <table style="width: 100%">
        <tr>
            <td style="width: 50%; vertical-align: top">
                <h2>Projetos em Pauta</h2>
                <ul style="width: 90%;" class="list-group">
                    <?php
                    $projeto = new projeto();
                    $projeto_rs = $projeto->obterPorOrdem();
                    foreach ($projeto_rs as $i => $projeto_row) {
                        if ($i == 0) {
                            ?>
                            <li class="list-group-item projeto active">
                                <?php echo $projeto_row['nome']; ?>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li class="list-group-item projeto">
                                <?php echo $projeto_row['nome']; ?>
                                <span class="badge badge-primary badge-pill"><img style="width: 20px" src="../auxiliares/ico/next.png" title="Retirar de Pauta" onclick="abrirPagina('ajustar_pauta.php?projeto=<?php echo $projeto_row['id']; ?>&acao=retirar&tipo=<?php echo $projeto_row['tipo']; ?>')"/></span>
                                <span class="badge badge-primary badge-pill"><img style="width: 20px" src="../auxiliares/ico/up.png" title="Priorizar" onclick="abrirPagina('ajustar_pauta.php?projeto=<?php echo $projeto_row['id']; ?>&acao=priorizar&tipo=<?php echo $projeto_row['tipo']; ?>')"/></span>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </td>
            <td style="vertical-align: top">
                <h2>Outros Projetos</h2>
                <ul style="width: 90%" class="list-group">
                    <?php
                    $projeto = new projeto();
                    $projeto_rs = $projeto->obterOutros();
                    foreach ($projeto_rs as $i => $projeto_row) {
                        ?>
                        <li class="list-group-item projeto">
                            <?php echo $projeto_row['nome']; ?>
                            <span class="badge badge-primary badge-pill"><img style="width: 20px" src="../auxiliares/ico/back.png" title="Colocar projeto em Pauta" onclick="abrirPagina('ajustar_pauta.php?projeto=<?php echo $projeto_row['id']; ?>&acao=adicionar&acao=adicionar&tipo=<?php echo $projeto_row['tipo']; ?>')"/></span>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </td>
        </tr>
    </table>


</div>
<div class="abas tv" style="display: none;">
    <h1>
        Iniciado <?php echo $liberar->getExpediente(); ?>
    </h1>
    <h1>Exibir na TV</h1>
    <span class="btn-group btn-group-justified">
        <a class="btn btn-primary" onclick="abrirPagina('tv_change.php?pagina=exibe_presenca.php')"><span class="middle"><input <?php if ($liberar_row['tv'] == 'exibe_presenca.php') echo "checked"; ?> type="checkbox"/></span><span class="middle">Tela de Presença</span></a>
        <a class="btn btn-primary" onclick="abrirPagina('tv_change.php?pagina=exibe_resultado_votacao.php')"><span class="middle"><input <?php if ($liberar_row['tv'] == 'exibe_resultado_votacao.php') echo "checked"; ?> type="checkbox"/></span><span class="middle">Tela de Votação</span></a>
        <a class="btn btn-primary" onclick="abrirPagina('tv_change.php?pagina=exibe_discursando.php')"><span class="middle"><input <?php if ($liberar_row['tv'] == 'exibe_discursando.php') echo "checked"; ?> type="checkbox"/></span><span class="middle">Tela de Expediente</span></a>
        <a class="btn btn-primary" onclick="abrirPagina('tv_change.php?pagina=exibe_pauta.php')"><span class="middle"><input <?php if ($liberar_row['tv'] == 'exibe_pauta.php') echo "checked"; ?> type="checkbox"/></span><span class="middle">Tela de Pauta</span></a>
    </span>
    <hr/>
    <!-- TV -->
    <iframe style="width: 100%; height: 550px;" src="tv.php"></iframe>
</div>