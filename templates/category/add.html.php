<?php
include '../templates/header.html.php';
?>

<h1>Ajouter une catégorie</h1>

<form action="/category/insert" method="post">
    <label class="form-label" for="name">Nom :</label>
    <input class="form-control" type="text" name="name" id="name">
    <br>
    <input class="btn btn-primary mb-3" type="submit" value="Ajouter">
</form>

<p class="text-danger"><?=$data[0]?></p>

<a class="btn btn-secondary mb-3" href="/category/all">Retour</a>

<?php
include '../templates/footer.html.php';
?>