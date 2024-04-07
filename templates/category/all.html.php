<?php
include '../templates/header.html.php';
?>

<h1>Liste des catégories :</h1>

<a class="link-success link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="/category/add">Ajouter une catégorie</a>

<?php foreach ($data as $category) : ?>
    <p>
        <a class="link-underline-opacity-0link-offset-2 link-underline link-underline-opacity-0" href="/category/one/<?= $category->getId()?>">
            <?= $category->getId() ?> <?= $category->getName() ?>
        </a>
    </p>    
<?php endforeach; ?>

<?php
include '../templates/footer.html.php';
?>