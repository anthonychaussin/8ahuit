<?php
/**
 * 
 */
class HomeController extends Controller
{
	
	function index()
	{
		//aller chercher les données et les mettre dans $data
		$data = [];
		return $this->view ('acceuil', $this->data, ["acceuil"], null);
	}
}