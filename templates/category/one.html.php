<?php
include '../templates/header.html.php';
?>

<h1><?= $data[0]->getName() ?></h1>

<a href="/category/edit/<?= $data[0]->getId()?>">Modifier</a>

<a href="/category/delete/<?= $data[0]->getId()?>">Supprimer</a>

<a href="/category/all">Retour</a>