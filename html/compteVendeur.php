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
	<link rel="stylesheet" type="text/css" href="compte.css">
</head>
<body>
    <header>
    	<a href="Page d'accueil.php"><img src="LOGOprojet.png" alt="Market place Logo" width="500"></a>
    </header>
    <div class="nav-bar">
        <a href="Page d'accueil.php">Accueil</a>
        <a href="parcourir.html">Tout parcourir</a>
        <a href="notification.html">Notification</a>
        <a href="panier.html">Panier</a>
        <a href="compteVendeur.html">Le pseudo</a>
    </div>
    <div class="principal-box">
    <div class="left-column">
        
        <h3>Bienvenue: <?php echo $_SESSION['Pseudo'] ?></h3>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
          </form>
        
        
    </div>
    <div class="right-column">
        <form style = "width: 500px; height: 400px; overflow:auto; border: thin #000 solid; padding: 100px;" method ="post" class="info-livraison" action="majInfo.php">	
						<br><br><br><br><br><br><br><br><br>
                        <br><br><br><br><br><br><br><br><br>
                        <br><br><br><br><br><br><br><br><br>
                        <br><h2>Mettre à jour mes informations</h2><br><br>

						<input type="text" value="<?php echo $_SESSION['Nom'] ?>" name="nom" placeholder="Nom" />
						<input type="text" value="<?php echo $_SESSION['Prenom'] ?>" name="prenom" placeholder="Prénom" />
						<input type="text" value="<?php echo $_SESSION['Adresse 1'] ?>" name="add1" placeholder="Adresse 1" />
                        <input type="text" value="<?php echo $_SESSION['Adresse 2'] ?>" name="add2" placeholder="Adresse 2" />
                        <input type="text" value="<?php echo $_SESSION['Ville'] ?>" name="ville" placeholder="Ville" />
                        <input type="number" value="<?php echo $_SESSION['Code_Postale'] ?>" name="codePostal" placeholder="Code Postal" />
						<input type="text" value="<?php echo $_SESSION['Pays'] ?>" name="pays" placeholder="Pays" />
                        <input type="tel" value="<?php echo $_SESSION['Telephone'] ?>" name="tel" placeholder="Téléphone" />
						<select name="Type de Payement" value="<?php echo $_SESSION['Type_Payement'] ?>">
                            <option value=”Visa”>Visa</option>
                            <option value=”Mastercard”>Mastercard</option>
                            <option value=”CB”>CB</option>
                        </select>
						<input type="number" value="<?php echo $_SESSION['Numero_carte'] ?>" name="numCart" placeholder="Numéro de carte" />
                        <input type="nom_carte" value="<?php echo $_SESSION['Nom_Carte'] ?>" name="nomCart" placeholder="Titulaire de la carte" />
                        <input type="text" value="<?php echo $_SESSION['Date_expiration'] ?>" name="exp" placeholder="Date d'exp" />
                        <input type="number" value="<?php echo $_SESSION['Code'] ?>" name="ccv" placeholder="CCV" />
						
						
						<br>
						<button type="submit" name="modif">Enregistrer</button>
		</form>
        
        
    </div>
    </div>
    <footer>
        <p class="footerstyle">
            <br>
            Copyright &copy; 2021 ECE MarketPlace<br>
            <a href="contact.html">Contact</a>
        </p>
    </footer>
</body>
</html>