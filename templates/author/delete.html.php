<?php
include '../templates/header.html.php';
?>

<body>
    <h1>Supprimer un auteur</h1>

    <p>Êtes-vous sûr de vouloir supprimer cet auteur ?</p>

    <p><?= $data[0]->getFirstname() . ' ' . $data[0]->getLastname() ?></p>

    <form action="/author/deleted" method="post">
        <input type="hidden" name="id" value="<?= $data[0]->getId() ?>">
        <input type="submit" value="Supprimer">
        <a href="/author/one/<?= $data[0]->getId() ?>">Annuler</a>
    </form>
</body>