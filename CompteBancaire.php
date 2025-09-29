<?php

class CompteBancaire{
    //Attributs
    private string $_libelle;
    private float $_soldeInitial;
    private string $_uniteMonnaie;
    private Titulaire $_titulaire; //Cet attribut permet de relier l'instance de nouveau compte au titulaire correspondant

    //Constructor
    public function __construct($libelle, $soldeInitial, $uniteMonnaie, $titulaire){
        $this->_libelle = $libelle;
        $this->_soldeInitial = $soldeInitial;
        $this->_uniteMonnaie = $uniteMonnaie;
        $this->_titulaire = $titulaire;
        $titulaire->ajouterCompteBancaire($this);
    }

    /* Libellé */
    public function getLibelle(){
        return $this->_libelle;
    }
    public function setLibelle(){
        $this->_libelle = $libelle;
    }
    /* Solde initial */
    public function getSoldeInitial(){
        return $this->_soldeInitial;
    }
    public function setSoldeInitial(){
        $this->_soldeInitial = $soldeInitial;
    }
    /* Unité Monnaietaire */
    public function getUniteMonnaie(){
        return $this->_uniteMonnaie;
    }
    public function setUniteMonnaie(){
        $this->_uniteMonnaie = $uniteMonnaie;
    }
    /* Titulaire */
    public function getTitulaire(){
        return $this->_titulaire;
    }
    public function setTitulaire(){
        $this->_titulaire = $_titulaire;
    }

    //Méthodes
    public function crediter($montant){ //On crée la fonction créditer en passant la variable montant en paramètre
        $this->_soldeInitial += $montant; //On ajoute le montant qu'on indiquera lorsqu'on fera appel à la fonction
        return $this->_soldeInitial; //On actualise le solde Initial avec l'ajout du montant
    }

    public function debiter($montant){
        $this->_soldeInitial -= $montant; //On déduis le montant qu'on indiquera lorsqu'on fera appel à la fonction
        return $this->_soldeInitial;
    }

    public function virement(CompteBancaire $compteBancaire, $montant){ //On passe en paramètre notre compteBancaire et notre montant
        //Pour un virement, on doit debiter un compte A puis crediter le compte B
        if ($montant >= 0){
        if($this->getSoldeInitial() >= $montant){
            $this->debiter($montant); //SI on debite du compte le montant
            $compteBancaire->crediter($montant); // ALORS on credtie le montant du compteBancaire demandé
            return $this->_soldeInitial; //On actualise le solde Initial
        } else {return "Le compte n'a pas de solde suffissant pour être débiter !<br>"; };
        } else {return "Erreur : montant invalide <br>";}
    }

    //Méthodes magiques
    public function __toString(){
        return "Ce compte bancaire " . $this->_libelle . " avec " . $this->_soldeInitial . "" . $this->_uniteMonnaie . " .<br>";
    }
}

