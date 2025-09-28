<?php

include "Titulaire.php";
include "CompteBancaire.php";

$titulaire1 = new Titulaire ("Sanders", "Max", "1989-02-12", "Eschau"); 

$compteBanquaire1 = new CompteBancaire("Livret A", 1030, "€", $titulaire1);

echo $titulaire1;

echo $compteBanquaire1;

//Test fonction créditer
$compteBanquaire1->crediter(470);
echo $compteBanquaire1;
//Test fonction débiter
$compteBanquaire1->debiter(700);
echo $compteBanquaire1;

//Test afficher compte (marche pas)
echo $titulaire1->afficherCompteBancaires();

