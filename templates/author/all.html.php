<?php
include '../templates/header.html.php';
?>

<body>
    <h1>Liste des auteurs :</h1>

    <a href="/author/add">Ajouter un auteur</a>

    <?php foreach ($data as $author) : ?>
        <p>
            <a href="/author/one/<?= $author->getId()?>">
                <?= $author->getId() ?> <?= $author->getFirstname() ?> <?= $author->getLastname() ?> - Livres : <?= $author->getBooksLength(); ?>
            </a>
        </p>    
    <?php endforeach; ?>
</body>