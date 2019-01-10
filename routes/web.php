<?php
if (!isset($_GET['P'])) {$_GET['P'] = "home";}
if($_GET['P'] == 0 && isset($_GET['N'])) 
{	
	include 'resources/views/header.php';
	include 'huita8/'.$_GET['N']."/index.php";
	include 'resources/views/footer.html';
}
else{
	$Controller = ucfirst($_GET['P']).'Controller';
	$Ctr = new $Controller();
	if (isset($_GET['S'])) {$Ctr->$_GET['S']();}
	else{$Ctr->index();}
}
