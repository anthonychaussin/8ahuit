<?php

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


function AjouterCategorie($lblcategorie, $bdd)
{
	$rep=$bdd->prepare("INSERT INTO CATEGORIE (lblcategorie) VALUES ?;");
	$rep->execute($lblcategorie);
}


function AjouterClient($nomclient, $prenomclient, $loginclient, $mdpclient, $mailclient, $numeroreservation, $comptedefinitif, $bdd){
	$rep=$bdd->prepare("INSERT INTO CLIENT (nomclient, prenomclient, loginclient, mdpclient, mailclient, numeroreservation, comptedefinitif) VALUES 
		(?, ?, ?, ?, ?, ?, ?);");
	$rep->execute([$nomclient, $prenomclient, $loginclient, $mdpclient, $mailclient, $numeroreservation, $comptedefinitif]);
}



function RecupererAllProduits($bdd)
{
	$tabproduits = array();
	$n=0;
	$v=0;
	$rep=$bdd->prepare("SELECT p.idproduit, p.lblproduit, p.detailproduit, p.prix, p.pourcentagepresence, p.remise, p.cheminimage, p.present, m.lblmesure, c.lblcategorie
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
			$tabproduits[$n]=array('idproduit' => intval($row["idproduit"]), 'lblproduit' => $row["lblproduit"], 'detailproduit' => $row["detailproduit"], 'prix' => $row["prix"],'lblmesure' => $row["lblmesure"],'lblcategorie' => array($row["lblcategorie"]), 'pourcentagepresence' => $row["pourcentagepresence"], 'remise' => $row["remise"], 'cheminimage' => $row["cheminimage"],'present' => $row["present"]);
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
			$unproduit=array('idproduit' => intval($row["idproduit"]), 'lblproduit' => $row["lblproduit"], 'detailproduit' => $row["detailproduit"], 'prix' => $row["prix"],'lblmesure' => $row["lblmesure"],'lblcategorie' => array($row["lblcategorie"]), 'pourcentagepresence' => $row["pourcentagepresence"], 'remise' => $row["remise"], 'cheminimage' => $row["cheminimage"],'present' => $row["present"]);
		}else{
			$unproduit["lblcategorie"][]=$row["lblcategorie"];
		}
		
	}
	return $unproduit;
}



function FindClientById($idclient, $bdd){
	$unproduit;
	$rep=$bdd->prepare("SELECT c.idclient, c.nomclient, c.prenomclient, c.loginclient, c.mdpclient, c.mailclient, c.numeroreservation, c.comptedefinitif, 
FROM CLIENT c
WHERE c.idclient=?;");
	$rep->execute([$idclient]);
	return $rep;
}


function AddUnProduitApi($lblproduit, $tablblcategiories, $cheminimage, $ean, $bdd)
{
	$rep=$bdd->prepare("INSERT INTO PRODUIT (lblproduit, cheminimage, idmesure) VALUES 
		(?, ?, 1);");
	$rep->execute([$lblproduit, $cheminimage]);
	//var_dump($bdd->errorInfo());

	foreach ($tablblcategiories as $categorie) {
		$rep=$bdd->prepare("INSERT INTO APPARTIEN_A (idproduit, idcategorie) VALUES 
			((SELECT idproduit FROM PRODUIT WHERE lblproduit = ? ),
			(SELECT idcategorie FROM CATEGORIE WHERE lblcategorie = ?) );");
		$rep->execute([$lblproduit, $categorie]);
		//var_dump($bdd->errorInfo());
	}
}


function AddProduitsJsonPourApi($jsonproduits, $bdd)
{

	foreach (json_decode($jsonproduits) as  $unproduit) 
	{
		foreach ($unproduit["cat"] as $unecategorie) 
		{
			$rep=$bdd->prepare("SELECT * FROM CATEGORIE
				WHERE lblcategorie=?;");
			$rep=execute([$unecategorie]);
			if (is_null($rep->fetch(PDO::FETCH_ASSOC))) {
				AjouterCategorie($unecategorie, $bdd);
			}
		}
		AddUnProduitApi($unproduit["produit"], $unproduit["cat"], $unproduit["image"], $unproduit["ean"]);
	}
}


function AjouterFacture($numeroreservationclient, $nomclient, $prenomclient, $tabproduits, $boolregle)
{
	$rep=$bdd->prepare("SELECT c.idclient 
		FROM  CLIENT c
		WHERE c.nomclient = ? AND c.prenomclient = ? AND c.numeroreservation = ?;");
	$rep->execute([$nomclient, $prenomclient, $numeroreservationclient]);
	$idclient=$rep;
	$rep=$bdd->prepare("INSERT INTO FACTURE (idclient, datecreationfacture, reglee) VALUES
		(?, sysdate(), ?);");
	$rep->execute([$idclient, $boolregle]);
	$rep=$bdd->prepare("SELECT f.idfacture 
		FROM  FACTURE f
		WHERE f.idfacture >= (SELECT f.idfacture 
		FROM  FACTURE f);");
	$rep->execute();
	$idfacture=$rep;
	foreach ($tabproduits as $unproduit) {
		$rep=$bdd->prepare("INSERT INTO CONTIENT (idfacture, idproduit, quantite) VALUES
			(?, (SELECT p.idproduit
			FROM PRODUIT p
			WHERE p.ean=?), ?);");
		$rep->execute([$idfacture, $unproduit["ean"], $unproduit["quantite"]]);
	}
}

