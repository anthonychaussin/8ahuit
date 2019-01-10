<!-- Antonin Caillon cree le 02/01/2019 -->
<?php
/**
 * 
 */
class ContactController extends Controller
{
	
	function index()
	{
		//aller chercher les données et les mettre dans $data
		$data = [];
		return $this->view ('contact', ["data" => $data], ["acceuil"], null, ".html");
	}
}