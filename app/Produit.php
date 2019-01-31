<?php
// William FAVERO
class Produit extends Model{
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