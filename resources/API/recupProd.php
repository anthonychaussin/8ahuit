<?php 

function RecupererAllProduits($bdd)
{
	$tabproduits = array();
	$n=0;
	$v=0;
	$rep=$bdd->prepare("SELECT p.idproduit, p.lblproduit, p.detailproduit, p.prix, p.pourcentagepresence, p.remise, p.cheminimage, p.present, p.ean, m.lblmesure, c.lblcategorie
FROM PRODUIT p
JOIN MESURE m ON p.idmesure=m.idmesure
JOIN APPARTIEN_A a ON p.idproduit=a.idproduit
JOIN CATEGORIE c ON a.idcategorie=c.idcategorie;");
	$rep->execute();

	while ($row = $rep->fetch(PDO::FETCH_ASSOC)) {
		if ($n!=0) {
			$v=$n-1;
		}
		if ($n!=0 && $row["idproduit"]==$tabproduits[$v]["idproduit"]) {
			$tabproduits[$v]["lblcategorie"][]=$row["lblcategorie"];
		}else{
			$tabproduits[$n]=array('idproduit' => intval($row["idproduit"]), 'lblproduit' => $row["lblproduit"], 'detailproduit' => $row["detailproduit"], 'prix' => $row["prix"],'lblmesure' => $row["lblmesure"],'lblcategorie' => array($row["lblcategorie"]), 'pourcentagepresence' => $row["pourcentagepresence"], 'remise' => $row["remise"], 'cheminimage' => $row["cheminimage"],'present' => $row["present"],'ean' => $row["ean"]);
			$n=$n+1;
		}
	}

	//echo json_encode($tabproduits);
	return $tabproduits;
}

$retour = RecupererAllProduits((new Db())->dbString);

echo json_encode($retour);



//pour php charger un nb limiter de donné
//https://www.google.fr/search?rlz=1C1GCEU_fr&biw=1600&bih=789&ei=hfMHXP7XDYXoxgPdy6eYDA&q=comment+charger+que+un+certain+nombre+de+produit+php&oq=comment+charger+que+un+certain+nombre+de+produit+php&gs_l=psy-ab.3...4943.8613..9085...1.0..0.122.473.4j1......0....1..gws-wiz.......0i71j33i160.EzxF-SsgOYc