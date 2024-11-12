<?php

class Compte{
    private string $libelle;
    private float $soldeInitial;
    private string $devise;
    private Titulaire $titulaire; 

    public function __construct(string $libelle, float $soldeInitial, string $devise, Titulaire $titulaire){
        $this->libelle=$libelle;
        $this->soldeInitial=$soldeInitial;
        $this->devise=$devise;
        $this->titulaire=$titulaire;
        $this->titulaire->addCompte($this);
    }

    public function getLibelle(){
        return $this->libelle;
    }

    public function setLibelle($libelle){
        $this->libelle=$libelle;
    }

    public function getSoldeInitial(){
        return $this->soldeInitial;
    }

    public function setSoldeInitial($soldeInitial){
        $this->soldeInitial=$soldeInitial;
    }

    public function getDevise(){
        return $this->devise;
    }

    public function setDevise($devise){
        $this->devise=$devise;
    }

    public function getTitulaire():Titulaire{
        return $this->titulaire;
    }

    public function setTitulaire($titulaire){
        $this->titulaire=$titulaire;
        return $this;
    }

    public function crediter(float $montant){
        $this->soldeInitial+=$montant;
        return "Le compte a été crédité de $montant. Solde du compte : ".$this->soldeInitial." ".$this->devise;
    }

    public function debiter(float $montant){
        if($this->soldeInitial>=$montant){
            $this->soldeInitial-=$montant;
            return "Le compte a été débité de $montant. Solde du compte : ".$this->soldeInitial." ".$this->devise;
         }else{
             return "Le solde est insuffisant";
         }
    }

    public function transferer(float $montant,Compte $compteAdebiter){
        $compteAdebiter->debiter($montant);
        $this->crediter($montant);
        return "Le compte $this a été crédité de $montant. Son solde est de: ".$this->soldeInitial." ".$this->devise;
    }

  

    public function afficherInfosCompte(){
        $resultat=
        "<h1>Informations Compte bancaire</h1>
        $this->libelle<br>
        Solde: $this->soldeInitial<br>
        Devise: $this->devise<br>
        Titulaire: $this->titulaire<br>";
        return $resultat;
    }
    public function __toString(){
        return $this->libelle;
    }
}


