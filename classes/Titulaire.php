<?php

class Titulaire{
    private string $nom;
    private string $prenom;
    private DateTime $dateNaissance;
    private string $ville;
    private array $comptes;

    public function __construct(string $nom, string $prenom, string $dateNaissance, string $ville){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->dateNaissance= new DateTime($dateNaissance);
        // transformer le string en objet date
        $this->ville=$ville;
        $this->comptes=[];
    }

    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom=$nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function setPrenom($prenom){
        $this->prenom=$prenom;
    }
    public function getDateNaissance(){
        return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissance){
        $this->dateNaissance=$dateNaissance;
    }

    public function getVille(){
        return $this->ville;
    }

    public function setVille($ville){
        $this->ville=$ville;
    }

    public function getComptes(){
        return $this->comptes;
    }

    public function setComptes($comptes){
        $this->comptes=$comptes;
    }

    public function addCompte(Compte $compte){
        $this->comptes[]=$compte;
        // ou array_push($this->comptes,$compte);
    }

    public function calculerAgeTitulaire(){
        $now=new DateTime();
        $dateNaissance=$this->dateNaissance;
        $age=$dateNaissance->diff($now)->y;
        return "Le titulaire du compte a : ".$age." ans";
    }

    public function afficherInfosTitulaire(){
        $result="<h1>Informations titulaire</h1>
        <ul>
        <li>$this->prenom</li>
        <li>$this->nom</li>".
        "<li>".$this->dateNaissance->format("Y-m-d") ."</li>
        <li>$this->ville</li>";

        foreach($this->comptes as $compte){
            $result.="<li>$compte</li>";
        }
        $result.="</ul>";

        return $result;
    }

    public function __toString(){
        return $this->prenom." ".$this->nom;
    }
}

