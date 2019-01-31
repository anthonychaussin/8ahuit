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

	function calculPrix(){
		return $this->produit->prixunite * $this->quantité;
	}



}