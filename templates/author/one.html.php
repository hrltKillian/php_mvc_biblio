<?php
include '../templates/header.html.php';
?>

<h1><?= $data[0]->getFirstname()," ", $data[0]->getLastname(); ?></h1>

<a href="/author/edit/<?= $data[0]->getId()?>">Modifier</a>

<a href="/author/delete/<?= $data[0]->getId()?>">Supprimer</a>

<a href="/author/all">Retour</a>