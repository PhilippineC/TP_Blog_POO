<?php
class Commentaire {

    protected $id;
    protected $article_id;
    protected $pseudo;
    protected $email;
    protected $contenu;
    protected $date_com;
    protected $valide;

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);
            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    //construction des getters
    public function getid() { return $this->id;}
    public function getarticle_id() { return $this->article_id;}
    public function getpseudo() { return $this->pseudo;}
    public function getemail() { return $this->email;}
    public function getcontenu() { return $this->contenu;}
    public function getdate_com() { return $this->date_com;}
    public function getvalide() { return $this->valide;}

    //construction des setters
    public function setId($id) {
        $this->id = (int) $id;
    }
    public function setArticle_id($article_id) {
        $this->article_id = (int) $article_id;
    }
    public function setPseudo($pseudo) {
        if (is_string($pseudo))
        {
            $this->pseudo = $pseudo;
        }
    }
    public function setEmail($email) {
        if (is_string($email))
        {
            $this->email = $email;
        }
    }
    public function setContenu($contenu) {
        if (is_string($contenu))
        {
            $contenu = nl2br($contenu);
            $this->contenu = $contenu;
        }
    }
    public function setDate_com($date_com) {
        $this->date_com = $date_com;
    }
    public function setValide($valide) {
        $this->valide = (int) $valide;
    }




}

