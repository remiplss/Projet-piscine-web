<?php
session_start();
$database = "projet web";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


$NomProduit = isset($_POST["nom"]) ? $_POST["nom"] : "";
$Description= isset($_POST["description"]) ? $_POST["description"] : "";
$PrixAchat = isset($_POST["prixAchatdirect"]) ? $_POST["prixAchatdirect"] : "";
$PrixEnchere = isset($_POST["prixEnchere"]) ? $_POST["prixEnchere"] : "";



//Blindage input vide
if ($NomProduit == "") {

    echo "<script>alert(\"Nom du produit vide\")</script>";
    header('Location: compteVendeur.php');
    exit();
}



if ($PrixAchat == "") {

    echo "<script>alert(\"Prix d'achat immédiat vide\")</script>";
    header('Location: compteVendeur.php');
    exit();
}

if ($PrixEnchere == "") {

    echo "<script>alert(\"Prix de départ d'enchère vide\")</script>";
    header('Location: compteVendeur.php');
    exit();
}
//si la bdd est trouvé
 elseif ($db_found) {

        $_SESSION['Pseudo'] = $Pseudo;
        $sql = "INSERT INTO produits (Nom,Image,Description,Prix_Direct,Prix_Debut,Vendeur) VALUES ('$NomProduit','','$Description','$PrixAchat','$PrixEnchere','$Pseudo') ";
        $result = mysqli_query($db_handle, $sql) or die('impossible d’ajouter cet enregistrement : ' . mysqli_error($db_handle));
        
        if($result){
        //ouverture de la page d'accueil
        header('Location: Page d\'accueil.php');
        mysqli_close($db_handle);
        
        }


    }
mysqli_close($db_handle);


?>