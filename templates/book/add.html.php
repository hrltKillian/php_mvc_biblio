<?php
include '../templates/header.html.php';
?>

<h1>Ajouter un livre</h1>

<form action="/book/insert" method="post">
    <label for="title">Titre :</label>
    <input type="text" name="title" id="title">
    <br>
    <label for="author">Auteur :</label>
    <select name="author" id="author">
        <?php foreach ($data[1] as $author) : ?>
            <option value="<?= $author->getId() ?>"><?= $author->getFirstname() . ' ' . $author->getLastname() ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="category">Catégorie :</label>
    <select name="category" id="category">
        <?php foreach ($data[2] as $category) : ?>
            <option value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="library">Bibliothèque :</label>
    <?php foreach ($data[3] as $library) : ?>
        <input type="checkbox" name="library[]" id="library" value="<?= $library->getId() ?>"><?= $library->getName() ?>
    <?php endforeach; ?>
    <br>
    <input type="submit" value="Ajouter">
</form>

<p><?=$data[0]?></p>