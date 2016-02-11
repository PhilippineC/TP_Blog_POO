<?php
/* TRAITEMENT PHP POUR SUPPRIMER UN COMMENTAIRE */
if (isset($_GET['com_id'])) {
    /* Vérification de l'id passé en paramètre*/
    $_GET['com_id'] = htmlspecialchars($_GET['com_id']);
    $_GET['com_id'] = (int) $_GET['com_id'];

    /*Appel à la méthode suppression de l'objet membre*/
    $membre = new Admin($db, $_SESSION['email'], $_SESSION['pass']);
    $message = $membre->supprimer_commentaire($_GET['com_id']);
    echo '<p><strong>' . $message . '</strong></p>';
    require'admin.php';
}
?>