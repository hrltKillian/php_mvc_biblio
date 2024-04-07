<?php
include '../templates/header.html.php';
?>

<h1>Modifier un auteur</h1>

<form action="/author/update/<?= $data[1]->getId()?>" method="post">
    <label class="form-label" for="firstname">Prénom :</label>
    <input class="form-control" type="text" name="firstname" id="firstname" value="<?= $data[1]->getFirstname()?>">
    <br>
    <label class="form-label" for="lastname">Nom :</label>
    <input class="form-control" type="text" name="lastname" id="lastname" value="<?= $data[1]->getLastname()?>">
    <br>
    <input type="hidden" name="id" value="<?= $data[1]->getId()?>">
    <input class="btn btn-primary mb-3" type="submit" value="Modifier">
</form>

<p class="text-danger"><?=$data[0]?></p>

<a class="btn btn-secondary mb-3" href="/author/one/<?= $data[1]->getId()?>">Retour</a>

<?php
include '../templates/footer.html.php';
?>