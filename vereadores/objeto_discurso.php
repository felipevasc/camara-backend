<?php

$_GET['ajax'] = true;
include("cabecalho.php");
$discurso = new discurso();
$row = $discurso->getDiscurso();
$discurso = array();

if (empty($row['vereador'])) {
    $discurso['img_vereador'] = '../auxiliares/images/pessoa.png';
    $discurso['nome_vereador'] = 'VISITANTE';
} else {
    $vereador = new vereador();
    $vereador_row = $vereador->get($row['vereador']);
    $discurso['img_vereador'] = $vereador_row['imagem'];
    $discurso['nome_vereador'] = $vereador_row['nome_urna'];
}
if (!empty($row['pausado'])) {
    $t = $row['pausado'];
    $h = (int) ($t / (60 * 60));
    $t -= $h * 60 * 60;
    $m = (int) ($t / 60);
    $t -= $m * 60;
    $s = $t;
    if (empty($row['inicio_adicional'])) {
        $discurso['tempo_adicional'] = str_pad($h, 2, '0', STR_PAD_LEFT) . ":" . str_pad($m, 2, '0', STR_PAD_LEFT) . ':' . str_pad($s, 2, '0', STR_PAD_LEFT);
    } else {
        $discurso['tempo_normal'] = str_pad($h, 2, '0', STR_PAD_LEFT) . ":" . str_pad($m, 2, '0', STR_PAD_LEFT) . ':' . str_pad($s, 2, '0', STR_PAD_LEFT);
    }
} else {
    if (empty($row['inicio_normal'])) {
        if (empty($row['segundos_normal'])) {
            $discurso['tempo_normal'] = "00:00:00";
        } else {
            $t = $row['segundos_normal'];
            $h = (int) ($t / (60 * 60));
            $t -= $h * 60 * 60;
            $m = (int) ($t / 60);
            $t -= $m * 60;
            $s = $t;
            $discurso['tempo_normal'] = str_pad($h, 2, '0', STR_PAD_LEFT) . ":" . str_pad($m, 2, '0', STR_PAD_LEFT) . ':' . str_pad($s, 2, '0', STR_PAD_LEFT);
        }
    } else {
        if (empty($row['pausado'])) {
            $tmp = explode(':', $row['inicio_normal']);
            $tempo_adicional = mktime($tmp[0], $tmp[1], $tmp[2], 1, 1, 2000);
            $tempo_agora = mktime(date('H'), date('i'), date('s'), 1, 1, 2000);
            $decorrido = $tempo_agora - $tempo_adicional;
            $total = $row['segundos_normal'];
            if ($total >= $decorrido) {
                $inicio = mktime(0, 0, 0, 1, 1, 2000);
                $inicio += $total;
                $inicio -= $decorrido;
                $discurso['tempo_normal'] = date("H:i:s", $inicio);
            } else {
                $discurso['tempo_normal'] = "00:00:00";
            }
        } else {
            $t = $row['pausado'];
            $h = (int) ($t / (60 * 60));
            $t -= $h * 60 * 60;
            $m = (int) ($t / 60);
            $t -= $m * 60;
            $s = $t;
            $discurso['tempo_normal'] = str_pad($h, 2, '0', STR_PAD_LEFT) . ":" . str_pad($m, 2, '0', STR_PAD_LEFT) . ':' . str_pad($s, 2, '0', STR_PAD_LEFT);
        }
    }

    if (empty($row['inicio_adicional'])) {
        if (empty($row['segundos_adicional'])) {
            $discurso['tempo_adicional'] = "00:00:00";
        } else {
            $t = $row['segundos_adicional'];
            $h = (int) ($t / (60 * 60));
            $t -= $h * 60 * 60;
            $m = (int) ($t / 60);
            $t -= $m * 60;
            $s = $t;
            $discurso['tempo_adicional'] = str_pad($h, 2, '0', STR_PAD_LEFT) . ":" . str_pad($m, 2, '0', STR_PAD_LEFT) . ':' . str_pad($s, 2, '0', STR_PAD_LEFT);
        }
    } else {
        $tmp = explode(':', $row['inicio_adicional']);
        $tempo_adicional = mktime($tmp[0], $tmp[1], $tmp[2], 1, 1, 2000);
        $tempo_agora = mktime(date('H'), date('i'), date('s'), 1, 1, 2000);
        $decorrido = $tempo_agora - $tempo_adicional;
        $total = $row['segundos_adicional'];
        if ($total >= $decorrido) {
            $inicio = mktime(0, 0, 0, 1, 1, 2000);
            $inicio += $total;
            $inicio -= $decorrido;
            $discurso['tempo_adicional'] = date("H:i:s", $inicio);
        } else {
            $discurso['tempo_adicional'] = "00:00:00";
        }
    }
}

$discurso['inicio_normal'] = $row['inicio_normal'];
$discurso['inicio_adicional'] = $row['inicio_adicional'];
$discurso['segundos_normal'] = $row['segundos_normal'];
$discurso['segundos_adicional'] = $row['segundos_adicional'];

$palavra = new palavra();
$vereador = new vereador();
$palavra_rs = $palavra->getByData(date('Y-m-d'));
$discurso['fila'] = array();
foreach ($palavra_rs as $i => $palavra_row) {
    if (empty($palavra_row['vereador'])) {
        $discurso['fila'][$i]['img'] = '../auxiliares/images/pessoa.png';
        $discurso['fila'][$i]['nome'] = 'VISITANTE';
        $discurso['fila'][$i]['id'] = 0;
    } else {
        $vereador_row = $vereador->get($palavra_row['vereador']);
        $discurso['fila'][$i]['img'] = $vereador_row['imagem'];
        $discurso['fila'][$i]['nome'] = $vereador_row['nome_urna'];
        $discurso['fila'][$i]['id'] = $vereador_row['id'];
    }
}
if (count($palavra_rs) == 0) {
    $discurso['fila'][0]['img'] = '../auxiliares/images/pessoa.png';
    $discurso['fila'][0]['nome'] = 'VAZIA';
    $discurso['fila'][0]['id'] = 0;
}

echo json_encode($discurso);
