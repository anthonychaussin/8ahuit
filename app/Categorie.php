<!-- William FAVERO -->
<?php

class Categorie{
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