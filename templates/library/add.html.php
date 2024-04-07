<?php
include '../templates/header.html.php';
?>

<h1>Ajouter une bibliothèque</h1>

<form action="/library/insert" method="post">
    <label class="form-label" for="name">Nom :</label>
    <input class="form-control" type="text" name="name" id="name">
    <br>
    <input class="btn btn-primary mb-3" type="submit" value="Ajouter">
    <a class="btn btn-secondary mb-3" href="library/all">Retour</a>
</form>

<p class="text-danger"><?=$data[0]?></p>

<?php
include '../templates/footer.html.php';
?>