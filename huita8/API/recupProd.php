<?php

/*Gruaz Johan*/
include_once("../testprojetJohan/dbco.php");
include_once("../testprojetJohan/fonctionDB/fonctionsProduit.php");
include_once("../testprojetJohan/fonctionDB/fonctionsCategorie.php");



$produits = $_POST["produit"];

//echo $produits;

AddProduitsJsonPourApi($produits, $bdd);
