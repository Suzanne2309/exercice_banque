<?php

include "Titulaire.php";
include "CompteBancaire.php";

$titulaire1 = new Titulaire ("Sanders", "Max", "1989-02-12", "Eschau"); 

$compteBancaire1 = new CompteBancaire("Livret A", 1030, "€", $titulaire1);
$compteBancaire2 = new CompteBancaire("Livret B", 1500, "€", $titulaire1);
$compteBancaire3 = new CompteBancaire("Livret C", 500, "€", $titulaire1);

echo $titulaire1;

echo $compteBancaire1;
echo $compteBancaire2;
echo $compteBancaire3;

//Test fonction créditer
$compteBancaire1->crediter(470);
echo $compteBancaire1;
//Test fonction débiter
$compteBancaire1->debiter(700);
echo $compteBancaire1;

//Test afficher compte (marche pas)
echo $titulaire1->afficherCompteBancaires();

//Test fonction virement
$compteBancaire2->virement($compteBancaire3, 200);
echo $compteBancaire2;
echo $compteBancaire3;
//Test 2 fonction virement
echo $compteBancaire2->virement($compteBancaire3, 1500);
//Test 3 fontion virement
echo $compteBancaire2->virement($compteBancaire3, -1000);

