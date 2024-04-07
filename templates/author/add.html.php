<?php
include '../templates/header.html.php';
?>

<body>
    <h1>Ajouter un auteur</h1>

    <form action="/author/insert" method="post">
        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname" id="firstname">
        <br>
        <label for="lastname">Nom :</label>
        <input type="text" name="lastname" id="lastname">
        <br>
        <input type="submit" value="Ajouter">
    </form>

    <p><?=$data[0]?></p>
</body>