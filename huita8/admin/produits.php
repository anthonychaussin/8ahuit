<?php //William FAVERO ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
	<title>Produits</title>
</head>
<header>
	<img class="imgHead" src="https://upload.wikimedia.org/wikipedia/fr/5/51/8_ahuit.png" />
	<a class="retour" href="index.php">
		<img class="retour" src="images/retour.jpg">
	</a>
	<h1 id="admintitle">Modification des produits</h1>
	
	
</header>
<body>
	<form method="POST" action="produits.php">
		<input type="submit" value="Valider" class="valide">
		<table id="tableauAdmin">
			<thead>
				<tr>
					<td class="cell">Nom</td><td class="cell">Photo</td><td class="cell">Prix unitaire</td><td class="cell">Poids</td><td class="cell">Affichage</td>
				</tr>
			</thead>
			<tbody>
				<?php
				include_once "db.php";
				include_once "../testprojetJohan/fonctionDB/fonctionsProduit.php";
				include_once "../../app/Produit.php";
				$n=0;
				$prods = RecupererAllProduits($bdd);
				$cats = RecupererAllCategorieAdmin($bdd);
				$produits = array();
				//echo "Produits dans la bdd avant le premier foreach :<br>";
				foreach ($prods as $prod)
				{
					//echo $prod["lblproduit"];
					$produit = new Produit($prod["idproduit"],$prod["lblproduit"],$prod["cheminimage"],$prod["detailproduit"],$prod["prix"],null,$prod["lblcategorie"],$prod["ean"]);
					$produits[] = $produit;
					$n++;
					if($n>50)
					{
						break;
					}
				}

				//echo "<br>Produits dans la bdd apres premier foreach :<br>";

			foreach ($produits as $produit) //Affichage des produits un par un dans un tableau
			{

				echo '<tr>';
				echo '<td class="cell"><input type="text" class="texte" name="nom' . $produit->id . '" value="' . $produit->lbl . '"></td><td class="cell"><img src="https://moncadencierperso.com/' . $produit->image . '" class="imgTab"></td><td class="cell"><input type="number" class="texte num"  step="0.1" class="nombre" name="prix' . $produit->id . '" value="' . $produit->prixunite . '"</td><td class="cell"><input type="number" class="texte num"  step="0.1" class="nombre" name="poids' . $produit->id . '" value="' . $produit->poids . '"</td>'; //Affichage du produit

				echo '<td class="cell"><input type="checkbox" id="affiche" name="affiche' . $produit->id . '">
  				<label for="affiche"></label>'; //Case à cocher pour afficher ou non les produits

  				echo '</td></tr>';



  				if(isset($_POST["nom".$produit->id]) || isset($_POST["prix".$produit->id]) || isset($_POST["affiche".$produit->id]))
  				{
  					//echo $_POST["nom1"];
  					ModifierChampProduitById($produit->id, "LBLPRODUIT", $_POST["nom".$produit->id],$bdd);
  					ModifierChampProduitById($produit->id, "PRIX", $_POST["prix".$produit->id],$bdd);
  				}
  				else
  				{
  					//echo "marche pas";
  				}
  			}
  			?>
  		</tbody>
  	</table>
  	<input type="submit" value="Valider" class="valide">
  </form>
</body>
</html>