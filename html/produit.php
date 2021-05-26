
<?php

//debut de session
session_start();

//Connexion a la db
$database = "projet web";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//A changer!!!!!
$ID = isset($_POST["ligne"]) ? $_POST["ligne"] : "";

echo "<script>alert(\"$ID\")</script>";


$sql = "SELECT * FROM produits WHERE ID = '$ID'";
$result = mysqli_query($db_handle, $sql) ;

while($data = mysqli_fetch_assoc($result))
{
    $Nom = $data['Nom'];
    $Image = $data['Image'];
    $Description = $data['Description'];
    $Prix_Direct = $data['Prix_Direct'];
    $Prix_Debut = $data['Prix_Debut'];
    $Vendeur = $data['Vendeur'];

   
}



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
        
         <div class="col-container">
            <div class="col">
                <!-- CODE PHP POUR PRENDRE LA PHOTO DU PRODUIT CHOISIT + NOM + DESCRIPTION-->
                <br><br>
                <center>
                    <img align="center" src="<?php echo $Image ?>" alt="Item1" height="150">
                    <h1><?php echo $Nom ?></h1>
                    <p><?php echo $Description ?></p>
                    
                    
                
                </center>
    
                
                
            </div>
            <div class="col">
                <!-- CODE PHP POUR PRENDRE LA PHOTO DU PRODUIT CHOISIT + NOM + DESCRIPTION-->
                <br><br>
                <center>
                    <h2>Prix d'achat immédiat: <h2><?php echo $Prix_Direct ?>€</h2></h2>
                    <button type="submit" name="ajoutPanier">Ajouter au panier</button>
                    
                    <br><br>
                    
                    <h2>Proposez un prix au vendeur</h2>
                    <input type="numer" name="prixDirect" placeholder="Mon offre" /><br><br>
                    <button type="submit" name="envoiPrivee">Envoyer mon offre</button>
                    
                
                
                </center>
    
                
                
            </div>
            <div class="col">
                 <br><br>
                <center>
                    
                    <h2>Meilleur offre: <h2><?php echo $Prix_Debut ?>€</h2></h2>
                    <input type="number" name="prixEnchere" placeholder="Mon enchère" /><br><br>
                    <button type="submit" name="placerEnchere">Placer mon enchère</button>
                </center>
                
                
            </div>
         </div>
        
        <div id="footer"><br>
            	Copyright &copy; 2021 ECE MarketPlace<br>
            	<a href="contact.html">Contact</a>
        </div>
        
    </body>
</html>