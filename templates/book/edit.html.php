<?php
include '../templates/header.html.php';
?>

<h1>Modifier un livre</h1>

<form action="/book/update/<?= $data[1]->getId() ?>" method="post">
    <label for="title">Titre :</label>
    <input type="text" name="title" id="title" value="<?= $data[1]->getTitle() ?>">
    <br>
    <label for="author">Auteur :</label>
    <select name="author" id="author">
        <?php foreach ($data[2] as $author) : ?>
            <option value="<?= $author->getId() ?>" <?php if ($author->getId() == $data[1]->getAuthorId()) : ?>selected<?php endif; ?>><?= $author->getFirstname() . ' ' . $author->getLastname() ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="category">Catégorie :</label>
    <select name="category" id="category">
        <?php foreach ($data[3] as $category) : ?>
            <option value="<?= $category->getId() ?>" <?php if ($category->getId() == $data[1]->getCategoryId()) : ?>selected<?php endif; ?>><?= $category->getName() ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="library">Bibliothèque :</label>
    <?php
    $counter = 0;
    foreach ($data[4] as $library) : ?>
        <input type="checkbox" name="library[]" id="library" value="<?= $library->getId() ?>" 
        <?php foreach ($data[1]->getLibrary() as $bookLibrary) : ?>
            <?php if ($bookLibrary->getId() == $library->getId()) : ?>
                checked
            <?php endif; ?>
        <?php endforeach; ?>
        >
        <?= $library->getName() ?>
    <?php endforeach; ?>
    
    <br>
    <input type="hidden" name="id" value="<?= $data[1]->getId() ?>">
    <input type="submit" value="Modifier">
</form>

<p><?= $data[0] ?></p>

<a href="/book/one/<?= $data[1]->getId() ?>">Retour</a>