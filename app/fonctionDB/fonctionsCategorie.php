<?php

/*Gruaz Johan*/


function AjouterCategorie($lblcategorie, $bdd, $categorieadmin = false)
{
	$categoriead = 0;
	if ($categorieadmin) {
		$categoriead = 1;
	}

	$rep=$bdd->prepare("INSERT INTO CATEGORIE (lblcategorie, categorieadmin) VALUES (?, ?);");
	$rep->execute([$lblcategorie, $categoriead]);
	//var_dump($bdd->errorInfo());
}

function ModifierCategorie($idcategorie, $lblcategorie, $bdd)
{
	$rep=$bdd->prepare("UPDATE CATEGORIE c
		SET c.lblcategorie=?
		WHERE c.idcategorie=?;");
	$rep->execute([$lblcategorie, $idcategorie]);
	
}

// pour recuperer toutes les cartegories du client => a utiliser pour l'espace admin 
function RecupererAllCategorieAdmin($bdd)
{
	$tabcat = array();
	$rep=$bdd->prepare("SELECT * FROM CATEGORIE
		WHERE categorieadmin=true;");
	$rep->execute();
	

	while ($row = $rep->fetch(PDO::FETCH_ASSOC)) {
		$tabcat[]=array('idcategorie' => intval($row["idcategorie"]), 'lblcategorie' => $row["lblcategorie"]);
	}
}

function SupprimerCategoriesCadencier($bdd){
	$rep=$bdd->prepare("DELETE 
		FROM CATEGORIE
		WHERE categorieadmin=0;");
	$rep->execute([]);
	//var_dump($bdd->errorInfo());
}