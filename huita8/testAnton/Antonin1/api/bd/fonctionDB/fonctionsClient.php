<?php

/*Gruaz Johan*/


function AddClient($nomclient, $prenomclient, $loginclient, $mdpclient, $mailclient, $numeroreservation, $comptedefinitif, $bdd, $telephone = null){
	$rep=$bdd->prepare("INSERT INTO CLIENT (nomclient, prenomclient, loginclient, mdpclient, mailclient, numeroreservation, comptedefinitif, telephone) VALUES 
		(?, ?, ?, ?, ?, ?, ?, ?);");
	$rep->execute([$nomclient, $prenomclient, $loginclient, $mdpclient, $mailclient, $numeroreservation, $comptedefinitif, $telephone]);
}


function FindClientById($idclient, $bdd){
	$unproduit;
	$rep=$bdd->prepare("SELECT c.idclient, c.nomclient, c.prenomclient, c.loginclient, c.mdpclient, c.mailclient, c.numeroreservation, c.comptedefinitif, 
FROM CLIENT c
WHERE c.idclient=?;");
	$rep->execute([$idclient]);
	return $rep;
}