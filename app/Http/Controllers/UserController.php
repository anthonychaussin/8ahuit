<?php
/**
 * 
 */
class UserController extends Controller
{
	function index()
	{
		if (empty($_POST)) { return $this->view ('acceuil', $this->data, ["acceuil"]);}
		$URI = $GLOBALS['root']."?P=".$_GET['P']."&S=";
		$this->data = ["nav"=>["info"=>$URI."info","panier"=>$URI."panier", "lastPanier"=>$URI."lastPanier","deco"=>$URI."deco"]];
		return $this->view ('user', $this->data, ["user"]);
	}
	function info()
	{
		return null;
	}
	function panier()
	{
		return null;
	}
	function lastPanier()
	{
		return null;
	}
	function deco()
	{
		if (empty($_POST)) { return $this->view ('acceuil', $this->data, ["acceuil"]);	}
		unset($_SESSION["register"]);
		return $this->view ('acceuil', $this->data, ["acceuil"]);
	}
}