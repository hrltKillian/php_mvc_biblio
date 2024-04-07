<?php
include '../templates/header.html.php';
?>

<body>
    <h1>Supprimer un livre</h1>

    <p>Êtes-vous sûr de vouloir supprimer ce livre ?</p>

    <p><?= $data[0]->getTitle() ?></p>

    <form action="/book/deleted" method="post">
        <input type="hidden" name="id" value="<?= $data[0]->getId() ?>">
        <input type="submit" value="Supprimer">
        <a href="/book/one/<?= $data[0]->getId() ?>">Annuler</a>
    </form>
</body>