<?php
include '../templates/header.html.php';
?>

<h1><?= $data->getFirstname()," ", $data->getLastname(); ?></h1>

<a href="/author/edit/<?= $data->getId()?>">Modifier</a>

<a href="/author/delete/<?= $data->getId()?>">Supprimer</a>

<a href="/author/all">Retour</a>