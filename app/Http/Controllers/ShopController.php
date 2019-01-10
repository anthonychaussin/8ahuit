	<!-- Antonin Caillon cree le 02/01/2019 -->
<?php
/**
 * 
 */
class ShopController extends Controller
{
	
	function index()
	{
		//aller chercher les données et les mettre dans $data
		$data = [];
		return $this->view ('produit', ["data" => $data], ["prod","acceuil"], ["vue","vue-resource"]);
	}
}