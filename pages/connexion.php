<?php
/* Vérification des données admin*/

//Initialisation des objets
$db = Database::getPDO();

/* nouvel objet Admin*/
$_POST['pass'] = sha1($_POST['pass']);
$membre = new Admin($db, $_POST['email'], $_POST['pass']);
if($membre->membre_exist($membre->getemail(), $membre->getpass()))
{
    /*ouverture session*/

    $_SESSION['id'] = $membre->getid();
    $_SESSION['email'] = $membre->getemail();
    $_SESSION['pass'] = $membre->getpass();

    header('Location: index.php?p=admin');
}

else
{
    ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-link"> Votre email ou votre mot de passe est érroné. Veuillez recommencer.</h4>
    </div>
<?php
}
?>