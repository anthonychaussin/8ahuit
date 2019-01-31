<?php

if(isset($_SESSION['register'])){
	if ($_SESSION['register']['authorize'] == 'master' && $_SESSION['register']['info']['mdpclient'] == (new Client())->fonctionDb('FindClientByLog','pcolin'))->mdpclient {
		if (isset($_GET['API'])) 
{
	switch ($_GET['API']) 
	{
		case 'PDF':
			$temp = "huita8/API/facturePDF";
			break;
		case '4ht8d4bsd54br5sh7et5h':
			$temp = "";
			break;
		default:
			//session_destroy();
			include 'resources/views/404.html';
			break;
	}
}
	}
}
