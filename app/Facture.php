<?php

class Facture{
	private $id;
	private $montant;
	private $client;
	private $listeAchats = [];
	private $date;

	public function __construct( $id = null, $client = null, $listeAchats = null){

		$this->id = $id;
		$this->client = $client;
		$this->listeAchats = $listeAchats;
		if (!empty($listeAchats)) {
			$this->montant = $this->CalculTotal();
		}
		$this->date = date('d/m/Y');
	}

	function loadAll(){
		$ListeFacture = array();
		$temp = Db::FindAll();
		$temp->setFetchMode(PDO::FETCH_CLASS|PDO::FECT_PROPS_LATE, "Facture");
		while ($row = $temp->fetch()){	array_push($ListeFacture,$row);	}
		return $ListeFacture;

	}

	function CalculTotal(){
		foreach ($this->listeAchats as $iAchat => $achat) {
			$this->montant += $achat->calculPrix();
		}
		return $this->montant;
	}
}