<?php
include '../templates/header.html.php';
?>

<h1>Liste des livres :</h1>

<a class="link-success link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="/book/add">Ajouter un livre</a>

<?php foreach ($data as $book) : ?>
    <p>
        <a class="link-underline-opacity-0link-offset-2 link-underline link-underline-opacity-0" href="/book/one/<?= $book->getId()?>">
            <?= $book->getId() ?> <?= $book->getTitle() ?>
        </a>
    </p>    
<?php endforeach; ?>

<?php
include '../templates/footer.html.php';
?>