<?php
include '../templates/header.html.php';
?>

<h1>Liste des bibliothèques :</h1>

<a href="/library/add">Ajouter une bibliothèque</a>

<?php foreach ($data as $library) : ?>
    <p>
        <a href="/library/one/<?= $library->getId()?>">
            <?= $library->getId() ?> <?= $library->getName() ?>
        </a>
    </p>    
<?php endforeach; ?>