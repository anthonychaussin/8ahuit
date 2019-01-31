<footer>
 	<section id="footsec">
		<div>
			<h3>
			Infos Pratiques:
			</h3>
			<h4>
				<?php echo $lang['adre'] ?> :
			</h4> 
				<h5>Résidence Les Jardins de la Cascade Arc 1950,73700 Les Arcs</h5>

			<h4>E-mail :</h4>
				<a href="mailto:spar1950@wanadoo.fr"><h5>spar1950@wanadoo.fr</h5></a>
			<h4><?php echo $lang['tel'] ?> :</h4>
				<h5>04 79 00 69 72</h5>
			<a href=<?php echo langue("Francais");?>>FR</a>
			<a href=<?php echo langue("Anglais");?>>EG</a>
			<a href=<?php echo langue("Espagnol");?>>ES</a>
			<a href=<?php echo langue("Italien");?>>ITA</a>
			<a href=<?php echo langue("Allemand");?>>GE</a>
		</div>	
	</section>
</footer>
</body>
</html>
<?php 

function langue($value)
{
	if (!isset($_GET['P'])) {$_GET['P'] = "home";}
	return "\"".preg_split('[/]',strtolower( $_SERVER['SERVER_PROTOCOL']))[0].'://'.$_SERVER['HTTP_HOST']."/".preg_split('[/]',$_SERVER['REQUEST_URI'])[1]."/?P=".$_GET['P']."&lg=".$value."\"";
}