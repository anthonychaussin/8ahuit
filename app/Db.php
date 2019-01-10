<?php

/**
 * Classe de connection a la bdd
 */
class Db extends Model
{
	private $bdString;
	function __construct()
	{
		switch ($_SERVER['HTTP_HOST']) {
			case "10.103.1.202":
				$this->dbString = new new PDO("mysql:host=localhost;dbname=huitahuit", "huitahuit", "groupe1");
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
	public function __get($Attr)
	{
		return $this->$Attr;
	}

	public function __set($Attr, $value)
	{
		return $this->$Attr = $value;
	}
}