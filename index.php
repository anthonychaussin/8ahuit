<?php

/*Anthony CHAUSSIN 30/12/2018 NE TOUCHER QU'AUX ENDROITS PREVUES ! */

$root =  preg_split('[/]',strtolower( $_SERVER['SERVER_PROTOCOL']))[0].'://'.$_SERVER['HTTP_HOST']."/".preg_split('[/]',$_SERVER['REQUEST_URI'])[1];session_start();include 'autoload.php';
if (isset($_GET['API'])) {	include 'routes/api.php';}
elseif(isset($_GET['U'])){switch (strtolower($_GET['U'])) { 

//vous pouvez modifier les variables $hearder et $dir
//$header vous demande si vous voulez la mise en page header/footer du site
//$dir est votre repertoir de travail /~huitahuit/huita8/$dir
//vous pouvez ajoutez autant de racourci que vous voulez

/*     SECTION MODIFIABLE */

		case 'w':
			$header = False;
			$dir = "admin";	
			break;

		
		case 'antonin':
			$header = True;
			$dir = "Antonin";	
			break;

		
		case 'v':
			$header = True;
			$dir = "Vianney";	
			break;

		
		case 'j':
			$header = False;
			$dir = "testprojetJohan";	
			break;

		
		case 'anton':
			$header = True;
			$dir = "testAnton/Antonin";	
			break;



/*       FIN DE LA SECTION*/


default:
header("Location: $root");break;}
if ($header) {$root .= "/?P=0&N=$dir";}
else{$root .= "/huita8/$dir";}
header("Location: $root");}
else{include 'routes/web.php';}?>