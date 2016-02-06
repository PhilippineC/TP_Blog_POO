<?php
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
    require '../pages/article.php';
} elseif ($p === 'page3') {
    require '../pages/page3.php';
}
else {
    require '../pages/home.php';
}

$content = ob_get_clean();

require '../pages/templates/default.php';

?>
