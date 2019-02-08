<?php
/*Gruaz Johan*/
include_once("./huita8/testprojetJohan/fonctionDB/fonctionsProduit.php");
$produits = $_POST["produit"];
//echo $produits;
AddProduitsJsonPourApi($produits, (new Db())->dbString);