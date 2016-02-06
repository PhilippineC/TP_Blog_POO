<?php

class Article_manager {

    private $_db; // Instance de PDO
    public function __construct($db)
    {
        $this->setDb($db);
    }
    public function ajouter(Article $new_article)
    {
        $q = $this->_db->prepare('INSERT INTO articles SET titre = :titre, resume = :resume, contenu = :contenu, auteur = :auteur_id, date_pub = :date_pub');
        $q->bindValue(':titre', $new_article->gettitre(), PDO::PARAM_STR);
        $q->bindValue(':resume', $new_article->getresume(), PDO::PARAM_STR);
        $q->bindValue(':contenu', $new_article->getcontenu(), PDO::PARAM_STR);
        $q->bindValue(':auteur_id', $new_article->getauteur_id(), PDO::PARAM_INT);
        $q->bindValue(':date_pub', $new_article->getdate_pub());
        $q->execute();
    }

    public function lister_tous($offset, $limit)
    {
        $offset = (int) $offset;
        $limit = (int) $limit;
        $q = $this->_db->prepare('SELECT id, titre, resume, contenu, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_pub FROM articles ORDER BY date_pub DESC LIMIT :offset, :limit');
        $q->bindParam(':offset', $offset, PDO::PARAM_INT);
        $q->bindParam(':limit', $limit, PDO::PARAM_INT);
        $q->execute();
        $articles = $q->fetchAll();
        return $articles;
    }

    public function lister_un($id)
    {
        $id = (int) $id;
        $q = $this->_db->prepare('SELECT id, titre, resume, contenu, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_pub FROM articles WHERE id = :id');
        $q->bindParam(':id', $id, PDO::PARAM_INT);
        $q->execute();
        $article = $q->fetch(PDO::FETCH_ASSOC);
        return $article;
    }

    public function compter()
    {
        $total = $this->_db->query('SELECT COUNT(*) FROM articles');
        return $total->fetchColumn();
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}
