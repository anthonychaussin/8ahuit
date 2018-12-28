<!-- William FAVERO -->
<?php

class Mesure{
	private $id;
	private $lbl;

	public function __construct($id = null, $lbl = null){
		$this->id = $id;
		$this->lbl = $lbl;
	}

	public function __get($Attr)
	{
		return $this->$Attr;
	}

	public function __set($Attr, $value)
	{
		return $this->$Attr = $value;
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