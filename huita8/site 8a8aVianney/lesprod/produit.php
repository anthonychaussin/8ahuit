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


	echo "<ul v-bind:class=\"{product_list:show }\" type=\"none\">";

	

	echo <<<HOP
	<li class="product"  v-for="udata in userData" > 
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
				<button id="photo"><img class="vignette_img_dim" :src="'https://moncadencierperso.com/'+ udata.image"></button>
			</div>
			<!--
			<div class="vignette_pictos">
				<img title="A stocker au réfrigérateur"src="https://driveimg2.intermarche.com/fr/Ressources/images/publication/13521.png"> 
			</div> -->
			<div class="vignette_info" >
				<div class="vignette_produit_quantite">
				<span class="ng-binding">{{udata.produit}}</span>
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
	
		
	echo "</ul>";
}
function displayMenu(){

	echo <<<HOP
	<transition name="slide-fade">
	<div class="sidenav" id="sidebar" v-if="show">

	  

	  <a class="snmenu" id="fruits" v-on:click='cat(fruits)' href="">Fruits</a>
	  <a class="snmenu" id="légumes" href="">Légumes</a>
	  <a class="snmenu" id="boissons" href="">Boissons</a>
	  <a class="snmenu" id="bio" href="">Bio</a>
	  <a class="snmenu" id="conserves" href="">Conserves</a>
	  <a class="snmenu" id="sec" href="">Sec</a>
	  <a class="snmenu" id="surgelé" href="">Surgelé</a>
	  <a class="snmenu" id="hygiène" href="">Hygiène</a>
	  <a class="snmenu" id="autre" v-on:click='cat(fruits)' href="">Autre</a>
	</div>
	</transition>
HOP;
}

function displayPanier(){

for ($i=0; $i < 10; $i++) { 
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
				<button id="photo"><img src="lesprod/photo.jpg"></button>
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
			
		</div>
	</li>








HOP;
}
}

//https://www.grafikart.fr/forum/topics/19951

/*v-if="userData.cat = autre"*/