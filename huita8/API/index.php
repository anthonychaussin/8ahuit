<?php
if (isset($_GET['API'])) {
	switch ($_GET['API']) {
		case 'scrap':
		include('scrap.php');
			break;

		case 'PDF':
		include('PDF.php');
			break;
		
		default:
			header('Location: '. preg_split('[/]',strtolower( $_SERVER['SERVER_PROTOCOL']))[0].'://'.$_SERVER['HTTP_HOST'].'/');
			break;
	}
}
else{
	header('Location: '. preg_split('[/]',strtolower( $_SERVER['SERVER_PROTOCOL']))[0].'://'.$_SERVER['HTTP_HOST'].'/');
}
//wget -q -O - http://10.103.1.202/~huitahuit/huita8/API/?API=hello
?>