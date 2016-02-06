<?php
class Pagination
{
    /* Organisation de la pagination en fonction du nombre d'aarticles */
    public static $nbpages;
    public static $pageactuelle;

    public static function paginer($nbarticles_parpage, $nbarticles) {
        self::$nbpages = ceil($nbarticles/$nbarticles_parpage);
        if (isset($_GET['page'])) // Si la variable $_GET['page'] existe...
        {
            self::$pageactuelle = intval($_GET['page']);

            if (self::$pageactuelle>self::$nbpages) // Si la valeur de $pageActuelle  est plus grande que le nombre de page .
            {
                self::$pageactuelle = self::$nbpages;
            }
        }
        else // Sinon
        {
            self::$pageactuelle = 1; // La page actuelle est la n°1
        }
        $offset = (self::$pageactuelle - 1) * $nbarticles_parpage; // On calcul la première entrée à lire
        return $offset;
    }





}