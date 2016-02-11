<?php
/* TRAITEMENT PHP POUR MODIFIER UN ARTICLE */
$membre = new Admin($db, $_SESSION['email'], $_SESSION['pass']);
$article = $membre->get_article($_GET['id'], $_SESSION['id']);
if ((isset($_GET['id'])) AND (!isset($_POST['poster']))) {
    /* Vérification de l'id passé en paramètre*/
    $_GET['id'] = htmlspecialchars($_GET['id']);
    $_GET['id'] = (int)$_GET['id'];

    /* création de l'objet article */
    $membre = new Admin($db, $_SESSION['email'], $_SESSION['pass']);
    $article = $membre->get_article($_GET['id'], $_SESSION['id']);

    /* formulaire de modification */
    ?>
    <h2>Modifier un article</h2> <br/>
    <form class="form-horizontal" role="form" method="post" action="">
        <div class="form-group">
            <label for="titre" class="col-sm-2 control-label">Titre</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="titre" name="titre" value="<?= $article->gettitre() ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="resume" class="col-sm-2 control-label">Résumé</label>
            <div class="col-sm-8">
                <textarea class="form-control" rows="2" name="resume"><?= $article->getresume() ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="contenu" class="col-sm-2 control-label">Article</label>
            <div class="col-sm-8">
                <textarea class="form-control" rows="8" name="contenu"><?= $article->getcontenu() ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <input id="submit" name="poster" type="submit" value="Poster" class="btn btn-primary">
            </div>
        </div>
    </form>
    <?php
}
elseif (isset($_POST['poster']))
{

    /*Appel à la méthode modification de l'objet membre*/
$message = $membre->modifier_article($article->getid(), $_POST['titre'], $_POST['resume'], $_POST['contenu']);
    echo '<p><strong>' . $message . '</strong></p>';
    require'admin.php';
}
?>