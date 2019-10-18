<meta charset="UTF-8"/>
<?php
date_default_timezone_set('America/Sao_Paulo');
include("../auxiliares/autoload.php");
$palavra = new palavra();
$palavra->removerPalavra($_GET['vereador']);
