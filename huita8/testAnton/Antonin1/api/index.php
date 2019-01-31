<?php 

require("./bd/fonctionDB/fonctionsProduit.php");
require("./bd/dbco.php");
$bdd = new PDO("mysql:host=localhost;dbname=huitahuit", "huitahuit", "groupe1");
$retour = RecupererAllProduits($bdd);

echo json_encode($retour);
//print_r($retour);
//return(json_encode($retour));

//pour php charger un nb limiter de donné
//https://www.google.fr/search?rlz=1C1GCEU_fr&biw=1600&bih=789&ei=hfMHXP7XDYXoxgPdy6eYDA&q=comment+charger+que+un+certain+nombre+de+produit+php&oq=comment+charger+que+un+certain+nombre+de+produit+php&gs_l=psy-ab.3...4943.8613..9085...1.0..0.122.473.4j1......0....1..gws-wiz.......0i71j33i160.EzxF-SsgOYc