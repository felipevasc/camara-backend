<?php
$_GET['esconde_menu'] = true;
include_once("cabecalho.php");
?>
<style>
    body {
        background: linear-gradient(1deg, #000000, #444444, #222222, #000000);
    }
</style>
<div class="titulo_pauta">
    Pauta do Debate
</div>
<span class="conteudo_pauta">
    <span class="pauta_atual">
        <span class="pauta_atual_conteudo">
            <?php
            $projeto = new projeto();
            $vereador = new vereador();
            $emenda = new emenda();
            $projeto_rs = $projeto->obterPorOrdem();
            if (count($projeto_rs) > 0) {
                $projeto_row = $projeto_rs[0];
                ?>
                <h1><?php echo $projeto_row['nome']; ?></h1>
                <span class="autor"><strong>Autor do Projeto:</strong> <?php echo $projeto_row['autor']; ?></span><hr/>
                <?php
                if ($projeto_row['tipo'] == 'PROJETO') {
                    ?>
                    <span class="texto"><?php echo $projeto_row['descricao']; ?></span>
                    <span class="emendas">
                        <h2>Emendas Aprovadas</h2>
                        <?php
                        $emenda_rs = $emenda->getByProjeto($projeto_row['id']);
                        foreach ($emenda_rs as $emenda_row) {
                            ?>
                            <span class="emenda">
                                <?php
                                //echo "<span class='titulo'>{$emenda_row['nome']}</span> <br/> <span class='texto'>{$emenda_row['descricao']}</span>";
                                echo "<span class='titulo'>{$emenda_row['nome']}</span>";
                                ?>
                                <img src="../auxiliares/ico/check_ok.png"/>
                            </span>
                            <?php
                        }
                        ?>
                    </span>
                    <?php
                } else {
                    ?>
                    <span class="texto_emenda"><?php echo $projeto_row['descricao']; ?></span>
                    <?php
                }
                ?>

                <span class="comissoes">
                    <h2>Comissões</h2>
                    <?php
                    $comissaoProjeto = new comissao();
                    $comissao_rs = $comissaoProjeto->getByProjeto($projeto_row['projeto']);
                    foreach ($comissao_rs as $comissao_row) {
                        ?>
                        <span class="comissao">
                            <?php echo $comissao_row['nome']; ?>
                            <img src="../auxiliares/ico/check_ok.png"/>
                        </span>
                        <?php
                    }
                    ?>
                </span>

                <?php
            }
            ?>
        </span>
    </span>
    <span class="fila_pauta">
        <script>
            var discurso = {
                img_vereador: '../auxiliares/images/pessoa.png',
                nome_vereador: 'VISITANTE!',
                tempo_normal: '00:00:00',
                tempo_adicional: '00:00:00',
                inicio_normal: '',
                inicio_adicional: '',
                segundos_normal: 0,
                segundos_adicional: 0,
                fila: [
                    {img: '../auxiliares/images/pessoa.png', nome: 'VISITANTE', id: ''}
                ]
            }
            $(function () {
                ajusta(discurso);
                atualiza();
            });

            function atualiza() {
                chamarPaginaAjax('objeto_discurso.php', '', function (r) {
                    var obj = JSON.parse(r);
                    ajusta(obj);
                    setTimeout(function () {
                        atualiza();
                    }, 500);
                });
            }

            function ajusta(objeto) {
                $('#tempo_normal').html(objeto.tempo_normal);
                $('#tempo_adicional').html(objeto.tempo_adicional);
                $('#segundos_normal').html(objeto.segundos_normal);
                $('#segundos_adicional').html(objeto.segundos_adicional);
                $('#nome_vereador').html(objeto.nome_vereador);
                $('#img_vereador').attr('src', objeto.img_vereador);
                if (objeto.inicio_normal == '') {
                    $('#iniciar').show();
                    $('#parar').hide();
                } else {
                    $('#iniciar').hide();
                    $('#parar').show();
                }
                if (objeto.inicio_normal != '' && objeto.inicio_adicional == '' && objeto.segundos_adicional > 0 && objeto.tempo_normal == '00:00:00') {
                    chamarPaginaAjax('iniciar_tempo_adicional.php');
                }
                if (objeto.inicio_normal != '' && objeto.inicio_adicional != '' && objeto.tempo_normal == '00:00:00' && objeto.tempo_adicional == '00:00:00') {
                    chamarPaginaAjax('iniciar_tempo_adicional.php?reseta=true');
                    $('#tempo_adicional').css('color', '#A92200');
                } else {
                    $('#tempo_adicional').css('color', '#2200A9');
                }

                if (objeto.inicio_normal != '' && objeto.tempo_normal == '00:00:00') {
                    if (audio_encerrado != null) {
                        audio_encerrado.play();
                        audio_encerrado = null;
                    }
                } else {
                    audio_encerrado = $('#audio')[0];
                }
                ajustaFila(objeto.fila);
            }

            function ajustaFila(objFila) {
                var fila = '';
                var vereador_fila;
                var ok = true;
                for (var i = 0; i < objFila.length; i++) {
                    vereador_fila = objFila[i];
                    if (!$('#fila').find('button.n_' + i).hasClass('id_' + vereador_fila.id)) {
                        ok = false;
                    }
                    fila += "<button type='button' class='btn btn-primary n_" + i + " id_" + vereador_fila.id + "' onclick=\"selecionarVereador(" + vereador_fila.id + ")\"><img src='" + vereador_fila.img + "' /><br/>" + vereador_fila.nome + "</button>"
                }
                if (objFila != $('#fila').find('button').length) {
                    ok = false;
                }
                if (!ok) {
                    $('#fila').html(fila);
                }
            }
        </script>
        <span class="contador_pauta">
            <div>
                <span class="middle">

                    <img class="img_play" id="iniciar" src="../auxiliares/images/relogio2.png" style="width: 80px;" onclick="confirma('Deseja iniciar a contagem do discurso deste vereador?', function () {
                                    chamarPaginaAjax('iniciar_tempo_normal.php');
                                })"/>
                    <img class="img_play" id="parar" src="../auxiliares/images/relogio2.png" style="width: 80px;" onclick="confirma('Deseja parar a contagem do discurso deste vereador?', function () {
                                    chamarPaginaAjax('parar_tempo.php');
                                })"/>
                </span>
                <span class="middle" id="tempo_normal">
                    00:00:00
                </span>
            </div>
        </span>
        <ul class="list-group">
            <?php
            foreach ($projeto_rs as $i => $projeto_row) {
                if ($i == 0) {
                    continue;
                }
                ?>
                <li class="list-group-item projeto">
                    <?php echo $projeto_row['nome']; ?>
                </li>
                <?php
            }
            ?>
        </ul>
    </span>
</span>
