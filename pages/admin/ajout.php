<?php
/* TRAITEMENT PHP POUR AJOUTER UN ARTICLE */
if (isset($_POST['poster'])) {
$membre = new Admin($db, $_SESSION['email'], $_SESSION['pass']);
$message = $membre->ajouter_article($_POST['titre'], $_POST['resume'], $_POST['contenu'], $_SESSION['id']);
    echo '<p><strong>' . $message . '</strong></p>';
    require'admin.php';
}
?>