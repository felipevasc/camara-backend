<?php
$_GET['esconde_menu'] = true;
include("cabecalho.php");
$vereador = new vereador();

$cronometro = new cronometro();
?>
<script>
    $('body').keypress(function () {
        requestFullScreen();
    })
    function requestFullScreen() {

        var el = document.body;

        // Supports most browsers and their versions.
        var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen
                || el.mozRequestFullScreen || el.msRequestFullScreen;

        if (requestMethod) {

            // Native full screen.
            requestMethod.call(el);

        } else if (typeof window.ActiveXObject !== "undefined") {

            // Older IE.
            var wscript = new ActiveXObject("WScript.Shell");

            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
    }
</script>
<style>
    .grid {
        width: 100%;
        height: 700px;
        display: inline-block;
        border: #000 solid 1px;
        border-radius: 5px;
        background: none;
        background-color: #BE272C;
        background-image: url("../auxiliares/images/bg1.png")
    }
    .grid .tela_auxiliar {
        position: relative;
        width: 650px;
        height: 610px;
        margin-top: 1px;

        display: inline-block;
        overflow-x: none;
        border: #A8A8A8 solid 1px;
        border-radius: 7px;
        background: none;
        background-color: #FFFFFF;
    }
    .grid .titulo {
        margin: 0 auto;
        height: 50px;
        line-height: 50px;

        font-size: 1em;

        color: #333333;
        font-weight: bold;
        text-shadow: 0px 1px 0px rgba(255,255,255,0.7);
        display: inline-block;
        width: 100%;
        background: none;
        background: linear-gradient(0deg, rgba(255,255,255,0.2) 20%, rgba(255,255,255,0.8) 100%) !important;
        background-color: #C4C4C4 !important;
        border-top-left-radius: 7px;
        border-top-right-radius: 7px;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
        border: 1px solid #a8a8a8;
        vertical-align: middle;
        margin-bottom: 15px;
    }
    .sortable li {
        cursor: move;
        user-select: none;
    }
    .grid ul {
        list-style-type: upper-roman;
        margin: 0;
        padding: 0;
    }


    .grid ul li:hover {
        background: linear-gradient(0deg, rgba(255,255,255,0.2) 20%, rgba(255,255,255,0.8) 100%) !important;
        background-color: #85b2cb !important;
    }
    .grid ul li {
        width: 620px;
        height: 75px;
        overflow-x: hidden;
        line-height: 30px;
        font-size: 90%;
        margin: 1px;
        padding: 2px;
        text-align: left;
    }
    .grid .listagem {
        display: inline-block;
        height: 540px;
        overflow-y: scroll;
        white-space: nowrap;
    }
    .botoes_relogio {
        display: inline-block;
        position: absolute;
        bottom: -0px;
        left: 5px;
    }
</style>
<script>
    listaOrdenada = function (event, ui) {
        console.log(event.target)
    }
</script>

<span class="titulo">
            PRESIDENTE DA CÂMARA: VALDECI VIEIRA DE AZEVEDO
        </span>


<span class="grid">
    <br/>
    <?php
    $sessao = new sessao();
    $sessao_rs = $sessao->obterTodos();
    if (count($sessao_rs) == 0) {
        ?>
<!--        <input type="button" class="boton verde" value="Abrir Inscrição Palavra" style="width: 300px;" onclick="chamarPaginaAjax('abrir_votacao.php', '', function () {
                        abrirPagina('apresentacao.php')
                    })"/>-->
               <?php
           } else {
               ?>
<!--       <input type="button" class="boton vermelho" value="Encerrar Inscrição Palavra" style="width: 300px;" onclick="chamarPaginaAjax('encerrar_votacao.php', '', function () {
                        abrirPagina('apresentacao.php')
                    })"/>-->
               <?php
           }
           ?>

    <br/><br/>
<!--    <span class="tela_auxiliar" style="float: left; margin-left: 10px;">
        <span class="titulo">
            ORDEM DO DIA
        </span>
        <span class="listagem">
            <?php /*
            include("listagem_projetos.php");*/
            ?>
        </span>
        <br/><br/>
        <input type="button" class="boton verde" value="Adicionar Projeto" style="width: 300px;" onclick="paginaMascara('seleciona_projeto_ordem.php')"/>
    </span>-->
    <span class="tela_auxiliar" style="float: right; margin-right: 10px;">
        <span class="titulo">
            Lista de Uso da Palavra
        </span>
        <script>
        $(function(){
            setInterval(function(){
                chamarPaginaAjax('uso_palavra.php?att=true', '', function(r) {
                   $('#uso_palavra').html(r); 
                });
            }, 3000);
        })
        </script>
        <span class="listagem" id="uso_palavra">
            <?php
            include("uso_palavra.php");
            ?>
        </span>
    </span>
    <span class="tela_auxiliar">
        <span class="titulo">Discursando</span>
        <script>
            $(function(){
                setInterval(function(){
                    chamarPaginaAjax('discursando.php', '', function(r) {
                        $('#discurso').html(r);
                    }
                    );
                }, 1000);
            })
        </script>
        <span id="discurso">
            <?php
            include("discursando.php");
            ?>
        </span>
        <span class="relogio">
            <?php
            include("exibir_cronometro.php");
            ?>
        </span>
        <span class="botoes_relogio">
            <?php
            $cronometro = new cronometro();

            $cronometro_rs = $cronometro->obterTodos();
            ?>
<!--           <span style="display: inline-block; vertical-align: middle">
                <input id="botao_iniciar" type="button" value="&#9658;" class="boton" onclick="inicarCronometro();" />
            </span>
            <span style="display: inline-block; vertical-align: middle">
                <input id="botao_pausar" type="button" value="&#8741;" class="boton" onclick="pausarCronometro();"/>
            </span>
            <span style="display: inline-block; vertical-align: middle">
                <input id="botao_parar" type="button" value="&#8718;" class="boton" onclick="pararCronometro();"/>
            </span>-->
           <input type="hidden" id="valor_horas" value="0"/>
            <input type="hidden" id="valor_minutos" value="0"/>
            <input type="hidden" id="valor_segundos" value="10"/>
<!--            <input id="tempo_total" style="width: 300px; text-align: center;" type="text" class="boton" value="00:00:00"/>-->
<!--            <span style="display: inline-block; vertical-align: middle">
                <input type="button" value="&#0043;" class="boton" onclick="adicionarTempo()" id="adicionar_tempo"/>
            </span>-->
        </span>
    </span>
    <br/><br/>
    <?php
    if (count($sessao_rs) > 0) {
        ?>
        <input type="button" class="boton" style="width: 200px;" value="Solicitar Palavra" title="Solicitar Palavra" onclick="chamarPaginaAjax('solicitar_palavra.php', '', function () {
                        alerta('Você foi adicionado na lista de uso da palavra');
                    });"/>
               <?php
           }
           ?>

</span>


<?php
include("rodape.php");?>