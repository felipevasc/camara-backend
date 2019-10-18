<?php
include("cabecalho.php");
$discurso = new discurso();
$discurso_row = $discurso->getDiscurso();
if (empty($discurso_row['id'])) {
    $discurso->set(array());
    $discurso_row = $discurso->getDiscurso();
}
?>