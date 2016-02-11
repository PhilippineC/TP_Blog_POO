<?php
if (empty($_POST['message'])) {
    echo 'Veuillez saisir un message';
}
else {
    /* Nouvel objet manager des commentaires*/
    $manager_com = new Commentaire_manager($db);
    /* Ajouter le commentaire */
    $message = $manager_com->ajouter($_GET['id_art'], $_POST['pseudo'], $_POST['email'], $_POST['message'], $_GET['opt']);

    if (isset($_GET['id_art']) AND isset($_GET['opt'])) {
        $_GET['id_art'] = htmlspecialchars($_GET['id_art']);
        $_GET['id_art'] = (int)$_GET['id_art'];
        $_GET['opt'] = htmlspecialchars($_GET['opt']);
        $_GET['opt'] = (int)$_GET['opt'];

        $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
        $_POST['email'] = htmlspecialchars($_POST['email']);
        $_POST['message'] = nl2br(htmlspecialchars($_POST['message']));

        echo '<p><strong>' . $message . '</p></strong>';

        require 'home.php';
        /*require ('index.php?p=article&id=' . $_GET['id_art']);*/
    }
    else {echo 'Page introuvable';}

}
?>