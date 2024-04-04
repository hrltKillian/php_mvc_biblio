<?php
include '../header.html.php';
?>

<h1><?= $data->getFirstname()," ", $data->getLastname(); ?></h1>

<a href="/author/edit/<?= $data->getId()?>">Modifier</a>