<?php
if (isset($_GET['lg'])) {$_SESSION['langue'] = $_GET['lg'];}
if (!isset($_GET['P'])) {$_GET['P'] = "home";}
if($_GET['P'] == 0 && isset($_GET['N'])) 
{	
	include 'resources/views/header.php';
	include 'huita8/'.$_GET['N']."/index.php";
	include 'resources/views/footer.html';
}
else{
	$Controller = ucfirst(secur($_GET['P'])).'Controller';
	$Ctr = new $Controller();

	if (isset($_GET['S'])) {
		$fun = secur($_GET['S']); 
		$Ctr->$fun();
	}
	elseif(isset($_POST['action'])){
		$fun = secur($_POST['action']); 
		$Ctr->$fun();
	}
	else{$Ctr->index();}
}
