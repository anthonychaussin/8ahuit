<?php 

function trad($langue = "Francais")
{
	$langs = [];
	$name = [];
	$file = fopen("resources/lang/lang.csv", "r");
	$langKey = array_search($langue, fgetcsv($file, 1000, ";")); 
	if ($langKey !== false) {
		while ( $data = fgetcsv($file, 1000, ";")) {$name += [$data[0] => utf8_encode($data[$langKey])]; }
	}
	else{
		throw new InvalidArgumentException('La langue '.$langue.' n\'est pas présente');
		$name = false;
	}
	return $name;

}