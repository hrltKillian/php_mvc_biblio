<?php
include '../templates/header.html.php';
?>

<h1>Supprimer une bibliothèque</h1>

<p>Êtes-vous sûr de vouloir supprimer cette bibliothèque ?</p>

<p class="text-bg-danger p-3">Tous les livres contenant cette bibliothèque seront eux aussi supprimer !</p>

<h2 class="m-5"><?= $data[0]->getName() ?></h2>

<form action="/library/deleted" method="post">
    <input type="hidden" name="id" value="<?= $data[0]->getId() ?>">
    <input class="btn btn-danger mb-3" type="submit" value="Supprimer">
    <a class="btn btn-secondary mb-3" href="/library/one/<?= $data[0]->getId() ?>">Annuler</a>
</form>

<?php
include '../templates/footer.html.php';
?>