<?php
include '../templates/header.html.php';
?>

<body>
    <h1>Liste des catégories :</h1>

    <a href="/category/add">Ajouter une catégorie</a>

    <?php foreach ($data as $category) : ?>
        <p>
            <a href="/category/one/<?= $category->getId()?>">
                <?= $category->getId() ?> <?= $category->getName() ?>
            </a>
        </p>    
    <?php endforeach; ?>
</body>