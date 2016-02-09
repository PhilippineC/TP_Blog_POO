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

    public function lister_tous_ol($offset, $limit)
    {
        $articles = [];
        $offset = (int)$offset;
        $limit = (int)$limit;
        $q = $this->_db->prepare('SELECT id, titre, resume, contenu, auteur_id, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_pub FROM articles ORDER BY date_pub DESC LIMIT :offset, :limit');
        $q->bindParam(':offset', $offset, PDO::PARAM_INT);
        $q->bindParam(':limit', $limit, PDO::PARAM_INT);
        $q->execute();
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($donnees);
        }
        return $articles;
    }

    public function lister_tous()
    {
        $articles = [];
        $q = $this->_db->prepare('SELECT id, titre, resume, contenu, auteur_id, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_pub FROM articles ORDER BY date_pub DESC');
        $q->execute();
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($donnees);
        }
        return $articles;
    }


    public function lister_un($id)
    {
        $id = (int) $id;
        $q = $this->_db->prepare('SELECT id, titre, resume, contenu, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_pub FROM articles WHERE id = :id');
        $q->bindParam(':id', $id, PDO::PARAM_INT);
        $q->execute();
        $article = $q->fetch(PDO::FETCH_ASSOC);
        return new Article($article);
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
