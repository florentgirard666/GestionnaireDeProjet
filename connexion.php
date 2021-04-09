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
		
		public function TestMdp($m)
		{
			$sql="Select * from GES_CompteUtilisateur Where Mdp = '$m'";
			$dbh=new Pdo('mysql:host=127.0.0.1;dbname=GestionnaireDeProjet','chef','mdpchef');
			$res=$dbh->query($sql);
			$dbh=null;
			$resu=$res->fetch(PDO::FETCH_ASSOC);			
			return ($resu['Mdp']);
		}
	}
	$a = new Connexion ("toto","tirlarigo");
	

	if ($_SERVER['REQUEST_METHOD'] == "POST") 
	{
		$Login = $_POST['login'];
		$Mdp = $_POST['mdp'];
		$Mdp = md5($Mdp);
		$mavar = $a->TestName($Login);
		$mavar2 = $a->TestMdp($Mdp);
		
		if (($Login) != $mavar or ($Mdp) != $mavar2) 
		{
			echo "Nom d'utilisateur ou mot de passe incorrect.";
		} 
		else 
		{
			header('Location: acceuil.html');

		}
	} else {
		echo '';
	}

?>