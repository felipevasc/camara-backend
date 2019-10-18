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
        if ($('#senha').val() == '') {
            alert('Informe a Senha');
        }
        else {
            if (checkSenha()) {
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
            else {
                alert('Senha Inválida');
            }
        }

    }
</script>
<style>
    .botao2 {
        display: inline-block;
        width: 100%;
        height: 50px;
        line-height: 50px;
        border-top: #666666 solid 4px;
        border-left: #666666 solid 4px;
        border-right: #000000 solid 4px;
        border-bottom: #000000 solid 4px;
        border-radius: 10px;
        background: linear-gradient(to bottom, rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%);
        color: #FFFFFF;
        font-weight: bold;
        font-size: 20px;
        text-align: center;
        cursor: pointer;
        margin: 2px;
    }
    .botao2:hover {
        background: linear-gradient(to bottom, rgba(89,92,97,1) 0%,rgba(20,20,20,1) 100%);
    }
    .btn {
        width: 180px;
        height: 60px;
        font-weight: bold;
        color: #000000;
        border-radius: 19px;
    }
    .btn.btn-success {
        background: none;
        background: linear-gradient(to top, rgba(164,179,87,1), rgba(194,209,137,1), rgba(164,179,87,1));
        
    }
    .btn.btn-danger {
        background: none;
        background: linear-gradient(to bottom, rgba(248,80,50,1) 0%,rgba(241,111,92,1) 50%,rgba(240,47,23,1) 100%,rgba(241,111,92,1) 100%,rgba(231,56,39,1) 100%,rgba(240,47,23,1) 102%);
    }
    .btn.btn-primary {
        background: none;
        background: linear-gradient(to top, #6666AA, #AAAAFF, #6666AA);
    }
    .btn.btn-warning {
        background: none;
        background: linear-gradient(to top, #AAAA33, #FFFF77, #AAAA33);
    }
    body {
        background: linear-gradient(to bottom, rgba(59,103,158,1) 0%,rgba(43,136,217,1) 100%,rgba(125,185,232,1) 100%); 
    }
    table.teclado {
        margin: 0 auto;
    }
    table.teclado thead td input{
        width: 100%;
        height: 100%;
        border-radius: 20px;
    }
    table.teclado td:not(.x) {
        width: 170px;
        height: 70px;
        text-align: center;
        border: #888888 solid 3px;
        border-radius: 20px;
        background: linear-gradient(to bottom, rgba(255,214,94,1) 0%,rgba(254,191,4,1) 100%);
        font-size: 50px;
        font-weight: bold;
        color: #000000;
        cursor: pointer;
    }
    table.teclado td:active {
        background: linear-gradient(to bottom, rgba(255,168,76,1) 0%,rgba(255,123,13,1) 100%);
    }
    table.listagem {
        width: 100%;
    }
    table.listagem td {
        height: 65px;
        background-color: rgba(255, 255, 255, 0.3);
        border-radius: 20px;
        padding: 5px;
        text-align: center;
        cursor: pointer;
    }
</style>
<?php
include("../auxiliares/autoload.php");
$autoload = true;
$vereador = new vereador();
if (empty($_GET['vereador'])) {
    $vereador_rs = $vereador->obterTodos();
    ?>
    <table class="listagem">
        <tr>
            <?php
            foreach ($vereador_rs as $i => $vereador_row) {
                if ($i % 3 == 0) {
                    echo "</tr><tr>";
                }
                echo "<td onclick=\"window.location.href='login_vereador.php?vereador={$vereador_row['id']}'\">{$vereador_row['nome_urna']}</td>";
            }
            ?>
        </tr>
    </table>
    <?php
} else {

    $liberar = new liberar();
    $presenca = new presenca();
    $vereador_row = $vereador->get($_GET['vereador']);
    ?>

    <script>
        function sha1(str) {
            var hash
            try {
                var crypto = require('crypto')
                var sha1sum = crypto.createHash('sha1')
                sha1sum.update(str)
                hash = sha1sum.digest('hex')
            } catch (e) {
                hash = undefined
            }

            if (hash !== undefined) {
                return hash
            }

            var _rotLeft = function (n, s) {
                var t4 = (n << s) | (n >>> (32 - s))
                return t4
            }

            var _cvtHex = function (val) {
                var str = ''
                var i
                var v

                for (i = 7; i >= 0; i--) {
                    v = (val >>> (i * 4)) & 0x0f
                    str += v.toString(16)
                }
                return str
            }

            var blockstart
            var i, j
            var W = new Array(80)
            var H0 = 0x67452301
            var H1 = 0xEFCDAB89
            var H2 = 0x98BADCFE
            var H3 = 0x10325476
            var H4 = 0xC3D2E1F0
            var A, B, C, D, E
            var temp

            // utf8_encode
            str = unescape(encodeURIComponent(str))
            var strLen = str.length

            var wordArray = []
            for (i = 0; i < strLen - 3; i += 4) {
                j = str.charCodeAt(i) << 24 |
                        str.charCodeAt(i + 1) << 16 |
                        str.charCodeAt(i + 2) << 8 |
                        str.charCodeAt(i + 3)
                wordArray.push(j)
            }

            switch (strLen % 4) {
                case 0:
                    i = 0x080000000
                    break
                case 1:
                    i = str.charCodeAt(strLen - 1) << 24 | 0x0800000
                    break
                case 2:
                    i = str.charCodeAt(strLen - 2) << 24 | str.charCodeAt(strLen - 1) << 16 | 0x08000
                    break
                case 3:
                    i = str.charCodeAt(strLen - 3) << 24 |
                            str.charCodeAt(strLen - 2) << 16 |
                            str.charCodeAt(strLen - 1) <<
                            8 | 0x80
                    break
            }

            wordArray.push(i)

            while ((wordArray.length % 16) !== 14) {
                wordArray.push(0)
            }

            wordArray.push(strLen >>> 29)
            wordArray.push((strLen << 3) & 0x0ffffffff)

            for (blockstart = 0; blockstart < wordArray.length; blockstart += 16) {
                for (i = 0; i < 16; i++) {
                    W[i] = wordArray[blockstart + i]
                }
                for (i = 16; i <= 79; i++) {
                    W[i] = _rotLeft(W[i - 3] ^ W[i - 8] ^ W[i - 14] ^ W[i - 16], 1)
                }

                A = H0
                B = H1
                C = H2
                D = H3
                E = H4

                for (i = 0; i <= 19; i++) {
                    temp = (_rotLeft(A, 5) + ((B & C) | (~B & D)) + E + W[i] + 0x5A827999) & 0x0ffffffff
                    E = D
                    D = C
                    C = _rotLeft(B, 30)
                    B = A
                    A = temp
                }

                for (i = 20; i <= 39; i++) {
                    temp = (_rotLeft(A, 5) + (B ^ C ^ D) + E + W[i] + 0x6ED9EBA1) & 0x0ffffffff
                    E = D
                    D = C
                    C = _rotLeft(B, 30)
                    B = A
                    A = temp
                }

                for (i = 40; i <= 59; i++) {
                    temp = (_rotLeft(A, 5) + ((B & C) | (B & D) | (C & D)) + E + W[i] + 0x8F1BBCDC) & 0x0ffffffff
                    E = D
                    D = C
                    C = _rotLeft(B, 30)
                    B = A
                    A = temp
                }

                for (i = 60; i <= 79; i++) {
                    temp = (_rotLeft(A, 5) + (B ^ C ^ D) + E + W[i] + 0xCA62C1D6) & 0x0ffffffff
                    E = D
                    D = C
                    C = _rotLeft(B, 30)
                    B = A
                    A = temp
                }

                H0 = (H0 + A) & 0x0ffffffff
                H1 = (H1 + B) & 0x0ffffffff
                H2 = (H2 + C) & 0x0ffffffff
                H3 = (H3 + D) & 0x0ffffffff
                H4 = (H4 + E) & 0x0ffffffff
            }

            temp = _cvtHex(H0) + _cvtHex(H1) + _cvtHex(H2) + _cvtHex(H3) + _cvtHex(H4)
            return temp.toLowerCase()
        }
        function abrirPagina(pagina, novaAba) {
            if (typeof novaAba == 'undefined' || novaAba === false) {
                setTimeout(function () {
                    window.location.href = pagina;
                }, 100);
            }
            else {
                window.open(pagina);
            }
        }

        $(function () {
            $('table.teclado').find('td.botao').click(function () {
                $('#senha').val($('#senha').val() + '' + $(this).html());
            });
            $('table.teclado').find('td.remover').click(function () {
                $('#senha').val($('#senha').val().substr(0, $('#senha').val().length - 1));
            });
        });
        function checkSenha() {
            if (sha1($('#senha').val()) == '<?php echo $vereador_row['senha']; ?>') {
                return true;
            }
            else {
                return false;
            }
        }
        function palavra() {
            if ($('#senha').val() == '') {
                alert('Informe a Senha');
            }
            else {
                if (checkSenha()) {
                    abrirPagina('solicitar_palavra.php?vereador=<?php echo $vereador_row['id']; ?>');
                }
                else {
                    alert('Senha Inválida');
                }
            }
        }
        function presenca() {
            if ($('#senha').val() == '') {
                alert('Informe a Senha');
            }
            else {
                if (checkSenha()) {
                    abrirPagina('solicitar_presenca.php?vereador=<?php echo $vereador_row['id']; ?>');
                }
                else {
                    alert('Senha Inválida');
                }
            }
        }
        function sair() {
            if ($('#senha').val() == '') {
                alert('Informe a Senha');
            }
            else {
                if (checkSenha()) {
                    abrirPagina('solicitar_sair.php?vereador=<?php echo $vereador_row['id']; ?>');
                }
                else {
                    alert('Senha Inválida');
                }
            }
        }
        function votacao() {
            if ($('#senha').val() == '') {
                alert('Informe a Senha');
            }
            else {
                if (checkSenha()) {
                    abrirPagina('exibe_votacao.php?vereador=<?php echo $vereador_row['id']; ?>');
                }
                else {
                    alert('Senha Inválida');
                }
            }
        }
    </script>
    <img src="../auxiliares/ico/listagem1.png" style="position: fixed;" onclick="window.location.href = 'login_vereador.php'"/>
    <img src="../auxiliares/ico/alternar.png" style="position: fixed; top: 50px; background-color: rgba(255, 255, 255, 0.5); border-radius: 10px;" onclick="window.location.href = window.location.href"/>
    <table style="margin: 0 auto;">
        <caption style="text-align: center;">
            <!-- <img src="<?php echo $vereador_row['imagem']; ?>" style="width: 150px; height: 150px;"/><br/> -->
            <h1>
                <?php echo $vereador_row['nome_urna']; ?>
            </h1>
        </caption>
        <tr>
            <td style="text-align: right">
                <table class="teclado">
                    <thead>
                        <tr>
                            <td colspan="3">
                                <input style="font-size: 80px;" type="password" readonly="readonly" name="senha" id="senha" placeholder="Senha" onclick="if ($(this).attr('type') == 'password') {
                                                $(this).attr('type', 'text')
                                            } else {
                                                $(this).attr('type', 'password')
                                            }"/>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="botao">1</td>
                            <td class="botao">2</td>
                            <td class="botao">3</td>
                            <td class="x" rowspan="4" style="background: none;">
                                <div id="btn_vereador">
                                    <?php
                                    include("./botoes_vereador.php");
                                    ?>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td class="botao">4</td>
                            <td class="botao">5</td>
                            <td class="botao">6</td>
                        </tr>
                        <tr>
                            <td class="botao">7</td>
                            <td class="botao">8</td>
                            <td class="botao">9</td>
                        </tr>
                        <tr>
                            <td class="botao" colspan="2">0</td>
                            <td class="remover">◀</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td style="text-align: left; vertical-align: bottom;">
                <script>
                    $(function () {
                        setTimeout(function () {
                            atualizarBotoesVereador();
                        }, 10000)
                    })
                    function atualizarBotoesVereador() {
                        chamarPaginaAjax('botoes_vereador.php?vereador=<?php echo $_GET['vereador']; ?>', '', function (r) {
                            $('#btn_vereador').html(r);
                            setTimeout(function () {
                                atualizarBotoesVereador()
                            }, 10000)
                        });
                    }
                    function chamarPaginaAjax(pagina, parametros, callback, retry) {
                        var p = parametros;
                        if (typeof parametros == 'undefined') {
                            parametros = '';
                        }
                        if (parametros == '') {
                            parametros = 'ajax=true';
                        } else {
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
                </script>
            </td>
        </tr>
    </table>
    <?php
}