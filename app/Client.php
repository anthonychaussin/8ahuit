<!-- William FAVERO -->
<?php

class Client{

	private $id;
	private $nom;
	private $prenom;
	private $dateArrivee;
	private $dateDepart;
	private $nReservation;

	public function __construct($id = null, $nom = null, $prenom = null, $dateArrivee = null, $dateDepart = null, $nReservation = null){
		$this->id = $id;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->dateArrivee = $dateArrivee;
		$this->dateDepart = $dateDepart;
		$this->nReservation = $nReservation;
	}

	public function __get($Attr)
	{
		return $this->$Attr;
	}

	public function __set($Attr, $value)
	{
		$this->$Attr = $value;
	}

	function loadAll(){
			$ListeClients = array();
			$temp = Db::FindAll();
			$temp->setFetchMode(PDO::FETCH_CLASS|PDO::FECT_PROPS_LATE, "Client");
			while ($row = $temp->fetch())
			{
				array_push($ListeClient,$row);
			}
			return $ListeClient;

	}

}