<?php
include_once './config/init.php';

$title = 'Pagina creazione cliente';

if (count($_POST) > 0) :
    $risultato = Cliente::AggiungiNuovo($_POST);
endif;
?>

<!-- header -->
<?php
include './templates/header.php';
?>

<!-- contenuto pagina -->

<h1>Aggiungi nuovo cliente</h1>

<div>
    <?php
    if (!isset($risultato)) :
    elseif (is_bool($risultato)) :
        echo 'TUTTO OK! Cliente creato!';
    elseif (is_string($risultato)) :
        echo $risultato;
    endif;
    ?>
</div>

<form method="post" action="">
    <table>
        <tr>
            <td><label>Nome</label></td>
            <td><input name="nome" /></td>
        </tr>
        <tr>
            <td><label>Cognome</label></td>
            <td><input name="cognome" /></td>
        </tr>
        <tr>
            <td><label>Email</label></td>
            <td><input name="email" /></td>
        </tr>
    </table>
    <button type="submit">Crea nuovo cliente</button>
</form>

<!-- footer -->
<?php
include './templates/footer.php';
?>
