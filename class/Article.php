<?php
class Article {

    protected $id;
    protected $titre;
    protected $resume;
    protected $contenu;
    protected $auteur_id;
    protected $date_pub;

    public function __construct(array $donnees) {
        $this->getid() = $donnees['id'];
        $this->gettitre() = $donnees['titre'];
        $this->getresume = $donnees['resume'];
        $this->getcontenu() = $donnees['contenu'];
        $this->getauteur_id() = $donnees['auteur_id'];
        $this->getdate_pub() = $donnees['date_pub'];

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
        $this->_id = (int) $id;
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

/* autres méthodes
    public function geturl() {
        return '../public/index.php?p=article&article=' . $this->id;
    }
*/


}

