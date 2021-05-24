<?php
session_start();
$Id = session_id();

$_SESSION['Connect'] = 0;
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="compte.css">
</head>
<body>
	<a href="Page d'accueil.php"><img src="LOGOprojet.png" alt="Market place Logo" width="500"></a>

	<div class="container" id="container">

		<div class="form-container log-in-container">

			<form method= "post" action="connexion.php">
				<h1>Connexion</h1><br>
				
				<input type="login" name="login" placeholder="Mail ou Pseudo" />
				<input type="password"  name="password" placeholder="Mot de Passe" />
				<a href="mdp_oublié.html">Mot de passe oublié ?</a>
				<button type="submit" name="button_connexion">Se Connecter</button>

			</form>

		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">

					<form method ="post" class="monform" action="inscription.php">	
						<h1>Inscription</h1><br>

						<input type="email" name="mail" placeholder="Mail" />
						<input type="pseudo" name="pseudo" placeholder="Pseudo" />
						<input type="password" name="password" placeholder="Mot de Passe" />
						
						<br><br><br>
						<button type="submit" name="button_inscription">S'inscrire</button>
					</form>

				</div>
			</div>

		</div>
	</div>
	<footer>
		<div class="footerstyle">
			<br>
            Copyright &copy; 2021 ECE MarketPlace<br>
            <a href="contact.html">Contact</a>
        </div>
    </footer>
</body>
</html>

				
