<!-- Antonin Caillon cree le 02/01/2019 -->
<?php
/**
 * 
 */
class AboutController extends Controller
{
	
	function index()
	{
		//aller chercher les données et les mettre dans $data
		$data = [];
		return $this->view ('about', ["data" => $data], ["acceuil"], null, ".html");
	}
}