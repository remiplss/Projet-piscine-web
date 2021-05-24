<?php

session_start();
$database = "projet web";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$Type = 'acheteur';
$Pseudo = isset($_POST["pseudo"]) ? $_POST["pseudo"] : "";
$Email = isset($_POST["mail"]) ? $_POST["mail"] : "";
$MotDePasse = isset($_POST["password"]) ? $_POST["password"] : "";

$_SESSION['Pseudo'] = $Pseudo;


//Blindage input vide
if ($Pseudo == "") {

    echo "<script>alert(\"pseudo vide\")</script>";
    header('Location: compte.php');
    exit();
}

if ($Email == "") {

    echo "<script>alert(\"email vide\")</script>";
    header('Location: compte.php');
    exit();
}

if ($MotDePasse == "") {

    echo "<script>alert(\"mot de passe vide\")</script>";
    header('Location: compte.php');
    exit();
}
//si la bdd est trouvé
 elseif ($db_found) {

    //on verifie si le compte existe
    $sql1 = "SELECT count(*) ID FROM utilisateur WHERE Password = '$MotDePasse' AND ( Pseudo='$Pseudo' OR Email='$Email')";
    $result1 = mysqli_query($db_handle, $sql1) or die('impossible d’ajouter cet enregistrement : ' . mysqli_error($db_handle)); 
    
   
    //si l'utilisateur n'existe pas
    if (mysqli_num_rows($result1)) {

        $_SESSION['Connect'] = 1; //session connecté

        //on créé le compte
        $_SESSION['Pseudo'] = $Pseudo;
        $sql = "INSERT INTO utilisateur (Type,Pseudo,Email,Password) VALUES ('$Type','$Pseudo','$Email','$MotDePasse') ";
        $result = mysqli_query($db_handle, $sql) or die('impossible d’ajouter cet enregistrement : ' . mysqli_error($db_handle));
        
        if($result){
        //ouverture de la page d'accueil
        header('Location: Page d\'accueil.php');
        mysqli_close($db_handle);
        
        }

        //on recuppere l'id de l'utilisateur 
    $sql1 = "SELECT * FROM utilisateur WHERE  Pseudo='$Login' OR Email='$Login'";
    $result1 = mysqli_query($db_handle, $sql1) or die('erreur requete: ' . mysqli_error($db_handle));

    while($data =  mysqli_fetch_assoc($result1))
    {
        $_SESSION['ID'] = $data['ID'];
    }
 
   }
    else{

        echo "<script>alert(\"l'utilisateur existe \")</script>";
        $_SESSION['Connect'] = 0; //session non connecté
    }
 }



mysqli_close($db_handle);
?>