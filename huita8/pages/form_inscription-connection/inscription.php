<!-- William Favero -->

<?php

include_once "../../testprojetJohan/dbco.php";
include_once "../../testprojetJohan/fonctionDB/fonctionsClient.php";

if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST[""]) && isset($_POST[""]) && isset($_POST[""]) && isset($_POST[""]) && isset($_POST[""]))
{
	AddClient($nomclient, $prenomclient, $loginclient, $mdpclient, $mailclient, $numeroreservation, $comptedefinitif, $bdd, $telephone = null);
}

else
{
	echo "Vous devez remplir tous les champs";
}