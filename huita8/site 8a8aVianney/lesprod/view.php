<!DOCTYPE html>
<html>
<head>
	<title>Spare</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="lesprod/css/style.css">
</head>

<body>
<main id="app">
<!-- 		
	<div v-for="udata in userData">
		{{ udata.produit}} 
	</div>
	<span v-bind:title="message">
    Hover your mouse over me for a few seconds
    to see my dynamically bound title!{{message}}
  </span> -->

 <?php  
	displayHentete();
	

	?> 

	<!-- <ul v-bind:class="{product_list:show }" type="none">
	
		<li class="product" v-for="tprod in mesProd"> 
			<div class="border" > 

				<div class="vignette_title"> 
					<p>
						<span>Test</span>
					</p>
				</div>
				
				<div class="vignette_remise" >
					
					<vignremise></vignremise>
					
				</div>
				<div class="vignette_img">
					<img src="http://eliedarco.com/wp-content/uploads/captain-america-190x190.jpg">
				</div>
				
				<div class="vignette_pictos">
					<img title="A stocker au réfrigérateur"src="https://driveimg2.intermarche.com/fr/Ressources/images/publication/13521.png"> 
				</div> 
				<div class="vignette_info" >
					<div class="vignette_produit_quantite">
					<span class="ng-binding">la barquette de 6 - 300 Gr</span>
					</div>
					<p class="ng-binding">Description</p>
					<p class="ng-binding">Prix</p>
				</div>
				
				<div class="fle">
					<div id="nb" class="box">
						<counter><counter/>
					</div>
					<p id="panier"><input type="button" class="btn" id="panier" value="Panier" /> </p> 
				</div>
			</div>
		</li>
		
	
			
		</ul> -->

	<div>
	<?php 
		displayMenu();
		displayProd();
	 ?>
	</div>
	 
	



</main>
<script src='lesprod/js/vue.js'></script>
<script src='lesprod/js/vue-resource.js'></script>
<script src='lesprod/js/main.js'></script>
<script type="text/javascript" src="lesprod/js/jquery-3.3.1"></script>
<script src="lesprod/js/mainjq.js"></script>
<script src="lesprod/js/main2.js"></script>
</body>

</html>

