<?php
session_start();
$database = "projet web";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$Type = 'acheteur';
$Login = isset($_POST["login"]) ? $_POST["login"] : "";
$MotDePasse = isset($_POST["password"]) ? $_POST["password"] : "";

 $_SESSION['Pseudo'] = $Login;
 
if ($Login == "") {

    echo "<script>alert(\"login vide\")</script>";
    header('Location: compte.html');
}

if ($MotDePasse == "") {

    echo "<script>alert(\"mot de passe vide\")</script>";
    header('Location: compte.html');


} 

elseif ($db_found) {

    $sql = "SELECT count(*) ID FROM utilisateur WHERE Password = '$MotDePasse' AND ( Pseudo='$Login' OR Email='$Login')";
    $result = mysqli_query($db_handle, $sql) ;
    
    if (!mysqli_query($db_handle, $sql)) {
        die('erreur requete: ' . mysqli_error($db_handle));
    }

     $rows = mysqli_num_rows($result);
 
     if($rows == 1){
       
        $_SESSION['Connect'] = 1;//session connecté
        header('Location: Page d\'accueil.php');
    }else{
      $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
      $_SESSION['Connect'] = 0;//session non connecté
    }
   /* //on recuppere l'id de l'utilisateur 
    $sql1 = "SELECT ID FROM utilisateur WHERE ( Pseudo='$Login' OR Email='$Login')";
    $result1 = mysqli_query($db_handle, $sql1);
    $id =  mysqli_fetch_assoc($result2);


   //recuperation des informations clients dans la session qui correspondent à l'utilisateur
    $sql2 = "SELECT * FROM info client WHERE ID_User = '$id'";
    $result2 = mysqli_query($db_handle, $sql2) ;
    while($data = mysqli_fetch_assoc($result2));
    {
        $_SESSION['Nom'] = $data['Nom'];
        $_SESSION['Prenom'] = $data['Prenom'];
        $_SESSION['Adresse 1'] = $data['Adresse 1'];
        $_SESSION['Adresse 2'] = $data['Adresse 2'];
        $_SESSION['Ville'] = $data['Ville'];
        $_SESSION['Code_Postale'] = $data['Code_Postale'];
        $_SESSION['Pays'] = $data['Pays'];
        $_SESSION['Telephone'] = $data['Telephone'];
        $_SESSION['Type_Payement'] = $data['Type_Payment'];
        $_SESSION['Numero_carte'] = $data['Numero_carte'];
        $_SESSION['Nom_Carte'] = $data['Nom_Carte'];
        $_SESSION['Date_expiration'] = $data['Date_expiration'];
        $_SESSION['Code'] = $data['Code'];
    }*/
    
    if (!mysqli_query($db_handle, $sql)) {
        die('erreur requete: ' . mysqli_error($db_handle));
    }


} else {
    echo "<br>Database not found";
}




mysqli_close($db_handle);
?>