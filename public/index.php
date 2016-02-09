<?php
session_start();
require '../class/Autoloader.php';
Autoloader::register();

/* Lit la variable p dans l'URL et renvoie vers la home si pas de p*/

if (isset($_GET['p'])) {
    $_GET['p'] = htmlspecialchars($_GET['p']);
    $p = $_GET['p'];
} else {
    $p = 'home';
}

//Initialisation des objets
$db = Database::getPDO();

ob_start();
if ($p === 'article') {
    require '../pages/single.php';
} elseif ($p === 'connexion') {
    require '../pages/connexion.php';
}
elseif ($p === 'admin') {
    require '../pages/admin.php';
}
else {
    require '../pages/home.php';
}

$content = ob_get_clean();

require '../pages/templates/default.php';

?>
