<?php
include '../templates/header.html.php';
?>

<h1><?= $data[0]->getFirstname()," ", $data[0]->getLastname(); ?></h1>

<?php

if ($data[0]->getBooksLength() > 0) {
    echo '<h2>Livres :</h2>';
    foreach ($data[0]->getBooks() as $book) {
        echo '<p><a href="/book/one/' . $book->getId() . '">' . $book->getTitle() . '</a></p>';
    }
} else {
    echo $data[0]->getBooksLength();
    echo '<p>Cet auteur n\'a pas écrit de livre</p>';
}

?>

<a href="/author/edit/<?= $data[0]->getId()?>">Modifier</a>

<a href="/author/delete/<?= $data[0]->getId()?>">Supprimer</a>

<a href="/author/all">Retour</a>