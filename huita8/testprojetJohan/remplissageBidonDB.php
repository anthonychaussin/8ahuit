<?php

/*Gruaz Johan*/

//remplissage categorie client

//var_dump($bdd->errorInfo());

//remplissage mesure

//var_dump($bdd->errorInfo());

/*
AjouterProduitPourTest('kg', 'pomme golden', 'pomme de france', 1.20, ['fruit', 'bio'], $bdd);
AjouterProduitPourTest('kg', 'pois', 'pois origine espagne', 2.20, ['legume', 'bio'], $bdd);
AjouterProduitPourTest('uni', 'coca cola bouteille 1l', 'bouteille d\'un litre de coca cola', 2.32,['sec'], $bdd);
AjouterProduitPourTest('uni', 'haricot 500g', 'conserve 500g haricot origine italie', 2.59, ['conserve'], $bdd);
AjouterProduitPourTest('uni', 'noix a cajous 250g', 'detail produit noix de cajous', 1.86, ['sec'], $bdd);
AjouterProduitPourTest('uni', 'pizza pepine mozza', 'pizza a rechauffer au four en 2 min', 3.95, ['surgele'], $bdd);
AjouterProduitPourTest('uni', 'shampoing dope', 'Le shampoing des cyclistes', 4.05, ['hygienne'], $bdd);
*/


//AddClient('Colin', 'Pascal', 'pcoli', '1234iut', 'pascal.colin@univ-smb.fr', '123123', true, $bdd);


//test
/*
$tab=RecupererAllProduits($bdd);
var_dump($tab);
*/

//test
/*
$tab=FindProduitByID(2, $bdd);
var_dump($tab);

$tab=FindProduitByID(689, $bdd);
var_dump($tab);
*/

//test
/*
$champ="prix";
$val=2.2;
ModifierChampProduitById(1, $champ, $val, $bdd);
*/

//test
/*
$tab=FindProduitByID(1, $bdd);
var_dump($tab);
*/

// decommenter pour vider les produits et categories mon cadencier
/*
SupprimerAllProduits($bdd);
SupprimerCategoriesCadencier($bdd);
*/