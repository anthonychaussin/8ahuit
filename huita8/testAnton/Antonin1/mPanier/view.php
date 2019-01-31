<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mon Panier</title>
	<link rel="stylesheet" type="text/css" href="http://10.103.1.202/~huitahuit/huita8/Antonin/mPanier/CSS/style.css">
</head>
<body>

	<main id="app">
		
		<div id="entete">
		<header>
		
		<!--<div>
		  
		  </div>-->
		  <div id="buttonCoIn">
		  <img class="imgHead" src="https://noahcatalog1.blob.core.windows.net/img/74752439-0bd9-4c2c-9117-f4a050044133.jpg" />
		  	
		  	<a class="menuHead" href="http://10.103.1.202/~huitahuit/huita8/Antonin/acceuil/view.php" id="Bt">Accueil</a>
		  	<a class="menuHead" href="view.php" id="Bt">Connexion</a>
		  	<a class="menuHead" href="view.php" id="Bt" >Inscription</a>
		  	<a class="menuHead" href="http://10.103.1.202/~huitahuit/huita8/Antonin/lesprod">Courses</a>
		  	
		  </div>
		</header>	


		</div>
		<ul  v-bind:class="{product_list:show }" type="none">
			<li class="product"  
		v-for="udata in userData ">
				<div>				
					<div class="vignette_img" >
					<img :src="'https://moncadencierperso.com/'+ udata.cheminimage" class="vignette_img_min" >
					</div>
					<div class="vignette_info" >
					<div class="vignette_produit_quantite">
					<span class="ng-binding">{{udata.lblproduit}}</span>
					</div>
					<p class="ng-binding" >Prix = {{udata.prix}}</p>
					</div>
					<div class="fle">
						
					<div id="nb" class="box">
						<counter><counter/>
					</div>
					
					</div>
				</div>

			</li>
		</ul>
	</main>
<script src='http://10.103.1.202/~huitahuit/huita8/Antonin/lesprod/js/vue.js'></script>
<script src='http://10.103.1.202/~huitahuit/huita8/Antonin/lesprod/js/vue-resource.js'></script>
<script src='http://10.103.1.202/~huitahuit/huita8/Antonin/lesprod/js/main.js'></script>
<!-- <script src="http://10.103.1.202/~huitahuit/huita8/Antonin/lesprod/js/jquery-3.3.1"></script>
<script src="http://10.103.1.202/~huitahuit/huita8/Antonin/lesprod/js/mainjq.js"></script> -->
<script src="http://10.103.1.202/~huitahuit/huita8/Antonin/mPanier/JS/main2.js"></script>
</body>
</html>