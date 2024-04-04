<?php
include '../header.html.php';
?>

<h1>Liste des auteurs :</h1>

<a href="/authors/add">Ajouter un auteur</a>

<?php foreach ($data as $author) : ?>
    <p>
        <a href="/">
            <?= $author->getFirstname() ?> <?= $author->getLastname() ?>
        </a>
    </p>    
<?php endforeach; ?>