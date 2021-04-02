<?php
	class Connexion
	{
		private $Login; 
		private $Mdp;
		
		public function __construct($Login, $Mdp)
		{
			$this -> Login = $Login;
			$this -> Mdp = $Mdp;
		}
		
		public function VersChaine()
		{
			return("Login = ".$this->Login." Mdp = ".$this->Mdp);
		}
		
		function get_Login()
		{
			return($this -> Login);
		}

		function set_Login ($Login)
		{
			$this->Login = $Login;
		}

		function get_Mdp()
		{
			return($this -> Mdp);
		}

		function set_Mdp ($Mdp)
		{
			$this->Mdp = $Mdp;
		}
		
		public function InfoUser()
		{
			$sql="Select * from GES_CompteUtilisateur";
			$dbh=new Pdo('mysql:host=127.0.0.1;dbname=GestionnaireDeProjet','chef','mdpchef');
			$res=$dbh->query($sql);
			$dbh=null;
			$Leuser = array();
			while($resu=$res->fetch(PDO::FETCH_ASSOC))
			{
				$Leuser[]=$resu;
			}
			return ($Leuser);
	   	}
		public function LogUser()
		{
			$sql="Select NomUtilisateur from GES_CompteUtilisateur";
			$dbh=new Pdo('mysql:host=127.0.0.1;dbname=GestionnaireDeProjet','chef','mdpchef');
			$res=$dbh->query($sql);
			$dbh=null;
			$Leuser = array();
			while($resu=$res->fetch(PDO::FETCH_ASSOC))
			{
				$Leuser[]=$resu;
			}
			return ($Leuser);
	   	}
		
		public function TestName($b)
		{
			$sql="Select * from GES_CompteUtilisateur Where NomUtilisateur = '$b'";
			$dbh=new Pdo('mysql:host=127.0.0.1;dbname=GestionnaireDeProjet','chef','mdpchef');
			$res=$dbh->query($sql);
			$dbh=null;
			$resu=$res->fetch(PDO::FETCH_ASSOC);			
			return ($resu['NomUtilisateur']);
		}
	}
	$a = new Connexion ("toto","tirlarigo");
	$d = $a->LogUser();
	$mdp = sha1('pwet');
	echo $mdp;
	foreach($d as $k => $v)
	{
		foreach($v as $cle => $valeur)
		{
			echo $cle . " = " . $valeur."  ||  ";
		}
		echo "<br />";
	}

	if ($_SERVER['REQUEST_METHOD'] == "POST") 
	{
		$Login = $_POST['login'];
		$mavar = $a->TestName($Login);
		if (($Login) != $mavar) 
		{
			echo "Nom d'utilisateur ou mot de passe incorrect.";
		} 
		else 
		{
			echo $Login;
		}
	} else {
		echo 'boulet';
	}

?>