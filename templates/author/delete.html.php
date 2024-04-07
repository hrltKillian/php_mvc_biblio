<?php
include '../templates/header.html.php';
?>

<h1>Supprimer un auteur</h1>

<p>Êtes-vous sûr de vouloir supprimer cet auteur ?</p>

<p class="text-bg-danger p-3">Tous les livres contenant cet auteur seront eux aussi supprimer !</p>

<p><?= $data[0]->getFirstname() . ' ' . $data[0]->getLastname() ?></p>

<form action="/author/deleted" method="post">
    <input type="hidden" name="id" value="<?= $data[0]->getId() ?>">
    <input class="btn btn-danger mb-3" type="submit" value="Supprimer">
    <a class="btn btn-secondary mb-3" href="/author/one/<?= $data[0]->getId() ?>">Annuler</a>
</form>

<?php
include '../templates/footer.html.php';
?>