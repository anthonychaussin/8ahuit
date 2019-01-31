<?php
/**
 * 
 */
class ScrapController extends Controller
{
	
	function index()
	{
		//aller chercher les données et les mettre dans $data
		return $this->view ('scrap', ["data" => $this->data], ["scrap"]);
	}
}