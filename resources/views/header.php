<!DOCTYPE html>
<html lang="">
<head>
	<meta http-equiv="Content-Type" content="text/html"/>
	<meta charset="utf-8">
	<meta name="keywords" lang="fr" content="Les mots clés ici">
	<meta name="reply-to" content="email">
	<meta name="category" content="nom">
	<meta name="distribution" content="global">
	<meta name="description" content="Liste et syntaxe des principales balises meta.">
	<meta name="revisit-after" content="15 day">
	<meta name="author" lang="fr" content="Antonin Caillon, Anthony CHAUSSIN, William Favero, Johan Gruaz, Vianney Leblanc, Anton Grifon">
	<meta name="generator" content="Sublime text">
	<meta name="abstract" content="Ce site présente ...">
	<meta name="identifier-url" content="http://8ahuit.com/">
	<meta name="viewport" content="width=device-width, user-scalable=yes">
	<meta name="robots" content="index, follow">
	<title>8 à Huit - Les Arc 1850</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php if ($_GET["P"] != "0") {$this->cssLoader($css);} ?>
	<link rel="icon" href="resources/img/logo.ico"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body id=main class=$name>
	<header>
		<div style=" display: inline-block; width: 100%;"><img src="resources/img/logo8.png">
			<div style="float: right;margin: 10px;background-color: #ffffffc2;border-radius: 5px;padding: 5px;">
		<?php
		if(isset($_SESSION["register"]["info"]["prenomclient"]) && isset($_SESSION["register"]["info"]["nomclient"])){	echo "<a href=\".?P=user\">".$lang['hello'].", ".$_SESSION["register"]["info"]["prenomclient"]." ".$_SESSION["register"]["info"]["nomclient"]."</a>";}
		else{echo "<a href=\".?P=register\">".$lang['conex']."</a>";}
		?></div></div>
	</header>
	<nav>
		<ul id="menu">
			<a href=".?P=home"><li class="limenu"><?php echo $lang['home'] ?></li></a>
			<a href=".?P=shop"><li class="limenu"><?php echo $lang['bout'] ?></li></a>
			<?php
			if (isset($_SESSION['register'])) {
				if ($_SESSION['register']['info']["nomclient"] == 'pcoli') {
					echo '<a href=".?P=factures"><li>Factures</li></a>';
				}
			}
			?>
			<a href=".?P=about"><li class="limenu"><?php echo $lang['prop'] ?></li></a>
			<a href=".?P=contact"><li class="limenu"><?php echo $lang['cont'] ?></li></a>
		</ul>
	</nav>
