<meta charset="UTF-8"/>
<?php
include("../auxiliares/autoload.php");
$presenca = new presenca();
$tmp = array();
$tmp['vereador'] = $_GET['vereador'];
$tmp['data'] = date('Y-m-d H:i:s');
$row =  $presenca->getByVereador($tmp['vereador'], $tmp['data']);
$presenca->delete($row['id']);
echo "<script>alert('Você saiu!'); window.location.href='login_vereador.php?vereador={$tmp['vereador']}'; </script>";