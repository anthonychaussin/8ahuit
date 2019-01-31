<?php //	Anthony chaussin cree le 27/11/2018 ?>
<article id="inscription">
	<div class="content">
		<h1><?php echo $lang['cone'] ?></h1>
		<form id="inscri" class="form" action="" method="POST">
			<input type="hidden" name="action" value="connexion">
			<label for="mail">E-Mail</label>
			<input type="mail" name="mail" required="true">
			<label for="pwd"><?php echo $lang['mdp'] ?></label>
			<input type="password" name="pwd" required="true">
			<input type="submit" name="log">
		</form>
	</div>
	<div id="or"><h1><?php echo $lang['ou'] ?></h1></div>
	<div  class="content">
		<h1><?php echo $lang['nouv'] ?></h1>
		<form class="form" action="" method="POST">
			<input type="hidden" name="action" value="register">
			<label for="nom"><?php echo $lang['nom'] ?></label>
			<input type="name" name="nom">
			<label for="prenom"><?php echo $lang['pren'] ?></label>
			<input type="name" name="prenom">
			<label><?php echo $lang['numres'] ?></label>
			<input type="text" name="resa">
			<label><?php echo $lang['start'] ?></label>
			<input type="date" name="start">
			<label><?php echo $lang['end'] ?></label>
			<input type="date" name="end">
			<label>E-Mail</label>
			<input type="mail" name="mail">
			<label><?php echo $lang['mdp'] ?></label>
			<input type="password" name="pwd">
			<label><?php echo $lang['confmdp'] ?></label>
			<input type="password" name="pwdBis">
			<input type="submit" name="register">
		</form>
	</div>
	<div onclick="document.location.href = <?php echo "'".$root."'" ?>"> X </div>
</article>