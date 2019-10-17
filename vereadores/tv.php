<?php
$_GET['esconde_menu'] = true;
$_GET['autoload'] = true;
include("cabecalho.php");
unset($_GET['autoload']);
?>
<script>
    var pagina = '';
<?php
if (!empty($_GET['pagina'])) {
    echo "pagina = '{$_GET['pagina']}'; ";
}
?>
    function checkMudanca() {
        chamarPaginaAjax('tv_check.php', '', function (r) {
            console.log(r)
            if (pagina != r) {
                window.location.href = 'tv.php?pagina=' + r
            }
            else {
                setTimeout(checkMudanca, 2000);
            }
        });
    }
    $(function () {
        checkMudanca();
    });
</script>
<?php
if (!empty($_GET['pagina'])) {
    ?>
<iframe style='width: 100%; height: 1000px' src='<?php echo $_GET['pagina']; ?>'></iframe>
    <?php
}