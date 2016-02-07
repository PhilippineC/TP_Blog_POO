<?php
class Article {

    protected $id;
    protected $titre;
    protected $resume;
    protected $contenu;
    protected $auteur_id;
    protected $date_pub;

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
    public function gettitre() { return $this->titre;}
    public function getresume() { return $this->resume;}
    public function getcontenu() { return $this->contenu;}
    public function getauteur_id() { return $this->auteur_id;}
    public function getdate_pub() { return $this->date_pub;}

    //construction des setters
    public function setId($id) {
        $this->id = (int) $id;
    }
    public function setTitre($titre) {
        if (is_string($titre))
        {
            $this->titre = $titre;
        }
    }
    public function setResume($resume) {
        if (is_string($resume))
        {
            $this->resume = $resume;
        }
    }
    public function setContenu($contenu) {
        if (is_string($contenu))
        {
            $contenu = nl2br($contenu);
            $this->contenu = $contenu;
        }
    }
    public function setAuteur_id($auteur_id) {
        $this->auteur_id = (int) $auteur_id;
    }
    public function setDate_pub($date_pub) {
        //faire un regex pour vérifier la format de la date
        $this->date_pub = $date_pub;
    }

    public function geturl() {
        return '../public/index.php?p=article&id=' . $this->id;
    }



}

