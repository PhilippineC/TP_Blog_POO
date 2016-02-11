<?php
class Admin
{

    protected $id;
    protected $email;
    protected $pass;
    private $_db;
    protected $validcom;

    public function __construct($db, $email, $pass)
    {
        $this->setDb($db);
        $this->setEmail($email);
        $this->setPass($pass);
    }

    public function getid()
    {
        return $this->id;
    }

    public function getemail()
    {
        return $this->email;
    }

    public function getpass()
    {
        return $this->pass;
    }
    public function getvalidcom()
    {
        return $this->id;
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }

    public function setId($id)
    {
        $id = (int)($id);
        return $this->id = $id;
    }

    public function setEmail($email)
    {
        $email = htmlspecialchars($email);
        return $this->email = $email;
    }

    public function setPass($pass)
    {
        $pass = htmlspecialchars($pass);
        return $this->pass = $pass;
    }

    public function setValidcom($validcom)
    {
        $this->validcom = $validcom;
    }

    public function membre_exist($email, $pass)
    {
        $q = $this->_db->prepare('SELECT * FROM admin WHERE email = :email AND pass = :pass');
        $q->bindParam(':email', $email);
        $q->bindParam(':pass', $pass);
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        $this->id = $this->setId($donnees['id']);
        $this->validcom = $this->setValidcom($donnees['prevalid_com']);
        if (($q->rowCount()) === 0) {
            return false;
        } else {
            return true;
        }
    }

    public function get_validcom($id_auteur)
    {
        $q = $this->_db->prepare('SELECT prevalid_com FROM admin WHERE id = :id_auteur');
        $q->bindParam(':id_auteur', $id_auteur);
        $q->execute();
        $options = $q->fetch();
        return $option = $options['prevalid_com'];
    }

    public function ajouter_article($titre, $resume, $contenu, $auteur_id)
    {
        $titre = htmlspecialchars($titre);
        $resume = htmlspecialchars($resume);
        $contenu = nl2br(htmlspecialchars($contenu));
        if (empty($titre) OR empty($resume) OR empty($contenu)) {
            $message = 'Veuillez renseigner tous les champs';
        } else {
            $q = $this->_db->prepare('INSERT INTO articles SET titre = :titre, resume = :resume, contenu = :contenu, auteur_id = :auteur_id, date_publication = NOW()');
            $q->bindValue(':titre', $titre);
            $q->bindValue(':resume', $resume);
            $q->bindValue(':contenu', $contenu);
            $q->bindValue(':auteur_id', $auteur_id);
            $q->execute();
            $message = 'Votre article a bien été ajouté.';
        }
        return $message;
    }

    public function supprimer_article($id_article, $auteur_id)
    {

        $q = $this->_db->prepare('DELETE FROM articles WHERE id = :id AND auteur_id = :auteur_id');
        $q->bindValue(':id', $id_article);
        $q->bindValue(':auteur_id', $auteur_id);
        $q->execute();
        $message = 'Votre article a bien été supprimé.';
        return $message;
    }

    public function get_article($id_article, $auteur_id)
    {

        $q = $this->_db->prepare('SELECT * FROM articles WHERE id = :id_article AND auteur_id = :auteur_id');
        $q->bindValue(':id_article', $id_article);
        $q->bindValue(':auteur_id', $auteur_id);
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return $article = new Article($donnees);
    }

    public function modifier_article($id_article, $nvtitre, $nvresume, $nvcontenu)
    {
        $nvtitre = htmlspecialchars($nvtitre);
        $nvresume = htmlspecialchars($nvresume);
        $nvcontenu = nl2br(htmlspecialchars($nvcontenu));
        if (empty($nvtitre) OR empty($nvresume) OR empty($nvcontenu)) {
            $message = 'Veuillez renseigner tous les champs';
        } else {
            $q = $this->_db->prepare('UPDATE articles SET titre = :nvtitre, resume = :nvresume, contenu = :nvcontenu WHERE id = :id_article');
            $q->bindValue(':nvtitre', $nvtitre);
            $q->bindValue(':nvresume', $nvresume);
            $q->bindValue(':nvcontenu', $nvcontenu);
            $q->bindValue(':id_article', $id_article);
            $q->execute();
            $message = 'Votre article a bien été modifié.';
        }
        return $message;
    }

    public function update_option($option, $auteur_id) {
        $q = $this->_db->prepare('UPDATE admin SET prevalid_com = :prevalid_com WHERE id = :auteur_id');
        $q->bindValue(':prevalid_com', $option);
        $q->bindValue(':auteur_id', $auteur_id);
        $q->execute();
        if ($option == 0) { /* option desactivé : alors tous les commentaires seront validés.*/
            $q = $this->_db->prepare('UPDATE commentaires INNER JOIN articles ON commentaires.article_id = articles.id INNER JOIN admin ON articles.auteur_id = admin.id SET valide = 1 WHERE admin.id = :auteur_id');
            $q->bindValue(':auteur_id', $auteur_id);
            $q->execute();
        }
    }

    public function lister_com_attente($auteur_id)
    {
        $commentaires = [];
        $q = $this->_db->prepare('SELECT articles.id, articles.titre, commentaires.id AS id_commentaire, pseudo, email, commentaires.contenu, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_com FROM commentaires INNER JOIN articles ON commentaires.article_id = articles.id WHERE articles.auteur_id = :auteur_id AND commentaires.valide = 0 ORDER BY date_com');
        $q->bindValue(':auteur_id', $auteur_id);
        $q->execute();
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $commentaires[] = $donnees;
        }
        return $commentaires;

    }


    public function valider_com($id_com) {
        $q = $this->_db->prepare('UPDATE commentaires SET valide = 1 WHERE id = :id_com');
        $q->bindValue(':id_com', $id_com);
        $q->execute();
        return $message = 'Le commentaire a été validé.';
    }

    public function supprimer_commentaire($id_com)
    {
        $q = $this->_db->prepare('DELETE FROM commentaires WHERE id = :id_com');
        $q->bindValue(':id_com', $id_com);
        $q->execute();
        $message = 'Le commentaire a bien été supprimé.';
        return $message;
    }

    public function get_articles($auteur_id)
    {
        $articles = [];
        $q = $this->_db->prepare('SELECT * FROM articles WHERE auteur_id = :auteur_id');
        $q->bindValue(':auteur_id', $auteur_id);
        $q->execute();
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $articles = new Article($donnees);
        }
        return $articles;
    }

}

