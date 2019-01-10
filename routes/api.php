<?php

if (isset($_GET['API'])) {
		switch ($_GET['API']) {
			case 'PDF':
				$temp = "huita8/API/facturePDF";
				break;
			case 'scrap':
				$temp = "huita8/API/scrap.php";
				break;
			case '4ht8d4bsd54br5sh7et5h':
				$temp = "";
				break;
			default:
				header('Location: '. preg_split('[/]',strtolower( $_SERVER['SERVER_PROTOCOL']))[0].'://'.$_SERVER['HTTP_HOST'].'/~huitahuit');
				break;
		}
	}