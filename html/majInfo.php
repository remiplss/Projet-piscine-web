<?php
session_start();
$database = "projet web";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$login = isset($_POST["identifiant"]) ? $_POST["identifiant"] : "";

$Nom= isset($_POST["nom"]) ? $_POST["nom"] : "";
$Prenom= isset($_POST["prenom"]) ? $_POST["prenom"] : "";
$Add1= isset($_POST["add1"]) ? $_POST["add1"] : "";
$Add2= isset($_POST["add2"]) ? $_POST["add2"] : "";
$Ville= isset($_POST["ville"]) ? $_POST["ville"] : "";
$CodePostale= isset($_POST["codePostale"]) ? $_POST["codePostale"] : "";
$Pays= isset($_POST["pays"]) ? $_POST["pays"] : "";
$Tel= isset($_POST["tel"]) ? $_POST["tel"] : "";
$TypePayement= isset($_POST["Type de Payement"]) ? $_POST["Type de Payement"] : "";
$NumCarte= isset($_POST["numCarte"]) ? $_POST["numCarte"] : "";
$NomCarte= isset($_POST["nomCarte"]) ? $_POST["nomCarte"] : "";
$Exp= isset($_POST["exp"]) ? $_POST["exp"] : "";
$CCV= isset($_POST["ccv"]) ? $_POST["ccv"] : "";

$id = $_SESSION['ID'];

$sql = "UPDATE info_client SET Nom = '$Nom',Prenom = '$Prenom',Adresse_1 = '$Add1',Adresse_2 = '$Add2',Ville = '$Ville',
 Code_Postale = '$CodePostale',Pays = '$Pays',Telephone = '$Tel',Type_Payment = '$TypePayement',Numero_carte = '$NumCarte',
 Nom_Carte = '$NomCarte',Date_expiration = '$Exp',Code = '$CCV',ID_User = '$id' ";
        $result = mysqli_query($db_handle, $sql) or die('impossible d’ajouter cet enregistrement : ' . mysqli_error($db_handle));

        $result = mysqli_query($db_handle, $sql) or die('impossible d’ajouter cet enregistrement : ' . mysqli_error($db_handle));
        

//DEPOT DU LA PHOTO DE PROFIL
        
                $tailleMax =2097152;
                $extensionValide= array('jpg','gif','png','jpeg');
                if($_FILES['pdp']['size'] <= $tailleMax){
                       
                       $extensionUpload = strtolower(substr(strrchr($_FILES['pdp']['name'],'.'), 1)); 
                        if(in_array($extensionUpload , $extensionValide)){
                            
                            $chemin= "membre/pdp/".$_SESSION['ID'].".".$extensionUpload;
                            $deplacement = move_uploaded_file($_FILES['pdp']['tmp_name'], $chemin);
                            if($deplacement){
                                
                                $nomFichier = $id.".".$extensionUpload;
                                $req = "UPDATE info_client SET pdp = '$nomFichier'";
                                $conreq = mysqli_query($db_handle,$req) or die('impossible d’ajouter cet enregistrement : ' . mysqli_error($db_handle));
                            }
                            else
                            {
                                echo "erreur interne";    
                            }
                        }
                        else{
                                echo "Extension non acceptée";
                        }
                }
                else{
                        echo "Fichier trop volumineux";
                }
        
        
        if($result){
        //ouverture de la page d'accueil
        header('Location: compteAcheteur.php');
        mysqli_close($db_handle);
        }

?>