<?php

//debut de session
session_start();

//Connexion a la db
$database = "projet web";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);



?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">        
        <link rel="stylesheet" type="text/css" href="compteAcheteur.css">
    </head>
<body>
    	<header>
    		<a href="Page d'accueil.php"><img src="LOGOprojet.png" alt="Market place Logo" width="500"></a>
    	</header>
        
        <div class="nav-bar">
            <a href="Page d'accueil.php">Accueil</a>
            <a href="parcourir.php">Produits</a>
            <a href="notification.html">Notification</a>
            <a href="panier.html">Panier</a>
            <a href="deconnexion.php">Se deconnecter</a>
        </div>
        
        
        
    </body>
    <div id="footer"><br>
            	Copyright &copy; 2021 ECE MarketPlace<br>
            	<a href="contact.html">Contact</a>
        </div>
</html>