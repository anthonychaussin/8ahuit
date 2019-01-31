<?php
/**
 * 
 */
class ContactController extends Controller
{
	
	function index()
	{
		//aller chercher les données et les mettre dans $data
		return $this->view ('404', $this->data, null, null,".html");
	}
}