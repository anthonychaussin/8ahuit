<?php
/**
 * 
 */
class RegisterController extends Controller
{
	
	function index()
	{
		return $this->view ('formConnInsc', $this->data, ["form"], null);
	}

	function register()
	{
		if ($this->verif())
		{
			echo "juste";
			$result = ((new Client($_POST['mail'], htmlentities(sha1($_POST['pwd'], "randomKing".$_POST['mail'])), $_POST['nom'], $_POST['prenom'], $_POST['start'], $_POST['end'], $_POST['resa']))->insert());
			var_dump($result);
			if(!is_null($result[1]))
				{
					return $this->view ('formConnInsc', ["error" => "An error is appear", "POST" => $_POST], ["form"]);
				}
			else{return $this->view ('acceuil', $this->data, ["acceuil"]);}
		}else{
			echo "error";
			return $this->view ('formConnInsc', ["error" => "An error in checkout is appear", "POST" => $_POST], ["form"]);
		}
		
	}

	function connexion()
	{
		if ($this->verif())
		{
			echo "juste";
		
			$userConnex = new Client($_POST['mail'], $_POST['pwd']);
			$user = (new Client())->fonctionDb('FindClientByLog',[$_POST['mail']]);
			if ($user->loginclient == $userConnex->loginclient && $user->mdpclient == htmlentities(sha1($userConnex->mdpclient, "randomKing".$userConnex->loginclient))) {
				
				$auto = "user";
				if ($user->nomclient == "pcoli") {$auto = "master";}
				
				$_SESSION['register'] = ["stat" => true, "info" => $this->getParam($user), "authorize" => $auto];

				return $this->view ('acceuil', ["data" => null], ["acceuil"]);
			}
			else{ return $this->view ('formConnInsc', ["error" => "An error is appear", "POST" => $_POST], ["form"]);}
		}else{
			echo "error";
			return $this->view ('formConnInsc', ["error" => "An error in checkout is appear", "POST" => $_POST], ["form"]);
		}
	}

	function verif(){
		//TODO un fonction de vérification en fonction du champs
		if ($_POST['action']=='register') {
			$re='/^[a-z]+$/m';
			if(preg_match_all($re, strtolower($_POST['nom']))==1 && preg_match_all($re, strtolower($_POST['prenom']))==1){
				$re = '/^.+[@].+[.]\w{2,3}$/m';
				if(preg_match_all($re, $_POST['mail'])==1){
					$ver=0;
					if (preg_match_all('@[A-Z]+@', $_POST['pwd'])==1) {
						$ver=$ver+1;
					}
					if (preg_match_all('@[a-z]+@', $_POST['pwd'])==1) {
						$ver=$ver+1;
					}
					if (preg_match_all('@[0-9]+@', $_POST['pwd'])==1) {
						$ver=$ver+1;
					}
					if (preg_match_all('@.(\W\D)+@', $_POST['pwd'])==1) {
						$ver=$ver+1;
					}
					if (strlen($_POST['pwd'])>=8) {
						$ver=$ver+1;
					}
					if ($ver>=3) {
						if ($_POST['end']>=date("Y-m-d") && $_POST['end']>=$_POST['start']) {
							if ($_POST['pwd']==$_POST['pwdBis']) {
								return true;
							}else
								return false;
						}else
							return false;
					}else{
						echo $ver;
						return false;
					}
				}else
					return false;
			}else
				return false;
			
		}else if ($_POST['action']=='connexion') {
			$re = '/^.+[@].+[.]\w{2,3}$/m';
			if(preg_match_all($re, $_POST['mail'])==1){
				return true;
			}else
				return false;
		}else{
			return false;
		}
		
	}
	
	function getParam($oject){
		$para = null;
		foreach ($oject as $key => $value) {$para[$key]= $value;}
		return $para;
	}
}