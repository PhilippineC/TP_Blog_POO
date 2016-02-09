<?php
class Admin {

    protected $id;
    protected $email;
    protected $pass;
    private $_db;

    public function __construct($db, $email, $pass)
    {
        $this->setDb($db);
        $this->setEmail($email);
        $this->setPass($pass);
    }

    public function getid()  { return $this->id; }
    public function getemail()  { return $this->email; }
    public function getpass()  { return $this->pass; }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }

    public function setId($id) {
        $id = (int)($id);
        return $this->id = $id;
    }

    public function setEmail($email) {
        $email = htmlspecialchars($email);
        return $this->email = $email;
    }

    public function setPass($pass) {
        $pass = htmlspecialchars($pass);
        return $this->pass = $pass;
    }

        public function membre_exist($email, $pass) {
        $q = $this->_db->prepare('SELECT * FROM admin WHERE email = :email AND pass = :pass');
        $q->bindParam(':email', $email);
        $q->bindParam(':pass', $pass);
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        $this->id = $this->setId($donnees['id']);
        if (($q->rowCount()) === 0)
        {
            return false;
        }
        else {
            return true;
        }
    }

    public function ajouter_article($titre, $resume, $contenu, $auteur_id) {
        $titre = htmlspecialchars($titre);
        $resume = htmlspecialchars($resume);
        $contenu = nl2br(htmlspecialchars($contenu));
        if (empty($titre) OR empty($resume) OR empty($contenu)) {
            $message = 'Veuillez renseigner tous les champs';
        }
        else {
            $q = $this->_db->prepare('INSERT INTO articles SET titre = :titre, resume = :resume, contenu = :contenu, auteur_id = :auteur_id, date_publication = NOW()');
            $q->bindValue(':titre', $titre);
            $q->bindValue(':resume', $resume);
            $q->bindValue(':contenu', $contenu);
            $q->bindValue(':auteur_id', $auteur_id);
            $q->execute();
            $message = 'article ajouté';
        }
        return $message;
    }
}

