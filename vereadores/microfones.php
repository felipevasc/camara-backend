<script src="../auxiliares/jquery.js"></script>
<meta charset="UTF-8"/>
<?php
if (!empty($_GET['atualiza'])) {
    ?>
    <script>
        window.onload = function () {
            setTimeout(function () {
                window.location.href = window.location.href
            }, 1000)
        }
    </script>
    <?php
}
?>
<style>
    table.listagem {
        width: 100%;
    }
    table.listagem td {
        height: 65px;
        background-color: rgba(255, 255, 255, 0.3);
        border-radius: 20px;
        padding: 5px;
        text-align: left;
        cursor: pointer;
    }
    body {
        background: linear-gradient(to top, #7777D6, #87B6EE, #7777D6);
    }
</style>
<?php
include("../auxiliares/autoload.php");
$vereador = new vereador();
$vereador_rs = $vereador->obterTodos();
?>
<table class="listagem">
    <tr>
        <td colspan="3" style="text-align: center" onclick="window.location.href = 'microfone.php'">
            <?php
            $liberar = new liberar();
            $row = $liberar->getDados();
            if (empty($row['microfone'])) {
                $img = "bola_vermelha.png";
            } else {
                $img = "bola_verde.png";
            }
            echo "<span style='display: inline-block; vertical-align: middle'><img src='../auxiliares/ico/{$img}'/></span>";
            echo "<span style='display: inline-block; vertical-align: middle'>BANCADA</span>";
            ?>
        </td>
    </tr>
    <tr>
<?php
foreach ($vereador_rs as $i => $vereador_row) {
    if ($i % 3 == 0) {
        echo "</tr><tr>";
    }
    if (empty($vereador_row['microfone'])) {
        $img = "bola_vermelha.png";
    } else {
        $img = "bola_verde.png";
    }
    echo "<td onclick=\"window.location.href='microfone.php?vereador={$vereador_row['id']}'\">";
    echo "<span style='display: inline-block; vertical-align: middle'><img src='../auxiliares/ico/{$img}'/></span>";
    echo "<span style='display: inline-block; vertical-align: middle'>{$vereador_row['nome']}</span>";

    echo "</td>";
}
?>
    </tr>
</table>
<img src="../auxiliares/ico/configuracao.png" style="position: fixed; top: 2px; left: 2px; width: 30px;" onclick="window.location.href = 'exibe_configuracao.php';"/>