<!DOCTYPE html>
<html>
<head>
	<title>Huit A 8</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="http://10.103.1.202/~huitahuit/huita8/testAnton/Antonin/lesprod/css/style.css">
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

	<!--   <select v-model="filterCategory">
	    <option value="all">All</option>
	    <option value="autre">autre</option>
	    <option value="sec">sec</option>
	    <option value="hygiene">hygiene</option>
	    <option value="vaisselle">vaisselle</option>
	    <option value="frais">frais</option>
	    <option value="epicerie">epicerie</option>
	    <option value="liquide">Boisson</option>
		<option value="surgele">surgele</option>
		<option value="lavage">lavage</option>
	    
	  </select>
	  <input v-model="filterTitle" placeholder="Produit"/> -->
	  
	<?php  
 	require('produit.php');
	displayHentete();
	

	?> 

	<button></button>

	<div>
	<?php 
		displayMenu();
		displayProd();
	 ?>
	</div>

<!-- <div class="container">
  <div class="button-wrap">
    <input class="hidden radio-label" type="radio" name="accept-offers" id="yes-button" checked="checked"/>
    <label class="button-label" for="yes-button">
      <h1>Yes</h1>
    </label>
    <input class="hidden radio-label" type="radio" name="accept-offers" id="no-button"/>
    <label class="button-label" for="no-button">
      <h1>No</h1>
    </label>
    <input class="hidden radio-label" type="radio" name="accept-offers" id="maybe-button"/>
    <label class="button-label" for="maybe-button">
      <h1>Maybe</h1>
    </label>
  </div>
</div> -->

</main>
<script src='http://10.103.1.202/~huitahuit/huita8/testAnton/Antonin/lesprod/js/vue.js'></script>
<script src='http://10.103.1.202/~huitahuit/huita8/testAnton/Antonin/lesprod/js/vue-resource.js'></script>
<script src='http://10.103.1.202/~huitahuit/huita8/testAnton/Antonin/lesprod/js/main.js'></script>
<script src="http://10.103.1.202/~huitahuit/huita8/testAnton/Antonin/lesprod/js/jquery-3.3.1"></script>
<script src="http://10.103.1.202/~huitahuit/huita8/testAnton/Antonin/lesprod/js/mainjq.js"></script>
<script src="http://10.103.1.202/~huitahuit/huita8/testAnton/Antonin/lesprod/js/main2.js"></script>
</body>

</html>


