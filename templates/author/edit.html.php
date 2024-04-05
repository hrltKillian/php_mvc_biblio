<?php
include '../templates/header.html.php';
?>

<h1>Modifier un auteur</h1>

<form action="/author/update/<?= $data->getId()?>" method="post">
    <label for="firstname">Prénom :</label>
    <input type="text" name="firstname" id="firstname" value="<?= $data->getFirstname()?>">
    <br>
    <label for="lastname">Nom :</label>
    <input type="text" name="lastname" id="lastname" value="<?= $data->getLastname()?>">
    <br>
    <input type="submit" value="Modifier">
</form>

<a href="/author/one/<?= $data->getId()?>">Retour</a>