<?php
include '../templates/header.html.php';
?>

<body>
    <h1>Supprimer une bibliothèque</h1>

    <p>Êtes-vous sûr de vouloir supprimer cette bibliothèque ?</p>

    <p><?= $data[0]->getName() ?></p>

    <form action="/library/deleted" method="post">
        <input type="hidden" name="id" value="<?= $data[0]->getId() ?>">
        <input type="submit" value="Supprimer">
        <a href="/library/one/<?= $data[0]->getId() ?>">Annuler</a>
    </form>
</body>