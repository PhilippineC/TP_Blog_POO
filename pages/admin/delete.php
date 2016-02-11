<?php
/* TRAITEMENT PHP POUR SUPPRIMER UN ARTICLE */
if (isset($_GET['id'])) {
    /* Vérification de l'id passé en paramètre*/
    $_GET['id'] = htmlspecialchars($_GET['id']);
    $_GET['id'] = (int) $_GET['id'];

    /*Appel à la méthode suppression de l'objet membre*/
    $membre = new Admin($db, $_SESSION['email'], $_SESSION['pass']);
    $message = $membre->supprimer_article($_GET['id'], $_SESSION['id']);
    echo '<p><strong>' . $message . '</strong></p>';
    require'admin.php';
}
?>