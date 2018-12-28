<!-- William FAVERO -->
<?php

class Produit{
	private $id;
	private $lbl;
	private $image;
	private $detail;
	private $prixunite;
	private $poids;
	private $cat = [];
	private $ean;

	public function __construct($id = null, $lbl = null, $image = null, $detail = null, $prixunite = 0, $poid = 0, $cat = null, $ean = null){

		$this->id = $id;
		$this->lbl = $lbl;
		$this->image = $image;
		$this->detail = $detail;
		$this->prixunite = $prixunite;
		$this->poids = $poid;
		$this->cat = $cat;
		$this->ean = $ean;
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
			$ListeProduit = array();
			$temp = Db::FindAll();
			$temp->setFetchMode(PDO::FETCH_CLASS|PDO::FECT_PROPS_LATE, "Produits");
			while ($row = $temp->fetch())
			{
				array_push($ListeProduit,$row);
			}
			return $ListeProduit;

	}

}