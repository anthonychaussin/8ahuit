	<!-- Antonin Caillon-->
<main id="app">
  

	<div style="display: inline-flex;">
		<transition name="slide-fade">
		 <div class="container">
			<div class="sidenav" id="sidebar" v-if="show">
				<input v-model="filterTitle" placeholder="Title" id="sherch_title_bar"/>

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
			</div>
			
		 </div>
		</transition>
		<div>
		 <ul v-bind:class="{product_list:show }" type="none">
			 <li class="product"  
				v-for="udata in filteredPosts " 
				> 
				<div class="border" :id="udata.idproduit"> 

					<div class="vignette_title" v-if="udata.remise"> 
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
							<counter></counter>
						</div>
						<p id="panier"><input type="button" class="btn" id="panier" value="Panier" /> </p> 
					</div>
				</div>
			</li>
		</ul>
	</div>
	</div>

</main>
<script src="public/js/main.js"></script>




<!-- 
https://www.grafikart.fr/forum/topics/19951
https://laravel.sillo.org/vue-js-filtrage/
https://jsfiddle.net/8d9nx0mz/1/

v-if="userData.cat = autre"
<input v-model="filterTitle" placeholder="Title"/> -->