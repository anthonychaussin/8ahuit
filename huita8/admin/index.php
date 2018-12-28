<!-- William FAVERO -->
<?php

session_start();
$_SESSION['login'] = "SuperPingouin"; 

include_once "db.php";

if(isset($_SESSION['login']))
{
	if($_SESSION['login'] == "SuperPingouin") //à remplacer par le login de l'admin
	{
		include_once "admin.php";
	}
	else
	{
		echo "Accès refusé";
	}
}
//else
	//error
