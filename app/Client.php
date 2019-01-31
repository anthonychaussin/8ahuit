<?php

class Client extends Model{

	public $idclient;
	public $nomclient;
	public $prenomclient;
	public $loginclient;
	public $mdpclient;
	public $mailclient;
	public $arrivclient;
	public $departclient;
	public $noresaclient;
	public $archiclient;
	public $telclient;

	public function __construct($login = null, $mdp = null, $nom = null, $prenom = null, $dateArrivee = null, $dateDepart = null, $nReservation = null, $id = null){
		$this->loginclient = $login;
		$this->mailclient = $login;
		$this->mdpclient = $mdp;
		$this->idclient = $id;
		$this->nomclient = $nom;
		$this->prenomclient = $prenom;
		$this->arrivclient = $dateArrivee;
		$this->departclient = $dateDepart;
		$this->noresaclient = $nReservation;
		$this->archiclient = true;
	}
}