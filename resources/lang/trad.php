<?php 

function trad($langue = "fr")
{
	$langs = [];
	$name = [];
	$file = fopen("resources/lang/lang.csv", "r");
	$langKey = array_search($langue, fgetcsv($file, 1000, ";")); 
	if ($langKey !== false) {
		while ( $data = fgetcsv($file, 1000, ";")) {$name += [$data[0] => utf8_encode($data[$langKey])]; }
	}
	else{
		$langKey = array_search("fr", fgetcsv($file, 1000, ";"));
		while ( $data = fgetcsv($file, 1000, ";")) {$name += [$data[0] => utf8_encode($data[$langKey])]; }
	}
	return $name;

}