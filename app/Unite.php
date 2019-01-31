<!-- William FAVERO -->
<?php

class Unite extends Model{
	private $id;
	private $lbl;

	public function __construct(){

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