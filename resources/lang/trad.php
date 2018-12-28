<?php 
function trad($langue = "Francais")
{
	$langs = [];
	$name = [];
	$file = fopen("lang.csv", "r");
	
	$langKey = array_search($langue, fgetcsv($file, 1000, ";")); 
	if ($langKey !== false) {
		while ( $data = fgetcsv($file, 1000, ";")) {$name += [$data[0] => $data[$langKey]]; }
	var_dump($name);
	}
	else{
		throw new InvalidArgumentException('La langue '.$langue.' n\'est pas présente');
		$name = false;
	}
	
	return $name;

}