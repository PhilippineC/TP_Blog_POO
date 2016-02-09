<?php

/* Nouvel objet manager des articles */
$manager = new Article_manager($db);

/* méthode de l'objet pour compter tous les articles */
$nbarticles = $manager->compter();

/* Organisation de la pagination en fonction du nombre d'aarticles */
$nbarticles_parpage = 3;/* 3 articles par page */

/* Appel à une fonction static pour calculer la variable $offset */
$offset = Pagination::paginer($nbarticles_parpage,$nbarticles);

/* méthode pour lister tous les articles en fonction d'un début et d'un nombre limité */
$articles = $manager->lister_tous_ol($offset,$nbarticles_parpage);

/* Affichage des données */
?> <h1>Derniers articles publiés </h1> <hr> <?php
foreach($articles as $article)
{
    ?>
    <div class="container">
        <h2>
            <a href="<?= $article->geturl()?>"> <?= $article->gettitre(); ?> </a> <br />
         </h2>
        <p><em>publié le <?php echo $article->getdate_pub(); ?></em></p>

        <p>
            <?php echo $article->getresume(); ?>
            <br />
            <p><a class="btn btn-default" href="<?= $article->geturl()?>" role="button">Voir la suite et les commentaires &raquo;</a></p>
        </p>
    </div>
    <hr>

    <?php
}
?>
<ul class="pager">
<?php
for($i=1; $i<=Pagination::$nbpages; $i++) //On fait notre boucle
{
    //On va faire notre condition
    if($i==Pagination::$pageactuelle) //Si il s'agit de la page actuelle...
    {
        echo '<li class="active"><a>' .$i. '<span class="sr-only">(current)</span></a></li>';
    }
    else //Sinon...
    {
        echo '<li><a href="index.php?page=' . $i . '">' . $i . '</a></li>';
    }
}
?>
</ul>



