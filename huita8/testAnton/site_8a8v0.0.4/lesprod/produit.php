<?php 

function displayHentete(){
	echo <<<HIP
		<div id="entete">
<header>
	
	<!--<div>
	  
	  </div>-->
	  <div id="buttonCoIn">
	  <img class="imgHead" src="images/1.png" />
	  
	  	<a class="menuHead" href="view.php" id="BtCo" class="buttonCoIn">Connexion</a>
	  	<a class="menuHead" href="view.php" id="BtIn" class="buttonCoIn">Inscription</a>
	  	<a class="menuHead" href="view.php" id="BtPan">Mon Panier</a>
	  	<button class="snopen" id="cat" @click="show = !show " >Catégories</button>
	  	
	  </div>
</header>	
</div>

	<!--
	<div id="entete">
	
	<div id="centre"><img src="https://noahcatalog1.blob.core.windows.net/img/74752439-0bd9-4c2c-9117-f4a050044133.jpg" alt=""></div>
	
	</div> -->
HIP;
}
function displayProd() {


	echo "<selectionproduit></selectionproduit>";

/*	echo "<ul v-bind:class=\"{product_list:show }\" type=\"none\">";
for ($i=0; $i < 100; $i++) { 
	

	echo <<<HOP
	<li class="product"> 
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
			<!--
			<div class="vignette_pictos">
				<img title="A stocker au réfrigérateur"src="https://driveimg2.intermarche.com/fr/Ressources/images/publication/13521.png"> 
			</div> -->
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


	
HOP;
	
	}	
	echo "</ul>";
	*/
}


function displayMenu(){

	echo <<<HOP
	<transition name="slide-fade">
	<div class="sidenav" id="sidebar" v-if="show">

	  

	  <a class="snmenu" href="">Fruits</a>
	  <a class="snmenu" href="">Légumes</a>
	  <a class="snmenu" href="">Boissons</a>
	  <a class="snmenu" href="">Bio</a>
	  <a class="snmenu" href="">Conserves</a>
	  <a class="snmenu" href="">Sec</a>
	  <a class="snmenu" href="">Surgelé</a>
	  <a class="snmenu" href="">Hygiène</a>
	</div>
	</transition>
HOP;
}



