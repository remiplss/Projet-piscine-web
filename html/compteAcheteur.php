<?php
session_start();
$database = "projet web";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$Login =  $_SESSION['Pseudo'];

if ($db_found) {

    //on recuppere l'id dela session
    $id = $_SESSION['ID'];

//recuperation des informations clients dans la session qui correspondent à l'utilisateur
$sql2 = "SELECT * FROM info_client WHERE ID_User = '$id'";
$result2 = mysqli_query($db_handle, $sql2) ;

while($data = mysqli_fetch_assoc($result2))
{
    $_SESSION['Nom'] = $data['Nom'];
    $_SESSION['Prenom'] = $data['Prenom'];
    $_SESSION['Adresse 1'] = $data['Adresse_1'];
    $_SESSION['Adresse 2'] = $data['Adresse_2'];
    $_SESSION['Ville'] = $data['Ville'];
    $_SESSION['Code_Postale'] = $data['Code_Postale'];
    $_SESSION['Pays'] = $data['Pays'];
    $_SESSION['Telephone'] = $data['Telephone'];
    $_SESSION['Type_Payement'] = $data['Type_Payment'];
    $_SESSION['Numero_carte'] = $data['Numero_carte'];
    $_SESSION['Nom_Carte'] = $data['Nom_Carte'];
    $_SESSION['Date_expiration'] = $data['Date_expiration'];
    $_SESSION['Code'] = $data['Code'];


}
}
else{
    echo "<br>Database not found";
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
            <a href="Accueil.html">Accueil</a>
            <a href="parcourir.html">Produits</a>
            <a href="notification.html">Notification</a>
            <a href="panier.html">Panier</a>
            <a href="compteAcheteur.php">Mon Compte</a>
        </div>
        
        <div class="col-container">
            <div class="col">
              <h2>Bienvenue: <?php echo $_SESSION['Pseudo'] ?> </h2>
              <p>AJOUT DE La photo</p>
            </div>
          
            <div class="col">
              <form method="post" action="majInfo.php">
                        <h2>Mettre à jour mes informations</h2>
                        <input type="text" value="<?php echo $_SESSION['Nom'] ?>" name="nom" placeholder="Nom" />
						<input type="text" value="<?php echo $_SESSION['Prenom'] ?>" name="prenom" placeholder="Prénom" />
                        <br><br>
						<input type="text" value="<?php echo $_SESSION['Adresse 1'] ?>" name="add1" placeholder="Adresse 1" />
                        <input type="text" value="<?php echo $_SESSION['Adresse 2'] ?>" name="add2" placeholder="Adresse 2" />
                        <br><br>
                        <input type="text" value="<?php echo $_SESSION['Ville'] ?>" name="ville" placeholder="Ville" />
                        <input type="number" value="<?php echo $_SESSION['Code_Postale'] ?>" name="codePostal" placeholder="Code Postal" />
                        <br><br>
						<input type="text" value="<?php echo $_SESSION['Pays'] ?>" name="pays" placeholder="Pays" />
                        <input type="tel" value="<?php echo $_SESSION['Telephone'] ?>" name="tel" placeholder="Téléphone" />
                        <br><br>
						<select name="Type de Payement" value="<?php echo $_SESSION['Type_Payement'] ?>">
                            <option value=”Visa”>Visa</option>
                            <option value=”Mastercard”>Mastercard</option>
                            <option value=”CB”>CB</option>
                        </select>
                        <br><br>
						<input type="number" value="<?php echo $_SESSION['Numero_carte'] ?>" name="numCart" placeholder="Numéro de carte" />
                        <input type="nom_carte" value="<?php echo $_SESSION['Nom_Carte'] ?>" name="nomCart" placeholder="Titulaire de la carte" />
                        <br><br>
                        <input type="text" value="<?php echo $_SESSION['Date_expiration'] ?>" name="exp" placeholder="Date d'exp" />
                        <input type="number" value="<?php echo $_SESSION['Code'] ?>" name="ccv" placeholder="CCV" />
                        <br><br>
						<button type="submit" name="modif">Enregistrer</button>
              </form>
              
            </div>

            
        </div>
        
        <div id="footer"><br>
            	Copyright &copy; 2021 ECE MarketPlace<br>
            	<a href="contact.html">Contact</a>
        </div>
        
    </body>
</html>