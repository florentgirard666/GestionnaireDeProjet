 <!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Interface de Connéxion</title>
	</head>
	<body>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

		<h1>INTERFACE DE CONNEXION</h1>
			
		<label for="login">Login</label><br />
		<input type="text" id="login" name="login" value=""><br />
		<label for="mdp">Mot de passe</label><br>
		<input type="password" id="mdp" name="mdp" value=""><br /><br />
		<input type="checkbox" onclick="myFunction()">Voir votre mot de passe
		<p><a href="mot de passe oublie.html"target="_blank"> Mot de passe oublié ? </a></p>
		<input type="submit" value="Valider"><br />
		
	</form>
	<script>
	function myFunction() {
		var x = document.getElementById("mdp");
		if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
		}
	}
</script>
 
	<?php 
		require ('connexion.php');
		
	
	?>
	</body>
</html> 