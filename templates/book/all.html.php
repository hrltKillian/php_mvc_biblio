<?php
include '../templates/header.html.php';
?>

<h1>Liste des livres :</h1>

<a href="/book/add">Ajouter un livre</a>

<?php foreach ($data as $book) : ?>
    <p>
        <a href="/book/one/<?= $book->getId()?>">
            <?= $book->getId() ?> <?= $book->getTitle() ?>
        </a>
    </p>    
<?php endforeach; ?>