<?php
$_GET['esconde_menu'] = true;
include("cabecalho.php");
$permissao_edicao = true;
$liberar = new liberar();
$liberar_row = $liberar->getDados();
if (!empty($liberar_row['inicio_sessao']) && $liberar_row['inicio_sessao'] != '0000-00-00 00:00:00') {
    $tmp = explode(" ", $liberar_row['inicio_sessao']);
    $data = explode("-", $tmp[0]);
    $hora = explode(":", $tmp[1]);
    echo "<script> inicioSessao = new Date({$data[0]}, {$data[1]}, {$data[2]}, {$hora[0]}, {$hora[1]}, {$hora[2]}); </script>";
    echo "<script> $(function(){ relogioSessao(); }); </script>";
}
?>
<style>
    body {
        background: linear-gradient(1deg, #000000, #444444, #222222, #000000);
    }
    #conteudo11 {
        padding: 20px;
        background: linear-gradient(10deg, #9c5825, #Dc9865, #9c5825);
        border-radius: 20px;
    }
    #conteudo211 {
        background: none;
        background-image: url('../auxiliares/images/fundo_9.jpg');
        border: #000 solid 3px;

    }
    .foto_principal {
        display: inline-block;
        width: 550px;
        white-space: nowrap;
        overflow-x: hidden;
        text-align: center;

    }
    .topo {
        width: 100%;
        text-align: center;
        padding-bottom: 5px;
        font-size: 30px;
        color: #c5fce7;
        font-style: italic;
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5));
        font-weight: bold;
    }
    .btn-primary {
        background: none;
        background-color: rgba(255, 255, 255, 0.5)
    }
    .contador {
        font-size: 90px;
        font-weight: bold;
        font-family: monospace;
        background-color: rgba(255, 255, 255, 0.85);
        border-radius: 30px;
        width: 660px;
        height: 220px;
        margin-top: 90px;
        color: #22A900;
        display: inline-block;
        position: absolute;
        bottom: 0;
        right: 40px;
    }
    .contador .adicional {
        color: #2200A9;
    }
    #fila button {
        padding: 0;
    }
    #fila img {
        width: 150px; 
        height: 150px; 
        border-radius: 10px;
    }
</style>
<br/><br/>
<div id="conteudo">
    <div id="conteudo2">
        <div class="topo">
            <span class="middle">
                <?php
                echo $liberar->getExpediente();
                ?>
            </span>
        </div>
        <img src="../auxiliares/images/bg666.png" style="width: 450px; position: absolute; left: 100px; top: 80px;"/>
        <table style="width: 90%; margin: 0 auto;">
            <tr>
                <td style="text-align: center; position: relative;">
                    <span class="contador">
                        <div>
                            <span class="middle">
                                <img src="../auxiliares/images/relogio2.png" style="width: 80px;" onclick="confirma('Deseja adicionar 10 minutos ao tempo?', function () {
                                            chamarPaginaAjax('adicionar_tempo_normal.php');
                                        })"/>
                            </span>
                            <span class="middle" id="tempo_normal">
                                00:00:00
                            </span>
                        </div>
                        <div>
                            <span class="middle">
                                <img src="../auxiliares/images/relogio2.png" style="width: 80px;" onclick="confirma('Deseja adicionar 1 minutos ao tempo?', function () {
                                            chamarPaginaAjax('adicionar_tempo_adicional.php');
                                        })"/>
                            </span>
                            <span class="middle adicional" id="tempo_adicional">
                                00:00:00
                            </span>
                        </div>
                    </span>
                </td>
                <td style="width: 50%; padding-top: 20px; text-align: left;">
                    <span class="foto_principal" style="position: relative;">
                        <img id="img_vereador" src="../auxiliares/images/pessoa.png" style="width: 460px; height: 580px; border-radius: 25px; border-top: 5px solid rgba(0, 0, 0, 0.7); border-left: 5px solid rgba(0, 0, 0, 0.7); border-right: 5px solid rgba(0, 0, 0, 0.5); border-bottom: 5px solid rgba(0, 0, 0, 0.5);"/>
                        <br/>
                        <span style="font-weight: bold; font-size: 35px; color: #c5fce7;" id="nome_vereador">
                            VISITANTE
                        </span>
                        <img class="img_play" id="iniciar" src="../auxiliares/images/play.png" style="position: absolute; top: 10px; left: 100px; cursor: pointer; display: none;" title="Iniciar Discurso" onclick="confirma('Deseja iniciar a contagem do discurso deste vereador?', function () {
                                    chamarPaginaAjax('iniciar_tempo_normal.php');
                                })"/>
                        <img class="img_play" id="parar" src="../auxiliares/images/cancel.png" style="position: absolute; top: 10px; left: 100px; cursor: pointer; display: none;" title="Parar Discurso" onclick="confirma('Deseja parar a contagem do discurso deste vereador?', function () {
                                    chamarPaginaAjax('parar_tempo.php');
                                })"/>
                    </span> 
                </td>
            </tr>
        </table>
        <br/><br/><br/>
        <div style="width: 90%; margin: 0 auto; overflow-x: hidden;" id="fila">

        </div>
    </div>
</div>
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

<img class="img_play" src="../auxiliares/ico/configuracao.png" style="position: fixed; top: 2px; right: 2px; width: 30px;" onclick="abrirPagina('exibe_configuracao.php');"/>
<img class="img_show" src="../auxiliares/ico/alternar.png" style="position: fixed; top: 2px; right: 32px; width: 30px;" onclick="$('.img_play').css('opacity', '1');
        $('.img_show').hide();
        $('.img_hide').show();"/>
<img class="img_hide" src="../auxiliares/ico/alternar.png" style="position: fixed; top: 2px; right: 32px; width: 30px;" onclick="$('.img_play').css('opacity', '0');
        $('.img_show').show();
        $('.img_hide').hide();"/>
<img class="img_play img_p" src="../auxiliares/ico/pause.png" style="position: fixed; top: 2px; right: 64px; width: 30px;" title="Pausar tempo" onclick="chamarPaginaAjax('pausar_tempo.php');"/>
<img class="img_play img_s" src="../auxiliares/ico/restart.png" style="position: fixed; top: 2px; right: 98px; width: 30px;" title="Retomar contagem" onclick="chamarPaginaAjax('retornar_tempo.php')"/>
<span class="img_play" style="position: fixed; top: 2px; right: 140px; display: inline-block">
    <?php
    if (!empty($liberar_row['expediente'])) {
        ?>
        <input type="button" style='height: 25px; line-height: 20px; vertical-align: middle; padding-top: 2px' class='btn btn-danger' value="Encerrar" onclick="confirma('Deseja encerrar o expediente?', function () {
                        abrirPagina('encerrar.php?destino=exibe_discursando.php');
                    })"/>
               <?php
           } else {
               ?>
        <input type="button" style='height: 25px; line-height: 20px; vertical-align: middle; padding-top: 2px' class='btn btn-success' value="Pequeno" onclick="confirma('Deseja iniciar o pequeno expediente?', function () {
                        abrirPagina('abrir_expediente.php?tempo=pequeno&destino=exibe_discursando.php');
                    })"/>
        <input type="button" style='height: 25px; line-height: 20px; vertical-align: middle; padding-top: 2px' class='btn btn-success' value="Grande" onclick="confirma('Deseja iniciar o grande expediente?', function () {
                        abrirPagina('abrir_expediente.php?tempo=grande&destino=exibe_discursando.php');
                    })"/>
        <input type="button" style='height: 25px; line-height: 20px; vertical-align: middle; padding-top: 2px' class='btn btn-success' value="Explicação" onclick="confirma('Deseja iniciar o expediente de explicação pessoal?', function () {
                        abrirPagina('abrir_expediente.php?tempo=explicacao&destino=exibe_discursando.php');
                    })"/>
        <input type="button" style='height: 25px; line-height: 20px; vertical-align: middle; padding-top: 2px' class='btn btn-success' value="Debate" onclick="confirma('Deseja iniciar o expediente de debate de projetos?', function () {
                        abrirPagina('abrir_expediente.php?tempo=debate&destino=exibe_discursando.php');
                    })"/>
               <?php
           }
           ?>
    <select  id="vereador_palavra">
        <option value="">Solicitar Palavra</option>
        <?php
        $vereador = new vereador();
        $vereador_rs = $vereador->obterTodos();
        foreach ($vereador_rs as $vereador_row) {
            echo "<option value='{$vereador_row['id']}'>{$vereador_row['nome_urna']}</option>";
        }
        ?>
    </select>  
    <input type="button" style='height: 25px; line-height: 20px; vertical-align: middle; padding-top: 2px' class='btn btn-warning' value="ADD" onclick="chamarPaginaAjax('solicitar_palavra.php?vereador=' + $('#vereador_palavra').val());"/>
    <input type="button" style='height: 25px; line-height: 20px; vertical-align: middle; padding-top: 2px' class='btn btn-warning' value="DEL" onclick="chamarPaginaAjax('remover_palavra.php?vereador=' + $('#vereador_palavra').val());"/>
    <button style='height: 25px; line-height: 20px; vertical-align: middle; padding-top: 2px' class='btn btn-default' onclick="audio.play()"><img src="../auxiliares/ico/mao_parar.png" style='width: 20px;'/></button>
    <button style='height: 25px; line-height: 20px; vertical-align: middle; padding-top: 2px' class='btn btn-default' onclick="audio1.play()"><img src="../auxiliares/ico/start.png" style='width: 20px;'/></button>
    <button style='height: 25px; line-height: 20px; vertical-align: middle; padding-top: 2px' class='btn btn-default' onclick="audio2.play()"><img src="../auxiliares/ico/desligar.png" style='width: 20px;'/></button>
</span>
<script>
    var audio_encerrado;
</script>
<audio id="audio">
    <source id="som" src="../auxiliares/som.mp3" type="audio/mp3" />
</audio>
<audio id="audio1">
    <source id="som" src="../auxiliares/inicio.mp3" type="audio/mp3" />
</audio>
<audio id="audio2">
    <source id="som" src="../auxiliares/fechada.mp3" type="audio/mp3" />
</audio>

<div id='relogio_sessao'></div>