<?php
include '../templates/header.html.php';
?>

<h1><?= $data[0]->getTitle() ?></h1>

<p><?= "Écris par : <a href='/author/one/" . $data[0]->getAuthor()->getId() ."'>". $data[0]->getAuthor()->getFirstname() . " " . $data[0]->getAuthor()->getLastname() . "</a>" ?></p>

<p><?= "De la catégorie : <a href='/category/one/" . $data[0]->getCategory()->getId() ."'>" . $data[0]->getCategory()->getName() . "</a>" ?></p>

<p>Liste des bibliothèques contenant le livre :</p>

<?php

foreach ($data[0]->getLibrary() as $library) {
    echo "<p><a href='/library/one/" . $library->getId() ."'>" . $library->getName() . "</a></p>";
}

?>

<a href="/book/edit/<?= $data[0]->getId()?>">Modifier</a>

<a href="/book/delete/<?= $data[0]->getId()?>">Supprimer</a>

<a href="/book/all">Retour</a>