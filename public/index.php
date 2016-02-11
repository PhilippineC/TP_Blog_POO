<?php
session_start();
include_once '../fonction/get_page.php';
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
require get_page($p); /*selection de la page en fonction de la vartiable $p */
$content = ob_get_clean();

require '../pages/templates/default.php';

?>
