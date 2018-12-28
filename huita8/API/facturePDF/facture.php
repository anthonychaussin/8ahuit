<?php

/**
 * classe facture
 */
class Facture
{
	protected $client = array();
	protected $total;
	protected $Nresa;
	protected $productLst = array();
	function __construct($client){
		$this->client = $client;
	}

	function __set($attr, $value){
		$this->$attr = $value;
	}

	function __get($attr){
		return $this->$attr;
	}

	function productAdd($value)
	{
		array_push($this->productLst, $value);
	}

	function trash(){
		$this->client = '';
		$this->total = '';
		$this->productLst = array();
	}
}