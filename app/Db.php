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
			case "*******":
				$this->dbString = new PDO("mysql:host=localhost;dbname=*******", "******", "******");
				break;
			case "*********":
				$this->dbString = new PDO("mysql:host=localhost;dbname=*******", "*******", "*******");
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
