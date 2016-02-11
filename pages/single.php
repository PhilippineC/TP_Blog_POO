<?php
include_once('../fonction/get_gravatar.php');

/* Vérification de l'id de l'article */
if(isset($_GET['id'])) {
    $_GET['id'] = (int)$_GET['id'];
}
else {
    $_GET['id'] = 1;
}

/* Nouvel objet manager des articles*/
$manager_art = new Article_manager($db);

/* méthode de l'objet pour compter tous les articles */
$nbarticles = $manager_art->compter();

if (($_GET['id'] > $nbarticles) OR ($_GET['id'] < 1 )) {
    $_GET['id'] = 1; /* si le numéro d'article n'existe pas, on renvoie sur le premier article*/
}


/* Récupérer l'article */
$article = $manager_art->lister_un($_GET['id']);

/* Afficher l'article */
echo '<div class="container">';
echo '<h1>' . $article->gettitre() . '</h1> <hr>';
echo '<p><em>publié le' . $article->getdate_pub() . '</em></p>';
echo '<p>' . $article->getcontenu() . '</p></div><hr>';
?>

<!-- Afficher un formulaire pour enregistrer un commentaire FAIRE UNE CLASSE PR LE FORMULAIRE-->
    <legend>Commentez cet article</legend>
    <form class="form-horizontal" role="form" method="post" action="index.php?p=ajout_com&id_art=<?=$article->getid()?>&opt=<?=$manager_art->getopt_auteur($article->getid())?>">
        <div class="form-group">
            <label for="pseudo" class="col-sm-2 control-label">Pseudo</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="pseudo" name="pseudo"">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="email" name="email">
            </div>
        </div>
        <div class="form-group">
            <label for="message" class="col-sm-2 control-label">Message</label>
            <div class="col-sm-8">
                <textarea class="form-control" rows="4" name="message"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <input id="submit" name="submit" type="submit" value="Poster" class="btn btn-primary">
            </div>
        </div>
    </form>
<hr>
<br />
<?php

/* Afficher tous les commentaires par date */

/* Nouvel objet manager des commentaires*/
$manager_com = new Commentaire_manager($db);
$commentaires = $manager_com->lister_tous($_GET['id']);
if (empty($commentaires)) {
    echo '<h2> Aucun commentaire pour cet article.</h2>';
}
else {
    ?>  <h2> Commentaires associés à cet article </h2> <br /> <?php
    foreach ($commentaires as $commentaire) {
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class=media">
                    <div class="media-left media-middle" >
                        <?php $grav_url = get_gravatar( $commentaire->getemail(), $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array()); ?>
                        <img src="<?php echo $grav_url; ?>" alt="Avatar" />
                   </div>
                    <div class="media-body">
                        <?php
                        if (!empty($commentaire->getpseudo())) {
                            echo '<h4 class="media-heading">' . $commentaire->getpseudo() . ' </h4>';
                        }
                        if (!empty($commentaire->getemail())) {
                            echo $commentaire->getemail();
                        }
                        ?> <br/>
                        <em>publié le <?php echo $commentaire->getdate_com(); ?></em><br />
                            <p><?php echo $commentaire->getcontenu(); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <?php
        }
    }
?>