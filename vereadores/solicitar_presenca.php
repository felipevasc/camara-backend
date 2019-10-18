<meta charset="UTF-8"/>
<?php
include("../auxiliares/autoload.php");
$presenca = new presenca();
$tmp = array();
$tmp['vereador'] = $_GET['vereador'];
$tmp['data'] = date('Y-m-d H:i:s');


if (!$presenca->check($tmp['vereador'])) {
    $ok = $presenca->set($tmp);
}
echo "<script>alert('Presença confirmada!'); window.location.href='login_vereador.php?vereador={$tmp['vereador']}'; </script>";