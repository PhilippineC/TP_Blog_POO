<div class="page-header">
    <h1>Bienvenue sur votre espace d'administration</h1>
</div>

<ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="#ajout_article">Ajouter un article</a></li>
    <li role="presentation"><a href="#edit">Modifier / Supprimer un article</a></li>
    <li role="presentation"><a href="#moderation">Modérer des commentaires</a></li>
</ul>

<!-- formulaire d'ajout d'un article -->
<div id="ajout_article">
    <h2>Ajouter un article</h2> <br />
    <form class="form-horizontal" role="form" method="post" action="">
        <div class="form-group">
            <label for="titre" class="col-sm-2 control-label">Titre</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="titre" name="titre"">
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
$articles = $article_manager->lister_tous();
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
                            <a class="btn btn-primary btn-sm" href="index.php?p=admin.edit&id=<? $article->getid()?>">Modifier</a>
                            <a class="btn btn-danger btn-sm" href="index.php?p=admin.delete&id=<? $article->getid()?>">Supprimer</a>
                        </td>
                    </tr>


    <?php
} ?>

                    </tbody>
                 </table>
             </section>
        </div>
    </div>


<!-- formulaire de modération de commentaires -->
<div id ="moderation">
<?php
/* Lister tous les commentaires en attente de validation*/
?>
    <div class="container-fluid">
        <h2>Modérer des commentaires</h2><br />
    </div>
</div>

<?php
/* TRAITEMENT PHP POUR AJOUTER UN ARTICLE */
if (isset($_POST['poster'])) {
    $membre = new Admin($db, $_SESSION['email'], $_SESSION['pass']);
    $message = $membre->ajouter_article($_POST['titre'], $_POST['resume'], $_POST['contenu'], $_SESSION['id']);
    echo $message;
}

/* TRAITEMENT PHP POUR SUPPRIMER UN ARTICLE
if (isset($_POST['supprimer'])) {
    $membre = new Admin($db, $_SESSION['email'], $_SESSION['pass']);
    $message = $membre->ajouter_article($_POST['titre'], $_POST['resume'], $_POST['contenu'], $_SESSION['id']);
    echo $message;
}*/