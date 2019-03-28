<?php

/*Anthony CHAUSSIN 30/12/2018 NE TOUCHER QU'AUX ENDROITS PREVUES ! */
function secur($string){return htmlspecialchars($string, ENT_QUOTES|ENT_SUBSTITUTE);}
function geo(){$_SESSION['lang'] =  substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);}
$root =  preg_split('[/]',strtolower( $_SERVER['SERVER_PROTOCOL']))[0].'://'.$_SERVER['HTTP_HOST']."/".preg_split('[/]',$_SERVER['REQUEST_URI'])[1];session_start();geo();include 'autoload.php';
$GLOBALS['root'] = $root;
if (isset($_GET['API'])) {	include 'routes/api.php';}
elseif(isset($_GET['U'])){switch (strtolower($_GET['U'])) { 

//vous pouvez modifier les variables $hearder et $dir
//$header vous demande si vous voulez la mise en page header/footer du site
//$dir est votre repertoir de travail /~huitahuit/huita8/$dir
//vous pouvez ajoutez autant de racourci que vous voulez
//10.103.1.202/~huitahuit?U=

/*     SECTION MODIFIABLE */

		case 'z':
			$header = True;
			$dir = "anthony";
			break;

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



/*       FIN DE LA SECTION*/


default:
header("Location: $root");break;}
if ($header) {$root .= "/?P=0&N=$dir";}
else{$root .= "/huita8/$dir";}
header("Location: $root");}
else{include 'routes/web.php';}?>
