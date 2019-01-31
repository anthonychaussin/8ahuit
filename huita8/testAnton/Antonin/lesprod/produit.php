<?php 

function displayHentete(){
	echo <<<HIP
		<div id="entete">
<header>
	
	<!--<div>
	  
	  </div>-->
	  <div id="buttonCoIn">
	  <img class="imgHead" src="http://srv-peda.iut-acy.local/griffona/huitahuit/huita8/testAnton/Antonin/images/1.png" />
	  	
	  	<a class="menuHead" href="http://srv-peda.iut-acy.local/griffona/huitahuit/huita8/testAnton/Antonin/acceuil/view.php" class="buttonCoIn">Accueil</a>
	  	<a class="menuHead" href="view.php" id="BtCo" class="buttonCoIn">Connexion</a>
	  	<a class="menuHead" href="view.php" id="BtIn" class="buttonCoIn">Inscription</a>
	  	<a class="menuHead" href="http://srv-peda.iut-acy.local/griffona/huitahuit/huita8/testAnton/Antonin/mPanier/view.php" id="BtPan">Mon Panier</a>
	  	
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
	

	echo "<ul id=\"product_list\" v-bind:class=\"{product_list:show }\" type=\"none\">";

	

	echo <<<HOP
	<li class="product"  
		v-for="udata in filteredPosts " 
		> 
		<div class="border" :id="udata.idproduit"> 

			<div class="vignette_title" > 
				<p>
					<span>Test  {{udata.lblcategorie}}</span>
				</p>
			</div>
			
			
			<div class="vignette_img" >
				<div class="vignette_remise" v-if="udata.remise">
					<p>
					<span class="vignette_remise_txt">Remise</span>
					</p>
				</div>
				<img :src="'https://moncadencierperso.com/'+ udata.cheminimage" class="vignette_img_min" >
			</div>
			<!--
			<div class="vignette_pictos">
				<img title="A stocker au réfrigérateur"src="https://driveimg2.intermarche.com/fr/Ressources/images/publication/13521.png"> 
			</div> -->
			<div class="vignette_info" >
				<div class="vignette_produit_quantite">
				<span class="ng-binding">{{udata.lblproduit}}</span>
				</div>
				<p class="ng-binding" >Prix = {{udata.prix}}</p>
			</div>
			
			<div class="fle">
				<div id="nb" class="box">
					<counter v-bind:id-produit="udata.idproduit"><counter/>
				</div>
				<p id="panier"><input type="button" class="btn" id="panier" value="Panier" s/> </p> 
			</div>
		</div>
	</li>
	
HOP;
	
		
	echo "</ul>";
}

function displayMenu(){

	echo <<<HOP
	<div id="headspace"></div>
	<div id="sidenav">
		<div id="headbar">
			<button class="snopen snbutton" id="cat" @click="show = !show " >Catégories</button>
	        <input v-model="filterTitle" placeholder="Title"/>
	        <button class="snbutton basket">Panier</button>
		</div>
		<transition name="slide-fade">
			<div class="sidenav" id="sidebar" v-if="show">

				<button class="snclose snbutton" id="cat" @click="show = !show " >Fermer</button>
				
				<input type="radio" id="all" class="hidden snmenu" value="all" v-model="filterCategory">
				<label class="filtre_text" for="all">All</label >

				<input type="radio" id="lavage" class="hidden snmenu" value="lavage" v-model="filterCategory" >
				<label for="lavage" class="filtre_text">bio</label>
				
				<input type="radio" id="surgele" class="hidden snmenu" value="surgele" v-model="filterCategory">
				<label for="surgele" class="filtre_text">surgele</label>
				
				<input type="radio" id="liquide" class="hidden snmenu" value="liquide" v-model="filterCategory">
				<label for="liquide" class="filtre_text">Boissons</label>
				
				<input type="radio" id="epicerie" class="hidden snmenu" value="epicerie" v-model="filterCategory">
				<label for="epicerie" class="filtre_text">conserve</label>
				
				<input type="radio" id="frais" class="hidden snmenu" value="frais" v-model="filterCategory">
				<label for="frais" class="filtre_text">frais</label>
				
				<input type="radio" id="vaisselle" class="hidden snmenu" value="vaisselle" v-model="filterCategory">
				<label for="vaisselle" class="filtre_text">legume</label>
				
				<input type="radio" id="hygiene" class="hidden snmenu" value="hygiene" v-model="filterCategory">
				<label for="hygiene" class="filtre_text">hygiene</label>
				
				<input type="radio" id="sec" class="hidden snmenu" value="sec" v-model="filterCategory">
				<label class="filtre_text" for="sec">sec</label >
				
				<input type="radio" id="fruit" class="hidden snmenu" value="confiture" v-model="filterCategory">
				<label class="filtre_text" for="fruit">fruit</label >

				<input type="radio" id="autre" class="hidden snmenu" value="autre" v-model="filterCategory">
				<label for="autre" class="filtre_text">Autre</label>
			
				<button class="basket">Panier</button>
		 	</div>
		</transition>
	</div>
HOP;
}

function displayPanier(){


	echo <<<HOP

	<li class="product" v-for="udata in userData "> 
		<div class="border" > 

			<div class="vignette_title"> 
				<p>
					<span>Test</span>
				</p>
			</div>
			
			<div class="vignette_remise" >
				
				<vignremise></vignremise>
				
			</div>
			<div class="vignette_img" >
				<button id="photo"><img :src="'https://moncadencierperso.com/'+ udata.image"></button>
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

//https://www.grafikart.fr/forum/topics/19951

/*v-if="userData.cat = autre"*/
//https://laravel.sillo.org/vue-js-filtrage/
//https://jsfiddle.net/8d9nx0mz/1/

			/*<input v-model="filterTitle" placeholder="Title"/>*/