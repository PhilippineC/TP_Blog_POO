<?php
class Commentaire_manager {
    private $_db; // Instance de PDO
    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function lister_tous($article_id)
    {
        $commentaires = [];
        $article_id = (int) $article_id;
        $q = $this->_db->prepare('SELECT id, article_id, pseudo, email, contenu, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_com FROM commentaires WHERE article_id = :article_id AND valide = 1 ORDER BY date_commentaire DESC');
        $q->bindParam(':article_id', $article_id, PDO::PARAM_INT);
        $q->execute();
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $commentaires[] = new Commentaire($donnees);
        }
        return $commentaires;
    }

    public function ajouter($article_id, $pseudo = null, $email = null, $contenu, $valide)
    {
        if ($valide == 0) {$opt = 1;} else {$opt = 0;}
        $q = $this->_db->prepare('INSERT INTO commentaires SET article_id = :article_id, pseudo = :pseudo, email = :email, contenu = :contenu, date_commentaire = NOW(), valide = :opt');
        $q->bindValue(':article_id', $article_id, PDO::PARAM_INT);
        $q->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $q->bindValue(':email', $email, PDO::PARAM_STR);
        $q->bindValue(':contenu', $contenu, PDO::PARAM_STR);
        $q->bindValue(':opt', $opt, PDO::PARAM_INT);
        $q->execute();
        if ($valide == 1) {
            return $message = 'Votre commentaire a bien été soumis à l\'auteur et nécessite une validation de celui-ci avant d\'être publié.';
        }
        if ($valide == 0) {
            return $message = 'Votre commentaire a bien été ajouté.';
        }

    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }

}

?>