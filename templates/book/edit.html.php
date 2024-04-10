<?php
include '../templates/header.html.php';
?>

<h1>Modifier un livre</h1>

<form class="form-check" action="/book/update/<?= $data[1]->getId() ?>" method="post">
    <label class="form-label" for="title">Titre :</label>
    <input class="form-control" type="text" name="title" id="title" value="<?= $data[1]->getTitle() ?>">
    <br>
    <label class="form-label" for="author">Auteur :</label>
    <select class="form-select" name="author" id="author">
        <?php foreach ($data[2] as $author) : ?>
            <option value="<?= $author->getId() ?>" <?php if ($author->getId() == $data[1]->getAuthorId()) : ?>selected<?php endif; ?>><?= $author->getFirstname() . ' ' . $author->getLastname() ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label class="form-label" for="category">Catégorie :</label>
    <select class="form-select" name="category" id="category">
        <?php foreach ($data[3] as $category) : ?>
            <option value="<?= $category->getId() ?>" <?php if ($category->getId() == $data[1]->getCategoryId()) : ?>selected<?php endif; ?>><?= $category->getName() ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label class="form-label" for="library">Bibliothèque :</label>
    <?php
    $counter = 0;
    foreach ($data[4] as $library) : ?>
        <input class="btn-check" type="checkbox" name="library[]" id="<?=$library->getName()?>" value="<?= $library->getId() ?>"
        <?php foreach ($data[1]->getLibrary() as $bookLibrary) {
             if ($bookLibrary->getId() == $library->getId()) {
                    echo 'checked';
             }
            } ?>
        >
        <label class="btn btn-outline-primary" for="<?=$library->getName()?>"><?=$library->getName()?></label>
    <?php endforeach; ?>

    <br>

    <input type="hidden" name="id" value="<?= $data[1]->getId() ?>">
    <input class="btn btn-primary my-3" type="submit" value="Modifier">
</form>

<p class="text-danger"><?= $data[0] ?></p>

<a class="btn btn-secondary my-3" href="book/all">Retour</a>

<?php
include '../templates/footer.html.php';
?>