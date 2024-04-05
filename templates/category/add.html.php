<?php
include '../templates/header.html.php';
?>

<h1>Ajouter une catégorie</h1>

<form action="/category/insert" method="post">
    <label for="name">Nom :</label>
    <input type="text" name="name" id="name">
    <br>
    <input type="submit" value="Ajouter">
</form>

<p><?=$data[0]?></p>