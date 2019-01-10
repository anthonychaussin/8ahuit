	<!-- Antonin Caillon cree le 02/01/2019 -->
<?php
/**
 * 
 */
class RegisterController extends Controller
{
	
	function index()
	{
		//aller chercher les données et les mettre dans $data
		$data = [];
		return $this->view ('formConnInsc', ["data" => $data], ["form","acceuil"], null, ".html");
	}
}