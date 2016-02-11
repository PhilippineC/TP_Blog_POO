<?php
if (isset($_GET['opt'])) {
    $_GET['opt'] = htmlspecialchars($_GET['opt']);
    $_GET['opt'] = (int)$_GET['opt'];
}

if ($_GET['opt'] == 0) {
    $membre = new Admin($db, $_SESSION['email'], $_SESSION['pass']);
    $membre->update_option(1, $_SESSION['id']);
    $message = '<strong>Vous avez activé l\'option de prévalidation des commentaires.</strong>';
}

elseif ($_GET['opt'] == 1) {
    $membre = new Admin($db, $_SESSION['email'], $_SESSION['pass']);
    $membre->update_option(0, $_SESSION['id']);
    $message = '<strong>Vous avez désactivé l\'option de prévalidation des commentaires et tous les commentaires ont étés validés.</strong>';
}
else {
    $message = '<strong> erreur : page introuvable </strong>';
}
echo $message;
require'admin.php';
?>