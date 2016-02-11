<?php
if (!(isset($_SESSION['id'])) AND !(isset($_SESSION['email'])) AND !(isset($_SESSION['pass'])))
{
    require '../pages/home.php';
}

?>
<div class="page-header">
    <h1>Bienvenue sur votre espace d'administration</h1>
    <a class="btn btn-info btn-md" href="index.php?p=deconnexion">Me déconnecter</a>
</div>

<ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="#ajout_article">Ajouter un article</a></li>
    <li role="presentation"><a href="#edit">Modifier / Supprimer un article</a></li>
    <li role="presentation"><a href="#moderation">Modérer des commentaires</a></li>
</ul>

<!-- formulaire d'ajout d'un article -->
<div id="ajout_article">
    <h2>Ajouter un article</h2> <br />
    <form class="form-horizontal" role="form" method="post" action="index.php?p=admin.ajout">
        <div class="form-group">
            <label for="titre" class="col-sm-2 control-label">Titre</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="titre" name="titre">
            </div>
        </div>
        <div class="form-group">
            <label for="resume" class="col-sm-2 control-label">Résumé</label>
            <div class="col-sm-8">
                <textarea class="form-control" rows="2" name="resume"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="contenu" class="col-sm-2 control-label">Article</label>
            <div class="col-sm-8">
                <textarea class="form-control" rows="8" name="contenu"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <input id="submit" name="poster" type="submit" value="Poster" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
<hr>
<br />


<!-- formulaire de modification/suppression d'un article -->
<div id ="edit">
<?php
/* Lister tous les titres d'articles*/
$article_manager = new Article_manager($db);
$articles = $article_manager->lister_tous($_SESSION['id']);
?>
    <div class="container-fluid">
        <h2>Modifier / Supprimer un article</h2>
        <div class="row">
            <section class="col-lg-8">
                <table class="table table-bordered table-striped table-condensed table-hover">
                    <tbody>
                    <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Date de publication</th>
                        <th>Action</th>
                    </tr>
                    </thead>
    <?php
foreach($articles as $article)
{
    ?>

                    <tr>
                        <td><?= $article->gettitre(); ?></td>
                        <td> <?= $article->getdate_pub(); ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="index.php?p=admin.edit&id=<?php echo $article->getid()?>">Modifier</a>
                            <a class="btn btn-danger btn-sm" href="index.php?p=admin.delete&id=<?php echo $article->getid()?>">Supprimer</a>
                        </td>
                    </tr>
                    <?php
}                   ?>
                    </tbody>
                 </table>
             </section>
        </div>
    </div>
</div>
<!-- formulaire de modération de commentaires -->
<div id ="moderation">
    <div class="container">
        <h2>Modérer des commentaires</h2>
        <h3><span class="label label-info">Option de pré-validation</span></h3>

<?php
$membre = new Admin($db, $_SESSION['email'], $_SESSION['pass']);
$option = $membre->get_validcom($_SESSION['id']);


if ($option == 0) {
    ?>
    <p>L'option de pré-validation des commentaires est désactivée.<a
            href="index.php?p=admin.activ_option&opt=<?= $option ?>"> Cliquez pour l'activer.</a></p>
    <?php

}
elseif ($option == 1)
{/* option activée*/
?>
        <p>L'option de pré-validation des commentaires est activée. <a href="index.php?p=admin.activ_option&opt=<?=$option?>"> Cliquez pour la désactiver.</a></p>
        <p><strong>Attention si vous désactivez cette option, tous les commentaires en attente de validation seront automatiquement validés.</strong></p>


        <?php




        /* Lister tous les commentaires en attente de validation si option = 1*/
        $commentaires = $membre->lister_com_attente($_SESSION['id']);
        if (empty($commentaires)) { ?>
            <p>Aucun commentaires en attente de validation.</p>
        <?php
        }
        else {
        ?>

        <hr>
        <h4>Commentaires en attente de validation du plus ancien au plus récent</h4>
        <div class="row">
            <section class="col-lg-8">
                <table class="table table-bordered table-striped table-condensed table-hover">
                    <tbody>
                    <thead>
                    <tr>
                        <th>Titre de l'article</th>
                        <th>Pseudo</th>
                        <th>Commentaire</th>
                        <th>Date du commentaire</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <?php
                    foreach ($commentaires as $commentaire) {
                        ?>

                        <tr>
                            <td><?= $commentaire['titre']; ?></td>
                            <td> <?= $commentaire['pseudo']; ?></td>
                            <td> <?= $commentaire['contenu']; ?></td>
                            <td> <?= $commentaire['date_com']; ?></td>
                            <td><a class="btn btn-primary btn-sm"
                                   href="index.php?p=admin.valid&com_id=<?= $commentaire['id_commentaire'] ?>">Valider</a>
                            </td>
                            <td><a class="btn btn-danger btn-sm"
                                   href="index.php?p=admin.delete_com&com_id=<?= $commentaire['id_commentaire'] ?>">Supprimer</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </section>
            <?php
            }
}
?>


        <div id ="supprimer">
                <h3><span class="label label-info">Supprimer des commentaires</span></h3>
                                    <?php
                                    $manager_com = new Commentaire_manager($db);
                                    /* Pour chaque article de l'auteur mettre son titre*/
                                    foreach($articles as $article) {

                                        /* Nouvel objet manager des articles*/
                                        $commentaires = $manager_com->lister_tous($article->getid());
                                        if (empty($commentaires)) {echo '<p><h4>Titre de l\'article : ' . $article->gettitre() . ' - Aucun commentaire</h4></p>';}
                                        else {
                                        echo '<br/><p><h4>Titre de l\'article : ' . $article->gettitre() . '</h4></p>';
                                        ?>
                                        <div class="row">
                                            <section class="col-lg-8">
                                                <table
                                                    class="table table-bordered table-striped table-condensed table-hover">
                                                    <tbody>
                                                    <thead>
                                                    <tr>
                                                        <th>Pseudo</th>
                                                        <th>Date</th>
                                                        <th>Commentaire</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <?php
                                                    foreach ($commentaires as $commentaire) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $commentaire->getpseudo(); ?></td>
                                                            <td><?= $commentaire->getdate_com(); ?></td>
                                                            <td> <?= $commentaire->getcontenu(); ?></td>
                                                            <td><a class="btn btn-danger btn-sm"
                                                                   href="index.php?p=admin.delete_com&com_id=<?= $commentaire->getid() ?>">Supprimer</a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </section>
                                        </div>
                                        <?php
                                        }
                                    }


?>

        </div>

    </div>
</div>
