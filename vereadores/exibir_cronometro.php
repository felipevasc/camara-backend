
    <div class="reloj" id="Horas">00</div>
    <div class="reloj" id="Minutos">:00</div>
    <div class="reloj" id="Segundos">:00</div>
    <div class="reloj" id="Centesimas" style="display: none;">:00</div>

    <!--
    <input type="button" class="boton" id="inicio" value="Start &#9658;" onclick="inicio();">
    <input type="button" class="boton" id="parar" value="Stop &#8718;" onclick="parar();" disabled>
    <input type="button" class="boton" id="continuar" value="Resume &#8634;" onclick="inicio();" disabled>
    <input type="button" class="boton" id="reinicio" value="Reset &#8635;" onclick="reinicio();" disabled>
    -->
<style>
    #contenedor{
        margin: 10px auto;
        width: 540px;
        height: 115px;
    }
    .reloj{
        float: left;
        font-size: 60px;
        font-family: Courier,sans-serif;
        color: #363431;
    }
    .boton{
        outline: none;
        border: 1px solid #363431;
        color: white;
        width: 40px;
        height: 35px;
        text-shadow: 0px -1px 1px black;
        font-size: 20px;
        border-radius: 5px;
        font-family: Helvetica;
        cursor: pointer;
        background-image: linear-gradient(#3a02ad,#2c056f);
    }
    .boton.verde{
        background-image: linear-gradient(#6cAf45,#7aEd42);
    }
    .boton.vermelho{
        background-image: linear-gradient(#FFAf45,#FFEd42);
    }
    .boton:disabled{
        background-image: linear-gradient(#6cAf45,#7aEd42);
    }
    .boton:hover{
        box-shadow: 0px 0px 14px #3aad02;
    }
</style>
<script>
    var centesimas = 0;
    var segundos = 0;
    var minutos = 0;
    var horas = 0;
    var iniciado = 0;
    var control = 0;
    $(function(){
        startCronometro();
    });
    function startCronometro() {
        control = setTimeout(cronometro, 10);
    }
    
    function inicarCronometro() {
        iniciado = 1;
        chamarPaginaAjax('iniciar_cronometro.php');
    }

    function pausarCronometro() {
        chamarPaginaAjax('pausar_cronometro.php');
        iniciado = 0;
    }

    function pararCronometro() {
        chamarPaginaAjax('parar_cronometro.php');
        iniciado = 0;
        centesimas = 0;
        segundos = 0;
        minutos = 0;
        horas = 0;
        Centesimas.innerHTML = ":00";
        Segundos.innerHTML = ":00";
        Minutos.innerHTML = ":00";
        Horas.innerHTML = "00";
    }

    function cronometro() {
        chamarPaginaAjax('tempo_cronometro.php', '', function (r) {
            var tempo = JSON.parse(r);
            alteraTempoPrevisto(tempo['previsto']);
            if (tempo['pausado'] == '') {
                $('#botao_parar').attr('disabled', 'disabled');
                $('#botao_pausar').removeAttr('disabled');
                $('#botao_iniciar').removeAttr('disabled');
            }
            else if (tempo['pausado'] == '1') {
                $('#botao_pausar').attr('disabled', 'disabled');
                $('#botao_parar').removeAttr('disabled');
                $('#botao_iniciar').removeAttr('disabled');
            }
            else if (tempo['pausado'] == '0') {
                $('#botao_iniciar').attr('disabled', 'disabled');
                $('#botao_parar').removeAttr('disabled');
                $('#botao_pausar').removeAttr('disabled');
            }
            horas = Math.floor(tempo['tempo'] / (60 * 60));
            tempo['tempo'] = tempo['tempo'] - (horas * 60 * 60);
            minutos = Math.floor(tempo['tempo'] / 60);
            tempo['tempo'] = tempo['tempo'] - (minutos * 60);
            segundos = tempo['tempo'];

            Segundos.innerHTML = ":" + ('00' + segundos).slice(-2);
            Minutos.innerHTML = ":" + ('00' + minutos).slice(-2);
            Horas.innerHTML = ('00' + horas).slice(-2);
            atualizaTempos();
            control = setTimeout(cronometro, 250);
        });
    }
</script>