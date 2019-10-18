<script src="../auxiliares/jquery.js"></script>
<script src="../auxiliares/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="../auxiliares/jquery-ui.css">
<meta charset="UTF-8"/>
<script>
    function abrirPagina(pagina, novaAba) {
        if (typeof novaAba == 'undefined' || novaAba === false) {
            mascara();
            setTimeout(function () {
                window.location.href = pagina;
            }, 100);
        }
        else {
            window.open(pagina);
        }
    }

    function chamarPaginaAjax(pagina, parametros, callback, retry) {
        var p = parametros;
        if (typeof parametros == 'undefined') {
            parametros = '';
        }
        if (parametros == '') {
            parametros = 'ajax=true';
        }
        else {
            parametros = parametros + "&ajax=true";
        }
        var ajax = new XMLHttpRequest();
        ajax.open("POST", pagina, true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4) {
                if (ajax.status == 200) {
                    if (typeof callback == 'function') {
                        callback(ajax.responseText);
                    }
                }
                else {
                    if (typeof retry == 'undefined') {
                        retry = 0;
                    }
                    if (retry < 4) {
                        retry++;
                        chamarPaginaAjax(pagina, p, callback, retry);
                    }
                    else {
                        alert("Erro " + ajax.status + "\nVocê pode estar tendo problemas com a sua conexão e suas alterações podem não estar sendo salvas");
                    }
                }
            }
        }
        ajax.send(parametros);
    }
    function mascara() {
        removerMascara();
        var tela = "<span class='mascara' style='display: inline-block; height: 100%; width: 100%; position: fixed; top: 0; left: 0; background-color: #000000; opacity: 0.3; z-index: 1;'></span>";
        var conteudo = "<span class='mascara' style='display: inline-block; height: 100%; width: 100%; position: fixed; top: 0; left: 0; z-index: 2; vertical-align: middle; text-align: center;'>" +
                "<span style='display: inline-block; width: 550px; height: 20px; margin-top: 30px; text-align: right;'>" +
                "   <img class='remover_mascara' title='Fechar' src='../auxiliares/ico/cancelar.png' style='width: 16px; cursor: pointer; padding-right: 5px;' onclick='removerMascara()'/>" +
                "</span><br/>" +
                "<span id='conteudo_mascara' style='overflow: auto; display: inline-block; width: 550px; height: 550px; background-color: #FFFFFF; border-radius: 10px; z-index: 3;'></span>" +
                "<table class='aguarde_mascara' style='margin: 0 auto; height: 75%;'><tr><td><img src='../auxiliares/img/aguarde.gif' style='border-radius: 10px;'/></td></tr></table>" +
                "</span>";
        $('body').append(tela);
        $('body').append(conteudo);
        $('.remover_mascara').hide();
        $('#conteudo_mascara').hide();
    }

    function removerMascara() {
        $('.mascara').remove();
    }

    function alterarConteudoMascara(conteudo) {
        $('#conteudo_mascara').html(conteudo);
        $('.aguarde_mascara').hide();
        $('#conteudo_mascara').show();
        $('.remover_mascara').show();
    }
    function confirma(texto, funcaoSim) {
        var div = "<div class='alerta_x'>" +
                texto +
                "</div>";
        $('body').append(div);
        $('.alerta_x').dialog(
                {
                    position: {at: "top"},
                    modal: true,
                    resizable: true,
                    title: "Confirmação",
                    closeOnEscape: false,
                    open: function (event, ui) {
                        $(this).parent().children().children('.ui-dialog-titlebar-close').hide();
                    },
                    buttons: {
                        Nao: function () {
                            $('.alerta_x').remove();
                        },
                        Sim: function () {
                            if (typeof funcaoSim == 'function') {
                                funcaoSim();
                            }
                            $('.alerta_x').remove();
                        }
                    }
                });
    }
</script>
<?php
include("../auxiliares/autoload.php");

$vereador = new vereador();
$projeto = new projeto();
$tipoVoto = new tipoVoto();
$liberar = new liberar();

$vereador_row = $vereador->get($_GET['vereador']);
$projeto_row = $liberar->getDados();
$rs = $tipoVoto->obterTodos();
?>
<style>
    body {
        background: linear-gradient(to top, #7777D6, #87B6EE, #7777D6);
    }
    .botao {
        display: inline-block;
        width: 30%;
        height: 50px;
        line-height: 50px;
        border: #AAAAAA solid 4px;
        border-radius: 10px;
        background: linear-gradient(to bottom, rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%);
        color: #FFFFFF;
        font-weight: bold;
        font-size: 20px;
        cursor: pointer;
    }
</style>
<div style="margin: 0 auto; margin-top: 10px; padding-top: 10px; height: 470px; width: 850px; border-radius: 30px; background: linear-gradient(0deg, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.5)); ">
    <table>
        <tr>
            <td style="vertical-align: top; text-align: center;">
                <img src="<?php echo $vereador_row['imagem']; ?>" style="width: 150px; height: 150px; border-radius: 25px;"/><br/>
                <h2>
                    <?php echo $vereador_row['nome_urna']; ?><br/>
                </h2>
            </td>
            <td style="text-align: center">
                <h1><?php echo $projeto_row['votacao_projeto']; ?></h1>
                <h4 style="display: inline-block; width: 530px; height: 250px; overflow-y: scroll; background-color: rgba(255, 255, 255, 0.8); border-radius: 20px; padding: 8px;"><p style="text-align: justify"><?php echo $projeto_row['texto_projeto']; ?></p></h4>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <?php
                foreach ($rs as $row) {
                    ?>
                    <span class="botao" onclick="confirma('Tem certeza que deseja confirmar seu voto como <?php echo $row['nome']; ?>?', function () {
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
                ?>
            </td>
        </tr>
    </table>
</div>