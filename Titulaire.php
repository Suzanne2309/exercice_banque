<?php

class Titulaire{
    //Attributs
    private string $_nom;
    private string $_prenom;
    private string $_dateNaissance;
    private string $_ville;
    private array $_compteBancaires; //On crée le tableau qui permettra de contenir les comptes bancaires pour chaque titulaire

    //Méthode magique constructor
    public function __construct($nom, $prenom, $dateNaissance, $ville){ 
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_dateNaissance = $dateNaissance;
        $this->_ville = $ville;
        $this->_compteBancaires = []; //On défini le tableau comme vide, en ne mettant rien entre []
    }

    //Getter et Setter
    /* Nom */
    public function getNom(){
        return $this->_nom;
    }
    public function setNom(){
        $this->_nom = $_nom;
    }
    /* Prénom */
    public function getPrenom(){
        return $this->_prenom;
    }
    public function setPrenom(){
        $this->_prenom = $prenom;
    }
    /* Date de naissance */
    public function getDateNaissance(){
        return $this->_dateNaissance;
    }
    public function setDateNaissancem(){
        $this->_dateNaissance = $_dateNaissance;
    }
    /* Ville */
    public function getVille(){
        return $this->_ville;
    }
    public function setVille(){
        $this->_ville = $_ville;
    }


    //Méthodes
    public function ajouterCompteBancaire(CompteBancaire $compteBancaire){ //On va ajouter chaque nouveau compte dans le tableau de comptes du titulaire 
        $this->_compteBancaires[] = $compteBancaire;
    }

    public function afficherCompteBancaires(){ 
        forEach($this->_compteBancaires as $compteBancaire) { //Pour chaque compteBancaire du tableau compteBancaires
            $resultat = "Compte : " . $compteBancaire . ", <br>"; // On affiche la phrase "Compte : toString de la classe CompteBancaire du compte"
        }
        return; //On appel le return en dehors de la fonction forEach, car si on le met à l'intérieur de la boucle, la fonction va s'arrêter au premier compte affiché
    }

    public function calculAge(){
        $birth_date = $this->getDateNaissance(); //on récupère la date de naissance de l'auteur
        $actual_date = date("Y-m-d"); //on utilise la fonction prédéfinie date qui va peremttre de récupérer la date actuelle
        $birth_date_obj = new DateTime($birth_date); //On fait appelle à une class prédifinie pour créer une nouvelle classe de date anniversaire
        $actual_date_obj = new DateTime($actual_date); //On fait appelle à une class prédifinie pour créer une nouvelle classe de date actuelle
        $diff = $actual_date_obj->diff($birth_date_obj); //On fait appelle à une fonction prédéfinie diff qui permet de calculer la différence entre les deux object de DateTime
        $age_years = $diff->y; //Cette différence est transformé en année et permet de donner l'âge.
        return $age_years;
    }

    //Méthodes magiques
    public function __toString(){
        return " " . $this->_nom . " " . $this->_prenom . ", " . $this->calculAge() . ", possédant " . $this->afficherCompteBancaires() . "<br>";
    }

}