<?php
include '../templates/header.html.php';
?>

<h1>Ajouter un livre</h1>

<form class="form-check form-switch" action="/book/insert" method="post">
    <label class="form-label" for="title">Titre :</label>
    <input class="form-control" type="text" name="title" id="title">
    <br>
    <label class="form-label" for="author">Auteur :</label>
    <select class="form-select" name="author" id="author">
        <?php foreach ($data[1] as $author) : ?>
            <option value="<?= $author->getId() ?>"><?= $author->getFirstname() . ' ' . $author->getLastname() ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label class="form-label" for="category">Catégorie :</label>
    <select class="form-select" name="category" id="category">
        <?php foreach ($data[2] as $category) : ?>
            <option value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label class="form-label" for="library">Bibliothèque :</label>
    <br>
    <?php foreach ($data[3] as $library) : ?>
        <input class="btn-check" type="checkbox" name="library[]" id="<?=$library->getName()?>" value="<?= $library->getId() ?>">
        <label class="btn btn-outline-primary" for="<?=$library->getName()?>"><?=$library->getName()?></label>
    <?php endforeach; ?>
    <br>
    <input class="btn btn-primary my-3" type="submit" value="Ajouter">
    <a class="btn btn-secondary my-3" href="book/all">Retour</a>
</form>

<p class="text-danger"><?=$data[0]?></p>

<?php
include '../templates/footer.html.php';
?>