<?php

class Categorie extends Model{
	private $id;
	private $lbl;

	public function __construct($id = null, $lbl = null){
		$this->id = $id;
		$this->lbl = $lbl;
	}

	function loadAll(){
			$ListeCategorie = array();
			$temp = Db::FindAll();
			$temps->setFetchMode(PDO::FETCH_CLASS|PDO::FECT_PROPS_LATE, "Categorie");
			while ($row = $temp->fetch())
			{
				array_push($ListeCategorie,$row);
			}
			return $ListeCategorie;

	}

}