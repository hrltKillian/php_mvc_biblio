<?php
include '../templates/header.html.php';
?>

<h1>Liste des bibliothèques :</h1>

<a class="link-success link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="/library/add">Ajouter une bibliothèque</a>

<?php foreach ($data as $library) : ?>
    <p>
        <a class="link-underline-opacity-0link-offset-2 link-underline link-underline-opacity-0" href="/library/one/<?= $library->getId()?>">
            <?= $library->getId() ?> <?= $library->getName() ?>
        </a>
    </p>    
<?php endforeach; ?>

<?php
include '../templates/footer.html.php';
?>