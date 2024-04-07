<?php
include '../templates/header.html.php';
?>

<h1><?= $data[0]->getName() ?></h1>

<a class="btn btn-primary mb-3" href="/library/edit/<?= $data[0]->getId()?>">Modifier</a>

<a class="btn btn-danger mb-3" href="/library/delete/<?= $data[0]->getId()?>">Supprimer</a>

<a class="btn btn-secondary mb-3" href="/library/all">Retour</a>

<?php
include '../templates/footer.html.php';
?>