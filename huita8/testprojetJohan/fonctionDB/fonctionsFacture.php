<?php

/*Gruaz Johan*/

function AddFacture($numeroreservationclient, $nomclient, $prenomclient, $tabproduits, $boolregle)
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

function FindFactureByIdFacture($idfacture, $bdd){
	$rep=$bdd->prepare("SELECT f.idfacture, f.idclient, f.datecreationfacture, f.reglee
		FROM  FACTURE f
		WHERE f.idfacture = ?;");
	$rep->execute([$idfacture]);
	return $rep;
}

function FindFacturesByIdClient($idclient, $bdd){
	$facturesClient = array();
	$rep=$bdd->prepare("SELECT f.idfacture, f.idclient, f.datecreationfacture, f.reglee
		FROM  FACTURE f
		WHERE f.idclient = ?;");
	$rep->execute([$idclient]);

	while ($row = $rep->fetch(PDO::FETCH_ASSOC)){
		$facturesClient[]=array('idfacture' => intval($row["idfacture"]), 'datecreationfacture' => $row["datecreationfacture"], 'reglee' => $row["reglee"]);
	}
	return $facturesClient;
}

