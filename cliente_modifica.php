<?php
include_once './config/init.php';

$title = 'Pagina aggiornamento cliente';
$cliente = Cliente::Cerca($_GET);
?>

<!-- header -->
<?php
include './templates/header.php';
?>

<!-- contenuto pagina -->
<table>

</table>

<!-- footer -->
<?php
include './templates/footer.php';
?>
