<?php
include '../templates/header.html.php';
?>

<h1>Supprimer une catégorie</h1>

<p>Êtes-vous sûr de vouloir supprimer cette catégorie ?</p>

<p><?= $data[0]->getName() ?></p>

<form action="/category/deleted" method="post">
    <input type="hidden" name="id" value="<?= $data[0]->getId() ?>">
    <input type="submit" value="Supprimer">
    <a href="/category/one/<?= $data[0]->getId() ?>">Annuler</a>
</form>