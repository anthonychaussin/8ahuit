<?php
/**
 * 
 */
class ShopController extends Controller
{
	
	function index()
	{
		//aller chercher les données et les mettre dans $data
		return $this->view ('produit', ["data" => $this->data], ["prod","acceuil","scroll"], ["vue","vue-resource","jq","scroll"]);
	}
}