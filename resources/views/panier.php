<script src='http://10.103.1.202/~huitahuit/huita8/pages/lesprod/js/vue.js'></script>
<script src='http://10.103.1.202/~huitahuit/huita8/pages/lesprod/js/vue-resource.js'></script>
<script src='http://10.103.1.202/~huitahuit/huita8/pages/mPanier/js/main.js'></script>
<script src="http://10.103.1.202/~huitahuit/huita8/pages/mPanier/JS/main2.js"></script>
	<main id="app">

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


