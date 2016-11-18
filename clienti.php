<?php
include_once './config/init.php';

$title = 'Pagina clienti';

$clienti = Cliente::Tutti();
?>

<!-- header -->
<?php
include './templates/header.php';
?>

<h1>Lista clienti</h1>

<!-- contenuto pagina -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Email</th>
            <th />
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clienti as $value) : ?>
            <tr>
                <td><?php echo $value['ClienteID']; ?></td>
                <td><?php echo $value['Nome']; ?></td>
                <td><?php echo $value['Cognome']; ?></td>
                <td><?php echo $value['Email']; ?></td>
                <td>
                    <a href="cliente_modifica.php?clienteid=<?php echo $value['ClienteID']; ?>">
                        Modifica
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- footer -->
<?php
include './templates/footer.php';
?>
