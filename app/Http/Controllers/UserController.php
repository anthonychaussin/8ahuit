<?php
/**
 * 
 */
class UserController extends Controller
{
	function index()
	{
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
		unset($_SESSION['register']);
		header("Location:./");
	}
}