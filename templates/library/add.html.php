<?php
include '../templates/header.html.php';
?>

<body>
    <h1>Ajouter une bibliothèque</h1>

    <form action="/library/insert" method="post">
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name">
        <br>
        <input type="submit" value="Ajouter">
    </form>

    <p><?=$data[0]?></p>
</body>