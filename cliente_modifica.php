<?php
include_once './config/init.php';

$title = 'Pagina aggiornamento cliente';
if (count($_POST) > 0) :
    $risultato = Cliente::Aggiorna($_POST);
    $cliente = Cliente::Cerca($_POST);
else :
    $cliente = Cliente::Cerca($_GET);
endif;
var_dump($cliente);
?>

<!-- header -->
<?php
include './templates/header.php';
?>

<!-- contenuto pagina -->
<form method="post" action="cliente_modifica.php">
    <input type="hidden" name="clienteid" value="<?php echo $cliente['ClienteID'] /* $cliente['ClienteID']; */ ?>" />
    <table>
        <tr>
            <td><label>Nome</label></td>
            <td><input name="nome" value="<?php echo $cliente['Nome']; ?>" /></td>
        </tr>
        <tr>
            <td><label>Cognome</label></td>
            <td><input name="cognome" value="<?php echo $cliente['Cognome']; ?>" /></td>
        </tr>
        <tr>
            <td><label>Email</label></td>
            <td><input name="email" value="<?php echo $cliente['Email']; ?>" /></td>
        </tr>
    </table>
    <button type="submit">Aggiorna cliente</button>
</form>

<!-- footer -->
<?php
include './templates/footer.php';
?>
