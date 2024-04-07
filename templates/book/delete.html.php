<?php
include '../templates/header.html.php';
?>

<h1>Supprimer un livre</h1>

<p>Êtes-vous sûr de vouloir supprimer ce livre ?</p>

<p><?= $data[0]->getTitle() ?></p>

<form action="/book/deleted" method="post">
    <input type="hidden" name="id" value="<?= $data[0]->getId() ?>">
    <input class="btn btn-danger mb-3" type="submit" value="Supprimer">
    <a class="btn btn-secondary mb-3" href="/book/one/<?= $data[0]->getId() ?>">Annuler</a>
</form>

<?php
include '../templates/footer.html.php';
?>