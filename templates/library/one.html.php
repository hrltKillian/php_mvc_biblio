<?php
include '../templates/header.html.php';
?>

<h1><?= $data[0]->getName() ?></h1>

<a href="/library/edit/<?= $data[0]->getId()?>">Modifier</a>

<a href="/library/delete/<?= $data[0]->getId()?>">Supprimer</a>

<a href="/library/all">Retour</a>