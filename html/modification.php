<?php
//debut de la session
session_start();

//ouverture db
$database = "projet web";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$Login =  $_SESSION['Pseudo'];

$Pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$Email = isset($_POST["mail"])? $_POST["mail"] : "";



if ($db_found) {

    //on recuppere l'id dela session
    $id = $_SESSION['ID'];

//recuperation des informations clients dans la session qui correspondent à l'utilisateur
$sql2 = "SELECT * FROM info_client WHERE ID_User = '$id'";
$result2 = mysqli_query($db_handle, $sql2) ;

////On rentre les infos dans la super-globale $_SESSION
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
//Initialise les Variables d'affichage 
$IDA ='';
$TypeA ='';
$PseudoA='';
$EmailA ='';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">        
        <link rel="stylesheet" type="text/css" href="compteAcheteur.css">
    </head>
<body>
    	<header>
    		<a href="Accueil.php"><img src="LOGOprojet.png" alt="Market place Logo" width="500"></a>
    	</header>
        
        <div class="nav-bar">
            <a href="Accueil.php">Accueil</a>
            <a href="parcourir.html">Produits</a>
            <a href="notification.html">Notification</a>
            <a href="panier.html">Panier</a>
            <a href="connexion.html">Connexion</a>
        </div>
        
        <div class="col-container">
            <div class="col">
              <h2>Trouvez un utilisateur</h2>
                <form action="<?php  
                //si on on apuuie sur le bouton
               if (isset($_POST["button1"])) {
                  if ($db_found) {
                    
                    //requete SQL
                    $sql = "SELECT * FROM utilisateur";
                    
                        if ($Pseudo != "") {
                    
                            $sql .= " WHERE Pseudo LIKE '%$Pseudo%'";
                            if ($Email != "") {
                                $sql .= " AND Email LIKE '%$Email%'";
                            }
                        }

                        //on envoie la requete
                        $result = mysqli_query($db_handle, $sql);
                    
                        if (mysqli_num_rows($result) == 0) {
                      
                            $IDA= "Utilisateur  non trouvé";
                        }
                        
                        else {
                            //On rentre les valeurs de la db dans les variables d'affichages
                            while ($data = mysqli_fetch_assoc($result)) {
                              
                
                                $IDA = $data['ID'];
                                $TypeA = $data['Type'];
                                $PseudoA = $data['Pseudo'];
                                $EmailA = $data['Email'];
                
                               // header('Location : modification.php');
                            }
                        }
                    }
                        else {
                            echo "Database not found";
                        }
                        
                    }?>" method="post">
                <table>
                <tr>
                <td>Pseudo:</td>
                <td><input type="text" name="pseudo"></td>
                </tr>
                <tr>
                <td>Email:</td>
                <td><input type="text" name="mail"></td>
                </tr>
                <tr>
                <td colspan="2" align="center">
                 <button type="submit" name="button1" value="Rechercher">Rechercher</button>
                 </td>
                </tr>
                </table>
                </form>
                <!-- Affichage de l'utilisateur recherché-->
                <td><?php echo $IDA ?></td>
                <td><?php echo $TypeA ?></td>
                <td><?php echo $PseudoA ?></td>
                <td><?php echo $EmailA ?></td>
                <?php 
                $IDA ='';
                $TypeA ='';
                $PseudoA='';
                $EmailA ='';
                ?>

            </div>
          
            <div class="col">
              
            <input type="text" name="ID" placeholder="ID"><br>
                <input type="radio" id="upgrade" name="action" value="upgrade">
                <label for="upgrade">Mettre le statut Vendeur</label><br>
                <input type="radio" id="downgrade" name="action" value="downgrade">
                <label for="downgrade">Mettre le statut Acheteur</label><br>
                <input type="radio" id="supp" name="action" value="other">
                <label for="suppr">Supprimer le compte</label><br>
                <button type="submit" name="button1" value="valider">Valider</button>
            </div>
            
            <div class="col">
                 <h1>COLONNE1</h1>
            </div>
            
        
        

            
        </div>
        
        <div id="footer"><br>
            	Copyright &copy; 2021 ECE MarketPlace<br>
            	<a href="contact.html">Contact</a>
        </div>
        
    </body>
</html>

