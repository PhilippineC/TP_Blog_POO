<?php
class Commentaire_manager {
    private $_db; // Instance de PDO
    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function lister_tous($article_id)
    {
        $article_id = (int) $article_id;
        $q = $this->_db->prepare('SELECT id, article_id, pseudo, email, contenu, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_com FROM commentaires WHERE article_id = :article_id ORDER BY date_com DESC');
        $q->bindParam(':article_id', $article_id, PDO::PARAM_INT);
        $q->execute();
        $commentaires = $q->fetchAll();
        return $commentaires;
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}

?>