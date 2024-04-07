<?php
include '../templates/header.html.php';
?>

<h1>Liste des auteurs :</h1>

<a class="link-success link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="/author/add">Ajouter un auteur</a>

<?php foreach ($data as $author) : ?>
    <p>
        <a class="link-underline-opacity-0link-offset-2 link-underline link-underline-opacity-0" href="/author/one/<?= $author->getId()?>">
            <?= $author->getId() ?> <?= $author->getFirstname() ?> <?= $author->getLastname() ?> - Livres : <?= $author->getBooksLength(); ?>
        </a>
    </p>    
<?php endforeach; ?>

<?php
include '../templates/footer.html.php';
?>