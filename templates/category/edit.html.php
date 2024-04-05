<?php
include '../templates/header.html.php';
?>

<h1>Modifier une catégorie</h1>

<form action="/category/update/<?= $data[1]->getId()?>" method="post">
    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" value="<?= $data[1]->getName()?>">
    <br>
    <input type="hidden" name="id" value="<?= $data[1]->getId()?>">
    <input type="submit" value="Modifier">
</form>

<p><?=$data[0]?></p>

<a href="/category/one/<?= $data[1]->getId()?>">Retour</a>