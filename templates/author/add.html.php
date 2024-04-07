<?php
include '../templates/header.html.php';
?>

<h1>Ajouter un auteur</h1>

<form action="/author/insert" method="post">
    <label class="form-label" for="firstname">Prénom :</label>
    <input class="form-control" type="text" name="firstname" id="firstname">
    <br>
    <label class="form-label" for="lastname">Nom :</label>
    <input class="form-control" type="text" name="lastname" id="lastname">
    <br>
    <input class="btn btn-primary mb-3" type="submit" value="Ajouter">
    <a class="btn btn-secondary mb-3" href="author/all">Retour</a>
</form>

<p class="text-danger"><?=$data[0]?></p>

<?php
include '../templates/footer.html.php';
?>