<?php
date_default_timezone_set('America/Sao_Paulo');

if (empty($_SESSION['ok'])) {
    session_start();
    $_SESSION['ok'] = true;
}
if (empty($_GET['autoload'])) {
    require '../auxiliares/autoload.php';
}
if (empty($_POST['ajax']) && empty($_GET['ajax'])) {
    ?>
    <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Câmara Municipal de Granja</title>
            <script src="../auxiliares/jquery.js"></script>
            <script src="../auxiliares/jquery-ui.js"></script>
            <script src="../auxiliares/chart/Chart.js"></script>
            <script src="../auxiliares/bootstrap.js"></script>
            <script src="../auxiliares/js.js"></script>
            <link rel="stylesheet" type="text/css" href="../auxiliares/jquery-ui.css">
            <link rel="stylesheet" type="text/css" href="../auxiliares/bootstrap.css">
            <link rel="stylesheet" type="text/css" href="../auxiliares/css.css">
        <img src="../auxiliares/img/aguarde.gif" style="display: none;"/>
        <img src="../auxiliares/img/carregando.gif" style="display: none;"/>
        
        <meta charset="UTF-8"/>
        <script>
            window.onload = function () {
                $('.menu-ui2').menu();
                $('.menu-ui2 ul li').css('width', '400px');
            }
            $(function () {
                $(".checkboxradio").checkboxradio();
                $(".sortable").sortable({
                    placeholder: "ui-state-highlight"
                });
                $(".sortable").sortable({
                    stop: function (event, ui) {
                        listaOrdenada(event, ui)
                    }
                });

            });
        </script>
    </head>
    <body>
        <table style="width: 100%;">
            <tbody>
                <tr>

                    <?php
                    if (empty($_GET['esconde_menu'])) {
                        ?>
                        <td style=" vertical-align: top; width: 200px;">
                            <ul class="menu-ui2" style=" margin: 0; border: 20; padding: 0; width: 200px;">
                                <li onclick="abrirPagina('inicio.php');">
                                    <span class="middle">
                                        <img src="../auxiliares/ico/casa.png"/>
                                    </span>
                                    <span class="middle">
                                        Tela Principal
                                    </span>
                                </li>
                                <li>
                                    <span class="middle">
                                        <img src="../auxiliares/ico/vereador.png"/>
                                    </span>
                                    <span class="middle">
                                        Vereadores
                                    </span>
                                    <ul>
                                        <li onclick="abrirPagina('vereadorForm.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/mais.png"/>
                                            </span>
                                            <span class="middle">
                                                Cadastro de Vereador
                                            </span>
                                        </li>
                                        <li onclick="abrirPagina('vereadorList.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/lista.png"/>
                                            </span>
                                            <span class="middle">
                                                Listagem de Vereadores
                                            </span>
                                        </li>
                                        <li onclick="abrirPagina('vereadorForm.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/mais.png"/>
                                            </span>
                                            <span class="middle">
                                                Cadastro de Suplente
                                            </span>
                                        </li>
                                        <li onclick="abrirPagina('vereadorList.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/lista.png"/>
                                            </span>
                                            <span class="middle">
                                                Listagem de Suplentes
                                            </span>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="middle">
                                        <img src="../auxiliares/ico/projeto.png"/>
                                    </span>
                                    <span class="middle">
                                        Projetos
                                    </span>
                                    <ul>
                                        <li onclick="abrirPagina('projetoForm.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/mais.png"/>
                                            </span>
                                            <span class="middle">
                                                Cadastrar
                                            </span>
                                        </li>                                       
                                        <li onclick="abrirPagina('projetoList.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/lista.png"/>
                                            </span>
                                            <span class="middle">
                                                Listagem
                                            </span>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="middle">
                                        <img src="../auxiliares/ico/projeto.png"/>
                                    </span>
                                    <span class="middle">
                                        Emendas
                                    </span>
                                    <ul>
                                        <li onclick="abrirPagina('emendaForm.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/mais.png"/>
                                            </span>
                                            <span class="middle">
                                                Cadastrar
                                            </span>
                                        </li>                                       
                                        <li onclick="abrirPagina('emendaList.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/lista.png"/>
                                            </span>
                                            <span class="middle">
                                                Listagem
                                            </span>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="middle">
                                        <img src="../auxiliares/ico/listagem1.png"/>
                                    </span>
                                    <span class="middle">
                                        Ordem do Dia
                                    </span>
                                    <ul>
                                        <li onclick="abrirPagina('projetoForm.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/mais.png"/>
                                            </span>
                                            <span class="middle">
                                                Cadastrar
                                            </span>
                                        </li>                                       
                                        <li onclick="abrirPagina('projetoList.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/lista.png"/>
                                            </span>
                                            <span class="middle">
                                                Listagem
                                            </span>
                                        </li>                                        
                                    </ul>
                                </li>
                                <li>
                                    <span class="middle">
                                        <img src="../auxiliares/ico/palavra.png"/>
                                    </span>
                                    <span class="middle">
                                        Palavra
                                    </span>
                                    <ul>
                                        <li onclick="abrirPagina('projetoForm.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/bola_verde.png"/>
                                            </span>
                                            <span class="middle">
                                                Abrir inscrições
                                            </span>
                                        </li>                                       
                                        <li onclick="abrirPagina('projetoList.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/bola_vermelha.png"/>
                                            </span>
                                            <span class="middle">
                                                Fechar inscrições
                                            </span>
                                        </li>
                                        <li onclick="abrirPagina('projetoList.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/mais.png"/>
                                            </span>
                                            <span class="middle">
                                                Solicitar inscrição
                                            </span>
                                        </li>
                                        <li onclick="abrirPagina('projetoList.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/lista.png"/>
                                            </span>
                                            <span class="middle">
                                                Lista de inscrições
                                            </span>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="middle">
                                        <img src="../auxiliares/ico/votar.png"/>
                                    </span>
                                    <span class="middle">
                                        Votação
                                    </span>
                                    <ul>
                                        <li onclick="abrirPagina('projetoForm.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/bola_verde.png"/>
                                            </span>
                                            <span class="middle">
                                                Abrir votação
                                            </span>
                                        </li>                                       
                                        <li onclick="abrirPagina('projetoList.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/bola_vermelha.png"/>
                                            </span>
                                            <span class="middle">
                                                Fechar votação
                                            </span>
                                        </li>
                                        <li onclick="abrirPagina('projetoList.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/mais.png"/>
                                            </span>
                                            <span class="middle">
                                                Votar
                                            </span>
                                        </li>
                                        <li onclick="abrirPagina('projetoList.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/lista.png"/>
                                            </span>
                                            <span class="middle">
                                                Histórico de votações
                                            </span>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="middle">
                                        <img src="../auxiliares/ico/comissao.png"/>
                                    </span>
                                    <span class="middle">
                                        Comissões
                                    </span>
                                    <ul>
                                        <li onclick="abrirPagina('comissaoForm.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/mais.png"/>
                                            </span>
                                            <span class="middle">
                                                Cadastro
                                            </span>
                                        </li>                                        
                                        <li onclick="abrirPagina('comissaoList.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/lista.png"/>
                                            </span>
                                            <span class="middle">
                                                Listagem
                                            </span>
                                        </li>  
                                    </ul>
                                </li>
                                <li>
                                    <span class="middle">
                                        <img src="../auxiliares/ico/partido.png"/>
                                    </span>
                                    <span class="middle">
                                        Partidos
                                    </span>
                                    <ul>
                                        <li onclick="abrirPagina('partidoForm.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/mais.png"/>
                                            </span>
                                            <span class="middle">
                                                Cadastrar
                                            </span>
                                        </li>                                       
                                        <li onclick="abrirPagina('partidoList.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/lista.png"/>
                                            </span>
                                            <span class="middle">
                                                Listagem
                                            </span>
                                        </li>

                                    </ul>
                                </li>

                                <li>
                                    <span class="middle">
                                        <img src="../auxiliares/ico/parecer.png"/>
                                    </span>
                                    <span class="middle">
                                        Pareceres
                                    </span>
                                    <ul>
                                        <li onclick="abrirPagina('parecerForm.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/mais.png"/>
                                            </span>
                                            <span class="middle">
                                                Cadastrar
                                            </span>
                                        </li>                                       
                                        <li onclick="abrirPagina('parecerList.php');">
                                            <span class="middle">
                                                <img src="../auxiliares/ico/lista.png"/>
                                            </span>
                                            <span class="middle">
                                                Listagem
                                            </span>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </td>
                        <?php
                    }
                    ?>


                    <td style="vertical-align: top; text-align: center;">
                        <div id="dialog" style="display: none; height: 620px;">
                            <img src="../auxiliares/ico/x.png" style="width: 450px; height: 600px;"/>
                        </div>
                        <?php
                    }