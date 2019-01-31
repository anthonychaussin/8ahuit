<?php

class Mesure{
	private $id;
	private $lbl;

	public function __construct($id = null, $lbl = null){
		$this->id = $id;
		$this->lbl = $lbl;
	}
	function loadAll(){
			$ListeMesure = array();
			$temp = Db::FindAll();
			$temp->setFetchMode(PDO::FETCH_CLASS|PDO::FECT_PROPS_LATE, "Mesure");
			while ($row = $temp->fetch())
			{
				array_push($ListeUnite,$row);
			}
			return $ListeMesure;

	}

}