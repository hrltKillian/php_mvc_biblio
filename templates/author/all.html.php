<?php
include '../templates/header.html.php';
?>

<h1>Liste des auteurs :</h1>

<a href="/author/add">Ajouter un auteur</a>

<?php foreach ($data as $author) : ?>
    <p>
        <a href="/author/one/<?= $author->getId()?>">
            <?= $author->getFirstname() ?> <?= $author->getLastname() ?>
        </a>
    </p>    
<?php endforeach; ?>