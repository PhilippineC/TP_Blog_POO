<?php
function get_page($page) {
    switch ($page) {
        case 'article':
            return '../pages/single.php';
            break;
        case 'connexion':
            return '../pages/connexion.php';
            break;
        case 'deconnexion' :
            return '../pages/deconnexion.php';
            break;
        case 'admin':
            return '../pages/admin/admin.php';
            break;
        case 'admin.edit':
            return '../pages/admin/edit.php';
            break;
        case 'admin.delete':
            return '../pages/admin/delete.php';
            break;
        case 'admin.ajout':
            return '../pages/admin/ajout.php';
            break;
        case 'admin.activ_option':
            return '../pages/admin/option.php';
            break;
        case 'admin.valid':
            return '../pages/admin/valid.php';
            break;
        case 'admin.delete_com':
            return '../pages/admin/delete_com.php';
            break;
        case 'ajout_com':
            return '../pages/ajout_com.php';
            break;
        default:
            return '../pages/home.php';
    }
}