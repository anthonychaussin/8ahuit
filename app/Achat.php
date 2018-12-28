<!-- William FAVERO -->
<?php

class Achat{
	private $produit;
	private $quantité;
	private $ttc;

	public function __construct($produit = null, $quantite = 0){
		$this->produit = $produit;
		$this->quantité = $quantite;
		if (! is_null($produit)) {
			$this->ttc = $this->calculPrix();
		}
	}

	public function __get($Attr)
	{
		return $this->$Attr;
	}

	public function __set($Attr, $value)
	{
		return $this->$Attr = $value;
	}

	function calculPrix(){
		return $this->produit->prixunite * $this->quantité;
	}



}