<?php
include '../templates/header.html.php';
?>

<h1><?= $data[0]->getFirstname()," ", $data[0]->getLastname(); ?></h1>

<?php

if ($data[0]->getBooksLength() > 0) {
    echo '<h2>Livres :</h2>';
    foreach ($data[0]->getBooks() as $book) {
        echo '<p><a class=\"link-primary link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover\" href="/book/one/' . $book->getId() . '">' . $book->getTitle() . '</a></p>';
    }
} else {
    echo $data[0]->getBooksLength();
    echo '<p>Cet auteur n\'a pas écrit de livre</p>';
    echo '<p><a class=\"link-primary link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover\" href="/book/add">Ajoutez en un !</a></p>';
}

?>

<a class="btn btn-primary mb-3" href="/author/edit/<?= $data[0]->getId()?>">Modifier</a>

<a class="btn btn-danger mb-3" href="/author/delete/<?= $data[0]->getId()?>">Supprimer</a>

<a class="btn btn-secondary mb-3" href="/author/all">Retour</a>

<?php
include '../templates/footer.html.php';
?>