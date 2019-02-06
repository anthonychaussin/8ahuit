<?php

/**
 * Classe de connection a la bdd
 */
class Db extends Model
{
	protected $dbString;
	function __construct()
	{
		switch ($_SERVER['HTTP_HOST']) {
			case "10.103.1.202":
				$this->dbString = new PDO("mysql:host=localhost;dbname=huitahuit", "huitahuit", "groupe1");
				break;
			case "spar1950g1.000webhostapp.com":
				$this->dbString = new PDO("mysql:host=localhost;dbname=id7005313_spar", "id7005313_groupe1", "groupe1");
				break;
			default:
				throw new Exception("Erreur ce serveur est inconu et/ou n'est lier à aucune base de donnée", 1);
				die();				
				break;
		}	
	}

	public function special($object)
	{
		include "fonctionDB/fonctions".$object.".php";
	}
}