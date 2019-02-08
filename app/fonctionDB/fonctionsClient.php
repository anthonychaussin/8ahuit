<?php

/*Gruaz Johan*/

function FindClientByMail($mail){
	$rep = ((new Db())->dbString)->prepare("SELECT * FROM CLIENT WHERE mailclient=?;");
	$rep->execute([$mail]);
	if (!is_null($rep->errorInfo()[1])) {var_dump($rep->errorInfo());}
	$data = $rep->fetch(PDO::FETCH_ASSOC);
	//var_dump(((new Db())->dbString)->errorInfo());
	//var_dump($data);
	$obj = new Client();
	foreach ($data as $key => $value) {
		$key = strtolower($key);
		$obj->$key = $value;
	}
	return $obj;
}