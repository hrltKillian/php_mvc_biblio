<?php
include '../templates/header.html.php';
?>

<body>
    <h1>Modifier un auteur</h1>

    <form action="/author/update/<?= $data[1]->getId()?>" method="post">
        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname" id="firstname" value="<?= $data[1]->getFirstname()?>">
        <br>
        <label for="lastname">Nom :</label>
        <input type="text" name="lastname" id="lastname" value="<?= $data[1]->getLastname()?>">
        <br>
        <input type="hidden" name="id" value="<?= $data[1]->getId()?>">
        <input type="submit" value="Modifier">
    </form>

    <p><?=$data[0]?></p>

    <a href="/author/one/<?= $data[1]->getId()?>">Retour</a>
</body>