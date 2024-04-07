<?php
include '../templates/header.html.php';
?>

<h1><?= $data[0]->getTitle() ?></h1>

<p><?= "Écris par : <a class=\"link-primary link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover\" href='/author/one/" . $data[0]->getAuthor()->getId() ."'>". $data[0]->getAuthor()->getFirstname() . " " . $data[0]->getAuthor()->getLastname() . "</a>" ?></p>

<p><?= "De la catégorie : <a class=\"link-primary link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover\" href='/category/one/" . $data[0]->getCategory()->getId() ."'>" . $data[0]->getCategory()->getName() . "</a>" ?></p>

<p>Liste des bibliothèques contenant le livre :</p>

<?php

foreach ($data[0]->getLibrary() as $library) {
    echo "<p><a class=\"link-primary link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover\" href='/library/one/" . $library->getId() ."'>" . $library->getName() . "</a></p>";
}

?>

<a class="btn btn-primary mb-3" href="/book/edit/<?= $data[0]->getId()?>">Modifier</a>

<a class="btn btn-danger mb-3" href="/book/delete/<?= $data[0]->getId()?>">Supprimer</a>

<a class="btn btn-secondary mb-3" href="/book/all">Retour</a>

<?php
include '../templates/footer.html.php';
?>