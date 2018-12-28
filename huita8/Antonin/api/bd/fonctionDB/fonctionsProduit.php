<?php

/* Gruaz Johan*/

//fonction obselete
function AjouterProduitPourTest($lblmesure, $lblproduit, $detailproduit, $prix, $tablblcategiories, $bdd)
{
	$rep=$bdd->prepare("INSERT INTO PRODUIT (idmesure, lblproduit, detailproduit, prix) VALUES 
		((SELECT idmesure FROM MESURE WHERE lblmesure = ?), ?, ?, ?);");
	$rep->execute([$lblmesure, $lblproduit, $detailproduit, $prix]);
	//var_dump($bdd->errorInfo());

	foreach ($tablblcategiories as $categorie) {
		$rep=$bdd->prepare("INSERT INTO APPARTIEN_A (idproduit, idcategorie) VALUES 
			((SELECT idproduit FROM PRODUIT WHERE lblproduit = ? AND detailproduit = ?),
			(SELECT idcategorie FROM CATEGORIE WHERE lblcategorie = ?) );");
		$rep->execute([$lblproduit, $detailproduit, $categorie]);
		//var_dump($bdd->errorInfo());
	}
}

//pour assigner une autre categorie a un produit => a utiliser pour espace admin
function AjouterAssignationProduitCategorie($idcategorie, $idproduit, $bdd)
{
	$rep=$bdd->prepare("INSERT INTO APPARTIEN_A (idproduit, idcategorie) VALUES 
			(?, ?);");
	$rep->execute([$idproduit, $idcategorie]);
}

//fonction qui retourne tout les produit avec toute les categorie => a utiliser pour l'espace admin
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

//fonction qui retourne les produit qui sont asssigné à des categories admin => a utiliser pour la page produit
function RecupererAllProduitsAssigneAdmin($bdd)
{
	$tabproduits = array();
	$n=0;
	$v=0;
	$rep=$bdd->prepare("SELECT p.idproduit, p.lblproduit, p.detailproduit, p.prix, p.pourcentagepresence, p.remise, p.cheminimage, p.present, p.ean, m.lblmesure, c.lblcategorie
FROM PRODUIT p
JOIN MESURE m ON p.idmesure=m.idmesure
JOIN APPARTIEN_A a ON p.idproduit=a.idproduit
JOIN CATEGORIE c ON a.idcategorie=c.idcategorie
WHERE c.categorieadmin=true;");
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

	echo json_encode($tabproduits);
	//return $tabproduits;
}


function FindProduitById($idproduit, $bdd){
	$unproduit = array();
	$rep=$bdd->prepare("SELECT p.idproduit, p.lblproduit, p.detailproduit, p.prix, p.pourcentagepresence, p.remise, p.cheminimage, p.present, m.lblmesure, c.lblcategorie
FROM PRODUIT p
JOIN MESURE m ON p.idmesure=m.idmesure
JOIN APPARTIEN_A a ON p.idproduit=a.idproduit
JOIN CATEGORIE c ON a.idcategorie=c.idcategorie
WHERE p.idproduit=?;");
	$rep->execute([$idproduit]);
	
	while ($row = $rep->fetch(PDO::FETCH_ASSOC)) {
		if (is_null($unproduit)) {
			$unproduit=array('idproduit' => intval($row["idproduit"]), 'lblproduit' => $row["lblproduit"], 'detailproduit' => $row["detailproduit"], 'prix' => $row["prix"],'lblmesure' => $row["lblmesure"],'lblcategorie' => array($row["lblcategorie"]), 'pourcentagepresence' => $row["pourcentagepresence"], 'remise' => $row["remise"], 'cheminimage' => $row["cheminimage"],'present' => $row["present"],'ean' => $row["ean"]);
		}else{
			$unproduit["lblcategorie"][]=$row["lblcategorie"];
		}
		
	}
	return $unproduit;
}


function AddUnProduitApi($lblproduit, $tablblcategiories, $cheminimage, $ean, $bdd)
{
	$rep=$bdd->prepare("INSERT INTO PRODUIT (lblproduit, cheminimage, idmesure, ean) VALUES 
		(?, ?, 1, ?);");
	$boo=$rep->execute([$lblproduit, $cheminimage, $ean]);
	//var_dump($bdd->errorInfo());

	foreach ($tablblcategiories as $categorie) {
		$rep=$bdd->prepare("INSERT INTO APPARTIEN_A (idproduit, idcategorie) VALUES 
			((SELECT idproduit FROM PRODUIT WHERE lblproduit = ? ),
			(SELECT idcategorie FROM CATEGORIE WHERE lblcategorie = ?) );");
		$rep->execute([$lblproduit, $categorie]);
		//var_dump($bdd->errorInfo());
	}
	return $boo;
}


function AddProduitsJsonPourApi($jsonproduits, $bdd)
{
	//var_dump(json_decode($jsonproduits, true, 100000));

	foreach (json_decode($jsonproduits, true, 100000) as  $unproduit) 
	{
		
		foreach ($unproduit as $key => $unchant) 
		{
			//var_dump("testforeach1");
			if ($key=="cat") {
				//var_dump("testif1");

				foreach ($unchant as $unecat) {
					
					
					$rep=$bdd->prepare("SELECT * FROM CATEGORIE
						WHERE lblcategorie=?;");
					$rep->execute([$unecat]);
					//var_dump($bdd->errorInfo());
					$row = $rep->fetch(PDO::FETCH_ASSOC);
					if ($row==false) {
						AjouterCategorie($unecat, $bdd, false);
					}
				}
				
			}

			
		}
		/*
		foreach ($unproduit["cat"] as $unecategorie) 
		{
			$rep=$bdd->prepare("SELECT * FROM CATEGORIE
				WHERE lblcategorie=?;");
			$rep->execute([$unecategorie]);
			if (is_null($rep->fetch(PDO::FETCH_ASSOC))) {
				AjouterCategorie($unecategorie, $bdd);
			}
		}*/
		return AddUnProduitApi($unproduit["produit"], $unproduit["cat"], $unproduit["image"], $unproduit["ean"], $bdd);
	}
}



//pour changer le bool d'affichage
function AfficherProduit($idproduit, $afficher, $bdd /*= new PDO("mysql:host=localhost;dbname=huitahuit", "huitahuit", "groupe1")*/){
	$rep=$bdd->prepare("UPDATE PRODUIT 
		SET  present = ?
		WHERE idproduit=?;");
	$rep->execute([$afficher, $idproduit]);
}


//trouver tout les produits present sur une facture 
function FindProduitsPourFacture($idfacture, $bdd){
	$Produitsfacture = array();
	$rep=$bdd->prepare("SELECT co.idproduit, co.quantite
		FROM CONTIENT co
		WHERE co.idfacture=?;");
	$rep->execute([$idfacture]);
	
	while ($row = $rep->fetch(PDO::FETCH_ASSOC)) {
		$Produitsfacture[]=array('idproduit' => $row["idproduit"], 'produit' => FindProduitById($row["idproduit"]), 'quantite' => $row["quantite"]);
		
	}
	return $Produitsfacture;
}

//pour ajouter des produit type fruit et legume => espace admin
function AddUnProduitKg($lblproduit, $tablblcategiories, $bdd, $prix, $present = true)
{
	$rep=$bdd->prepare("INSERT INTO PRODUIT (lblproduit, prix, idmesure, $present) VALUES 
		(?, ?, 2, ?);");
	$rep->execute([$lblproduit, $prix, $present]);
	//var_dump($bdd->errorInfo());

	foreach ($tablblcategiories as $categorie) {
		$rep=$bdd->prepare("INSERT INTO APPARTIEN_A (idproduit, idcategorie) VALUES 
			((SELECT idproduit FROM PRODUIT WHERE lblproduit = ? ),
			(SELECT idcategorie FROM CATEGORIE WHERE lblcategorie = ?) );");
		$rep->execute([$lblproduit, $categorie]);
		//var_dump($bdd->errorInfo());
	}
}