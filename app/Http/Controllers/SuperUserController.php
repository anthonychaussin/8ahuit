<?php
/**
 * 
 */
class SuperUserController extends Controller
{
	function index()
	{
		$URI = $GLOBALS['root']."?P=".$_GET['P']."&S=";
		$this->data = ["nav"=>["info"=>$URI."info","panier"=>$URI."panier", "lastPanier"=>$URI."lastPanier","deco"=>$URI."deco"]];
		return $this->view ('user', $this->data, ["user"]);
	}
	function deco()
	{
		unset($_SESSION["register"]);
		return $this->view ('acceuil', $this->data, ["acceuil"]);
	}
	function all()
	{
		return $this->view("admin", (new Facture())->loadAll(), ["admin"]);
	}
}