<!-- William FAVERO -->
<?php

class Unite{
	private $id;
	private $lbl;

	public function __construct(){

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
			$ListeUnite = array();
			$temp = Db::FindAll();
			$temp->setFetchMode(PDO::FETCH_CLASS|PDO::FECT_PROPS_LATE, "Unite");
			while ($row = $temp->fetch())
			{
				array_push($ListeUnite,$row);
			}
			return $ListeUnite;

	}

}