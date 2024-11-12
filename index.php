<?php

spl_autoload_register(function ($class_name) {
    require 'classes/'. $class_name . '.php';
});

$bradPitt=new Titulaire("Pitt","Brad","1968/01/01","Los Angeles");
$compteCourant=new Compte("Compte Chèque","500","USD",$bradPitt);
$compteEpargne=new Compte("Compte Epargne","2000","USD",$bradPitt);

// AFFICHER INFOS TITULAIRE DU COMPTE
echo $bradPitt->afficherInfosTitulaire();

//AFFICHER INFOS COMPTE
echo $compteCourant->afficherInfosCompte();

//CALCULER AGE TITULAIRE A PARTIR DE SA DATE DE NAISSANCE 
echo $bradPitt->calculerAgeTitulaire();
echo"<br>";

//OPERATIONS BANCAIRES (DEBIT,CREDIT,VIREMENT)
echo $compteCourant->crediter(500);
echo"<br>";
echo $compteEpargne->debiter(200);
echo"<br>";
echo $compteEpargne->debiter(2200);
echo"<br>";
echo $compteCourant->transferer(100,$compteEpargne);
echo"<br>";
