<!DOCTYPE html>
<html>
<head>
	<title>Spare</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="http://10.103.1.202/~huitahuit/huita8/Antonin/lesprod/css/style.css">
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
 	require('produit.php');
	displayHentete();
	

	?> 
	<v-content v-if="selectCatego">
	{{userData.cat[selectCatego]}}
	</v-content>

	<div>
	<?php 
		displayMenu();
		displayProd();
	 ?>
	</div>
	 
	<!-- v-model="selectCatego" 
		v-on:change="selectionChanged" -->



</main>
<script src='http://10.103.1.202/~huitahuit/huita8/Antonin/lesprod/js/vue.js'></script>
<script src='http://10.103.1.202/~huitahuit/huita8/Antonin/lesprod/js/vue-resource.js'></script>
<script src='http://10.103.1.202/~huitahuit/huita8/Antonin/lesprod/js/main.js'></script>
<script src="http://10.103.1.202/~huitahuit/huita8/Antonin/lesprod/js/jquery-3.3.1"></script>
<script src="http://10.103.1.202/~huitahuit/huita8/Antonin/lesprod/js/mainjq.js"></script>
<script src="http://10.103.1.202/~huitahuit/huita8/Antonin/lesprod/js/main2.js"></script>
</body>

</html>

