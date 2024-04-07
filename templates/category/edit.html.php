<?php
include '../templates/header.html.php';
?>


<h1>Modifier une catégorie</h1>

<form action="/category/update/<?= $data[1]->getId()?>" method="post">
    <label class="form-label" for="name">Nom :</label>
    <input class="form-control" type="text" name="name" id="name" value="<?= $data[1]->getName()?>">
    <br>
    <input type="hidden" name="id" value="<?= $data[1]->getId()?>">
    <input class="btn btn-primary mb-3" type="submit" value="Modifier">
</form>

<p class="text-danger"><?=$data[0]?></p>

<a class="btn btn-secondary mb-3" href="/category/one/<?= $data[1]->getId()?>">Retour</a>

<?php
include '../templates/footer.html.php';
?>