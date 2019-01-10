<?php

//ANTHONY CHAUSSIN

if (isset($_GET['API'])) {
	switch ($_GET['API']) {
		case 'scrap':
		include 'scrap.php';
			break;

		case 'PDF':
		include 'PDF.php';
			break;
		
		default:
			header('Location: '. preg_split('[/]',strtolower( $_SERVER['SERVER_PROTOCOL']))[0].'://'.$_SERVER['HTTP_HOST'].'/');
			break;
	}
}
else{
	header('Location: '. preg_split('[/]',strtolower( $_SERVER['SERVER_PROTOCOL']))[0].'://'.$_SERVER['HTTP_HOST'].'/');
}

?>