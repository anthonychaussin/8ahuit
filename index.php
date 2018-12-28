<?php
session_start();
if (isset($_GET)) {
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
}?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>8 à Huit - Les Arc 1850</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" href="huita8/img/logo.ico"/>
</head>
<body>
	<header>
		<a href=".?P=5">Connexion/Inscription</a>
		<section>
			
		</section>
		<canvas>
			
		</canvas>
	</header>
	<nav>
		<ul id="menu">
			<a href=".?P=1"><li>Accueil</li></a>
			<a href=".?P=2"><li>Boutique</li></a>
			<?php
			if (isset($_SESSION['user'])) {
				if ($_SESSION['user'] == 'pcoli') {
					echo '<a href=".?P=6"><li>Factures</li></a>';
				}
			}
			?>
			<a href=".?P=3"><li>A propos</li></a>
			<a href=".?P=4"><li>Contact</li></a>
		</ul>
	</nav>
<?php
if (isset($temp)) {	include($temp);}
else{
	if (isset($_GET['P'])) {
		switch ($_GET['P']) {
			case 1:
				include 'huita8/pages/acceuil/index.html';
				break;
			case 2:
				include 'huita8/pages/lesprod/index.php';
				break;
			case 3:
				include 'huita8/pages/';
				break;
			case 4:
				include 'huita8/pages/';
				break;
			case 5:
				include 'huita8/pages/form_inscription-connection/index.html';
				break;
			case 6:
				include 'huita8/API/facturePDF/index.php';
				break;
			default:
				include 'huita8/pages/acceuil/index.html';
				break;
		}
	}
	else{
		include 'huita8/pages/acceuil/index.html';
	}
}
?>
	<footer>
 	<section id="footsec">
	<div>
			<h3>
			Infos Pratiques:
			</h3>
			<h4>
				Adresse :
			</h4> 
				<h5>Résidence Les Jardins de la Cascade Arc 1950,73700 Les Arcs</h5>

			<h4>Email :</h4>
			<h5>spar1950@wanadoo.fr</h5>
			<h4>Tel :</h4>
			<h5>04 79 00 69 72</h5>
			
		</div>	
	</section>
</footer>
</body>
</html>
